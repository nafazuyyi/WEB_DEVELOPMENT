<div class="sidebar sidebar-dark sidebar-main sidebar-expand-md">

    <!-- Sidebar-->
    <div class="sidebar-mobile-toggler text-center">
        <a href="#" class="sidebar-mobile-main-toggle">
            <i class="icon-arrow-left8"></i>
        </a>
        Navigasi
        <a href="#" class="sidebar-mobile-expand">
            <i class="icon-screen-full"></i>
            <i class="icon-screen-normal"></i>
        </a>
    </div>
    <!-- /sidebar-->

    <!-- Sidebar content -->
    <div class="sidebar-content">

        <!-- User menu -->
        <div class="sidebar-user">
            <div class="card-body">
                <div class="media">
                    <div class="mr-3">
                        <a href="{{ Qs::userIsStudent() ? route('students.show', Qs::hash(Qs::findStudentRecord(Auth::user()->id)->id)) : 
                            route('users.show', Qs::hash(Auth::user()->id)) }}"><img src="{{ Auth::user()->photo }}" width="38" height="38" class="rounded-circle" alt="photo"></a>
                    </div>

                    <div class="media-body">
                        <div class="media-title font-weight-semibold">{{ Auth::user()->name }}</div>
                        <div class="font-size-xs opacity-50">
                            <i class="icon-user font-size-sm"></i> &nbsp;{{ ucwords(str_replace('_', ' ', Auth::user()->user_type)) }}
                        </div>
                    </div>

                    <div class="ml-3 align-self-center">
                        <a href="{{ route('my_account') }}" class="text-white"><i class="icon-cog3"></i></a>
                    </div>
                </div>
            </div>
        </div>
        <!-- /user menu -->

        <!-- Main navigation -->
        <div class="card card-sidebar-mobile">
            <ul class="nav nav-sidebar" data-nav-type="accordion">

                <!-- Main -->
                <li class="nav-item">
                    <a href="{{ route('dashboard') }}" class="nav-link {{ (Route::is('dashboard')) ? 'active' : '' }}">
                        <i class="icon-home4"></i>
                        <span>Dashboard</span>
                    </a>
                </li>
            
            @if(Qs::userIsTeamSA())
                {{--Manage Users--}}
                <li class="nav-item">
                    <a href="{{ route('users.index') }}" class="nav-link {{ in_array(Route::currentRouteName(), ['users.index', 'users.show', 'users.edit']) ? 'active' : '' }}"><i class="icon-users4"></i> <span> Users</span></a>
                </li>

                {{--Manage Classes--}}
                <li class="nav-item">
                    <a href="{{ route('classes.index') }}" class="nav-link {{ in_array(Route::currentRouteName(), ['classes.index','classes.edit']) ? 'active' : '' }}"><i class="icon-windows2"></i> <span> Kelas</span></a>
                </li>


                {{--Manage Subjects--}}
                <li class="nav-item">
                    <a href="{{ route('subjects.index') }}" class="nav-link {{ in_array(Route::currentRouteName(), ['subjects.index','subjects.edit',]) ? 'active' : '' }}"><i class="icon-book"></i> <span>Mata Pelajaran</span></a>
                </li>
            @endif

                {{--Manage Students--}}
                @if(Qs::userIsTeamSAT())
                    <li class="nav-item nav-item-submenu {{ in_array(Route::currentRouteName(), ['students.create', 'students.list', 'students.edit', 'students.show', 'students.promotion', 'students.promotion_manage', 'students.graduated']) ? 'nav-item-expanded nav-item-open' : '' }} ">
                        <a href="#" class="nav-link"><i class="icon-users"></i> <span> Siswa</span></a>
                        <ul class="nav nav-group-sub" data-submenu-title="Siswa">
                            {{--Admit Student--}}
                            @if(Qs::userIsTeamSA())
                                <li class="nav-item">
                                    <a href="{{ route('students.create') }}"
                                        class="nav-link {{ (Route::is('students.create')) ? 'active' : '' }}">Input Siswa</a>
                                </li>
                            @endif

                            {{--Student Information--}}
                            <li class="nav-item nav-item-submenu {{ in_array(Route::currentRouteName(), ['students.list', 'students.edit', 'students.show']) ? 'nav-item-expanded' : '' }}">
                                <a href="#" class="nav-link {{ in_array(Route::currentRouteName(), ['students.list', 'students.edit', 'students.show']) ? 'active' : '' }}">Informasi Siswa</a>
                                <ul class="nav nav-group-sub">
                                    @foreach(App\Models\MyClass::orderBy('name')->get() as $c)
                                        <li class="nav-item"><a href="{{ route('students.list', $c->id) }}" class="nav-link ">{{ $c->name }}</a></li>
                                    @endforeach
                                </ul>
                            </li>

                            @if(Qs::userIsTeamSA())
                            {{--Student Promotion--}}
                            <li class="nav-item nav-item-submenu {{ in_array(Route::currentRouteName(), ['students.promotion', 'students.promotion_manage']) ? 'nav-item-expanded' : '' }}"><a href="#" class="nav-link {{ in_array(Route::currentRouteName(), ['students.promotion', 'students.promotion_manage' ]) ? 'active' : '' }}">Kenaikan Kelas Siswa</a>
                                <ul class="nav nav-group-sub">
                                    <li class="nav-item"><a href="{{ route('students.promotion') }}" class="nav-link {{ in_array(Route::currentRouteName(), ['students.promotion']) ? 'active' : '' }}">Kenaikan Kelas</a></li>
                                    <li class="nav-item"><a href="{{ route('students.promotion_manage') }}" class="nav-link {{ in_array(Route::currentRouteName(), ['students.promotion_manage']) ? 'active' : '' }}">Atur Kenaikan Kelas</a></li>
                                </ul>
                            </li>

                            {{--Student Graduated--}}
                            <li class="nav-item"><a href="{{ route('students.graduated') }}" class="nav-link {{ in_array(Route::currentRouteName(), ['students.graduated' ]) ? 'active' : '' }}">Kelulusan Siswa</a></li>
                            @endif
                        </ul>
                    </li>

                    <li class="nav-item nav-item-submenu {{ in_array(Route::currentRouteName(), ['notes.index', 'notes.add']) ? 'nav-item-expanded' : '' }}">
                        <a href="#" class="nav-link {{ in_array(Route::currentRouteName(), ['notes.index', 'notes.add']) ? 'active' : '' }}"> <i class="icon-table"></i> <span>Catatan Siswa</span> </a>
                        <ul class="nav nav-group-sub">
                            @foreach(App\Models\MyClass::orderBy('name')->get() as $c)
                                <li class="nav-item"><a href="{{ route('notes.index', $c->id) }}" class="nav-link ">{{ $c->name }}</a></li>
                            @endforeach
                        </ul>
                    </li>
                    
                @endif

                @if(Qs::userIsAcademic())
                <li class="nav-item">
                    <a href="{{ route('tt.index') }}" class="nav-link {{ in_array(Route::currentRouteName(), ['tt.index']) ? 'active' : '' }}">
                        <i class="icon-calendar"></i>
                        <span>Jadwal</span>
                    </a>
                </li>
                @endif

                @if(Qs::userIsAdministrative())
                    <li class="nav-item nav-item-submenu {{ in_array(Route::currentRouteName(), ['payments.index', 'payments.create', 'payments.invoice', 'payments.receipts', 'payments.edit', 'payments.manage', 'payments.show',]) ? 'nav-item-expanded nav-item-open' : '' }} ">
                        <a href="#" class="nav-link"><i class="icon-cash"></i> <span> Tagihan</span></a>
                        <ul class="nav nav-group-sub" data-submenu-title="Tagihan">

                            {{--Tagihan--}}
                            @if(Qs::userIsTeamAccount())
                            <li class="nav-item nav-item-submenu {{ in_array(Route::currentRouteName(), ['payments.index', 'payments.create', 'payments.edit', 'payments.manage', 'payments.show', 'payments.invoice']) ? 'nav-item-expanded' : '' }}">
                                <li class="nav-item"><a href="{{ route('payments.create') }}" class="nav-link {{ Route::is('payments.create') ? 'active' : '' }}">Buat Tagihan</a></li>
                                <li class="nav-item"><a href="{{ route('payments.index') }}" class="nav-link {{ in_array(Route::currentRouteName(), ['payments.index', 'payments.edit', 'payments.show']) ? 'active' : '' }}">Atur Tagihan</a></li>
                                <li class="nav-item"><a href="{{ route('payments.manage') }}" class="nav-link {{ in_array(Route::currentRouteName(), ['payments.manage', 'payments.invoice', 'payments.receipts']) ? 'active' : '' }}">Tagihan Siswa</a></li>
                            </li>
                            @endif
                        </ul>
                    </li>
                @endif

                {{--Exam--}}
                @if(Qs::userIsTeamSAT())
                <li class="nav-item nav-item-submenu {{ in_array(Route::currentRouteName(), ['exams.index', 'exams.edit', 'grades.index', 'grades.edit', 'marks.index', 'marks.manage', 'marks.bulk', 'marks.tabulation', 'marks.show']) ? 'nav-item-expanded nav-item-open' : '' }} ">
                    <a href="#" class="nav-link"><i class="icon-books"></i> <span> Ujian</span></a>
                    <ul class="nav nav-group-sub" data-submenu-title="Ujian">
                        
                        @if(Qs::userIsTeamSA())
                            {{--Exam list--}}
                            <li class="nav-item">
                                <a href="{{ route('exams.index') }}"
                                   class="nav-link {{ (Route::is('exams.index')) ? 'active' : '' }}">List Ujian</a>
                            </li>

                            {{--Grades list--}}
                            <li class="nav-item">
                                    <a href="{{ route('grades.index') }}"
                                       class="nav-link {{ in_array(Route::currentRouteName(), ['grades.index', 'grades.edit']) ? 'active' : '' }}">Batas Nilai</a>
                            </li>
                        @endif

                        @if(Qs::userIsTeamSAT())
                            {{--Input nilai--}}
                            <li class="nav-item">
                                <a href="{{ route('marks.index') }}"
                                   class="nav-link {{ in_array(Route::currentRouteName(), ['marks.index']) ? 'active' : '' }}">Input Nilai Siswa</a>
                            </li>

                            {{--Rekap nilai--}}
                            <li class="nav-item">
                                <a href="{{ route('marks.bulk') }}" class="nav-link {{ in_array(Route::currentRouteName(), ['marks.bulk', 'marks.show']) ? 'active' : '' }}">Rekap Nilai Siswa</a>
                            </li>
                        @endif

                        @if(Qs::userIsTeamSA())
                        {{--Tabulasi--}}
                        <li class="nav-item">
                            <a href="{{ route('marks.tabulation') }}" class="nav-link {{ in_array(Route::currentRouteName(), ['marks.tabulation']) ? 'active' : '' }}">Tabulasi</a>
                        </li>
                        @endif
                        
                    </ul>
                </li>
                @endif
                {{--End Exam--}}
                @include('pages.'.Qs::getUserType().'.menu')

                {{--Manage Account--}}
                <li class="nav-item">
                    <a href="{{ route('my_account') }}" class="nav-link {{ in_array(Route::currentRouteName(), ['my_account']) ? 'active' : '' }}"><i class="icon-user"></i> <span>Akun Saya</span></a>
                </li>
                </ul>
            </div>
        </div>
</div>
