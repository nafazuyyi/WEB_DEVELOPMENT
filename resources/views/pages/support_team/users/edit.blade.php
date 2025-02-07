@extends('layouts.master')
@section('page_title', 'Edit User')
@section('content')

    <div class="card">
        <div class="card-header header-elements-inline">
            <h6 class="card-title">Edit User </h6>
            {!! Qs::getPanelOptions() !!}
        </div>

        <div class="card-body">
            <form method="post" enctype="multipart/form-data" class="wizard-form steps-validation ajax-update" action="{{ route('users.update', Qs::hash($user->id)) }}" data-fouc>
                @csrf @method('PUT')
                <h6>Data Diri</h6>
                <fieldset>
                    <div class="row">
                        <div class="col-md-2">
                            <div class="form-group">
                                <label for="user_type"> Pilih User: <span class="text-danger">*</span></label>
                                <select disabled="disabled" class="form-control select" id="user_type">
                                    <option value="">{{ strtoupper($user->user_type) }}</option>
                                </select>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Nama Lengkap: <span class="text-danger">*</span></label>
                                <input value="{{ $user->name }}" required type="text" name="name" placeholder="Full Name" class="form-control">
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Alamat: <span class="text-danger">*</span></label>
                                <input value="{{ $user->address }}" class="form-control" placeholder="Address" name="address" type="text" required>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Email: </label>
                                <input value="{{ $user->email }}" type="email" name="email" class="form-control" placeholder="your@email.com">
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Phone:</label>
                                <input value="{{ $user->phone }}" type="text" name="phone" class="form-control" placeholder="" >
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        @if(in_array($user->user_type, Qs::getStaff()))
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Tanggal Penerimaan:</label>
                                    <input autocomplete="off" name="emp_date" value="{{ $user->staff->first()->emp_date ?? '' }}" type="text" class="form-control date-pick" data-date-format="dd/mm/yyyy" placeholder="Pilih Tanggal...">

                                </div>
                            </div>
                        @endif
                    </div>


                    {{--Passport--}}
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="d-block">Upload Photo:</label>
                                <input value="{{ old('photo') }}" accept="image/*" type="file" name="photo" class="form-input-styled" data-fouc>
                                <span class="form-text text-muted">Accepted Images: jpeg, png. Max file size 2Mb</span>
                            </div>
                        </div>
                    </div>

                </fieldset>



            </form>
        </div>

    </div>
@endsection
