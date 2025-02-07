@extends('layouts.master')
@section('page_title', 'Catatan Siswa')
@section('content')
<div class="tab-pane fade show active" id="manage-ts">
    @include('pages.support_team.notes.note.add')
    @include('pages.support_team.notes.note.manage')
</div>
@endsection
