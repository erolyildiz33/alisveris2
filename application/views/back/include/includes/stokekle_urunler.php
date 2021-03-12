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


<link href="https://cdn.jsdelivr.net/gh/gitbrent/bootstrap4-toggle@3.6.1/css/bootstrap4-toggle.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/gh/gitbrent/bootstrap4-toggle@3.6.1/js/bootstrap4-toggle.min.js"></script>
<script type="text/javascript">
 $("#yukle").click(function(){
    let toplumu=$("#toplumu").prop('checked');
  
    if (toplumu){

  console.log()


      /*  AjaxPost($("#homepage").val()+"admi/stokkaydet",{
            urunid:$("#urunid").val(),
            
            secenekler:,
            altsecenekler:,
            stok:,
        });
*/



    }








});

 $('#toplumu').change(function() {
    let status=$(this).prop('checked');
    if (!status)
    {
        $("#toplamstoktag").hide();
        $("#tekilstoktag").show();
    }
    else{
        $("#toplamstoktag").show();
        $("#tekilstoktag").hide();
        $("#altliste").html("");
    }
});
 $("#tekilstoktag").click(function(){
    options=$(this).data("options").split(",");
    groub="";
    $.each(options,function(key,val){
        var secililer=$("#option"+val).val();
        if (secililer.length >0)
        { 

            groub+='<div class="test border rounded">'+
            '<span class="baslik">'+$("#option"+val).data("optionname")+' Seçenekleri</span>'+
            '<div class="col-md-12"><div class="row px-3">';
            $.each(secililer,function(k,v){     
              suboption=AjaxGet($("#homepage").val() + 'admin/get_name_altsecenek/' + v);           
              groub+=  '<div class="col-md-4 mt-4">'+
              '<div class="form-label-group in-border" style="line-height: 1.5;">' +
              '<input class="form-control"  name="secenek_' + val +'_'+ v + '" id="secenek_' + v+ '" autocomplete="off">' +
              '<label for="secenek_' + v + '">' + suboption + ' için Stok Miktarı</label>' +
              '</div>' +
              '</div>';
          });
            groub+='</div></div></div>';
        }
    });

    $("#altliste").html(groub);
});

 $('.searchable').multiSelect({

    selectableHeader: "<input type='text' class='search-input rounded mb-2 border pl-2' style='width: 100%;' autocomplete='off' placeholder='Ara'>",
    selectionHeader: "<input type='text' class='search-input rounded mb-2 border pl-2' style='width: 100%;' autocomplete='off' placeholder='Ara'>",
    afterInit: function (ms) {

        var that = this,
        $selectableSearch = that.$selectableUl.prev(),
        $selectionSearch = that.$selectionUl.prev(),
        selectableSearchString = '#' + that.$container.attr('id') + ' .ms-elem-selectable:not(.ms-selected)',
        selectionSearchString = '#' + that.$container.attr('id') + ' .ms-elem-selection.ms-selected';

        that.qs1 = $selectableSearch.quicksearch(selectableSearchString)
        .on('keydown', function (e) {
            if (e.which === 40) {
                that.$selectableUl.focus();
                return false;
            }
        });

        that.qs2 = $selectionSearch.quicksearch(selectionSearchString)
        .on('keydown', function (e) {
            if (e.which == 40) {
                that.$selectionUl.focus();
                return false;
            }
        });
    },
    afterSelect: function (value) {

        this.qs1.cache();
        this.qs2.cache();

    },
    afterDeselect: function (value) {
        this.qs1.cache();
        this.qs2.cache();


    }
});


 $('.tags').select2({
    placeholder: 'Tag Seçiniz', allowClear: true


});

</script>