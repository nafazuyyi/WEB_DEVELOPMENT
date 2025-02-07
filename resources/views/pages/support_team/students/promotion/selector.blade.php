<form method="post" action="{{ route('students.promote_selector') }}">
    @csrf
    <div class="row">
        <div class="col-md-10">
            <fieldset>

                <div class="row">
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="fc" class="col-form-label font-weight-bold">Dari Kelas:</label>
                            <select required onchange="getClassSections(this.value, '#fs')" id="fc" name="fc" class="form-control select">
                                <option value="">Pilih Kelas</option>
                                @foreach($my_classes as $c)
                                    <option {{ ($selected && $fc == $c->id) ? 'selected' : '' }} value="{{ $c->id }}">{{ $c->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="fs" class="col-form-label font-weight-bold">Dari Tingkat:</label>
                            <select required id="fs" name="fs" data-placeholder="Pilih Kelas Terlebih Dahulu" class="form-control select">
                                @if($selected && $fs)
                                    <option value="{{ $fs }}">{{ $sections->where('id', $fs)->first()->name }}</option>
                                @endif
                            </select>
                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="tc" class="col-form-label font-weight-bold">Ke Kelas:</label>
                            <select required onchange="getClassSections(this.value, '#ts')" id="tc" name="tc" class="form-control select">
                                <option value="">Pilih Kelas</option>
                                @foreach($my_classes as $c)
                                    <option {{ ($selected && $tc == $c->id) ? 'selected' : '' }} value="{{ $c->id }}">{{ $c->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="ts" class="col-form-label font-weight-bold">Ke Tingkat:</label>
                            <select required id="ts" name="ts" data-placeholder="Pilih Kelas Terlebih Dahulu" class="form-control select">
                                @if($selected && $ts)
                                    <option value="{{ $ts }}">{{ $sections->where('id', $ts)->first()->name }}</option>
                                @endif
                            </select>
                        </div>
                    </div>

                </div>

            </fieldset>
        </div>

        <div class="col-md-2 mt-4">
            <div class="text-right mt-1">
                <button type="submit" class="btn btn-primary">Submit<i class="icon-paperplane ml-2"></i></button>
            </div>
        </div>

    </div>

</form>
