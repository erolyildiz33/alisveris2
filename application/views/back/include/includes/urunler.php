
<!-- DataTables -->
<link rel="stylesheet" href="<?=base_url('assets/back')?>/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
<link rel="stylesheet" href="<?=base_url('assets/back')?>/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
<link rel="stylesheet" href="<?=base_url('assets/back')?>/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/css/bootstrap-select.min.css">
<!-- DataTables  & Plugins -->
<script src="<?=base_url('assets/back')?>/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="<?=base_url('assets/back')?>/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="<?=base_url('assets/back')?>/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="<?=base_url('assets/back')?>/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="<?=base_url('assets/back')?>/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="<?=base_url('assets/back')?>/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script src="<?=base_url('assets/back')?>/plugins/jszip/jszip.min.js"></script>
<script src="<?=base_url('assets/back')?>/plugins/pdfmake/pdfmake.min.js"></script>
<script src="<?=base_url('assets/back')?>/plugins/pdfmake/vfs_fonts.js"></script>
<script src="<?=base_url('assets/back')?>/plugins/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="<?=base_url('assets/back')?>/plugins/datatables-buttons/js/buttons.print.min.js"></script>
<script src="<?=base_url('assets/back')?>/plugins/datatables-buttons/js/buttons.colVis.min.js"></script>




<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/js/bootstrap-select.min.js"></script>
<script type="text/javascript">

    $(document).on('click', '.altekle', function () {  
     var title = $(this).data("title");
     var altid = $(this).data("altid");
     var url = $(this).data("url");
     $("#myModalLabel").html('<h4 class="modal-title"><b>' + title + '</b> Kategorisine Alt Kategorisi Ekle</h4>');
     $("#modalform").attr("action",url);
     var ekle = '<div class="row">' +
     '<div class="col-md-12">' +
     '<div class="widget">' +
     '<div class="widget-body">' +    
     '<input type="hidden" name="csrf_test_name" value="' + $("#csrf_test_name").data("csrf") + '">' +
     '<input type="hidden" name="anamenu" value="' + altid + '">' +
     '<div class="form-group">' + 
     '<input class="form-control"  name="title" autocomplete="off">' +
     '</div>'+














     '</div></div></div></div>';
     var footer='<button type="submit" class="btn btn-primary">Güncelle</button>' +
     '<button type="button" class="btn btn-danger" data-dismiss="modal">İptal</button>';
     $("#modalfooter").html(footer);
     $("#modalbody").html(ekle);
 });
    $(document).on('click', '.yeniekle', function () {
        var altid = $(this).data("altid");
        var url = $(this).data("url");
        let kategoriler=$(this).data("kategoriler");
        $("#myModalLabel").html('<h2 class="modal-title"><b>Yeni</b> Ürün Ekle</h2>');
        $("#modalform").attr("action",url);
        var ekle = '<div class="row">' +
        '<div class="col-md-12">' +
        '<div class="widget">' +
        '<div class="widget-body">' +    
        '<input type="hidden" name="csrf_test_name" value="' + $("#csrf_test_name").data("csrf") + '">' +
        '<input type="hidden" name="altid" value="' + altid + '">' +
        '<div class="form-group">' +   
        '<input class="form-control" placeholder="Ürün Adı" name="title" autocomplete="off"></div>' +

        '<div class="form-group">' + 
        '<select class="selectpicker js-states form-control" name="category" data-live-search="true" data-width="100%" data-style="btn-danger" name="kategori_ustid">'+
        ' <option value="" selected disabled hidden></option>'+kategoriler+
        '</select>'+
        '</select></div>'+
        '<div class="form-group">' +   
        '<input type="number" class="form-control" placeholder="Ürün Fiyatı" name="price" autocomplete="off"></div>' +
        '<div class="form-group">' +   
        '<input type="number" class="form-control" placeholder="Ürün İndirimli Fiyatı" name="dicount" autocomplete="off"></div>' +
        '<div class="form-group">' +  
        '<input type="text" class="form-control" placeholder="Ürün Tag" name="tag" autocomplete="off"></div>' +

        '</div></div></div></div></div>';
        var footer='<button type="submit" class="btn btn-primary">Kaydet</button>' +
        '<button type="button" class="btn btn-danger" data-dismiss="modal">İptal</button>';
        $("#modalfooter").html(footer);
        $("#modalbody").html(ekle);

        $(".selectpicker").selectpicker({noneSelectedText: "Kategori Seçiniz"});


    });
    $(document).on('click', '.altguncelle', function () {
        var title = $(this).data("title");
        var altid = $(this).data("altid");
        var url = $(this).data("url");
        $("#myModalLabel").html('<h3 class="modal-title"><b>' + title + '</b> Kategorisini düzenliyorsunuz</h3>');
        $("#modalform").attr("action",url);
        var ekle = '<div class="row">' +
        '<div class="col-md-12">' +
        '<div class="widget">' +
        '<div class="widget-body">' +    
        '<input type="hidden" name="csrf_test_name" value="' + $("#csrf_test_name").data("csrf") + '">' +
        '<input type="hidden" name="anamenu" value="' + altid + '">' +
        '<div class="form-group">' +   
        '<input class="form-control" placeholder="Başlık" name="title" autocomplete="off" value="' + title + '">' +
        '</div></div></div></div></div>';
        var footer='<button type="submit" class="btn btn-primary">Güncelle</button>' +
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
        let durumvarmi=AjaxGet(geturl + "getAlt_kategoriler/" + altid);


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
            'type="button" data-toggle="modal" data-target="#myModal"'+
            'data-url="' + geturl + "save_sub_kategoriler" + '"' +

            'class="btn btn-sm btn-success btn-outline add-btn altekle">' +
            '<i class="fa fa-plus"></i><span class="d-none d-sm-inline"> Alt Kategori Ekle</span></button>' +
            mylist +
            ' </div>' +
            '</td>' +
            '<td class="text-center w300" >' +
            '<div class="d-flex justify-content-center">'+
            '<button data-analiste="evet"  data-url="' + geturl + 'delete_kategoriler/' + element.id + '"' +
            ' class="btn btn-sm btn-danger btn-outline remove-btn" >' +
            '<i class="fa fa-trash"></i><span class="d-none d-sm-inline"> Sil</span>' +
            '</button>' +
            '<button data-altid="' + element.id + '"' +
            'type="button" data-toggle="modal" data-target="#myModal"'+
            'style="margin-left: 1rem;"'+
            'data-title="' + element.title + '"' +
            'data-url="' + geturl + 'update_kategoriler/' + element.id + '"' +
            'class="btn btn-sm btn-info btn-outline altguncelle">' +
            '<i class="fas fa-edit"></i><span class="d-none d-sm-inline"> Düzenle</span>' +
            '</button></div></td> </tr>';

        }));
        var content = '<div class="card">'+
        '<div class="card-body">' +
        '<div class="row">' +
        '<div class="col-md-12">' +
        '<h4 class="m-b-lg">' +
        '<b>' + title + '</b> Kategorisi Alt Kategorileri Listesi' +
        '</h4>' +
        '</div>' +
        ' <div class="col-md-12">' +
        '<div class="widget p-lg">' +
        '<table class="table  tablealt'+altid+' dataTable table-responsive table-hover table-striped table-bordered alt-container">' +
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
        $(".tablealt"+altid).DataTable({
            "columnDefs": [
            { orderable: false, targets: 0 },
            { orderable: false, targets: 1 },
            { orderable: true, targets: 2 },
            { orderable: true, targets: 3 },
            { orderable: true, targets: 4 },

            ],
            "order":[[ 1, 'asc' ]],
            "language": {
                "url": "//cdn.datatables.net/plug-ins/1.10.22/i18n/Turkish.json"
            }
        });
        var elems = document.querySelectorAll('.altactive' + altid);
        for (var i = 0; i < elems.length; i++) {
            var switchery = Switchery(elems[i]);
        }
        ;
        var elemsSort = document.querySelectorAll('.sortable');
        $.each(elemsSort, function () {
            $(this).sortable();
        })
    });
$(".table").DataTable({
    "columnDefs": [
    { orderable: false, targets: 0 },
    { orderable: false, targets: 1 },
    { orderable: true, targets: 2 },
    { orderable: true, targets: 3 },
    { orderable: true, targets: 4 },

    ],
    "order":[[ 1, 'asc' ]],
    "language": {
        "url": "//cdn.datatables.net/plug-ins/1.10.22/i18n/Turkish.json"
    }
});
</script>