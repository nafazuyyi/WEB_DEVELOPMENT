@extends('layouts.master')
@section('page_title', 'Profil Siswa - '.$sr->user->name)
@section('content')
<div class="row">
    <div class="col-md-3 text-center">
        <div class="card">
            <div class="card-body">
                <img style="width: 90%; height:90%" src="{{ $sr->user->photo }}" alt="photo" class="rounded-circle">
                <br>
                <h3 class="mt-3">{{ $sr->user->name }}</h3>
            </div>
        </div>
    </div>
    <div class="col-md-9">
        <div class="card">
            <div class="card-body">
                <ul class="nav nav-tabs nav-tabs-highlight">
                    <li class="nav-item">
                        <a href="#" class="nav-link active">{{ $sr->user->name }}</a>
                    </li>
                </ul>

                <div class="tab-content">
                    {{--Basic Info--}}
                    <div class="tab-pane fade show active" id="basic-info">
                        <table class="table table-bordered">
                            <tbody>
                            <tr>
                                <td class="font-weight-bold">Nama</td>
                                <td>{{ $sr->user->name }}</td>
                            </tr>
                            <tr>
                                <td class="font-weight-bold">NIS/NISN</td>
                                <td>{{ $sr->adm_no }}</td>
                            </tr>
                            <tr>
                                <td class="font-weight-bold">Kelas</td>
                                <td>{{ $sr->my_class->name.' - '.$sr->section->name }}</td>
                            </tr>
                            @if($sr->my_parent_id)
                                <tr>
                                    <td class="font-weight-bold">Orang Tua</td>
                                    <td>
                                        <span><a target="_blank" href="{{ route('users.show', Qs::hash($sr->my_parent_id)) }}">{{ $sr->my_parent->name }}</a></span>
                                    </td>
                                </tr>
                            @endif
                            <tr>
                                <td class="font-weight-bold">Tahun Masuk</td>
                                <td>{{ $sr->year_admitted }}</td>
                            </tr>
                            <tr>
                                <td class="font-weight-bold">Alamat</td>
                                <td>{{ $sr->user->address }}</td>
                            </tr>
                            @if($sr->user->email)
                            <tr>
                                <td class="font-weight-bold">Email</td>
                                <td>{{$sr->user->email }}</td>
                            </tr>
                            @endif
                            @if($sr->user->phone)
                                <tr>
                                    <td class="font-weight-bold">Phone</td>
                                    <td>{{$sr->user->phone}}</td>
                                </tr>
                            @endif
                            <tr>
                                <td class="font-weight-bold">Tanggal Lahir</td>
                                <td>{{$sr->user->dob }}</td>
                            </tr>
                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
    {{--Student Profile Ends--}}

@endsection
