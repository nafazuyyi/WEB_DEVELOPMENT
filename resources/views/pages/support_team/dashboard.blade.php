@extends('layouts.master')
@section('page_title', 'Dashboard')
@section('content')

    @if(Qs::userIsTeamSA())
    {{-- Super Admin dan Admin --}}
       <div class="row">
           <div class="col-sm-6 col-xl-3">
               <div class="card card-body bg-orange-400 has-bg-image">
                   <div class="media">
                       <div class="media-body">
                           <h3 class="mb-0">{{ $users->where('user_type', 'student')->count() }}</h3>
                           <span class="text-uppercase font-size-xs font-weight-bold">Total Siswa</span>
                       </div>

                       <div class="ml-3 align-self-center">
                           <i class="icon-users4 icon-3x opacity-75"></i>
                       </div>
                   </div>
               </div>
           </div>

           <div class="col-sm-6 col-xl-3">
               <div class="card card-body bg-danger-400 has-bg-image">
                   <div class="media">
                       <div class="media-body">
                           <h3 class="mb-0">{{ $users->where('user_type', 'teacher')->count() }}</h3>
                           <span class="text-uppercase font-size-xs">Total Guru</span>
                       </div>

                       <div class="ml-3 align-self-center">
                           <i class="icon-users2 icon-3x opacity-75"></i>
                       </div>
                   </div>
               </div>
           </div>

           <div class="col-sm-6 col-xl-3">
               <div class="card card-body bg-success bg-gradient has-bg-image">
                   <div class="media">
                       <div class="mr-3 align-self-center">
                           <i class="icon-gear icon-3x opacity-75"></i>
                       </div>

                       <div class="media-body text-right">
                           <h3 class="mb-0">{{ $users->where('user_type', 'admin')->count() }}</h3>
                           <span class="text-uppercase font-size-xs">Total Admin</span>
                       </div>
                   </div>
               </div>
           </div>

           <div class="col-sm-6 col-xl-3">
               <div class="card card-body bg-pink-400 has-bg-image">
                   <div class="media">
                       <div class="mr-3 align-self-center">
                           <i class="icon-user icon-3x opacity-75"></i>
                       </div>

                       <div class="media-body text-right">
                           <h3 class="mb-0">{{ $users->where('user_type', 'parent')->count() }}</h3>
                           <span class="text-uppercase font-size-xs">Total Orangtua Wali</span>
                       </div>
                   </div>
               </div>
           </div>           
       </div>
    @endif

    <div class="card">
        <div class="card-header header-elements-inline">
            <h5 class="card-title">Kalender</h5>
         {!! Qs::getPanelOptions() !!}
        </div>

        <div class="card-body">
            <div class="fullcalendar-basic" lang="ind"></div>
        </div>
    </div>
    @endsection
