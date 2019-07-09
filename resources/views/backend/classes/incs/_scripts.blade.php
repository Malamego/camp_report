<script type="text/javascript">
    $(document).ready(function() {
         $('input[name=name]').on('keyup', function(event) {
             $('input[name=slug]').val(($(this).val().toLowerCase()).split(" ").join("-"))
         });
    });
</script>
