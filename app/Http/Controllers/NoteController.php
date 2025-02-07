<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Helpers\Qs;
use App\Models\Note;
use Illuminate\Http\Request;
use App\Repositories\MarkRepo;
use App\Repositories\NoteRepo;
use App\Repositories\UserRepo;
use App\Repositories\MyClassRepo;
use App\Repositories\StudentRepo;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\NoteController;

class NoteController extends Controller
{

    public function __construct( NoteRepo $note, MyClassRepo $my_class, UserRepo $user, StudentRepo $student)
    {
        $this->middleware('teamSAT', ['only' => ['edit','update', 'reset_pass', 'create', 'store', 'graduated'] ]);
        $this->middleware('super_admin', ['only' => ['destroy',] ]);

         $this->my_class = $my_class;
         $this->user = $user;
         $this->student = $student;
         $this->note = $note;
    } 

    public function index($class_id)
    {
        $data['my_class'] = $mc = $this->my_class->getMC(['id' => $class_id])->first();
        $data['students'] = $this->student->findStudentsByClass($class_id);
        $data['sections'] = $this->my_class->getClassSections($class_id);
        $data['users'] = $this->user->getAll();

        return is_null($mc) ? Qs::goWithDanger() : view('pages.support_team.notes.list', $data);
    }
    public function add($st_id)
    {
        $d['st_id'] = Qs::decodeHash($st_id);
        $d['st'] = $st = $this->user->find($st_id);
        $data['st'] = $this->student->getRecord(['id' => $st_id])->first();
       
        $d['note']= Note::where('user_id', Qs::decodeHash($st_id))->orderBy('created_at', 'desc')->get();
        return view('pages.support_team.notes.note.index',$d);
    }

    public function store(Request $req, $st_id)
    {
       $d['user_id'] = Qs::decodeHash($st_id);
        $d['note'] = ucwords($req->note);
        $this->note->createNote($d); // Create 
        return Qs::jsonStoreOk();
        //  return ($d);
    }
    public function delete($n_id)
    {
        $this->note->deleteNote($n_id);
        return back()->with('flash_success', __('msg.delete_ok'));
    }

    public function student_notes($st_id)
    {
        /* Prevent Other Students/Parents from viewing Result of others */
        if(Auth::user()->id !=  Qs::decodeHash($st_id) && !Qs::userIsTeamSA() && !Qs::userIsMyChild($st_id, Auth::user()->id)){
            return redirect(route('dashboard'))->with('pop_error', __('msg.denied'));
        }
        $d['st_id'] = Qs::decodeHash($st_id);
        $d['st'] = $st = $this->user->find($st_id);
        $data['st'] = $this->student->getRecord(['id' => $st_id])->first();
       
        $d['note']= Note::where('user_id', Qs::decodeHash($st_id))->orderBy('created_at', 'desc')->get();
        return view('pages.support_team.notes.note.student_note',$d);
    }
}
