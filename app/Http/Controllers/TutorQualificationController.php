<?php

namespace App\Http\Controllers;

use App\Http\Requests\TutorQualificationRequest;
use App\Models\Professiontype;
use App\Models\Qualification\Placeoffuthereducation;
use App\Models\Qualification\QualificationForm;
use App\Models\Tutor;
use App\Models\Qualification\TutorQualification;
use Illuminate\Http\Request;

class TutorQualificationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $qualifications = TutorQualification::with('tutor')->with('formLabel')->where('TutorID',$request->tutor_id)->get();
        $tutor = Tutor::select('TutorID','lastname','firstname','patronymic')->where('TutorID',$request->tutor_id)->first();

        $financing = ['Другое','За счет средств, выделяемых по гос.заказу','За счет внебюджетных средств','Другое'];
        $docTypes = [1=>'Сертификат',2=>'Свидетельство',3=>'Удостоверение'];

        return view('tutor-qualification.index',compact(['qualifications','tutor','financing','docTypes']));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        $tutor_id = $request->tutor_id;

        $formLabels = QualificationForm::all();
        $financing = ['Другое','За счет средств, выделяемых по гос.заказу','За счет внебюджетных средств','Другое'];
        $docTypes = [1=>'Сертификат',2=>'Свидетельство',3=>'Удостоверение'];
        $professiontypes = Professiontype::select('id','nameru')->get();
        $placeEducation = Placeoffuthereducation::all();

        return view('tutor-qualification.create',compact(
            [
                'tutor_id',
                'formLabels',
                'financing',
                'docTypes',
                'professiontypes',
                'placeEducation'
            ]));
    }

    /**
     * @param  \App\Http\Requests\TutorQualificationRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(TutorQualificationRequest $request)
    {
        $data = $request->validated();

        TutorQualification::create($data);

        return redirect()->route('tutor-qualification.index',['tutor_id'=>$data['TutorID']])->with('success', 'Успешно добавлен')->withInput();
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * @param \App\Models\Qualification\TutorQualification
     */
    public function edit(TutorQualification $tutorQualification)
    {
        $formLabels = QualificationForm::all();
        $financing = ['Другое','За счет средств, выделяемых по гос.заказу','За счет внебюджетных средств','Другое'];
        $docTypes = [1=>'Сертификат',2=>'Свидетельство',3=>'Удостоверение'];
        $professiontypes = Professiontype::select('id','nameru')->get();
        $placeEducation = Placeoffuthereducation::all();

        return view('tutor-qualification.edit',compact(
            [
                'tutorQualification',
                'formLabels',
                'financing',
                'docTypes',
                'professiontypes',
                'placeEducation'
            ]));
    }

    /**
     * @param  \App\Http\Requests\TutorQualificationRequest $request
     * @param \App\Models\Qualification\TutorQualification
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(TutorQualificationRequest $request, TutorQualification $tutorQualification)
    {
        $data = $request->validated();

        $tutorQualification->update($data);

        return redirect()->route('tutor-qualification.index',['tutor_id' => $tutorQualification->TutorID])->with('success', 'Успешно изменен')->withInput();
    }

    /**
     * @param \App\Models\Qualification\TutorQualification
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(TutorQualification $tutorQualification)
    {
        $tutorQualification->delete();

        return redirect()->route('tutor-qualification.index',['tutor_id' => $tutorQualification->TutorID])->with('success', 'Успешно удален');
    }
}
