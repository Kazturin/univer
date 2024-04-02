<?php

namespace App\Http\Controllers\Journal;

use App\Http\Controllers\Controller;
use App\Http\Requests\ContentRequest;
use App\Models\Journal\Content;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;
use Illuminate\View\View;

class ContentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $contents = Content::where('tutorid',Auth::user()->TutorID)->paginate(20);

        return view('journal.content.index',compact('contents'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('journal.content.create');
    }

    /**
     * @param \App\Http\Requests\ContentRequest $contentRequest
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(ContentRequest $contentRequest)
    {
        $data = $contentRequest->validated();

        $data['tutorid'] = Auth::user()->TutorID;
        Content::create($data);

        return redirect()->route('content.index')->with('success', 'Успешно добавлен')->withInput();
    }

    /**
     * @param \App\Models\Journal\Content $content
     */
    public function show(Content $content)
    {
        return view('journal.content.show',compact('content'));
    }

    /**
     * @param \App\Http\Requests\ContentRequest $contentRequest
     * @param \App\Models\Journal\Content $content
     */
    public function edit(Content $content)
    {
        return view('journal.content.edit',compact('content'));
    }

    /**
     * @param \App\Http\Requests\ContentRequest $contentRequest
     * @param \App\Models\Journal\Content $content
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(ContentRequest $contentRequest,Content $content)
    {
        $data = $contentRequest->validated();

        $content->update($data);

        return redirect()->route('content.index')->with('success', 'Успешно изменен')->withInput();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Content $content)
    {
        $content->delete();

        return redirect()->route('content.index')->with('success', 'Успешно удален');
    }
}
