<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>print</title>

    <style>
        @import url('https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;600;700&display=swap');
        @media print{
            /* #header th{
                color: red;
            } */
        }
        #header{
            background-color: #15233b;
            color: white;
        }

        #header th{
            padding: 15px 0;
        }
        table tr td{
            padding: 7px 0;
        }
        #footer th{
            padding: 10px 0;
        }
        #footer{
            background-color: #afafaf83;
            color: black;
        }
    </style>

</head>
<body style="font-family: Arial, Helvetica, sans-serif">
    <?php
        $price = 1500000;
        $formattedPrice = 'Rp ' . number_format($price, 0, ',', '.');
    ?>

    <div style="padding: 10px;">
        <div style="display: grid;
        grid-template-columns: repeat(2, 1fr);
        gap: 10px;">
            <div style="margin-left: 40px;">
                <h5 style="font-size: 25px;">REKAP PENGHASILAN</h5>
            </div>
            <img src="{{ '/assets/img/Tempattransit-logo.png' }}" alt="logo" width="400" style="justify-self: end;">
        </div>
        <div style="line-height: 2px; margin-left: 40px;">
            <span>
                Data Periode : Tahun 2023 
            </span>
        </div>
            {{-- <hr class="" style="margin-bottom: 20px; border: 1px solid #919191;">
            <hr class="" style="margin-bottom: 20px; border: 2px solid #919191; margin-top: -15px;"> --}}
        <div style="
        padding-left: 130px;
        ">
            
        </div>
        <table style="margin-top: 60px; width: 100%; border-collapse:collapse; text-align: center;" border="1">
            <tr id="header">
                <th>No</th>
                <th>Nama Project</th>
                <th>Project Manager</th>
                <th>Programmer</th>
                <th>Price</th>
            </tr>
            @for ($i = 1; $i <= 10; $i++)
                <tr id="body">
                    <td>{{$i}}</td>
                    <td>Portal Berita</td>
                    <td>Ramdani</td>
                    <td>Rizkan</td>
                    <td> {{ $formattedPrice }} </td>
                </tr>
            @endfor
            <tr id="footer">
                <th colspan="4" style="letter-spacing: 3px;">TOTAL</th>
                <th>{{ $formattedPrice }}</th>
            </tr>
        </table>
        <div style="widht: 100%; height: 100%;">
            <div style="text-align: right; margin-right: 10px; line-height: 0;">
                <h5>
                    Bandung, 15 Oktober 2023
                </h5>
                <h5 style="margin-bottom: 120px; margin-right: 98px;">
                    Secretary
                </h5>
                <div>
                    <h5>
                        Rizkan Ramdani
                    </h5>
                </div>
            </div>
        </div>
        <hr class="" style="border: 1px solid #919191;">
    </div>


    <script>
        // document.addEventListener('DOMContentLoaded', function() {
        //     window.print();
        // });

    </script>

</body>
</html>