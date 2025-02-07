@extends('layouts.master')
@section('page_title', 'Catatan Siswa')
@section('content')
<style>
.cell-breakAll {
   word-break: break-all;
}
</style>
<div class="card">
    <div class="card-header header-elements-inline bg-success">
        <h6 class="font-weight-bold card-title">Daftar Catatan </h6>
        {!! Qs::getPanelOptions() !!}
    </div>
    <div class="card-body collapse">
        <table id="notes_table" class="table datatable-button-html5-columns">
            <thead>
            <tr>
                <th>No</th>
                <th class="cell-breakAll">Catatan</th>
                <th>Tanggal</th>
            </tr>
            </thead>
            <tbody>
            @foreach($note as $n)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td class="cell-breakAll">{{ $n->note }}</td>
                    <td>{{ $n->created_at }}</td>
                </tr>
            @endforeach

            </tbody>
        </table>
    </div>

</div>
@endsection