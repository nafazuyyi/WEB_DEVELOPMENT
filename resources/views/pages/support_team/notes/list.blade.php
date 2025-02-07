@extends('layouts.master')
@section('page_title', 'Catatan Siswa- '.$my_class->name)
@section('content')

    <div class="card">
        <div class="card-header header-elements-inline">
            <h6 class="card-title">Daftar Siswa</h6> 
            {!! Qs::getPanelOptions() !!}
        </div>

        <div class="card-body">
            <ul class="nav nav-tabs nav-tabs-highlight">
                <li class="nav-item"><a href="#all-students" class="nav-link active" data-toggle="tab">Daftar Siswa {{ $my_class->name }}</a></li>
            </ul>

            <div class="tab-content">
                <div class="tab-pane fade show active" id="all-students">
                    <table class="table datatable-button-html5-columns">
                        <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama</th>
                            <th>Aksi</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($students as $st)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $st->user->name }}</td>
                                <td><a class="btn btn-primary" href="{{ route('notes.add',Qs::hash($st->user_id)) }}">Tambah Catatan</a></td>
                            </tr>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>

            </div>
        </div>
    </div>

    {{--Student List Ends--}}

@endsection
