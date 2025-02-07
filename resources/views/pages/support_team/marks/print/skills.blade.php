    <style>
       td {
  font-size: 13px;
} 
    </style>
    <div style="  width: 33%;  
     float: left;">
        <table style=" border-collapse:collapse; border: 1px solid #000;" border="1" >
            <thead>
            <tr>
                <td colspan="2" style="padding: 10px"><strong >KETIDAKHADIRAN</strong></td>
                <td colspan="1" style="padding: 10px"><strong>JUMLAH</strong></td>
            </tr>
            </thead>

            <tbody>
                @foreach ($skills->where('skill_type', 'K') as $k)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $k->name }}</td>
                    <td>{{ $exr->k ? explode(',', $exr->k)[$loop->index] : '' }} </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>

    <div>
        <div style="  width: 33%;  
         float: left;">
            <table style=" border-collapse:collapse; border: 1px solid #000" border="1" >
                <thead>
                <tr>
                    <td colspan="2" style="padding: 10px"><strong>ADAB</strong></td>
                    <td colspan="1" style="padding: 10px"><strong>NILAI</strong></td>
                </tr>
                </thead>
    
                <tbody>
                    @foreach ($skills->where('skill_type', 'A') as $a)
                    <tr>
                        <td style="padding: 0px 10px 0px 10px">{{ $loop->iteration }}</td>
                        <td  style="padding: 0px 10px 0px 10px">{{ $a->name }}</td>
                        <td  style="padding: 0px 10px 0px 10px">{{ $exr->a ? explode(',', $exr->a)[$loop->index] : '' }}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>

    <div style="  width: 33%;  
     float: left;">
        <table style=" border-collapse:collapse; border: 1px solid #000;" border="1">
            <thead>
            <tr>
                <td colspan="2" style="padding: 10px"><strong>EKSTRAKULIKULER</strong></td>
                <td colspan="1" style="padding: 10px"><strong>NILAI</strong></td>
            </tr>
            </thead>

            <tbody>
                @foreach ($skills->where('skill_type', 'E') as $e)
                <tr>
                    <td style="padding: 0px 10px 0px 10px">{{ $loop->iteration }}</td>
                    <td  style="padding: 0px 10px 0px 10px">{{ $e->name }}</td>
                    <td  style="padding: 0px 10px 0px 10px">{{ $exr->e ? explode(',', $exr->e)[$loop->index] : '' }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

