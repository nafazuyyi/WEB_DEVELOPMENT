<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header header-elements-inline bg-danger">
                <h6 class="font-weight-bold card-title">Tambah slot waktu</h6>
                {!! Qs::getPanelOptions() !!}
            </div>

            <div class="card-body collapse">
                <div class="col-md-12">
                    <form data-reload="#time_slots_table" class="ajax-store" method="post" action="{{ route('ts.store') }}">
                        @csrf
                        <input name="ttr_id" value="{{ $ttr->id }}" type="hidden">

                        {{--TIME BEGIN--}}
                        <div class="form-group row">
                            <label class="col-lg-3 col-form-label font-weight-semibold">Waktu Mulai <span
                                        class="text-danger">*</span></label>

                            <div class="col-lg-3">
                                <select data-placeholder="Jam" required class="select-search form-control" name="hour_from" id="hour_from">

                                    <option value=""></option>
                                    @for($t=1; $t<=24; $t++)
                                        <option {{ old('hour_from') == $t ? 'selected' : '' }} value="{{ $t }}">{{ $t}}</option>
                                    @endfor
                                </select>
                            </div>

                            <div class="col-lg-3">
                                <select data-placeholder="Menit" required class="select-search form-control" name="min_from" id="min_from">

                                    <option value=""></option>
                                    <option value="00">00</option>
                                    <option value="05">05</option>
                                    @for($t=10; $t<=55; $t+=5)
                                        <option {{ old('min_from') == $t ? 'selected' : '' }} value="{{ $t }}">{{ $t}}</option>
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
                                        <option {{ old('hour_to') == $t ? 'selected' : '' }} value="{{ $t }}">{{ $t}}</option>
                                    @endfor
                                </select>
                            </div>

                            <div class="col-lg-3">
                                <select data-placeholder="Menit" required class="select-search form-control" name="min_to" id="min_to">

                                    <option value=""></option>
                                    <option value="00">00</option>
                                    <option value="05">05</option>
                                    @for($t=10; $t<=55; $t+=5)
                                        <option {{ old('min_to') == $t ? 'selected' : '' }} value="{{ $t }}">{{ $t}}</option>
                                    @endfor
                                </select>
                            </div>
                            
                        </div>

                        <div class="text-right">
                            <button  type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </form>
                </div>
            </div>

        </div>
    </div>


</div>
