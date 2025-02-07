@extends('layouts.master')
@section('page_title', 'Akses Nilai')
@section('content')
    <div class="card">
        <div class="card-header header-elements-inline">
            <h5 class="card-title"><i class="icon-alarm mr-2"></i> Akses Nilai</h5>
            {!! Qs::getPanelOptions() !!}
        </div>

        <div class="card-body">
            <div class="row">
                <div class="col-md-6 offset-md-3">
                    <label class="font-weight-bold col-form-label">Akses untuk melihat nilai <span class="text-success font-size-lg">{{ $student->name }}</span> sedang dikunci, silahkan menunggu instruksi dari admin sekolah</span></label>
                </div>
            </div>
        </div>
    </div>
@endsection
