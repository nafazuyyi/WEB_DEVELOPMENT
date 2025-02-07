<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header header-elements-inline bg-danger">
                <h6 class="font-weight-bold card-title">Tambah Catatan</h6>
                {!! Qs::getPanelOptions() !!}
            </div>
            <div class="card-body collapse">
                <div class="col-md-12">
                    <form data-reload="#notes_table" class="ajax-store"  method="post" action="{{ route('notes.store', Qs::hash($st_id)) }}">
                        @csrf
                        <div class="mb-2">
                            <input name="note" type="textarea" class="form-control" placeholder="Catatan">
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
