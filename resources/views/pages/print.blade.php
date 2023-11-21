
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>print</title>

    <style>
        @page { size: auto;  margin: 0mm; }
        @import url('https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;600;700&display=swap');
        @media print{
        /* #header1{
            background-color: #15233b;
            color: white;
        } */

        #header1 th{
            padding: 15px 0;
        }
        #table2 tr td{
            padding: 7px 0;
        }
        #footer th{
            padding: 10px 0;
        }
        #footer{
            background-color: #afafaf83;
            color: black;
        }

    }
    </style>

</head>
<body style="font-family: Arial, Helvetica, sans-serif">
    <div style="padding: 10px;">
        <div id="logoHead">
            <table style="width: 100%;">
                <tr style="font-size: 25px; ">
                    <td colspan="2">REKAP PENGHASILAN</td>
                    <td> </td>
                    <td style="text-align: right;">
                        <img src="assets/img/Tempattransit-logo.png" alt="logo" width="400">
                    </td>
                </tr>
            </table>
        </div>
        <div style="line-height: 2px; margin-left: 20px;">
            <span>
                Data Periode : 
                @if ($status == "tahun")
                    Tahun {{ $value }}
                @elseif ($status == "bulan")
                    @php
                        $nama_bulan = date("F", mktime(0, 0, 0, $value1, 1))
                    @endphp
                    Tahun {{ $value }} Bulan {{ $nama_bulan }}
                @elseif ($status == "periode")
                    Tanggal {{ $value }} s/d {{ $value1 }}
                @endif
            </span>
        </div>
            {{-- <hr class="" style="margin-bottom: 20px; border: 1px solid #919191;">
            <hr class="" style="margin-bottom: 20px; border: 2px solid #919191; margin-top: -15px;"> --}}
        <div style="
        padding-left: 130px;
        ">
            
        </div>
        <table id="table2" style="margin-top: 60px; width: 100%; border-collapse:collapse; text-align: center;" border="1">
            <tr id="header1" style="
                background-color: #15233b;
            color: white;
                ">
                <th>No</th>
                <th>Nama Project</th>
                <th>Project Manager</th>
                <th>Programmer</th>
                <th>Price</th>
            </tr>
            @php
                $totalIncome = 0;
            @endphp
            @foreach ($data as $item => $value)
                @if ($value->status == "Done")
                    @php
                        $totalIncome += $value->prices;
                    @endphp
                    <tr id="body">
                        <td>{{ $item }}</td>
                        <td> {{ $value->judulProject }} </td>
                        <td>{{ $value->projectManager }}</td>
                        <td>{{ $value->employee }}</td>
                        <td> {{ 'Rp ' . number_format($value->prices, 0, ',', '.') }} </td>
                    </tr>
                @endif
            @endforeach
            <tr id="footer">
                <th colspan="4" style="letter-spacing: 3px;">TOTAL</th>
                <th>{{ 'Rp ' . number_format($totalIncome, 0, ',', '.') }}</th>
            </tr>
        </table>
        <div style="width: 100%; position: absolute; bottom: 0; right: 10px;">
            <div style="text-align: right; margin-right: 10px; line-height: 0;">
                <h5>
                    @php
                        date_default_timezone_set('Asia/Jakarta');
                        $date = date("d F Y", strtotime("now"));
                    @endphp
                    Bandung, {{ $date }}
                    {{-- 15 Oktober 2023 --}}
                </h5>
                <h5 style="margin-bottom: 120px; margin-right: 98px;">
                    Secretary
                </h5>
                <div>
                    <h5>
                        {{ Auth::user()->name }}
                    </h5>
                </div>
            </div>
            <hr class="" style="border: 1px solid #919191;">
        </div>
    </div>

</body>
</html>