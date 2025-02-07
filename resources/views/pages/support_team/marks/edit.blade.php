<form class="ajax-update" action="{{ route('marks.update', [$exam_id, $my_class_id, $section_id, $subject_id]) }}" method="post">
    @csrf @method('put')
    <table class="table table-striped">
        <thead>
        <tr>
            <th>No</th>
            <th>Nama</th>
            <th>Nomor Induk/NISN</th>
            <th>Nilai (100)</th>
            <th>Sikap (SB/B/C/K)</th>
        </tr>
        </thead>
        <tbody>
        @foreach($marks->sortBy('user.name') as $mk)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $mk->user->name }} </td>
                <td>{{ $mk->user->student_record->adm_no }}</td>
                <td><input title="EXAM" min="1" max="100" class="text-center" name="exm_{{ $mk->id }}" value="{{ $mk->exm }}" type="number"></td>
                <td><input title="EXAM2" class="text-center" name="exm2_{{ $mk->id }}" value="{{ $mk->exm2 }}" type="text" onkeyup="this.value = this.value.toUpperCase();"></td>
            </tr>
        @endforeach
        </tbody>
    </table>

    <div class="text-center mt-2">
        <button type="submit" class="btn btn-primary">Update</button>
    </div>
</form>
