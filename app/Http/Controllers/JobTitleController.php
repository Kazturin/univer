<?php

namespace App\Http\Controllers;

use App\Http\Requests\JobTitleRequest;
use App\Models\JobTitle;
use Illuminate\Http\Request;

class JobTitleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $jobTitles = JobTitle::paginate(20);

        $categories = [1=>'Преподователи',2 => 'Сотрудники',-1=>'Другое'];

        return view('job-title.index',compact('jobTitles','categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('job-title.create');
    }

    /**
     * @param  \App\Http\Requests\JobTitleRequest $request
     * @return \Illuminate\Http\RedirectResponse
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(JobTitleRequest $request)
    {
        $data = $request->validated();

        JobTitle::create($data);

        return redirect()->route('job-title.index')->with('success', 'Успешно добавлен')->withInput();
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * @param \App\Models\JobTitle $jobTitle
     */
    public function edit(JobTitle $jobTitle)
    {
        return view('job-title.edit',compact('jobTitle'));
    }

    /**
     * @param  \App\Http\Requests\JobTitleRequest $request
     * @param  \App\Models\JobTitle $jobTitle
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(JobTitleRequest $request, JobTitle $jobTitle)
    {
        $data = $request->validated();

        $jobTitle->update($data);

        return redirect()->route('job-title.index')->with('success', 'Успешно изменен')->withInput();
    }

    /**
     * @param  \App\Models\JobTitle $jobTitle
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(JobTitle $jobTitle)
    {
        $jobTitle->delete();

        return redirect()->route('job-title.index')->with('success', 'Успешно удален');
    }
}
