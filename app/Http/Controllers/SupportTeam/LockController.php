<?php

namespace App\Http\Controllers\SupportTeam;

use App\Helpers\Qs;
use App\Http\Controllers\Controller;
use App\Repositories\UserRepo;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;

class LockController extends Controller
{
    protected  $examIsLocked, $user;

    public function __construct(UserRepo $user)
    {
        $this->user = $user;
        $this->middleware('examIsLocked');
        $this->middleware('teamSAT', ['except' => ['locked'] ]);
    }

    public function locked($student_id)
    // 
    {
        if(Qs::userIsTeamSAT()) {
            return Session::has('marks_url') ? redirect(Session::get('marks_url')) : redirect()->route('dashboard');
        }

        $d['student'] = $this->user->find($student_id);

        return view('pages.support_team.lockexam.locked', $d);
    }

}
