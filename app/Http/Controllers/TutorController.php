<?php

namespace App\Http\Controllers;

use App\Http\Requests\TutorRequest;
use App\Models\AcademicStatus;
use App\Models\Countries;
use App\Models\Journal\Subject;
use App\Models\Journal\TutorSubject;
use App\Models\Nationalities;
use App\Models\Navigation;
use App\Models\Role;
use App\Models\Sciencefield;
use App\Models\Scientificdegree;
use App\Models\StructuralSubdivision;
use App\Models\Tutor;
use App\Models\User;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TutorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
//        $teachers = Tutor::select('TutorID','firstname','lastname','patronymic','StartDate','departmentid')->with('department')
//            ->where('TutorID',4327)->get();
//
//        dd($teachers);

        return view('tutor.index');
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $nationalities = Nationalities::all();
        $countries = Countries::select('id','nameru')->get();
        $scienceFields = Sciencefield::all();
        $scientificDegree = Scientificdegree::all();
        $academicStatus = AcademicStatus::all();
        $roles = Role::all();

     //   dd($nationalities);

        return view('tutor.create', compact(['nationalities','countries','scienceFields','scientificDegree','academicStatus','roles']));
    }

    /**
     * @param \App\Http\Requests\TutorRequest $request
     */
    public function store(TutorRequest $request)
    {
        $data = $request->validated();

        $tutor = Tutor::create($data);

        if (array_key_exists('roles',$data)){
            $this->storeRoles($tutor->TutorID, $data['roles']);
        }

        return redirect()->route('teachers')->with('success', 'Успешно добавлен')->withInput();
    }

    /**
     * @param \App\Models\Tutor $tutor
     */
    public function show(Tutor $tutor)
    {
        $subjects = DB::table('tutorsubject')
                ->join('studygroups', 'tutorsubject.TutorSubjectID','=','studygroups.tutorSubjectID')
                ->join('subjects', 'subjects.SubjectID', '=', 'tutorsubject.SubjectID')
                ->select('subjects.SubjectID', 'subjects.SubjectNameRU', 'subjects.SubjectNameKZ')
                ->where('studygroups.year','=','2023')
                ->where('tutorsubject.TutorID','=', $tutor->TutorID)
                ->where('subjects.ispractice','=', 0)
                ->distinct()
                ->get();

        $sex = [1=>'Женат/Замужем',2=>'Холост/Не замужем'];

        return view('tutor.show',compact(['tutor','subjects','sex']));
    }

    /**
     * @param \App\Models\Tutor $tutor
     */
    public function edit(Tutor $tutor)
    {
        $nationalities = Nationalities::all();
        $countries = Countries::select('id','nameru')->get();
        $scienceFields = Sciencefield::all();
        $scientificDegree = Scientificdegree::all();
        $academicStatus = AcademicStatus::all();
        $subdivisions = StructuralSubdivision::select('id','nameru')->where('subdivision_type',1)->get();
        $rolesId = $tutor->roles->pluck('RoleID')->toArray();
        $roles = Role::all();

        return view('tutor.edit', compact([
            'tutor',
            'nationalities',
            'countries',
            'scienceFields',
            'scientificDegree',
            'academicStatus',
            'subdivisions',
            'rolesId',
            'roles'
        ]));
    }

    /**
     * @param \App\Http\Requests\TutorRequest $request
     * @param \App\Models\Tutor $tutor
     */
    public function update(TutorRequest $request, Tutor $tutor)
    {
        $data = $request->validated();

        $tutor->update($data);

        $existingIds = $tutor->roles()->pluck('RoleID')->toArray();

        $toDelete = array_values(array_diff($existingIds, $data['roles']));
        $toAdd = array_values(array_diff($data['roles'], $existingIds));

        $tutor->roles()->detach($toDelete);

        if (!empty($toAdd)){
            $this->storeRoles($tutor->TutorID, $toAdd);
        }

        return redirect()->route('tutor.index')->with('success', 'Успешно изменен')->withInput();
    }

    public function storeRoles($tutor_id,$roles){
        foreach ($roles as $role){
            DB::table('model_has_roles')->insert([
                'role_id' => $role,
                'model_type' => '\\App\\Models\\Tutor',
                'model_id' => $tutor_id,
            ]);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
