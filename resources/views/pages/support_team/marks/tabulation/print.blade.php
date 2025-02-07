<html>
<head>
    <title>Tabulasi - {{ $my_class->name.' '.$section->name.' - '.$ex->name.' ('.$year.')' }}</title>
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/print_tabulation.css') }}" />
</head>
<body>
<div class="container">
    <div id="print" xmlns:margin-top="http://www.w3.org/1999/xhtml">
        {{--    Logo N School Details--}}
        <table width="100%">
            <tr>
               

                <td >
                    <strong><span style="color: #1b0c80; font-size: 25px;">{{ strtoupper(Qs::getSetting('system_name')) }}</span></strong><br/>
                   
                    <strong><span
                                style="color: #000; font-size: 15px;"><i>{{ ucwords($s['address']) }}</i></span></strong><br/>
                    <strong><span style="color: #000; font-size: 15px;"> TABULASI {{ strtoupper($my_class->name.' '.$section->name.' - '.$ex->name.' SEMESTER '.$ex->term.' ('.$year.')' ) }}
                    </span></strong>
                </td>
            </tr>
        </table>
        <br/>

        {{--Background Logo--}}
        <div style="position: relative;  text-align: center; ">
            <img src="{{ $s['logo'] }}"
                 style="max-width: 500px; max-height:600px; margin-top: 60px; position:absolute ; opacity: 0.2; margin-left: auto;margin-right: auto; left: 0; right: 0;" />
        </div>

        {{-- Tabulation Begins --}}
        <table style="width:100%; border-collapse:collapse; border: 1px solid #000; margin: 10px auto;" border="1">
            <thead>
            <tr>
                <th>NO</th>
                <th>NAMA</th>
                @foreach($subjects as $sub)
                    <th rowspan="2">{{ strtoupper($sub->slug ?: $sub->name) }}</th>
                @endforeach
                <th style="color: darkgreen">RANGKING</th>
            </tr>
            </thead>
            <tbody>
            @foreach($students as $s)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td style="text-align: center">{{ $s->user->name }}</td>
                    @foreach($subjects as $sub)
                        <td>{{ $marks->where('student_id', $s->user_id)->where('subject_id', $sub->id)->first()->$tex ?? '-' ?: '-' }}</td>
                    @endforeach
                    <td style="color: darkgreen">{!!($exr->where('student_id', $s->user_id)->first()->pos) ?: '-' !!}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
</div>

<script>
    window.print();
</script>
</body>
</html>
