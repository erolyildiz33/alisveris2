<style>

    .select2-selection__choice:focus {
        color: #49505 !important
        7;
        background-color: #fff !important;
        border-color: #80bdff !important;
        outline: 0 !important;
        box-shadow: inset 0 0 0 transparent !important;
    }

    .select2-container--default.select2-container--focus .select2-selection--multiple {
        border-color: #80bdff !important;
    }

    .select2-selection__choice {
        padding-right: 5px !important;
        padding-left: 5px !important;
        background-color: transparent !important;
        color: black !important
        border-radius: 4px !important;
        background-color: rgb(4 186 255 / 74%) !important;
    }

    .select2-selection__choice__remove {
        padding-left: 2rem !important;
        float: right !important;
        border: none !important;
        border-left: 1px solid #aaa !important;
        border-radius: 0 !important;
        padding: 0 2px !important;
        position: relative !important;
    }

    .select2-selection__choice__remove:hover {
        background-color: transparent !important;
        color: #ef5454 !important;
    }

    .select2-container--default .select2-search--inline .select2-search__field:focus {
        border: none !important;
    }

    .dz-filename {
        display: none !important;
    }

    .dz-details {
        background: initial !important;
        height: 0 !important;

    }

    .dz-remove {
        color: #000 !important;
    }

    .dz-remove:hover {

        background-color: red !important;
    }

</style>


<link rel="stylesheet" href="<?= base_url('assets/back') ?>/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
<link rel="stylesheet"
      href="<?= base_url('assets/back') ?>/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
<link rel="stylesheet" href="<?= base_url('assets/back') ?>/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
<link rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/css/bootstrap-select.min.css">
<link href="<?= base_url('assets/back') ?>/dist/css/select2.min.css" rel="stylesheet"/>
<link href="<?= base_url('assets/back') ?>/dist/dropzone.css" rel="stylesheet"/>
<link href="<?= base_url('assets/back') ?>/build/css/multi-select.css" rel="stylesheet"/>


<script src="<?= base_url('assets/back') ?>/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="<?= base_url('assets/back') ?>/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="<?= base_url('assets/back') ?>/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="<?= base_url('assets/back') ?>/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="<?= base_url('assets/back') ?>/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="<?= base_url('assets/back') ?>/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script src="<?= base_url('assets/back') ?>/plugins/jszip/jszip.min.js"></script>
<script src="<?= base_url('assets/back') ?>/plugins/pdfmake/pdfmake.min.js"></script>
<script src="<?= base_url('assets/back') ?>/plugins/pdfmake/vfs_fonts.js"></script>
<script src="<?= base_url('assets/back') ?>/plugins/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="<?= base_url('assets/back') ?>/plugins/datatables-buttons/js/buttons.print.min.js"></script>
<script src="<?= base_url('assets/back') ?>/plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
<script src="<?= base_url('assets/back') ?>/dist/dropzone.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/js/bootstrap-select.min.js"></script>

<script src="<?= base_url('assets/back') ?>/dist/js/select2.min.js"></script>
<script src="<?= base_url('assets/back') ?>/build/js/jquery.multi-select.js"></script>
<script src="<?= base_url('assets/back') ?>/build/js/jquery.quicksearch.js"></script>
<script type="text/javascript">
	$("select").selectpicker();
</script>