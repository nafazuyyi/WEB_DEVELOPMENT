@extends('layouts.master')
@section('page_title', 'Kelulusan Siswa')
@section('content')

<div class="card">
    <div class="card-header header-elements-inline">
        <h6 class="card-title">Kelulusan Siswa</h6>
        {!! Qs::getPanelOptions() !!}
    </div>

    <div class="card-body">
        <ul class="nav nav-tabs nav-tabs-highlight">
            <li class="nav-item"><a href="#all-students" class="nav-link active" data-toggle="tab">Daftar Siswa LULUS</a></li>
        </ul>

        <div class="tab-content">
            <div class="tab-pane fade show active" id="all-students">
                <table class="table datatable-button-html5-columns">
                    <thead>
                    <tr>
                        <th>No</th>
                        <th>Profil</th>
                        <th>Nama</th>
                        <th>ADM_No</th>
                        <th>Tingkat</th>
                        <th>Tahun Lulus</th>
                        <th>Aksi</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($students as $s)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td><img class="rounded-circle" style="height: 40px; width: 40px;" src="{{ $s->user->photo }}" alt="photo"></td>
                        <td>{{ $s->user->name }}</td>
                        <td>{{ $s->adm_no }}</td>
                        <td>{{ $s->my_class->name.' '.$s->section->name }}</td>
                        <td>{{ $s->grad_date }}</td>
                        <td class="text-center">
                            <div class="list-icons">
                                <div class="dropdown">
                                    <a href="#" class="list-icons-item" data-toggle="dropdown">
                                        <i class="icon-menu9"></i>
                                    </a>

                                    <div class="dropdown-menu dropdown-menu-left">
                                        <a href="{{ route('showgradstudent', Qs::hash($s->id)) }}" class="dropdown-item"><i class="icon-eye"></i> Lihat Profil</a>
                                        @if(Qs::userIsTeamSA())
                                        <a href="{{ route('st.reset_pass', Qs::hash($s->user->id)) }}" class="dropdown-item"><i class="icon-lock"></i> Reset password</a>

                                        {{--Not Graduated--}}
                                        <a id="{{ Qs::hash($s->id) }}" href="#" onclick="$('form#ng-'+this.id).submit();" class="dropdown-item"><i class="icon-stairs-down"></i> Belum lulus</a>
                                            <form method="post" id="ng-{{ Qs::hash($s->id) }}" action="{{ route('st.not_graduated', Qs::hash($s->id)) }}" class="hidden">@csrf @method('put')</form>
                                        @endif

                                        <a target="_blank" href="{{ route('marks.year_selector.graduated', Qs::hash($s->user->id)) }}" class="dropdown-item"><i class="icon-check"></i> Rapot</a>

                                        {{--Delete--}}
                                        @if(Qs::userIsSuperAdmin())
                                        <a id="{{ Qs::hash($s->user->id) }}" onclick="confirmDelete(this.id)" href="#" class="dropdown-item"><i class="icon-trash"></i> Delete</a>
                                        <form method="post" id="item-delete-{{ Qs::hash($s->user->id) }}" action="{{ route('students.destroy', Qs::hash($s->user->id)) }}" class="hidden">@csrf @method('delete')</form>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </td>
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
