@extends('layouts.master')
@section('page_title', 'Tagihan Siswa')
@section('content')
    <div class="card">
        <div class="card-header header-elements-inline">
            <h5 class="card-title"><i class="icon-cash2 mr-2"></i> Tagihan Siswa</h5>
            {!! Qs::getPanelOptions() !!}
        </div>

        <div class="card-body">
            <form method="post" action="{{ route('payments.select_class') }}">
                @csrf
              <div class="row">
                  <div class="col-md-6 offset-md-3">
                      <div class="row">
                          <div class="col-md-10">
                              <div class="form-group">
                                  <label for="my_class_id" class="col-form-label font-weight-bold">Kelas:</label>
                                  <select required id="my_class_id" name="my_class_id" class="form-control select">
                                      <option value="">Pilih Kelas</option>
                                      @foreach($my_classes as $c)
                                          <option {{ ($selected && $my_class_id == $c->id) ? 'selected' : '' }} value="{{ $c->id }}">{{ $c->name }}</option>
                                      @endforeach
                                  </select>
                              </div>
                          </div>

                          <div class="col-md-2 mt-4">
                              <div class="text-right mt-1">
                                  <button type="submit" class="btn btn-primary">Submit </button>
                              </div>
                          </div>

                      </div>
                  </div>
              </div>

            </form>
        </div>
    </div>
    @if($selected)
        <div class="card">
            <div class="card-body">
                <table class="table datatable-button-html5-columns">
                    <thead>
                    <tr>
                        <th>No</th>
                        <th>Photo</th>
                        <th>Name</th>
                        <th>Nomor Induk/NISN</th>
                        <th>Pembayaran</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($students as $s)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td><img class="rounded-circle" style="height: 40px; width: 40px;" src="{{ $s->user->photo }}" alt="photo"></td>
                            <td>{{ $s->user->name }}</td>
                            <td>{{ $s->adm_no }}</td>
                            <td>
                                <div class="dropdown">
                                    <a href="#" class=" btn btn-danger" data-toggle="dropdown"> Atur Pembayaran<i class="icon-arrow-down5"></i>
                                    </a>
                            <div class="dropdown-menu dropdown-menu-left">
                                <a href="{{ route('payments.invoice', [Qs::hash($s->user_id)]) }}" class="dropdown-item">Semua Pembayaran</a>
                                @foreach(Pay::getYears($s->user_id) as $py)
                                @if($py)
                                    <a href="{{ route('payments.invoice', [Qs::hash($s->user_id), $py]) }}" class="dropdown-item">{{ $py }}</a>
                                @endif
                                @endforeach
                            </div>
                                </div>
                            </td>

                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    @endif
@endsection
