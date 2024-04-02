<?php


namespace App\Http\Controllers\Journal;


use App\Http\Controllers\Controller;
use App\Models\Journal\Group;
use App\Models\Journal\Studygroup;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class TutorJournalController extends Controller
{
    public function index(){

    //    dd(Auth::user()->TutorID);
        $tutor = Auth::user();

        $journals = Studygroup::with('students:groupID')->with('subject')->withWhereHas('tutorsubject', function ($query) use ($tutor) {
            return $query->where('TutorID', '=', $tutor->TutorID);
        })->where([
            ['studygroups.isMain', '=', 1],
            ['studygroups.deleted', '=', 0],
            ['studygroups.Term', '=', 2],
            ['studygroups.year', '=', '2023'],
        ])->get();



//        $groups = $journals[0]->students()->select('groupID')->with('group')->groupBy('groupID','pivot_studyGroupID','pivot_StudentID')->get();
//
        // dd($journals);
      //  dd($journals[0]->subject->SubjectNameRU );

        return view('journal.tutor-journal.index',compact('journals'));
    }

    public function show($tutorId,$subjectId){
//        $groups = Studygroup::with('students:groupID')
//            ->whereRelation('tutorsubject',['TutorID'=>$tutorId,'SubjectID'=>$subjectId])
//            ->where([
//            ['studygroups.isMain', '=', 1],
//            ['studygroups.deleted', '=', 0],
//            ['studygroups.Term', '=', 2],
//            ['studygroups.year', '=', '2023'],
//        ])->get();

        $groups =DB::table('studygroups')
            ->select('studygroups.StudyGroupID', 'studygroups.groupname', 'studygroups.studentCount', 'groups.name as group_name', 'students.CourseNumber', 'students.groupID', 'studygroups.subjectid','subjects.SubjectNameRU')
            ->join('tutorsubject', 'studygroups.tutorSubjectID', '=', 'tutorsubject.TutorSubjectID')
            ->join('studentstudygroup', 'studentstudygroup.studyGroupID', '=', 'studygroups.StudyGroupID')
            ->join('students', 'studentstudygroup.StudentID', '=', 'students.StudentID')
            ->join('groups', 'students.groupID', '=', 'groups.groupID')
            ->join('subjects', 'tutorsubject.SubjectID', '=', 'subjects.SubjectID')
            ->where('tutorsubject.TutorID', $tutorId)
            ->where('studygroups.deleted', 0)
            ->where('studygroups.Term', 2)
            ->where('studygroups.year', '2023')
            ->where('tutorsubject.SubjectID', $subjectId)
            ->distinct()
            ->get();

//        $groups = DB::table('studygroups')
//            ->join('tutorsubject', 'tutorsubject.TutorSubjectID','=','studygroups.tutorSubjectID')
//            ->join('subjects', 'subjects.SubjectID', '=', 'tutorsubject.SubjectID')
//            ->select('subjects.SubjectID', 'subjects.SubjectNameRU', 'subjects.SubjectNameKZ')
//            ->where('studygroups.year','=','2023')
//            ->where('tutorsubject.TutorID','=', $tutor->TutorID)
//            ->where('subjects.ispractice','=', 0)
//            ->distinct()
//            ->get();

       // dd($groups);
        return view('journal.tutor-journal.show',compact('groups'));
    }
}
