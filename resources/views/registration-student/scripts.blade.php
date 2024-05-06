@push('scripts')
    <script type="text/javascript">

    // Fungsi untuk memeriksa apakah ada input kosong
    function checkInputs() {
        var isEmpty = false;

        // Iterasi melalui semua input
        $('input[type=text], textarea, input[type=date], input[type=file]').each(function() {
            // Periksa jika nilai input kosong
            if ($(this).val() === '') {
                isEmpty = true;
                return false; // Hentikan iterasi jika ada input kosong
            }
        });

        return isEmpty;
    }

    // Event listener untuk perubahan pada input
    $('input[type=text], textarea, input[type=date], input[type=file]').change(function() {
        // Periksa apakah ada input kosong
        var isEmpty = checkInputs();

        // Nonaktifkan atau aktifkan tombol checkbox tergantung pada kondisi input
        $('#checkSubmit').prop('disabled', isEmpty);
    });


      $('#checkSubmit').change(function() {
        if($(this).is(":checked")) {
          $('button[type=submit]').removeAttr('disabled');
        } else {
          $('button[type=submit]').attr('disabled','disabled');
        }
      });
    </script>
@endpush