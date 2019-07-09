<!-- BEGIN PAGE LEVEL PLUGINS -->
<script src="{{ asset('backend/assets/global/plugins/bootstrap-fileinput/bootstrap-fileinput.js') }}" type="text/javascript"></script>
<!-- END PAGE LEVEL PLUGINS -->


@if (getData($data, 'type'))
    <script type="text/javascript">
        $('#type').val('{{ getData($data, 'type') }}').trigger('change');
    </script>
@endif
