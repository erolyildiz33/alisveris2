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
    $(document).on('click', '.stoktanimla', function () {
     let html= $('.ms-selection ul li.ms-selected').children();
     var myarr=[];
     var icerik="";

     html.each(function(idx, val){
        var sonuc=$(this).html();
        myarr.push({id:$("#my-select").val()[idx],
            value:sonuc
        });
    });
     var say=0;

     $.each( myarr, function( key, val ) {

       if(say==3) say=0; 

       if(say==0) icerik+='<div class="row">';


       icerik+= '<div class="col-md-4">'+
       '<div class="form-group">' +
       '<div class="form-label-group in-border">' +
       '<input class="form-control"  name="secenek_'+val.id+'" id="secenek_'+val.id+'" autocomplete="off">' +
       '<label for="secenek_'+val.id+'">'+val.value+' için Stok Miktarı</label>' +
       '</div>' +
       '</div>' +
       '</div>';

       if(say==2) icerik+='</div>';

       say++;
   });



     $("#stoklar").html(icerik);



 });
    $(document).on('click', '.altekle', function () {
        var title = $(this).data("title");
        var altid = $(this).data("altid");
        var url = $(this).data("url");
        $("#myModalLabel").html('<h4 class="modal-title"><b>' + title + '</b> Kategorisine Alt Kategorisi Ekle</h4>');
        $("#modalform").attr("action", url);
        var ekle = '<div class="row">' +
        '<div class="col-md-12">' +
        '<div class="widget">' +
        '<div class="widget-body">' +
        '<input type="hidden" name="csrf_test_name" value="' + $("#csrf_test_name").data("csrf") + '">' +
        '<input type="hidden" name="anamenu" value="' + altid + '">' +
        '<div class="form-group">' +

        '<div class="form-label-group in-border">' +
        '<input class="form-control" id="title" placeholder="Alt Kategori Adı"  name="title" autocomplete="off">' +
        '<label for="title">Alt Kategori Adı</label>' +
        '</div>' +


        '</div>' +
        '</div></div></div></div>';
        var footer = '<button type="submit" class="btn btn-primary">Güncelle</button>' +
        '<button type="button" class="btn btn-danger" data-dismiss="modal">İptal</button>';
        $("#modalfooter").html(footer);
        $("#modalbody").html(ekle);
    });
    $(document).on('click', '.yeniekle', function () {

        var url = $(this).data("url");
        let kategoriler = $(this).data("kategoriler");
        $("#myModalLabel").html('<h2 class="modal-title"><b>Yeni</b> Ürün Ekle</h2>');
        $("#modalform").attr("action", url);
        var ekle = '<div class="row">' +
        '<div class="col-md-12">' +
        '<div class="widget">' +
        '<div class="widget-body">' +
        '<input type="hidden" name="csrf_test_name" value="' + $("#csrf_test_name").data("csrf") + '">' +
        '<input type="hidden" name="taglar" value="" id="taglar">' +
        '<div class="form-group">' +
        ' <select class="form-control selectpicker" data-live-search="true" data-width="100%" data-style="btn-primary" name="category" id="category" >' +
        '<option value="" selected disabled hidden></option>' + kategoriler +
        '</select></div>' +
        '<div class="form-group">' +

        '<div class="form-label-group in-border">' +
        '<input class="form-control" placeholder="Ürün Adı" name="title" id="title" autocomplete="off">' +
        '<label for="title">Ürün Adı</label>' +
        '</div>' +
        '</div>' +

        '<div class="form-group">' +
        '<div class="form-label-group in-border">' +
        '<input type="number" step="any" class="form-control" placeholder="Ürün Fiyatı" name="price" id="price" autocomplete="off">' +
        '<label for="price">Ürün Fiyatı</label>' +
        '</div></div>' +
        '<div class="form-group">' +
        '<div class="form-label-group in-border">' +
        '<input type="number" step="any" class="form-control" placeholder="Ürün İndirimli Fiyatı" name="discount" id="discount" autocomplete="off">' +
        '<label for="discount">Ürün İndirimli Fiyatı</label>' +
        '</div></div>' +
        '<div class="form-group">' +
        '<div class="form-label-group in-border">' +
        '<select class="tags  form-control" multiple="multiple" name="tag" id="tag" style="width: 100%"></select>' +
        '<label for="tag">Etiket</label>' +
        '</div></div>' +
        '</div>' +
        '<div class="form-group">' +
        '<div class="form-label-group in-border">' +
        '<textarea class="form-control" placeholder="Ürün Kısa Açıklama" name="subtitle" id="subtitle" autocomplete="off"></textarea>' +
        '<label for="subtitle">Ürün Kısa Açıklama</label>' +
        '</div></div>' +
        '<div class="form-group">' +
        '<div class="form-label-group in-border">' +
        '<textarea class="form-control" rows="3" placeholder="Ürün Uzun Açıklama" name="description" id="description" autocomplete="off"></textarea>' +
        '<label for="description">Ürün Uzun Açıklama</label>' +
        '</div></div></div></div></div></div></div>';
        var footer = '<button type="submit"  class="btn btn-primary kaydet">Kaydet</button>' +
        '<button type="button" class="btn btn-danger" data-dismiss="modal">İptal</button>';
        $("#modalfooter").html(footer);
        $("#modalbody").html(ekle);

        $('.tags').select2({
            placeholder: 'Tag Seçiniz',
            tags: true,

        });
        $(".selectpicker").selectpicker({noneSelectedText: 'Kategori Seçiniz'});
    });
    $(document).on('click', '.resimekle', function () {

        let url = $(this).data("url");
        let urunid = $(this).data("urunid");
        let urunadi = $(this).data("urunadi");
        $("#myModalLabel").html('<h2 class="modal-title"><b>' + urunadi + '</b> Ürününe Resim Ekle</h2>');
        $("#modalform").attr("action", url);
        $("#modalform").attr("enctype", 'multipart/form-data');


        let ekle = '<div class="row">' +
        '<div class="col-md-12">' +
        '<div class="widget">' +
        '<div class="widget-body">' +
        '<div id="mydropzone" class="dropzone"></div>' +


        '</div>' +


        '</div></div></div></div>';
        let footer = '<button type="submit" id="yukle" class="btn btn-primary">Kaydet</button>' +
        '<button type="button" class="btn btn-danger" data-dismiss="modal">İptal</button>';
        $("#modalfooter").html(footer);
        $("#modalbody").html(ekle);


        Dropzone.autoDiscover = false;
        $("#mydropzone").dropzone({
            url: url,
            addRemoveLinks: true,
            autoProcessQueue: false,
            init: function () {
                var myDropzone = this;
                $("#yukle").click(function (e) {
                    e.preventDefault();
                    myDropzone.processQueue();
                });
                this.on('sending', function (file, xhr, formData) {
                    var data = $('#modalform').serializeArray();
                    $.each(data, function (key, el) {
                        formData.append(el.name, el.value);
                    });

                });
                this.on("complete", function (files, response) {
                    window.location.href = "<?=base_url('admin/urunler')?>";
                });

            }

        });
        // var myDropzone = new Dropzone("div#mydropzone", { url: url});

        /*      Dropzone.autoDiscover = false;

        // Get the template HTML and remove it from the doumenthe template HTML and remove it from the doument
        var previewNode = document.querySelector("#template");
        previewNode.id = "";
        var previewTemplate = previewNode.parentNode.innerHTML;
        previewNode.parentNode.removeChild(previewNode);

        var myDropzone = new Dropzone(document.body, { // Make the whole body a dropzone
          url: "/target-url", // Set the url
          thumbnailWidth: 80,
          thumbnailHeight: 80,
          parallelUploads: 20,
          previewTemplate: previewTemplate,
          autoQueue: false, // Make sure the files aren't queued until manually added
          previewsContainer: "#previews", // Define the container to display the previews
          clickable: ".fileinput-button" // Define the element that should be used as click trigger to select files.
      });

        myDropzone.on("addedfile", function(file) {
          // Hookup the start button
          file.previewElement.querySelector(".start").onclick = function() { myDropzone.enqueueFile(file); };
      });

        // Update the total progress bar
        myDropzone.on("totaluploadprogress", function(progress) {
          document.querySelector("#total-progress .progress-bar").style.width = progress + "%";
      });

        myDropzone.on("sending", function(file) {
          // Show the total progress bar when upload starts
          document.querySelector("#total-progress").style.opacity = "1";
          // And disable the start button
          file.previewElement.querySelector(".start").setAttribute("disabled", "disabled");
      });

        // Hide the total progress bar when nothing's uploading anymore
        myDropzone.on("queuecomplete", function(progress) {
          document.querySelector("#total-progress").style.opacity = "0";
      });

        // Setup the buttons for all transfers
        // The "add files" button doesn't need to be setup because the config
        // `clickable` has already been specified.
        document.querySelector("#actions .start").onclick = function() {
          myDropzone.enqueueFiles(myDropzone.getFilesWithStatus(Dropzone.ADDED));
      };
      document.querySelector("#actions .cancel").onclick = function() {
          myDropzone.removeAllFiles(true);
      };

      */

  });
$(document).on('click', '.stokekle', function () {
    let url = $(this).data("url");
    let urunid = $(this).data("urunid");
    let urunadi = $(this).data("urunadi");
    let secenekler = $(this).data("secenekler");
    let seceneklerli = $(this).data("seceneklerli");
    if (!$(".modal-dialog").hasClass("modal-lg")) $(".modal-dialog").addClass("modal-lg");
    $("#myModalLabel").html('<h2 class="modal-title"><b>' + urunadi + '</b> Ürününe Seçenek ve Stok Ekleme</h2>');
    $("#modalform").attr("action", url);
    let ekle = '<div class="row ">' +
    '<div class="col-md-12 ">' +
    '<div class="d-flex justify-content-center">' +
    '<select  multiple="multiple" id="my-select" name="my-select[]" class="searchable">' +
    secenekler +
    '</select>' +
    '</div></div>' +
    '<div class="col-md-12 ">' +
    '<div class="d-flex justify-content-center">' +
    '<div style="width: 50%">' +
    '<button type="button" disabled="true" id="stoktanit"class="btn btn-primary btn-block mt-2 stoktanimla">Stokları Tanımla</button>' +
    '</div></div>' +
    '</div>' +
    '<div id="stoklar" class="col-md-12 mt-3">'+
    '</div>'+
    '</div>';
    let footer = '<button type="submit" disabled="true"  id="yukle" class="btn btn-primary">Kaydet</button>' +
    '<button type="button" class="btn btn-danger" data-dismiss="modal">İptal</button>';
    $("#modalfooter").html(footer);
    $("#modalbody").html(ekle);

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

            if($("#my-select").val().length>0) {
                $("#stoktanit").prop("disabled",false);
                $("#yukle").prop("disabled",false);
            }else{ 
                $("#stoktanit").prop("disabled",true);
                $("#yukle").prop("disabled",true);
            }

        },
        afterDeselect: function (value) {
            this.qs1.cache();
            this.qs2.cache();

            if($("#my-select").val().length>0) {
                $("#stoktanit").prop("disabled",false);
                $("#yukle").prop("disabled",false);
            }else{ 
                $("#stoktanit").prop("disabled",true);
                $("#yukle").prop("disabled",true);
                


            }
        }
    });
    $('.tags').select2({
        placeholder: 'Tag Seçiniz', allowClear: true


    });
});

$('#myModal').on('hidden.bs.modal', function (e) {
    $(".modal-dialog").removeClass("modal-lg");
})

function serializeet() {
    fields = $(".tags").serializeArray()
    var result = [];
    jQuery.each(fields, function (i, field) {
        result.push(field.value + " ");
    });
    $("#taglar").val(result);
}

$(document).on('click', '.altguncelle', function () {
    var title = $(this).data("title");
    var altid = $(this).data("altid");
    var url = $(this).data("url");
    $("#myModalLabel").html('<h3 class="modal-title"><b>' + title + '</b> Kategorisini düzenliyorsunuz</h3>');
    $("#modalform").attr("action", url);
    var ekle = '<div class="row">' +
    '<div class="col-md-12">' +
    '<div class="widget">' +
    '<div class="widget-body">' +
    '<input type="hidden" name="csrf_test_name" value="' + $("#csrf_test_name").data("csrf") + '">' +
    '<input type="hidden" name="anamenu" value="' + altid + '">' +
    '<div class="form-group">' +
    '<input class="form-control" placeholder="Başlık" name="title" autocomplete="off" value="' + title + '">' +
    '</div></div></div></div></div>';
    var footer = '<button type="submit" class="btn btn-primary">Güncelle</button>' +
    '<button type="button" class="btn btn-danger" data-dismiss="modal">İptal</button>';
    $("#modalfooter").html(footer);
    $("#modalbody").html(ekle);
});
$(document).on('click', '.altgetir', function () {

    var alticerikliste = "";
    var altid = $(this).data("altid");
    var enust = $(this).data("getustid");

    if (enust != 0) {
        myid = "#altliste" + enust;
    } else {
        myid = "#altliste";
    }
    var title = $(this).data("title");
    var geturl = $(this).data("geturl");

    var durum = $(myid).attr('status');
    var sonid = $(myid).attr('addid');
    let durumvarmi = AjaxGet(geturl + "getAlt_kategoriler/" + altid);


    altmenuler = $.parseJSON(AjaxGet(geturl + "getAlt_kategoriler/" + altid));
    var say = 1;
    $.each(altmenuler, (function (index, element) {
        checked = (element.isActive == 1) ? "checked" : " ";


        mylist = (AjaxGet(geturl + "getAlt_kategoriler/" + element.id)) ?
        '<button data-altid="' + element.id + '"style="margin-left: 1rem;"' +
        'data-geturl="' + geturl + '"' +
        'data-getustid="' + altid + '"' +
        'data-title="' + element.title + '"' +
        'class="btn btn-sm btn-warning btn-outline add-btn altgetir">' +
        '<i class="fa fa-cog"></i><span class="d-none d-sm-inline"> Alt Kategori İşlemleri</span>' +
        '</button>'
        : " ";


        alticerikliste += '<tr id="ord-' + element.id + '">' +
        '<td class="order"><i class="fas fa-bars"></i></td>' +
        '<td class="w50 text-center sirano' + altid + '">' + say++ + '</td>' +
        '<td><strong>' + title + '</strong></td>' +
        '<td>' + element.title + '</td>' +
        '<td class="text-center w100">' +
        '<input data-url="' + geturl + 'isActiveSetter_kategoriler/' + element.id + '"' +
        'class="isActive altactive' + altid + '" type="checkbox" data-switchery data-color="#10c469" ' + checked + ' /></td>' +
        '<td class="w400 text-center">' +
        '<div class="d-flex justify-content-center" >' +
        '<button data-altid="' + element.id + '" data-title="' + element.title + '"' +
        'type="button" data-toggle="modal" data-target="#myModal"' +
        'data-url="' + geturl + "save_sub_kategoriler" + '"' +

        'class="btn btn-sm btn-success btn-outline add-btn altekle">' +
        '<i class="fa fa-plus"></i><span class="d-none d-sm-inline"> Alt Kategori Ekle</span></button>' +
        mylist +
        ' </div>' +
        '</td>' +
        '<td class="text-center w300" >' +
        '<div class="d-flex justify-content-center">' +
        '<button data-analiste="evet"  data-url="' + geturl + 'delete_kategoriler/' + element.id + '"' +
        ' class="btn btn-sm btn-danger btn-outline remove-btn" >' +
        '<i class="fa fa-trash"></i><span class="d-none d-sm-inline"> Sil</span>' +
        '</button>' +
        '<button data-altid="' + element.id + '"' +
        'type="button" data-toggle="modal" data-target="#myModal"' +
        'style="margin-left: 1rem;"' +
        'data-title="' + element.title + '"' +
        'data-url="' + geturl + 'update_kategoriler/' + element.id + '"' +
        'class="btn btn-sm btn-info btn-outline altguncelle">' +
        '<i class="fas fa-edit"></i><span class="d-none d-sm-inline"> Düzenle</span>' +
        '</button></div></td> </tr>';

    }));
    var content = '<div class="card">' +
    '<div class="card-body">' +
    '<div class="row">' +
    '<div class="col-md-12">' +
    '<h4 class="m-b-lg">' +
    '<b>' + title + '</b> Kategorisi Alt Kategorileri Listesi' +
    '</h4>' +
    '</div>' +
    ' <div class="col-md-12">' +
    '<div class="widget p-lg">' +
    '<table class="table  tablealt' + altid + ' dataTable table-responsive table-hover table-striped table-bordered alt-container">' +
    '<thead>' +
    '<th data-orderable="false" class="order"><i class="fas fa-bars"></i></th>' +
    '<th class="w50">Sıra</th>' +
    '<th>Üst Kategori</th>' +
    '<th>Başlık</th>' +
    '<th>Durumu</th>' +
    '<th data-orderable="false" class="tex-center">Alt Kategori</th>' +
    '<th data-orderable="false">İşlem</th>' +
    '</thead>' +
    '<tbody class="sortable" data-sirano="' + altid + '" data-sorttableid="' + altid + '" data-url="' + geturl + 'rankSetter_kategoriler">' + alticerikliste +
    '</tbody></table>' +
    '</div></div></div></div></div>' +
    '<div id="altliste' + altid + '" status="false">' +
    '</div></div></div>';

    if (durum == "true" && altid == sonid) {
        content = "";
        $(myid).attr("status", "false");
        $(myid).removeAttr('addid')
    } else if (durum == "true" && altid != sonid) {
        $(myid).attr('addid', altid);
        $(myid).attr('status', "true");
    } else {
        $(myid).attr('status', "true");
        $(myid).attr('addid', altid);
    }


    $(myid).html(content);
    $(".tablealt" + altid).DataTable({
        "columnDefs": [
        {orderable: false, targets: 0},
        {orderable: false, targets: 1},
        {orderable: true, targets: 2},
        {orderable: true, targets: 3},
        {orderable: true, targets: 4},
        {orderable: false, targets: 5},

        ],
        "order": [[2, 'asc']],
        "language": {
            "url": "//cdn.datatables.net/plug-ins/1.10.22/i18n/Turkish.json"
        }
    });
    var elems = document.querySelectorAll('.altactive' + altid);
    for (var i = 0; i < elems.length; i++) {
        var switchery = Switchery(elems[i]);
    }

    var elemsSort = document.querySelectorAll('.sortable');
    $.each(elemsSort, function () {
        $(this).sortable();
    })
});
$(".table").DataTable({
    "columnDefs": [
    {orderable: false, targets: 0},
    {orderable: true, targets: 1},
    {orderable: true, targets: 2},
    {orderable: true, targets: 3},
    {orderable: true, targets: 4},
    {orderable: false, targets: 5},

    ],
    "order": [[5, 'asc']],
    "language": {
        "url": "//cdn.datatables.net/plug-ins/1.10.22/i18n/Turkish.json"
    }
});

</script>
