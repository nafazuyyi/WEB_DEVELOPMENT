<form method="post" action="{{ route('students.promote', [$fc, $fs, $tc, $ts]) }}">
    @csrf
    <table class="table table-striped">
        <thead>
        <tr>
            <th>No</th>
            <th>Profil</th>
            <th>Nama</th>
            <th>Tahun Pelajaran</th>
            <th>Aksi</th>
        </tr>
        </thead>
        <tbody>
        @foreach($students->sortBy('user.name') as $sr)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td><img class="rounded-circle" style="height: 30px; width: 30px;" src="{{ $sr->user->photo }}" alt="img"></td>
                <td>{{ $sr->user->name }}</td>
                <td>{{ $sr->session }}</td>
                <td>
                    <select class="form-control select" name="p-{{$sr->id}}" id="p-{{$sr->id}}">
                        <option value="P">Naikkan Kelas</option>
                        <option value="D">Jangan Naikkan Kelas</option>
                        <option value="G">Luluskan</option>
                    </select>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
    <div class="text-center mt-3">
        <button class="btn btn-success"><i class="icon-stairs-up mr-2"></i> Naikkan Kelas / Luluskan Siswa</button>
    </div>
</form>