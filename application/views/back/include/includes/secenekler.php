<!-- DataTables -->
<link rel="stylesheet" href="<?= base_url('assets/back') ?>/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
<link rel="stylesheet"
      href="<?= base_url('assets/back') ?>/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
<link rel="stylesheet" href="<?= base_url('assets/back') ?>/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">

<!-- DataTables  & Plugins -->
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
<script type="text/javascript">

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
            '<input class="form-control" placeholder="Başlık" id="title" name="title" autocomplete="off">' +
            '<label for="title">' + alt + ' Seçenek Adı</label>' +
            '</div>' +

            '</div></div></div></div></div>';
        var footer = '<button type="submit" class="btn btn-primary">Güncelle</button>' +
            '<button type="button" class="btn btn-danger" data-dismiss="modal">İptal</button>';
        $("#modalfooter").html(footer);
        $("#modalbody").html(ekle);
    });
    $(document).on('click', '.yeniekle', function () {
        var altid = $(this).data("altid");
        var url = $(this).data("url");
        let alt = ($(this).data("ustmenu") == 0) ? "" : "Alt ";
        let title=(alt?$(this).data("title")+'</b> Yeni Alt':"Yeni</b> ");
        $("#myModalLabel").html('<h2 class="modal-title"><b>'+title+' Seçenek Ekle</h2>');
        $("#modalform").attr("action", url);
        var ekle = '<div class="row">' +
            '<div class="col-md-12">' +
            '<div class="widget">' +
            '<div class="widget-body">' +
            '<input type="hidden" name="csrf_test_name" value="' + $("#csrf_test_name").data("csrf") + '">' +
            '<input type="hidden" name="altid" value="' + altid + '">' +
            '<div class="form-group">' +

            '<div class="form-label-group in-border">' +
            '<input class="form-control" placeholder="' + alt + 'Seçenek Adı" id="name" name="name" autocomplete="off">' +
            '<label for="name">' + alt + 'Seçenek Adı</label>' +
            '</div>' +

            '</div></div></div></div></div>';
        var footer = '<button type="submit" class="btn btn-primary">Kaydet</button>' +
            '<button type="button" class="btn btn-danger" data-dismiss="modal">İptal</button>';
        $("#modalfooter").html(footer);
        $("#modalbody").html(ekle);
    });
    $(document).on('click', '.altguncelle', function () {
        var title = $(this).data("title");
        var altid = $(this).data("altid");
        var url = $(this).data("url");
        var ustid = $(this).data("ustid");
        let alt = ($(this).data("ustmenu") == 0) ? "" : "Alt ";
        $("#myModalLabel").html('<h4 class="modal-title"><b>' + title + '</b> ' + alt + ' Seçeneğini düzenliyorsunuz</h4>');
        $("#modalform").attr("action", url);
        var ekle = '<div class="row">' +
            '<div class="col-md-12">' +
            '<div class="widget">' +
            '<div class="widget-body">' +
            '<input type="hidden" name="csrf_test_name" value="' + $("#csrf_test_name").data("csrf") + '">' +
            '<input type="hidden" name="ustid" value="' + ustid + '">' +
            '<input type="hidden" name="altid" value="' + altid + '">' +
            '<div class="form-group">' +

            '<div class="form-label-group in-border">' +
            '<input class="form-control" placeholder="' + alt + 'Seçenek Adı" id="name" name="name" autocomplete="off" value="' + title + '">' +
            '<label for="name">' + alt + 'Seçenek Adı</label>' +
            '</div>' +

            '</div></div></div></div></div>';
        var footer = '<button type="submit" class="btn btn-primary">Güncelle</button>' +
            '<button type="button" class="btn btn-danger" data-dismiss="modal">İptal</button>';
        $("#modalfooter").html(footer);
        $("#modalbody").html(ekle);
    });
    $(document).on('click', '.altgetir', function () {

        let alticerikliste = "";
        let altid = $(this).data("altid");
        let myid = "#altliste";
        let title = $(this).data("title");
        let geturl = $(this).data("geturl");
        let durum = $(myid).attr('status');
        let sonid = $(myid).attr('addid');
        let durumvarmi = AjaxGet(geturl + "getAlt_secenekler/" + altid);
        let altmenuler = (durumvarmi) ? $.parseJSON(durumvarmi) : "";
        let say = 1;

        $.each(altmenuler, (function (index, element) {
            alticerikliste += '<tr>' +
                '<td class="w50 text-center sirano' + altid + '">' + say++ + '</td>' +
                '<td class="text-center">' + element.name + '</td>' +
                '</td>' +
                '<td class="text-center w300" >' +
                '<div class="d-flex justify-content-center">' +
                '<button data-analiste="evet"  data-url="' + geturl + 'delete_sub_secenekler/' + element.id + '"' +
                ' class="btn btn-sm btn-danger btn-outline remove-btn" >' +
                '<i class="fa fa-trash"></i><span class="d-none d-sm-inline"> Sil</span>' +
                '</button>' +
                '<button data-altid="' + element.id + '"' +
                'type="button" data-toggle="modal" data-target="#myModal"' +
                'style="margin-left: 1rem;"' +
                'data-title="' + element.name + '"' +
                'data-ustid="' + altid + '"' +
                'data-url="' + geturl + 'update_sub_secenekler/' + element.id + '"' +
                'class="btn btn-sm btn-info btn-outline altguncelle">' +
                '<i class="fas fa-edit"></i><span class="d-none d-sm-inline"> Düzenle</span>' +
                '</button></div></td> </tr>';

        }));
        let content = '<div class="card">' +
            '<div class="card-body">' +
            '<div class="row">' +
            '<div class="col-sm-12">' +
            '<div class="float-sm-right my-2">' +
            ' <button data-altid="' + altid + '" data-toggle="modal" data-target="#myModal"' +

            '  data-url="' + geturl + 'save_sub_secenekler/' + altid + '"' +'data-title="' + title + '"' +
            ' class="btn btn-outline btn-primary  btn-xs-block yeniekle">' +
            '  <i class="fa fa-plus"></i>  Yeni Ekle' +
            ' </button></div></div>' +
            '<div class="col-md-12">' +
            '<h4 class="m-b-lg">' +
            '<b>' + title + '</b> Alt Seçenekleri Listesi' +
            '</h4>' +
            '</div>' +
            ' <div class="col-md-12">' +
            '<div class="widget p-lg">' +
            '<table class="table tablealt table-responsive table-hover table-striped table-bordered alt-container dataTable">' +
            '<thead>' +
            '<th class="w50" data-orderable="false">Sıra</th>' +
            '<th>Alt Seçenek Adı</th>' +
            '<th data-orderable="false">İşlem</th>' +
            '</thead>' +
            '<tbody>' + alticerikliste +
            '</tbody></table>' +
            '</div></div></div>' +
            '</div></div>';

        let menuyok = '<div class="card">' +
            '<div class="card-body">' +
            '<div class="row">' +
            '<div class="mx-auto">' +
            '<div class="alert alert-info text-center ">' +
            '<p>Burada herhangi bir veri bulunmamaktadır. Eklemek için lütfen <span class="text-danger yeniekle"' +
            ' data-altid="' + altid + '" data-toggle="modal" data-target="#myModal"' +
            'data-title="' + title + '"' +
            '  data-url="' + geturl + 'save_sub_secenekler/' + altid + '">tıklayınız</span></p>' +
            '  </div></div></div></div></div>';


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


        if (altmenuler != "") $(myid).html(content); else $(myid).html(menuyok);
        $(".tablealt").DataTable({
            "columnDefs": [
                {orderable: false, targets: 0},
                {orderable: true, targets: 1},
                {orderable: false, targets: 2},

            ],
            "order": [[1, 'asc']],
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
            {orderable: false, targets: 0},
            {orderable: true, targets: 1},
            {orderable: true, targets: 2},
            {orderable: false, targets: 3},
        ],
        "order": [[1, 'asc']],

        "language": {
            "url": "//cdn.datatables.net/plug-ins/1.10.22/i18n/Turkish.json"
        },

    });
</script>