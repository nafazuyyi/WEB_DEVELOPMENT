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
        <tr>
            <th rowspan="3" colspan="4">MATA PELAJARAN</th>           <th colspan="4">Nilai</th>      <th colspan="4">Sikap Spiritual dan Sosial</th>
        </tr>

        <tr>
            <th>KKM</th>     <th>Angka</th> <th>Predikat</th>    <th>Keterangan</th>   <th>Dalam Mapel</th>     
        </tr>

        <tr>
           <td>1-100</td> <td>1-100</td> <td>A/B/C/D</td> <td></td> <td>SB/B/C/K</td> 
        </tr>
        
    </tr>
    </thead>
    <tbody>
    @foreach($subjects as $sub)
        <tr>
            <td colspan="2">{{ $loop->iteration }}</td>
            <td colspan="2" style="font-weight: bold">{{ $sub->name }}</td>
            @foreach($marks->where('subject_id', $sub->id)->where('exam_id', $ex->id) as $mk)
                <td>70</td>
                <td>{{ $mk->exm ?: '-' }}</td>
                <td>{{ $mk->grade ? $mk->grade->name : '-' }}</td>
                <td>{{ $mk->grade ? $mk->grade->remark : '-' }}</td>
                <td>{{ $mk->exm2 ?: '-' }}</td>
            @endforeach
        </tr>
    @endforeach
    <tr style="border-block-style: solid">
        <th colspan="5">Jumlah Nilai </th> <td colspan="7" > {{ $exr->total }}</td>
    </tr>
    <tr style="border-block-style: solid">
        <th colspan="5">Rata-rata</th>  <td colspan="7" >{{ $exr->ave }}</td>
    </tr>
    <tr style="border-block-style: solid">
        <th colspan="5">Rangking </th> <td colspan="7" >{!!($exr->where('student_id', $sr->user_id)->first()->pos) ?: '-' !!}</td>
    </tr>
    <tr style="border-block-style: solid">
        <th colspan="5">Jumlah Hafalan</th>  <td colspan="7" >{{$exr->j_comment}}</td>
    </tr>
    </tbody>
</table>
