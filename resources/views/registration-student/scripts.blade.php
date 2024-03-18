@push('scripts')
    <script type="text/javascript">
      $('#checkSubmit').change(function() {
        if($(this).is(":checked")) {
          $('button[type=submit]').removeAttr('disabled');
        } else {
          $('button[type=submit]').attr('disabled','disabled');
        }
      });
    </script>
@endpush