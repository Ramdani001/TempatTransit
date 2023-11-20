
<script src="{{'/assets/js/jquery-3.7.0.js'}}"></script>
<script src="{{'/assets/js/jquery.dataTables.min.js'}}"></script>

<script src="{{ '/assets/js/main.js' }}"></script>

<script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>

<script src="../path/to/flowbite/dist/flowbite.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.0.0/flowbite.min.js"></script>


<script>
    new DataTable('#example');
</script>


<script>
    $(document).on('click', '.userView', function()
{
    var_this = $(this).parents('tr');
    $('#v_id').val(_this.find('.id').text());
    $('#v_name').val(_this.find('.name').text());
    $('#v_email').val(_this.find('.email').text());
    $('#v_phone').val(_this.find('.phone').text());
    $('#v_prices').val(_this.find('.prices').text());
    $('#v_address').val(_this.find('.address').text());
    $('#v_details').val(_this.find('.details').text());

});

// Button Evalusi

function evaluasiFunct(){
    console.log($('#btnEvaluasi').text());

    if ($('#btnEvaluasi').text() == "Evaluasi") {
    $('#EvaluasiText').removeAttr('hidden');

    $('#btnEvaluasi').text('Cancel');

    $('#btnSubmit').removeAttr('hidden');
    } else {
        $('#EvaluasiText').attr('hidden', true);
        $('#btnSubmit').attr('hidden', true);
        $('#btnEvaluasi').text('Evaluasi');
    }
}
    $(document).ready(function() {
        $oldStatus = $('#statusProject').val();

        // $('#sendStatus').val($oldStatus);
        $('#sendStatus1').val($oldStatus);
    })

    $('#statusProject').on('change', function() {
    
        $send = this.value;
        $('#sendStatus').val($send);
        $('#sendStatus1').val($send);
    });

    // Filter
    $('.dropListFilter').on('click', function() {
        console.log('Value Click = ', $(this).val());

        $value = $(this).val();

        if($value == "Tahun"){
            console.log("Periode Aktif");
            $('#compTahun').removeClass('hidden');
            $('#compBulan').addClass('hidden');
            $('#compPeriode').addClass('hidden');

            $('#submitFilter').removeClass('hidden');

            $('#submitFilter').val($value);


        }else if($value == "Bulan"){
            $('#compTahun').removeClass('hidden');
            $('#compBulan').removeClass('hidden');
            $('#compPeriode').addClass('hidden');
            
            $('#submitFilter').removeClass('hidden');
            $('#submitFilter').val($value);
        }else if($value == "Periode"){
            $('#compTahun').addClass('hidden');
            $('#compBulan').addClass('hidden');
            $('#compPeriode').removeClass('hidden');

            $('#submitFilter').removeClass('hidden');
            $('#submitFilter').val($value);
        }else{
 
            // ==
            $('#fullTable').toggle('hidden');
            $('#tableFilter').toggle('hidden');
            // ==

            $('#compTahun').addClass('hidden');
            $('#compBulan').addClass('hidden');
            $('#compPeriode').addClass('hidden');

            $('#submitFilter').addClass('hidden');
            $('#submitFilter').val($value);
        }
    });

    $('#submitFilter').on('click', function() {
        console.log("Value Button = ",$(this).val());

        $value = $(this).val();

        if($value == "Tahun"){

            $tahun = $('#filterTahun').val();

            console.log("Send Data Tahun", $tahun);

            // ==
            $('#fullTable').addClass('hidden');
            $('#tableFilter').removeClass('hidden');
            // ==

            var sendData = {
                tahun: $tahun,
                status: "Tahun",
                _token: '{{ csrf_token() }}' 
            };

            // Request Data
            $.ajax({  
            type: "POST",
            data: sendData,
            url: "/admin/filterReport",
            success: function(response){
                console.log(response.filterTahun);
                $(".recordData").empty();
                $(".totalRekapHarga").empty();
                $("#printer").empty();
                
                $("#printer").append('<a href="/print/tahun/'+$tahun+'/0" class="bg-blue-700 hover:bg-blue-800 active:scale-95 px-4 py1 rounded shadow text-white text-xl">  Print </button>');

                response.filterTahun.forEach(function(data, index) {
                $(".recordData").append('<div class="flex justify-between w-full px-4 border-b mb-3 isiTable'+ (index +1) +'"></div>');
                });
                var totalPrices = 0;
                response.filterTahun.forEach(function(data, index) {
                    var formattedPrice = new Intl.NumberFormat('id-ID', {
                        style: 'currency',
                        currency: 'IDR'
                    }).format(data.prices);

                    function formatDate(inputDate) {
                        var date = new Date(inputDate);
                        var month1 = ['January', 'February', 'March', 'April', 'May', 'Juny', 'July', 'August', 'September', 'October', 'November', 'December'];
                        var day = date.getDate();
                        var month = month1[date.getMonth()]; // Bulan dimulai dari 0, jadi tambahkan 1
                        var year = date.getFullYear();

                        // Format tanggal dan bulan agar selalu dua digit
                        if (day < 10) {
                            day = '0' + day;
                        }
                        if (month < 10) {
                            month = '0' + month;
                        }

                        return day + '-' + month + '-' + year;
                    }
                    console.log(formatDate(2023-11-23));

                    // Menambahkan elemen span ke dalam div menggunakan jQuery
                    $(".isiTable"+(index + 1)+"").append('<span class="w-full text-left w-[30%]" id="noFil">' + (index + 1) + '</span>');
                    $(".isiTable"+(index + 1)+"").append('<span class="w-full text-left" id=projectFil">' + data.judulProject + '</span>');
                    $(".isiTable"+(index + 1)+"").append('<span class="w-full text-left" id="projectManagerFil">' + data.projectManager + '</span>');
                    $(".isiTable"+(index + 1)+"").append('<span class="w-full text-left" id="projectManagerFil">' + data.employee + '</span>');
                    $(".isiTable"+(index + 1)+"").append('<span class="w-full text-left" id="projectManagerFil">' + formatDate(data.updated_at) + '</span>');
                    $(".isiTable"+(index + 1)+"").append('<span class="w-full text-left" id="projectManagerFil">' + formattedPrice  + '</span>');
                    totalPrices += Number(data.prices);
                });
                var formatTotalPrices = new Intl.NumberFormat('id-ID', {
                    style: 'currency',
                    currency: 'IDR'
                }).format(totalPrices);

                $('.totalRekapHarga').append(formatTotalPrices);
                console.log('Jumlah = ', formatTotalPrices);

            }
        })
            // Request Data

        }else if($value == "Bulan"){

            $tahun = $('#filterTahun').val();
            $bulan = $('#filterBulan').val();

            console.log("Send Data Bulan", $tahun, $bulan);

            // ==
            $('#fullTable').addClass('hidden');
            $('#tableFilter').removeClass('hidden');
            // ==

            
            var sendData = {
                tahun: $tahun,
                bulan: $bulan,
                status: "Bulan",
                _token: '{{ csrf_token() }}' 
            };

            // Request Data
            $.ajax({  
            type: "POST",
            data: sendData,
            url: "/admin/filterReport",
            success: function(response){  
                console.log(response.filterBulan);
                $(".recordData").empty();
                $(".totalRekapHarga").empty();
                $("#printer").empty();
                
                $("#printer").append('<a href="/print/bulan/'+$tahun+'/'+$bulan+'" class="bg-blue-700 hover:bg-blue-800 active:scale-95 px-4 py1 rounded shadow text-white text-xl">  Print </button>');

                response.filterBulan.forEach(function(data, index) {
                $(".recordData").append('<div class="flex justify-between w-full px-4 border-b mb-3 isiTable'+ (index +1) +'"></div>');
                });
                var totalPrices = 0;
                response.filterBulan.forEach(function(data, index) {
                    var formattedPrice = new Intl.NumberFormat('id-ID', {
                        style: 'currency',
                        currency: 'IDR'
                    }).format(data.prices);

                    // Menambahkan elemen span ke dalam div menggunakan jQuery
                    $(".isiTable"+(index + 1)+"").append('<span class="w-full text-left w-[30%]" id="noFil">' + (index + 1) + '</span>');
                    $(".isiTable"+(index + 1)+"").append('<span class="w-full text-left" id=projectFil">' + data.judulProject + '</span>');
                    $(".isiTable"+(index + 1)+"").append('<span class="w-full text-left" id="projectManagerFil">' + data.projectManager + '</span>');
                    $(".isiTable"+(index + 1)+"").append('<span class="w-full text-left" id="projectManagerFil">' + data.employee + '</span>');
                    $(".isiTable"+(index + 1)+"").append('<span class="w-full text-left" id="projectManagerFil">' + formattedPrice  + '</span>');
                    totalPrices += Number(data.prices);
                });
                var formatTotalPrices = new Intl.NumberFormat('id-ID', {
                    style: 'currency',
                    currency: 'IDR'
                }).format(totalPrices);

                $('.totalRekapHarga').append(formatTotalPrices);
                console.log('Jumlah = ', formatTotalPrices);
            }
        })

        }else if($value == "Periode"){

            $dateFrom = $('#dateFrom').val();
            $dateTo = $('#dateTo').val();

            console.log("Send Data Periode", $dateFrom ," s/d ", $dateTo);

            // ==
            $('#fullTable').addClass('hidden');
            $('#tableFilter').removeClass('hidden');
            // ==

            
            var sendData = {
                dateFrom: $dateFrom,
                dateTo: $dateTo,
                status: "Periode",
                _token: '{{ csrf_token() }}' 
            };

            // Request Data
            $.ajax({  
            type: "POST",
            data: sendData,
            url: "/admin/filterReport",
            success: function(response){  
                console.log(response.filterTanggal);
                $(".recordData").empty();
                $(".totalRekapHarga").empty();
                $("#printer").empty();
                
                $("#printer").append('<a href="/print/periode/'+$dateFrom+'/'+$dateTo+'" class="bg-blue-700 hover:bg-blue-800 active:scale-95 px-4 py1 rounded shadow text-white text-xl">  Print </button>');

                response.filterTanggal.forEach(function(data, index) {
                $(".recordData").append('<div class="flex justify-between w-full px-4 border-b mb-3 isiTable'+ (index +1) +'"></div>');
                });
                var totalPrices = 0;
                response.filterTanggal.forEach(function(data, index) {
                    var formattedPrice = new Intl.NumberFormat('id-ID', {
                        style: 'currency',
                        currency: 'IDR'
                    }).format(data.prices);

                    // Menambahkan elemen span ke dalam div menggunakan jQuery
                    $(".isiTable"+(index + 1)+"").append('<span class="w-full text-left w-[30%]" id="noFil ">' + (index + 1) + '</span>');
                    $(".isiTable"+(index + 1)+"").append('<span class="w-full text-left" id=projectFil">' + data.judulProject + '</span>');
                    $(".isiTable"+(index + 1)+"").append('<span class="w-full text-left" id="projectManagerFil">' + data.projectManager + '</span>');
                    $(".isiTable"+(index + 1)+"").append('<span class="w-full text-left" id="projectManagerFil">' + data.employee + '</span>');
                    $(".isiTable"+(index + 1)+"").append('<span class="w-full text-left" id="projectManagerFil">' + formattedPrice  + '</span>');
                    totalPrices += Number(data.prices);
                });
                var formatTotalPrices = new Intl.NumberFormat('id-ID', {
                    style: 'currency',
                    currency: 'IDR'
                }).format(totalPrices);

                $('.totalRekapHarga').append(formatTotalPrices);
                console.log('Jumlah = ', formatTotalPrices);
            }
        })

        }else{
            $(".recordData").empty();
            $(".totalRekapHarga").empty();
            $("#printer").empty();
        }

    });

    

</script>