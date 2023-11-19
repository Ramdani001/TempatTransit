
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

        $('#sendStatus').val($oldStatus);
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

        }else if($value == "Bulan"){

            $tahun = $('#filterTahun').val();
            $bulan = $('#filterBulan').val();

            console.log("Send Data Bulan", $tahun, $bulan);

            // ==
            $('#fullTable').addClass('hidden');
            $('#tableFilter').removeClass('hidden');
            // ==

        }else if($value == "Periode"){

            $dateFrom = $('#dateFrom').val();
            $dateTo = $('#dateTo').val();

            console.log("Send Data Periode", $dateFrom ," s/d ", $dateTo);

            // ==
            $('#fullTable').addClass('hidden');
            $('#tableFilter').removeClass('hidden');
            // ==

        }else{

        }

    });

</script>