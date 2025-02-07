@extends('layouts.master')
@section('page_title', 'Input Nilai')
@section('content')

    <div class="card">
        <div class="card-header header-elements-inline">
            {!! Qs::getPanelOptions() !!}
        </div>

        <div class="card-body">
            @include('pages.support_team.marks.selector')
        </div>
    </div>

    <div class="card">

        <div class="card-header">
            <div class="row">
                <div class="col-md-4"><h6 class="card-title"><strong>Mata Pelajaran: </strong> {{ $m->subject->name }}</h6></div>
                <div class="col-md-4"><h6 class="card-title"><strong>Kelas: </strong> {{ $m->my_class->name.' '.$m->section->name }}</h6></div>
                <div class="col-md-4"><h6 class="card-title"><strong>Ujian: </strong> {{ $m->exam->name. ' - Semester '. $m->exam->term.' ('.$m->year.')'}}</h6></div>
            </div>
        </div>

        <div class="card-body">
            @include('pages.support_team.marks.edit')
        </div>
    </div>

@endsection
