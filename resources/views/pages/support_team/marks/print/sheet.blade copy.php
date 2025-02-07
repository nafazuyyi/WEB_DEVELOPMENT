{{--<!--NAME , CLASS AND OTHER INFO -->--}}
<table style="width:100%; border-collapse:collapse; ">
    <tbody>
    <tr>
        <td style=" text-align: Left;"> <pre><strong>Nama Santri         :</strong> {{($sr->user->name) }}</pre></td>
        <td style=" text-align: Left;"><pre><strong>Kelas            :</strong> {{ ($my_class->name) }}</pre></td>    
    </tr>
    <tr>
        <td style=" text-align: Left;"><pre><strong>Nomor Induk Santri  :</strong> {{ $sr->adm_no }}</pre></td>
        <td style=" text-align: Left;"><pre><strong>Semester         :</strong> {!! (($ex->term)) !!}</pre></td> 
    </tr>
    <tr>
        <td style=" text-align: Left;"><pre><strong>Nama Madrasah       :</strong> {{ strtoupper($class_type->code) }} {{ (Qs::getSetting('system_name')) }} </pre></td> 
        <td style=" text-align: Left;"><pre><strong>Tahun Pelajaran  :</strong> {{ $ex->year }}</pre></td>
    </tr>
    <tr> 
        <td style=" text-align: Left;"> <strong><br>Capaian Kompetensi</strong></td></tr>
    </tbody>
</table>


{{--Exam Table--}}
<table style="width:100%; border-collapse:collapse; border: 1px solid #000; margin: 10px auto;" border="1">
    <thead>
    <tr>
        <th rowspan="2">MATA PELAJARAN</th>
        <th rowspan="2">NILAI</th>
        <th rowspan="2">PREDIKAT</th>
        <th rowspan="2">DESKRIPSI</th>
    </tr>
    </thead>
    <tbody>
    @foreach($subjects as $sub)
        <tr>
            <td style="font-weight: bold">{{ $sub->name }}</td>
            @foreach($marks->where('subject_id', $sub->id)->where('exam_id', $ex->id) as $mk)
                <td>{{ $mk->exm ?: '-' }}</td>
                <td>{{ $mk->grade ? $mk->grade->name : '-' }}</td>
                <td>{{ $mk->grade ? $mk->grade->remark : '-' }}</td>
            @endforeach
        </tr>
    @endforeach
    </tbody>
</table>
