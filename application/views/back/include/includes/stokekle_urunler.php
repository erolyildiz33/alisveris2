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


<link href="https://cdn.jsdelivr.net/gh/gitbrent/bootstrap4-toggle@3.6.1/css/bootstrap4-toggle.min.css"
      rel="stylesheet">
<script src="https://cdn.jsdelivr.net/gh/gitbrent/bootstrap4-toggle@3.6.1/js/bootstrap4-toggle.min.js"></script>
<script type="text/javascript">
    $(document).ready(function() { 
    
        // this function to search and show matched input
    function matchCustom(params, data) {

    if ($.trim(params.term) === '') { return data; }

    if (typeof data.text === 'undefined') { return null; }

    if (data.text.toUpperCase().indexOf(params.term.toUpperCase()) > -1) {
      var modifiedData = $.extend({}, data, true);
      modifiedData.text += '';
     return modifiedData; }

    return null; }

  $(".select2").select2({
  matcher: matchCustom
  });
    
    var disableTableBody = function(value){
           $('#tableBody option[value="'+ value +'"]').prop('disabled',true);
    };
    
    var enableTableBody = function(value){
       $('#tableBody option[value="'+ value +'"]').prop('disabled',false);
    };
    
       var disableTableHeader = function(value){
           $('#tableHeader option[value="'+ value +'"]').prop('disabled',true);
    };
    
    var enableTableHeader = function(value){
       $('#tableHeader option[value="'+ value +'"]').prop('disabled',false);
    };
    
    
   $("#tableHeader").change(function(){
               disableTableBody($(this).val());  
   });
   
   $('#tableHeader').on("select2:unselecting", function(e){
            enableTableBody($(this).val());
   });

   $("#tableBody").change(function(){
               disableTableHeader($(this).val());  
   });
   
   $('#tableBody').on("select2:unselecting", function(e){
            enableTableHeader($(this).val());
   });

});
   
</script>




<script type="text/javascript">
    $("#yukle").click(function () {
            var secimlerim = [];
            var hata = false;
            var icerik = $("#urunid").data("options");
            if (icerik.toString().includes(",")) {
                var options = icerik.split(",");
                $.each(options, function (key, val) {
                    if (!$("#secenek" + val).val().length > 0) {
                        iziToast.error({
                            title: 'Hata',
                            message: $("#secenek" + val).data("optionname") + ' için Alt Seçenek Seçiniz!',
                            position: 'topRight'
                        });
                        hata = true;
                        return false;
                    }
                    $.each($("#secenek" + val + " option:selected"), function () {
                        secimlerim.push({
                            option_id: $.trim(val), sub_id: $.trim($(this).val()), sub_name: $.trim($(this).text()),
                        });
                    });
                });
            } else {
                if (!$("#secenek" + icerik).val().length > 0) {
                    iziToast.error({
                        title: 'Hata',
                        message: $("#secenek" + icerik).data("optionname") + ' için Alt Seçenek Seçiniz!',
                        position: 'topRight'
                    });
                    hata = true;
                    return false;


                }
                $.each($("#secenek" + icerik + " option:selected"), function () {
                    secimlerim.push({
                        option_id: $.trim(icerik), sub_id: $.trim($(this).val()), sub_name: $.trim($(this).text()),
                    });
                });

            }
            let toplumu = $("#toplumu").prop('checked');
            if (toplumu) {
                if (hata) {
                    return false;
                }
                let miktar = $("#toplamstok").val();
                if (!miktar) {
                    iziToast.error({
                        title: 'Hata',
                        message: 'Toplu Stok Miktarı Belirtiniz!',
                        position: 'topRight'
                    });
                    return false;
                }
                var data = [{urunid: $("#urunid").val(), miktar: miktar, secimler: secimlerim}];
                AjaxPost($("#homepage").val() + "admin/stokkaydet", {data});
            } else {
                if (hata) {
                    return false;
                }
                var hatasec = false;
                $.each(secimlerim, function (k, v) {
                    let value = $("#secenek_" + v.option_id + "_" + v.sub_id).val();
                    if (!value) {
                        iziToast.error({
                            title: 'Hata',
                            message: v.sub_name + ' için Stok Miktarı Belirtiniz!',
                            position: 'topRight'
                        });
                        hatasec = true;
                        return false;
                    } else {
                        secimlerim[k].stokmiktari = value;
                    }
                })
                if (hatasec) {
                    return false;
                }

                var tekildata = [{urunid: $("#urunid").val(),  secimler: secimlerim}];
                AjaxPost($("#homepage").val() + "admin/stokkaydet", {tekildata});

            }
        }
    );

    $('#toplumu').change(function () {
        let status = $(this).prop('checked');
        if (!status) {
            var groub = "";
            $("#toplamstoktag").hide();
            var icerik = $("#urunid").data("options");
            if (icerik.toString().includes(",")) {
                var options = icerik.split(",");
                $.each(options, function (key, val) {
                    var secililerval = $("#secenek" + val).val();
                    var secililertext = [];
                    $.each($("#secenek" + val + " option:selected"), function () {
                        secililertext.push($(this).text());
                    });
                    if (secililerval.length > 0) {
                        groub += '<div class="test border rounded">' +
                            '<span class="baslik">' + $("#secenek" + val).data("optionname") + ' Seçenekleri</span>' +
                            '<div class="col-md-12"><div class="row px-3">';
                        $.each(secililerval, function (k, v) {
                            groub += '<div class="col-md-4 mt-4">' +
                                '<div class="form-label-group in-border" style="line-height: 1.5;">' +
                                '<input class="form-control"  name="secenek_' + val + '_' + v + '" id="secenek_' + val + '_' + v + '" autocomplete="off">' +
                                '<label for="secenek_' + v + '">' + secililertext[k] + ' için Stok Miktarı</label>' +
                                '</div>' +
                                '</div>';
                        });
                        groub += '</div></div></div>';
                    }
                });
            } else {
                var secililerval = $("#secenek" + icerik).val();
                var secililertext = [];
                $.each($("#secenek" + icerik + " option:selected"), function () {
                    secililertext.push($(this).text());
                });
                if (secililerval.length > 0) {
                    groub += '<div class="test border rounded">' +
                        '<span class="baslik">' + $("#secenek" + icerik).data("optionname") + ' Seçenekleri</span>' +
                        '<div class="col-md-12"><div class="row px-3">';
                    $.each(secililerval, function (k, v) {
                        groub += '<div class="col-md-4 mt-4">' +
                            '<div class="form-label-group in-border" style="line-height: 1.5;">' +
                            '<input class="form-control"  name="secenek_' + icerik + '_' + v + '" id="secenek_' + icerik + '_' + v + '" autocomplete="off">' +
                            '<label for="secenek_' + v + '">' + secililertext[k] + ' için Stok Miktarı</label>' +
                            '</div>' +
                            '</div>';
                    });
                    groub += '</div></div></div>';
                }

            }


            $("#altliste").html(groub);


        } else {
            $("#altliste").html("");
            $("#toplamstoktag").show();

        }
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
    $(".searchable").change(function () {

        var hata = false;
        if (!$('#toplumu').prop('checked')) {
            var groub = "";
            var icerik = $("#urunid").data("options");
            if (icerik.toString().includes(",")) {
                var options = icerik.split(",");
                $.each(options, function (key, val) {
                    var secililerval = $("#secenek" + val).val();
                    var secililertext = [];
                    $.each($("#secenek" + val + " option:selected"), function () {
                        secililertext.push($(this).text());
                    });

                    if (!secililerval.length > 0) {
                        hata = true;
                        return false;
                    } else {

                        groub += '<div class="test border rounded">' +
                            '<span class="baslik">' + $("#secenek" + val).data("optionname") + ' Seçenekleri</span>' +
                            '<div class="col-md-12"><div class="row px-3">';
                        $.each(secililerval, function (k, v) {
                            groub += '<div class="col-md-4 mt-4">' +
                                '<div class="form-label-group in-border" style="line-height: 1.5;">' +
                                '<input class="form-control"  name="secenek_' + val + '_' + v + '" id="secenek_' + val + '_' + v + '" autocomplete="off">' +
                                '<label for="secenek_' + v + '">' + secililertext[k] + ' için Stok Miktarı</label>' +
                                '</div>' +
                                '</div>';
                        });
                        groub += '</div></div></div>';


                    }
                });


            } else {

                if (!$("#secenek" + icerik).val().length > 0) {
                    hata = true;
                    groub="";
                    $("#toplumu").bootstrapToggle('on');
                    $("#toplumu").prop("disabled", true);
                    return false;
                } else {
                    var secililerval = $("#secenek" + icerik).val();
                    var secililertext = [];
                    $.each($("#secenek" + icerik + " option:selected"), function () {
                        secililertext.push($(this).text());
                    });
                    if (secililerval.length > 0) {
                        groub += '<div class="test border rounded">' +
                            '<span class="baslik">' + $("#secenek" + icerik).data("optionname") + ' Seçenekleri</span>' +
                            '<div class="col-md-12"><div class="row px-3">';
                        $.each(secililerval, function (k, v) {
                            groub += '<div class="col-md-4 mt-4">' +
                                '<div class="form-label-group in-border" style="line-height: 1.5;">' +
                                '<input class="form-control"  name="secenek_' + icerik + '_' + v + '" id="secenek_' + icerik + '_' + v + '" autocomplete="off">' +
                                '<label for="secenek_' + v + '">' + secililertext[k] + ' için Stok Miktarı</label>' +
                                '</div>' +
                                '</div>';
                        });
                        groub += '</div></div></div>';
                    }else{

                    }
                }
            }
            $("#altliste").html(groub);

        }


        if (!hata) $("#toplumu").prop("disabled", false);
        else {
            $("#toplumu").bootstrapToggle('on');
            $("#toplumu").prop("disabled", true);
        }

    });

    $('.tags').select2({
        placeholder: 'Tag Seçiniz', allowClear: true
    });

</script>