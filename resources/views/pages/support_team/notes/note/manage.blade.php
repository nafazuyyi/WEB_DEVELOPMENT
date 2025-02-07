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
                @if(Qs::userIsTeamSAT())<th>Aksi</th>@endif
            </tr>
            </thead>
            <tbody>
            @foreach($note as $n)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td class="cell-breakAll">{{ $n->note }}</td>
                    <td>{{ $n->created_at }}</td data-date-format="dd/mm/yyyy">
                    @if(Qs::userIsTeamSAT())
                        <td class="text-center">
                            <div class="list-icons">
                                <div class="dropdown">
                                    <a href="#" class="list-icons-item" data-toggle="dropdown">
                                        <i class="icon-menu9"></i>
                                    </a>

                                    <div class="dropdown-menu dropdown-menu-right">

                                        @if(Qs::userIsTeamSAT())
                                            <a id="{{ $n->id }}" onclick="confirmDelete(this.id)" href="#" class="dropdown-item"><i class="icon-trash"></i> Delete</a>
                                            <form method="post" id="item-delete-{{ $n->id }}" action="{{ route('notes.destroy', $n->id) }}" class="hidden">@csrf @method('delete')</form>
                                        @endif

                                    </div>
                                </div>
                            </div>
                        </td>  
                    @endif
                </tr>
            @endforeach

            </tbody>
        </table>
    </div>

</div>
