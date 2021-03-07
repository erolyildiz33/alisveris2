<script type="text/javascript">
    function aramaYap(kelime) {
        $aramasonuc = AjaxPost( "/admin/findKategori", {
            title: kelime,
            csrf_test_name: csrf_value
        });

        if ($aramasonuc == "yok") {
            content = '<div class="alert alert-info text-center">' +
            '<p>Arama Sonucunda herhangi bir veri bulunmamıştır.</p>' +
            '</div>'

            $("#altliste").attr('status', "true");
            $("#altliste").attr('addid', altid);


            $("#altliste").html(content);


        } else if ($aramasonuc == "bos") {

        } else {
            var alticerikliste = "";

            var altid = "arama";
            var enust = 0;

            if (enust != 0) {
                myid = "#altliste" + enust;
            } else {
                myid = "#altliste";
            }

            var geturl = "";

            var durum = $(myid).attr('status');
            var sonid = $(myid).attr('addid');
            altmenuler = $.parseJSON($aramasonuc);
            var say = 1;
            $.each(altmenuler, (function (index, element) {
                checked = (element.isActive == 1) ? "checked" : " ";
                mylist = (AjaxGet(geturl + "getaltkategori/" + element.id)) ?
                '<button data-altid="' + element.id + '" style="margin-left: 1rem;"' +
                'data-geturl="' + geturl + '"' +
                'data-getustid="' + altid + '"' +
                'data-title="' + element.ustname + '"' +
                'class="btn btn-sm btn-warning btn-outline add-btn altgetir">' +
                '<i class="fa fa-cog"></i><span class="d-none d-sm-inline"> Alt Kategori İşlemleri</span>' +
                '</button>'
                : " ";
                alticerikliste += '<tr>' +

                '<td><strong>' + element.ustname + '</strong></td>' +
                '<td>' + element.title + '</td>' +
                '<td class="text-center w100">' +

                '<input data-url="' + geturl + 'isActiveSetter/' + element.id + '"' +
                'class="isActive altactive' + altid + '" type="checkbox" data-switchery data-color="#10c469" ' + checked + ' /></td>' +
                '<td class="w400 text-center">' +
                '<div class="d-flex justify-content-center" >'+
                '<button data-altid="' + element.id + '" data-title="' + element.title + '"' +
                'data-url="' + geturl + "save_subcategory" + '"' +
                'type="button" data-toggle="modal" data-target="#myModal"'+            
                'class="btn btn-sm btn-success btn-outline add-btn altekle" >' +
                '<i class="fa fa-plus"></i><span class="d-none d-sm-inline"> Alt Kategori Ekle</span></button>' +
                mylist +
                '</div> </div>' +
                '</td>' +
                '<td class="text-center w300" >' +
                '<div class="d-flex justify-content-center">'+
                '<button data-analiste="evet"' +
                'data-url="' + geturl + 'delete/' + element.id + '"' +
                ' class="btn btn-sm btn-danger btn-outline remove-btn"> ' +
                '<i class="fa fa-trash"></i><span class="d-none d-sm-inline"> Sil</span>' +
                '</button> ' +
                '<button data-altid="' + element.id + '" style="margin-left: 1rem;"' +
                'data-title="' + element.title + '"' +
                'data-url="' + geturl + 'categoriy_update/' + element.id + '"' +
                'class="btn btn-sm btn-info btn-outline altguncelle" >' +
                '<i class="fas fa-edit"></i><span class="d-none d-sm-inline"> Düzenle</span>' +
                '</button></td> </tr>';

            }));
            var content ='<div class="card">'+
            '<div class="card-body">' +
            '<div class="row">' +
            '<div class="col-md-12">' +
            '<h4 class="m-b-lg">' +
            '<b>' + $("#arama").val() + '</b> Kategorisi Arama Sonuçları' +
            '</h4>' +
            '</div>' +
            ' <div class="col-md-12">' +
            '<div class="widget p-lg">' +
            '<table class="table table-responsive table-hover table-striped table-bordered alt-container">' +
            '<thead>' +
            '<th>Üst Kategori</th>' +
            '<th>Başlık</th>' +
            '<th>Durumu</th>' +
            '<th>Alt Kategori</th>' +
            '<th>İşlem</th>' +
            '</thead>' +
            '<tbody>' + alticerikliste +
            '</tbody></table>' +
            '</div></div></div>' +
            '<div id="altliste' + altid + '" status="false">' +
            '</div></div></div>';
            $(myid).attr('status', "true");
            $(myid).attr('addid', altid);


            $(myid).html(content);
            var elems = document.querySelectorAll('.altactive' + altid);
            for (var i = 0; i < elems.length; i++) {
                var switchery = Switchery(elems[i]);
            }
        }
    }

    $("#arabuton").click(function(){
        aramaYap($("#arama").val());
        $("#arama").val("");
    });
    $("#arama").on('keypress', function (e) {
        if (e.which == 13) {
            if (window.location.pathname.split("/").pop() == "kategoriler") {
                aramaYap($(this).val());
            }
            $("#arama").val("");
        }
    });
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
     '<input class="form-control" placeholder="Başlık" name="title" autocomplete="off">' +
     '</div></div></div></div></div>';
     var footer='<button type="submit" class="btn btn-primary">Güncelle</button>' +
     '<button type="button" class="btn btn-danger" data-dismiss="modal">İptal</button>';
     $("#modalfooter").html(footer);
     $("#modalbody").html(ekle);
    });
    $(document).on('click', '.yeniekle', function () {
        var altid = $(this).data("altid");
        var url = $(this).data("url");
        $("#myModalLabel").html('<h2 class="modal-title"><b>Yeni</b> Seçenek Ekle</h2>');
        $("#modalform").attr("action",url);
        var ekle = '<div class="row">' +
        '<div class="col-md-12">' +
        '<div class="widget">' +
        '<div class="widget-body">' +    
        '<input type="hidden" name="csrf_test_name" value="' + $("#csrf_test_name").data("csrf") + '">' +
        '<input type="hidden" name="altid" value="' + altid + '">' +
        '<div class="form-group">' +   
        '<input class="form-control" placeholder="Seçenek Adı" name="name" autocomplete="off">' +
        '</div></div></div></div></div>';
        var footer='<button type="submit" class="btn btn-primary">Kaydet</button>' +
        '<button type="button" class="btn btn-danger" data-dismiss="modal">İptal</button>';
        $("#modalfooter").html(footer);
        $("#modalbody").html(ekle);
    });
    $(document).on('click', '.altguncelle', function () {
        var title = $(this).data("title");
        var altid = $(this).data("altid");
        var url = $(this).data("url");
        $("#myModalLabel").html('<h3 class="modal-title"><b>' + title + '</b> Seçeneğini düzenliyorsunuz</h3>');
        $("#modalform").attr("action",url);
        var ekle = '<div class="row">' +
        '<div class="col-md-12">' +
        '<div class="widget">' +
        '<div class="widget-body">' +    
        '<input type="hidden" name="csrf_test_name" value="' + $("#csrf_test_name").data("csrf") + '">' +
     
        '<div class="form-group">' +   
        '<input class="form-control" placeholder="Seçenek Adı" name="name" autocomplete="off" value="' + title + '">' +
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
        altmenuler = $.parseJSON(AjaxGet(geturl + "getaltkategori/" + altid));
        var say = 1;
        $.each(altmenuler, (function (index, element) {
            checked = (element.isActive == 1) ? "checked" : " ";
            mylist = (AjaxGet(geturl + "getaltkategori/" + element.id)) ?
            '<button data-altid="' + element.id + '"style="margin-left: 1rem;"' +
            'data-geturl="' + geturl + '"' +
            'data-getustid="' + altid + '"' +
            'data-title="' + element.title + '"' +
            'class="btn btn-sm btn-warning btn-outline add-btn altgetir">' +
            '<i class="fa fa-cog"></i><span class="d-none d-sm-inline"> Alt Kategori İşlemleri</span>' +
            '</button>'
            : " ";
            alticerikliste += '<tr id="ord-' + element.id + '">' +
            '<td class="order"><i class="fa fa-reorder"></i></td>' +
            '<td class="w50 text-center sirano' + altid + '">' + say++ + '</td>' +
            '<td><strong>' + title + '</strong></td>' +
            '<td>' + element.title + '</td>' +
            '<td class="text-center w100">' +
            '<input data-url="' + geturl + 'isActiveSetter/' + element.id + '"' +
            'class="isActive altactive' + altid + '" type="checkbox" data-switchery data-color="#10c469" ' + checked + ' /></td>' +
            '<td class="w400 text-center">' +
            '<div class="d-flex justify-content-center" >' +
            '<button data-altid="' + element.id + '" data-title="' + element.title + '"' +
            'type="button" data-toggle="modal" data-target="#myModal"'+
            'data-url="' + geturl + "save_subcategory" + '"' +

            'class="btn btn-sm btn-success btn-outline add-btn altekle">' +
            '<i class="fa fa-plus"></i><span class="d-none d-sm-inline"> Alt Kategori Ekle</span></button>' +
            mylist +
            ' </div>' +
            '</td>' +
            '<td class="text-center w300" >' +
            '<div class="d-flex justify-content-center">'+
            '<button data-analiste="evet"  data-url="' + geturl + 'delete/' + element.id + '"' +
            ' class="btn btn-sm btn-danger btn-outline remove-btn" >' +
            '<i class="fa fa-trash"></i><span class="d-none d-sm-inline"> Sil</span>' +
            '</button>' +
            '<button data-altid="' + element.id + '"' +
            'type="button" data-toggle="modal" data-target="#myModal"'+
            'style="margin-left: 1rem;"'+
            'data-title="' + element.title + '"' +
            'data-url="' + geturl + 'categoriy_update/' + element.id + '"' +
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
        '<table class="table table-responsive table-hover table-striped table-bordered alt-container">' +
        '<thead>' +
        '<th class="order"><i class="fa fa-reorder"></i></th>' +
        '<th class="w50">Sıra</th>' +
        '<th>Üst Kategori</th>' +
        '<th>Başlık</th>' +
        '<th>Durumu</th>' +
        '<th class="tex-center">Alt Kategori</th>' +
        '<th>İşlem</th>' +
        '</thead>' +
        '<tbody class="sortable" data-sirano="' + altid + '" data-sorttableid="' + altid + '" data-url="' + geturl + 'rankSetter">' + alticerikliste +
        '</tbody></table>' +
        '</div></div></div>' +
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
</script>