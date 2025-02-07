@extends('layouts.master')
@section('page_title', 'Edit Slot Waktu')
@section('content')
<div class="card">
    <div class="card-header header-elements-inline">
        <h6 class="font-weight-bold card-title">Edit Slot Waktu</h6>
        {!! Qs::getPanelOptions() !!}
    </div>

    <div class="card-body">
        <div class="col-md-6">
            <form method="post" action="{{ route('ts.update', $tms->id) }}">
                @csrf @method('PUT')
                <input name="ttr_id" value="{{ $tms->ttr_id }}" type="hidden">

                {{--TIME BEGIN--}}
                <div class="form-group row">
                    <label class="col-lg-3 col-form-label font-weight-semibold">Waktu Mulai <span
                                class="text-danger">*</span></label>

                    <div class="col-lg-3">
                        <select data-placeholder="Jam" required class="select-search form-control" name="hour_from" id="hour_from">
                            <option value=""></option>
                            @for($t=1; $t<=24; $t++)
                                <option {{ $tms->hour_from == $t ? 'selected' : '' }} value="{{ $t }}">{{ $t}}</option>
                            @endfor
                        </select>
                    </div>

                    <div class="col-lg-3">
                        <select data-placeholder="Menit" required class="select-search form-control" name="min_from" id="min_from">

                            <option value=""></option>
                            <option value="00">00</option>
                            <option value="05">05</option>
                            @for($t=10; $t<=55; $t+=5)
                                <option {{ $tms->min_from == $t ? 'selected' : '' }} value="{{ $t }}">{{ $t}}</option>
                            @endfor
                        </select>
                    </div>
                </div>

                {{--TIME END--}}
                <div class="form-group row">
                    <label class="col-lg-3 col-form-label font-weight-semibold">Waktu Selesai <span class="text-danger">*</span></label>

                    <div class="col-lg-3">
                        <select data-placeholder="Jam" required class="select-search form-control" name="hour_to" id="hour_to">

                            <option value=""></option>
                            @for($t=1; $t<=24; $t++)
                                <option {{ $tms->hour_to == $t ? 'selected' : '' }} value="{{ $t }}">{{ $t}}</option>
                            @endfor
                        </select>
                    </div>

                    <div class="col-lg-3">
                        <select data-placeholder="Menit" required class="select-search form-control" name="min_to" id="min_to">
                            <option value=""></option>
                            <option value="00">00</option>
                            <option value="05">05</option>
                            @for($t=10; $t<=55; $t+=5)
                                <option {{ $tms->min_to == $t ? 'selected' : '' }} value="{{ $t }}">{{ $t}}</option>
                            @endfor
                        </select>
                    </div>
                </div>
                    <br><br><br>
                <div class="text-right">
                    <button id="ajax-btn" type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>
        </div>
    </div>

</div>
@endsection
