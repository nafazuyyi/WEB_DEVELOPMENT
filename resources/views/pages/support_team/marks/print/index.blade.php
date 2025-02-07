<html>
<head>
    <title>Capaian Hasil Belajar - {{ $sr->user->name }}</title>
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/my_print.css') }}" />
</head>
<body>
<div class="container">
    <div id="print" xmlns:margin-top="http://www.w3.org/1999/xhtml">
        {{--    Logo--}}
        <table width="100%">
            <tr>
                <td><img src="{{ $s['logo'] }}" style="max-height : 100px;"></td>

                <td style="text-align: center; ">
                    <strong><span style="color: #000000; font-size: 25px;">PONDOK PESANTREN {{ strtoupper(Qs::getSetting('system_name')) }}</span></strong><br/>
                    <strong>Islamic Boarding School Hubbul Khoir</strong><br>
                    <span style="color: #000; font-size: 12px;"><i>{{ ucwords($s['address'])}} ;</i></span>
                    <span style="color: #000; font-size: 12px;"><i> Telepon: {{ ucwords($s['phone'])}}</i></span><br>
                    <span style="color: #000; font-size: 12px;">SK KEMENKUMHAM RI: AHU-0008328.AH.0</span><br><hr>
                        <strong><span style="color: #000; font-size: 12px;"> LAPORAN HASIL BELAJAR SANTRI MA'HAD HUBBUL KHOIR <br> {{strtoupper(($ex->name)) }}</span></strong>
                </td>
            </tr>
        </table>
        <br/>

        {{--Background Logo--}}
        <div style="position: relative;  text-align: center; ">
            <img src="{{ $s['logo'] }}"
                 style="max-width: 500px; max-height:600px; margin-top: 60px; position:absolute ; opacity: 0.1; margin-left: auto;margin-right: auto; left: 0; right: 0;" />
        </div>

        @include('pages.support_team.marks.print.sheet')

        @include('pages.support_team.marks.print.comments')

        <div> 
            @include('pages.support_team.marks.print.skills')
        </div>        

        <div style="margin-top: 15px; clear: both;">
            <div style=" margin-top: 15px; width: 50%;  height: 10%;  float: left;"> <br><br> Orang Tua/ Wali <br> Peserta Didik </div>
            <div style=" margin-top: 15px; width: 25%;  height: 10%;  float: left;"> <br><br>Wali Kelas</div>
            <div style=" margin-top: 15px; width: 25%;  height: 10%;  float: left;"> Sukoharjo,________________ <br><br> Kepala Pendidikan</div>
            <div style=" width: 50%;  float: left;">................... </div>
            <div style=" width: 25%;  float: left;"> .................. </div>
            <div style=" width: 25%;  float: left;">Fauzan Pratama, S.Pd.
            </div>
        </div>
        <div style="position: absolute;bottom: 10mm;" id="footer">
            <div style="float: left">
                <br>
                <strong style="text-decoration: underline;">KETERANGAN NILAI KE HURUF</strong> <br>
                <span>81 - 100 = A</span> <br>
                <span>61 - 80 &nbsp;&nbsp;= B</span> <br>
                <span>41 - 60 &nbsp;&nbsp;= C</span> <br>
                <span>21 - 40 &nbsp;&nbsp;= D</span> <br>
                <span>&nbsp; 0 - 20 &nbsp;&nbsp;= E</span> <br>
            </div>
            <div style="float: left; margin-left: 15px;">
                <br>
                <strong style="text-decoration: underline;">NILAI SIKAP</strong> <br>
                <span>SB - Sangat Baik</span> <br>
                <span>&nbsp;&nbsp;B - Baik</span> <br>
                <span>&nbsp;&nbsp;C - Cukup Baik</span> <br>
                <span>&nbsp;&nbsp;K - Kurang Baik</span> <br>
            </div>
        </div>
    </div>

</div>
<script>
    window.print();
</script>
</body>

</html>
