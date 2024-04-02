<?php


namespace App\Http\Controllers;


use App\Models\EpvoTutor;
use App\Models\EpvoTutorCafedra;
use App\Models\Navigation;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;

class SiteController extends Controller
{

    public function index(){

//        $user = User::select('TutorID','firstname','lastname','patronymic','StartDate')->
//        whereHas('cafedra.cafedraInfo', function ($query) {
//            $query->where('FacultyID', 6);
//        })->get();
//
//        dd($user);
    //   dd(User::select('TutorID','firstname','lastname','patronymic','StartDate')->with('cafedra.cafedraInfo')->get()[10]);

      //  dd(Auth::user()->load('roles')->roles->pluck('RoleID'));
//        dd(\App\Models\Navigation::with('roles')->whereHas('roles', function ($query) {
//            $query->whereIn('RoleID', Auth::user()->load('roles')->roles->pluck('RoleID'));
//        })->where('parent_id', null)->get());
//        dd(\App\Models\User::find(\Illuminate\Support\Facades\Auth::user()->TutorID)->roles->pluck('RoleID'));

     //   dd(Auth::user()->TutorID);

     //   $user = User::find(Auth::user()->TutorID);

  //      die($user->roles);
//
//        dd($user->hasRole('tutor'));
        return view('dashboard');
    }

}
