<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Helpers\Qs;
use App\Helpers\Mk;
use App\Http\Requests\Mark\MarkSelector;
use App\Models\Setting;
use App\Repositories\ExamRepo;
use App\Repositories\MarkRepo;
use App\Repositories\MyClassRepo;
use App\Http\Controllers\Controller;
use App\Repositories\StudentRepo;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class GraduatedMarkController extends Controller
{
    protected $my_class, $exam, $student, $year, $user, $mark;

    public function __construct(MyClassRepo $my_class, ExamRepo $exam, StudentRepo $student, MarkRepo $mark)
    {
        $this->exam =  $exam;
        $this->mark =  $mark;
        $this->student =  $student;
        $this->my_class =  $my_class;
        $this->year =  Qs::getSetting('current_session');
    }

    public function year_selector_graduated($student_id)
    // 
    {
       return $this->verifyStudentExamYearGraduated($student_id);
    }

    public function year_selected_graduated(Request $req, $student_id)
    // 
    {
        if(!$this->verifyStudentExamYearGraduated($student_id, $req->year)){
            return $this->noStudentRecord();
        }

        $student_id = Qs::hash($student_id);
        return redirect()->route('marks.show.graduated', [$student_id, $req->year]);
    }

    
    public function show_graduated($student_id, $year)
    // 
    {
        if(Auth::user()->id != $student_id && !Qs::userIsTeamSAT() && !Qs::userIsMyChild($student_id, Auth::user()->id)){
            return redirect(route('dashboard'))->with('pop_error', __('msg.denied'));
        }

        if(Mk::examIsLocked() && !Qs::userIsTeamSAT()){
            Session::put('marks_url', route('marks.show.graduated', [Qs::hash($student_id), $year]));
                return redirect()->route('locked', Qs::hash($student_id));
        }

        $wh = ['student_id' => $student_id, 'year' => $year ];
        $d['marks'] = $this->exam->getMark($wh);
        $d['exam_records'] = $exr = $this->exam->getRecord($wh);
        $d['exams'] = $this->exam->getExam(['year' => $year]);
        $d['sr'] = $this->student->getRecordallGradStudents(['user_id' => $student_id])->first();
        $d['my_class'] = $mc = $this->my_class->getMC(['id' => $exr->first()->my_class_id])->first();
        $d['class_type'] = $this->my_class->findTypeByClass($mc->id);
        $d['subjects'] = $this->my_class->findSubjectByClass($mc->id);
        $d['year'] = $year;
        $d['student_id'] = $student_id;

        return view('pages.support_team.marks.show.index_graduated', $d);
    }

    public function print_view($student_id, $exam_id, $year)
    // 
    {
        if(Auth::user()->id != $student_id && !Qs::userIsTeamSA() && !Qs::userIsMyChild($student_id, Auth::user()->id)){
            return redirect(route('dashboard'))->with('pop_error', __('msg.denied'));
        }

        if(Mk::examIsLocked() && !Qs::userIsTeamSA()){
            Session::put('marks_url', route('marks.show', [Qs::hash($student_id), $year]));

            if(!$this->checkPinVerified($student_id)){
                return redirect()->route('pins.enter', Qs::hash($student_id));
            }
        }

        $wh = ['student_id' => $student_id, 'exam_id' => $exam_id, 'year' => $year ];
        $d['marks'] = $mks = $this->exam->getMark($wh);
        $d['exr'] = $exr = $this->exam->getRecord($wh)->first();
        $d['my_class'] = $mc = $this->my_class->find($exr->my_class_id);
        $d['section_id'] = $exr->section_id;
        $d['ex'] = $exam = $this->exam->find($exam_id);
        $d['tex'] = 'tex'.$exam->term;
        $d['sr'] = $sr =$this->student->getRecordallGradStudents(['user_id' => $student_id])->first();
        $d['class_type'] = $this->my_class->findTypeByClass($mc->id);
        $d['subjects'] = $this->my_class->findSubjectByClass($mc->id);

        $d['ct'] = $ct = $d['class_type']->code;
        $d['year'] = $year;
        $d['student_id'] = $student_id;
        $d['exam_id'] = $exam_id;

        $d['s'] = Setting::all()->flatMap(function($s){
            return [$s->type => $s->description];
        });

        return view('pages.support_team.marks.print.index', $d);
    }

    protected function verifyStudentExamYearGraduated($student_id, $year = null)
    // 
    {
        $years = $this->exam->getExamYears($student_id);
        $student_exists = $this->student->exists2($student_id);

        if(!$year){
            if($student_exists && $years->count() > 0)
            {
                $d =['years' => $years, 'student_id' => Qs::hash($student_id)];

                return view('pages.support_team.marks.select_year_graduated', $d);
            }

            return $this->noStudentRecord();
        }

        return ($student_exists && $years->contains('year', $year)) ? true  : false;
    }

    protected function noStudentRecord()
    // 
    {
        return redirect()->route('dashboard')->with('flash_danger', __('msg.srnf'));
    }
}
