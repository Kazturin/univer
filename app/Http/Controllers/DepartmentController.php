<?php

namespace App\Http\Controllers;

use App\Http\Requests\DepartmentRequest;
use App\Models\Department;
use App\Models\Tutor;
use Illuminate\Http\Request;

class DepartmentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $departments = Department::with('director')->get();

        $department_types = [0=>'Другое',1=>'Структура',2=>'Факультет',3=>'Кафедра',-101=>'Другое',-1=>'Другое',10=>'Другое'];
       // dd($department_types[-1]);

        return view('department.index',compact(['departments','department_types']));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $departments = Department::all();

        $employees = Tutor::select('TutorID','lastname','firstname')->where('deleted','!=',1)->get();

        return view('department.create',compact(['departments','employees']));
    }

    /**
     * @param  \App\Http\Requests\DepartmentRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */

    public function store(DepartmentRequest $request)
    {
        $data = $request->validated();

        Department::create($data);

        return redirect()->route('department.index')->with('success', 'Успешно добавлен')->withInput();
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * @param \App\Models\Department $department
     */
    public function edit(Department $department)
    {
        $departments = Department::where('id','!=',$department->id)->get();

        $employees = Tutor::select('TutorID','lastname','firstname')->where('deleted','!=',1)->get();

        return view('department.edit',compact(['department','departments','employees']));
    }

    /**
     * @param  \App\Http\Requests\DepartmentRequest $request
     * @param \App\Models\Department $department
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(DepartmentRequest $request, Department $department)
    {
        $data = $request->validated();

        $department->update($data);

        return redirect()->route('department.index')->with('success', 'Успешно Изменен')->withInput();
    }

    /**
     * @param \App\Models\Department $department
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Department $department)
    {
        $department->delete();

        return redirect()->route('department.index')->with('success', 'Успешно удален');
    }
}
