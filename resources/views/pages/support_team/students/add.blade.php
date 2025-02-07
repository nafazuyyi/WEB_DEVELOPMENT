@extends('layouts.master')
@section('page_title', 'Input Siswa')
@section('content')
        <div class="card">
            <div class="card-header bg-white header-elements-inline">
                <h6 class="card-title">Silahkan Isi Form Dibawah Untuk Input Siswa Baru</h6>

                {!! Qs::getPanelOptions() !!}
            </div>

            <form id="ajax-reg" method="post" enctype="multipart/form-data" class="wizard-form steps-validation" action="{{ route('students.store') }}" data-fouc>
               @csrf
                <h6>Data Diri</h6>
                <fieldset>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Nama Lengkap: <span class="text-danger">*</span></label>
                                <input value="{{ old('name') }}" required type="text" name="name" placeholder="Nama Lengkap" class="form-control">
                                </div>
                            </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Alamat: <span class="text-danger">*</span></label>
                                <input value="{{ old('address') }}" class="form-control" placeholder="Alamat" name="address" type="text" required>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-3">
                            <div class="form-group">
                                <label>Email: </label>
                                <input type="email" value="{{ old('email') }}" name="email" class="form-control" placeholder="Email ">
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="form-group">
                                <label>Nomor Telepon Siswa:</label>
                                <input value="{{ old('phone') }}" type="text" name="phone" class="form-control" placeholder="+628123456789" >
                            </div>
                        </div>
                
                        <div class="col-md-3">
                            <div class="form-group">
                                <label>Tanggal Lahir:</label>
                                <input name="dob" value="{{ old('dob') }}" type="text" class="form-control date-pick" placeholder="Pilih Tanggal...">
                            </div>
                        </div>
                        
                    </div>
                </fieldset>

                <h6>Data Siswa</h6>
                <fieldset>
                    <div class="row">
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="my_class_id">Kelas: <span class="text-danger">*</span></label>
                                <select onchange="getClassSections(this.value)" data-placeholder="Pilih..." required name="my_class_id" id="my_class_id" class="select-search form-control">
                                    <option value=""></option>
                                      @foreach($my_classes as $c)
                                        <option {{ (old('my_class_id') == $c->id ? 'selected' : '') }} value="{{ $c->id }}">{{ $c->name }}</option>
                                      @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="section_id">Tingkat: <span class="text-danger">*</span></label>
                                <select data-placeholder="Pilih Kelas Terlebih Dahulu" required name="section_id" id="section_id" class="select-search form-control">
                                    <option {{ (old('section_id')) ? 'selected' : '' }} value="{{ old('section_id') }}">{{ (old('section_id')) ? 'Selected' : '' }}</option>
                                </select>
                            </div>
                        </div> 

                        <div class="col-md-3">
                            <div class="form-group">
                                <label>Nomor Induk/NISN:<span class="text-danger">*</span></label>
                                <input type="text" name="adm_no" required  placeholder="Nomor Induk/NISN" class="form-control" value="{{ old('adm_no') }}">
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="year_admitted">Tahun Masuk: <span class="text-danger">*</span></label>
                                <select data-placeholder="Pilih..." required name="year_admitted" id="year_admitted" class="select-search form-control">
                                    <option value=""></option>
                                    @for($y=date('Y', strtotime('- 1 years')); $y<=date('Y'); $y++)
                                        <option {{ (old('year_admitted') == $y) ? 'selected' : '' }} value="{{ $y }}">{{ $y }}</option>
                                    @endfor
                                </select>
                            </div>
                        </div>
                    </div>   

                    <div class="row">
                        <div class="col-md-3">
                            <div class="form-group">
                                <label>Nama Ayah: <span class="text-danger">*</span></label>
                                <input value="{{ old('father') }}" required type="text" name="father" placeholder="Nama Lengkap Ayah" class="form-control">
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="form-group">
                                <label>Nama Ibu: <span class="text-danger">*</span></label>
                                <input value="{{ old('mother') }}" required type="text" name="mother" placeholder="Nama Lengkap Ibu" class="form-control">
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="form-group">
                                <label>Nomot Telepon Orang Tua:</label>
                                <input value="{{ old('phone2') }}" type="text" name="phone2" class="form-control" placeholder="" >
                            </div>
                        </div>

                        {{-- <div class="col-md-3">
                            <div class="form-group">
                                <label for="my_parent_id">Input Orang Tua: </label>
                                <select data-placeholder="Pilih..."  name="my_parent_id" id="my_parent_id" class="select-search form-control">
                                    <option  value=""></option>
                                    @foreach($parents as $p)
                                        <option {{ (old('my_parent_id') == Qs::hash($p->id)) ? 'selected' : '' }} value="{{ Qs::hash($p->id) }}">{{ $p->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div> --}}
                    </div>
                </fieldset>
            </form>
        </div>
    @endsection
