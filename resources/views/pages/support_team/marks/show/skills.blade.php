<div class="row">
    <div class="col-md-6">
        <div class="card">
            <div class="card-header header-elements-inline bg-primary">
                <h6 class="card-title font-weight-bold">JUMLAH HAFALAN</h6>
                {!! Qs::getPanelOptions() !!}
            </div>

            <div class="card-body collapse">
                <form class="ajax-update" method="post" action="{{ route('marks.comment_update', $exr->id) }}">
                    @csrf @method('PUT')
                    <input name="j_comment" value="{{ $exr->j_comment }}"  type="text" class="form-control" placeholder="Catatan Wali Kelas">
                    <br>
                    <div class="text-right">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>


    <div class="col-md-6">
        <div class="card">
            <div class="card-header header-elements-inline bg-danger">
                <h6 class="card-title font-weight-bold">KETIDAKHADIRAN</h6>
                {!! Qs::getPanelOptions() !!}
            </div>

            <div class="card-body collapse">
                <form class="ajax-update" method="post" action="{{ route('marks.skills_update', ['K', $exr->id]) }}">
                    @csrf @method('PUT')
                    @foreach($skills->where('skill_type', 'K') as $k)
                        <div class="form-group row">
                            <label for="k" class="col-lg-6 col-form-label font-weight-semibold">{{ $k->name }}</label>
                            <div class="col-lg-6">
                                <select data-placeholder="Pilih" name="k[]" id="k" class="form-control select">
                                    <option value=""></option>
                                    @for($i=0; $i<=8; $i++)
                                        <option {{ $exr->k && explode(',', $exr->k)[$loop->index] == $i ? 'selected' : '' }} value="{{ $i }}">{{ $i }}</option>
                                    @endfor
                                </select>
                            </div>
                        </div>
                    @endforeach

                    <div class="text-right">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="col-md-6">
        <div class="card">
            <div class="card-header header-elements-inline bg-success">
                <h6 class="card-title font-weight-bold">ADAB</h6>
                {!! Qs::getPanelOptions() !!}
            </div>

            <div class="card-body collapse">
                <form class="ajax-update" method="post" action="{{ route('marks.skills_update', ['A', $exr->id]) }}">
                    @csrf @method('PUT')
                    @foreach($skills->where('skill_type', 'A') as $a)
                        <div class="form-group row">
                            <label for="a" class="col-lg-6 col-form-label font-weight-semibold">{{ $a->name }}</label>
                            <div class="col-lg-6">
                                <select data-placeholder="Select" name="a[]" id="a" class="form-control select">
                                    <option value=""></option>
                                    <option value="SB">SB (Sangat Baik)</option>
                                    <option value="B">B (Baik)</option>
                                    <option value="C">C (Cukup Baik)</option>
                                    <option value="K">K (Kurang Baik)</option>
                                </select>
                            </div>
                        </div>
                    @endforeach
                    <div class="text-right">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="col-md-6">
        <div class="card">
            <div class="card-header header-elements-inline bg-warning">
                <h6 class="card-title font-weight-bold">EKSTRAKULIKULER</h6>
                {!! Qs::getPanelOptions() !!}
            </div>

            <div class="card-body collapse">
                <form class="ajax-update" method="post" action="{{ route('marks.skills_update', ['E', $exr->id]) }}">
                    @csrf @method('PUT')
                    @foreach($skills->where('skill_type', 'E') as $e)
                        <div class="form-group row">
                            <label for="e" class="col-lg-6 col-form-label font-weight-semibold">{{ $e->name }}</label>
                            <div class="col-lg-6">
                                <select data-placeholder="Select" name="e[]" id="e" class="form-control select">
                                    <option value=""></option>
                                    <option value="SB">SB (Sangat Baik)</option>
                                    <option value="B">B (Baik)</option>
                                    <option value="C">C (Cukup Baik)</option>
                                    <option value="K">K (Kurang Baik)</option>
                                </select>
                            </div>
                        </div>
                    @endforeach
                    <div class="text-right">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

</div>
