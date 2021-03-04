var csrf_value = $("#csrf_test_name").data("csrf");
var csrf_test_name = 'csrf_test_name';
$(".sortable").sortable();
$('[data-switchery]').each(function () {
    var $this = $(this),
    color = $this.attr('data-color') || '#188ae2',
    jackColor = $this.attr('data-jackColor') || '#ffffff',
    size = $this.attr('data-size') || 'default'

    new Switchery(this, {
        color: color,
        size: size,
        jackColor: jackColor
    });
});
AjaxGet = function (url) {
    var result = $.ajax({
        type: "get",
        url: url,
        param: '{}',
        contentType: "application/json; charset=utf-8",
        dataType: "json",
        async: false,
        success: function (data) {

        }
    }).responseText;
    return result;
}

AjaxPost = function (url, postdata) {
    var result = $.ajax({
        type: "post",
        url: url,
        data: postdata,
        async: false,
        success: function (data) {

        }
    }).responseText;
    return result;
}


$(document).on("click", ".iptalaltekle", function () {
    $("#altekle").html("");
    $("#altekle").attr("status", "false");
    $("#altekle").removeAttr('addid');

});

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
            '<button data-altid="' + element.id + '"style="margin-left: 10px;float: left;"' +
            'data-geturl="' + geturl + '"' +
            'data-getustid="' + altid + '"' +
            'data-title="' + element.ustname + '"' +
            'class="btn btn-sm btn-warning btn-outline add-btn altgetir" data-analiste="evet">' +
            '<i class="fa fa-cog"></i> Alt Kategori İşlemleri' +
            '</button>'
            : " ";
            alticerikliste += '<tr>' +

            '<td>' + element.ustname + '</td>' +
            '<td>' + element.title + '</td>' +
            '<td class="text-center w100">' +
            '<input data-url="' + geturl + 'isActiveSetter/' + element.id + '"' +
            'class="isActive altactive' + altid + '" type="checkbox" data-switchery data-color="#10c469" ' + checked + ' /></td>' +
            '<td class="w400 text-center">' +
            '<div class="text-center" style="margin-left: 30px;">' +
            '<a data-altid="' + element.id + '" data-title="' + element.title + '"' +
            'data-url="' + geturl + "save_subcategory" + '"' +

            'style="float: left;"' +
            'class="btn btn-sm btn-success btn-outline add-btn altekle" data-analiste="evet">' +
            '<i class="fa fa-plus"></i> Alt Kategori Ekle </a>' +
            mylist +
            ' </div>' +
            '</td>' +
            '<td class="text-center w300" >' +
            '<button ' +
            'data-url="' + geturl + 'delete/' + element.id + '"' +
            ' class="btn btn-sm btn-danger btn-outline remove-btn" style="margin-left: 30px;" data-analiste="evet">' +
            '<i class="fa fa-trash"></i> Sil ' +
            '</button> ' +
            '<button data-altid="' + element.id + '"' +
            'data-title="' + element.title + '"' +
            'data-url="' + geturl + 'categoriy_update/' + element.id + '"' +
            'class="btn btn-sm btn-info btn-outline altguncelle" data-analiste="evet">' +
            '<i class="fa fa-pencil-square-o"></i> Düzenle' +
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
        '<table class="table table-hover table-striped table-bordered alt-container">' +
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

$(document).on('click', '.altguncelle', function () {
    var altid = $(this).data("altid");
    var title = $(this).data("title");
    var url = $(this).data("url");
    var durum = $("#altekle").attr('status');
    var sonid = $("#altekle").attr('addid');
    var ekle = '<div class="card">'+
    '<div class="card-body">' +
    '<div class="row">'+
    '<div class="col-md-12">' +
    '<h4 class="m-b-lg">' +
    '<b>' + title + '</b> Kategorisini düzenliyorsunuz' +
    '</h4>' +
    '</div>' +
    '<div class="col-md-12">' +
    '<div class="widget">' +
    '<div class="widget-body">' +
    '<form action="' + url + '" method="post"  autocomplete="off">' +
    '<input type="hidden" name="csrf_test_name" value="' + $("#csrf_test_name").data("csrf") + '">' +
    '<input type="hidden" name="anamenu" value="' + altid + '">' +
    '<div class="form-group">' +
    '<label>Başlık</label>' +
    '<input class="form-control" placeholder="Başlık" name="title" value="' + title + '">' +
    '</div>' +
    '<button type="submit" class="btn btn-primary btn-md btn-outline">Güncelle</button>' +
    '<span class="btn btn-md btn-danger btn-outline iptalaltekle">İptal</span>' +
    '</form></div></div></div></div></div></div>';

    if (durum == "true" && altid == sonid) {
        ekle = "";
        $("#altekle").attr("status", "false");
        $("#altekle").removeAttr('addid')
    } else if (durum == "true" && altid != sonid) {
        $("#altekle").attr('addid', altid);
        $("#altekle").attr('status', "true");
    } else {
        $("#altekle").attr('status', "true");
        $("#altekle").attr('addid', altid);
    }


    $("#altekle").html(ekle);
    sonid = "";

});


$(document).on('sortupdate', '.alt-container .sortable,.content-container .sortable, .image_list_container .sortable', function (event, ui) {

    var $data = $(this).sortable("serialize");
    var $data_url = $(this).data("url");
    var $data_sirano = $(this).data("sirano");


    $.post($data_url, {data: $data, csrf_test_name: csrf_value}, function (response) {
        if ($data_sirano == 0) {
            $('.sortable .sirano').each(function (i) {
                var humanNum = i + 1;
                $(this).html(humanNum + '');
            });
        } else {
            $('.sortable .sirano' + $data_sirano).each(function (i) {
                var humanNum = i + 1;
                $(this).html(humanNum + '');
            });
        }

        iziToast.success({
            title: 'Sıralama Değiştirme',
            message: 'Başarılı',
            position: 'topRight',

        });


    })

})
$(document).on('click', '.alt-container .remove-btn,.content-container .remove-btn, .image_list_container .remove-btn', function () {
    var $ana = $(this).data("analiste");
    var $data_url = $(this).data("url");

    swal({
        title: 'Emin misiniz?',
        text: "Bu işlemi geri alamayacaksınız!",
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Evet, Sil!',
        cancelButtonText: "Hayır"
    }).then(function (result) {
        if (result.value) {
            if ($ana) {
                window.location.href = $data_url;
            } else {
                $.post($data_url, {
                    csrf_test_name: csrf_value,
                }, function (response) {

                    $(".image_list_container").html(response);

                    $('[data-switchery]').each(function () {
                        var $this = $(this),
                        color = $this.attr('data-color') || '#188ae2',
                        jackColor = $this.attr('data-jackColor') || '#ffffff',
                        size = $this.attr('data-size') || 'default'

                        new Switchery(this, {
                            color: color,
                            size: size,
                            jackColor: jackColor
                        });
                    });


                    $(".sortable").sortable();
                    iziToast.success({
                        title: 'Resim Silme',
                        message: 'Başarılı',
                        position: 'topRight',

                    });

                });
            }

        }
    });

})


$(document).on('change', '.alt-container .isActive,.content-container .isActive, .image_list_container .isActive', function () {

    var $data = $(this).prop("checked");
    var $data_url = $(this).data("url");


    if (typeof $data !== "undefined" && typeof $data_url !== "undefined") {

        $.post($data_url, {
            data: $data, csrf_test_name: csrf_value

        }, function (response) {
            iziToast.success({
                title: 'Durum Değiştirme',
                message: 'Başarılı',
                position: 'topRight',

            });
        });

    }

})
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
        '<button data-altid="' + element.id + '"style="margin-left: 10px;float: left;"' +
        'data-geturl="' + geturl + '"' +
        'data-getustid="' + altid + '"' +
        'data-title="' + element.title + '"' +
        'class="btn btn-sm btn-warning btn-outline add-btn altgetir" data-analiste="evet">' +
        '<i class="fa fa-cog"></i> Alt Kategori İşlemleri' +
        '</button>'
        : " ";
        alticerikliste += '<tr id="ord-' + element.id + '">' +
        '<td class="order"><i class="fa fa-reorder"></i></td>' +
        '<td class="w50 text-center sirano' + altid + '">' + say++ + '</td>' +
        '<td>' + title + '</td>' +
        '<td>' + element.title + '</td>' +
        '<td class="text-center w100">' +
        '<input data-url="' + geturl + 'isActiveSetter/' + element.id + '"' +
        'class="isActive altactive' + altid + '" type="checkbox" data-switchery data-color="#10c469" ' + checked + ' /></td>' +
        '<td class="w400 text-center">' +
        '<div class="text-center" style="margin-left: 30px;">' +
        '<a data-altid="' + element.id + '" data-title="' + element.title + '"' +
        'data-url="' + geturl + "save_subcategory" + '"' +

        'style="float: left;"' +
        'class="btn btn-sm btn-success btn-outline add-btn altekle" data-analiste="evet">' +
        '<i class="fa fa-plus"></i> Alt Kategori Ekle </a>' +
        mylist +
        ' </div>' +
        '</td>' +
        '<td class="text-center w300" >' +
        '<button ' +
        'data-url="' + geturl + 'delete/' + element.id + '"' +
        ' class="btn btn-sm btn-danger btn-outline remove-btn" style="margin-left: 30px;" data-analiste="evet">' +
        '<i class="fa fa-trash"></i> Sil ' +
        '</button>' +
        '<button data-altid="' + element.id + '"' +
        'data-title="' + element.title + '"' +
        'data-url="' + geturl + 'categoriy_update/' + element.id + '"' +
        'class="btn btn-sm btn-info btn-outline altguncelle" data-analiste="evet">' +
        '<i class="fa fa-pencil-square-o"></i> Düzenle' +
        '</button></td> </tr>';

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
    '<table class="table table-hover table-striped table-bordered alt-container">' +
    '<thead>' +
    '<th class="order"><i class="fa fa-reorder"></i></th>' +
    '<th class="w50">Sıra</th>' +
    '<th>Üst Kategori</th>' +
    '<th>Başlık</th>' +
    '<th>Durumu</th>' +
    '<th>Alt Kategori</th>' +
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

$(document).on('click', '.altekle', function () {
    var altid = $(this).data("altid");
    var title = $(this).data("title");
    var url = $(this).data("url");
    var durum = $("#altekle").attr('status');
    var sonid = $("#altekle").attr('addid');
    var ekle = '<div class="card">'+
    '<div class="card-body">' +
    '<div class="row">' +
    '<div class="col-md-12">' +
    '<h4 class="m-b-lg">' +
    '<b>' + title + '</b> Kategorisine Alt Kategorisi Ekle' +
    '</h4>' +
    '</div>' +
    '<div class="col-md-12">' +
    '<div class="widget">' +
    '<div class="widget-body">' +
    '<form action="' + url + '" method="post"  autocomplete="off">' +
    '<input type="hidden" name="csrf_test_name" value="' + $("#csrf_test_name").data("csrf") + '">' +
    '<input type="hidden" name="anamenu" value="' + altid + '">' +
    '<div class="form-group">' +
    '<label>Başlık</label>' +
    '<input class="form-control" placeholder="Başlık" name="title">' +
    '</div>' +
    '<button type="submit" class="btn btn-primary btn-md btn-outline add_sub_category">Kaydet</button>' +
    '<span class="btn btn-md btn-danger btn-outline iptalaltekle">İptal</span>' +
    '</form>' +
    '</div>' +
    '</div>' +
    '</div>' +
    '</div></div></div>';


    if (durum == "true" && altid == sonid) {
        ekle = "";
        $("#altekle").attr("status", "false");
        $("#altekle").removeAttr('addid')
    } else if (durum == "true" && altid != sonid) {
        $("#altekle").attr('addid', altid);
        $("#altekle").attr('status', "true");
    } else {
        $("#altekle").attr('status', "true");
        $("#altekle").attr('addid', altid);
    }


    $("#altekle").html(ekle);
    sonid = "";

});

$(document).on('click', '.yeniekle', function () {
    var altid = $(this).data("altid");
    var url = $(this).data("url");
    var durum = $("#altekle").attr('status');
    var sonid = $("#altekle").attr('addid');
    var ekle =  '<div class="card">'+
    '<div class="card-body">' +
    '<div class="row">' +
    '<div class="col-md-12">' +
    '<h4 class="m-b-lg">' +
    '<b>Yeni</b> Kategori Ekle' +
    '</h4>' +
    '</div>' +
    '<div class="col-md-12">' +
    '<div class="widget">' +
    '<div class="widget-body">' +
    '<form action="' + url + '" method="post"  autocomplete="off">' +
    '<input type="hidden" name="csrf_test_name" value="' + $("#csrf_test_name").data("csrf") + '">' +
    '<div class="form-group">' +
    '<label>Başlık</label>' +
    '<input class="form-control" placeholder="Başlık" name="title">' +
    '</div>' +
    '<button type="submit" class="btn btn-primary btn-md btn-outline">Kaydet</button>' +
    '<span class="btn btn-md btn-danger btn-outline iptalaltekle">İptal</span>' +
    '</form>' +
    '</div>' +
    '</div>' +
    '</div>' +
    '</div></div></div>';


    if (durum == "true" && altid == sonid) {
        ekle = "";
        $("#altekle").attr("status", "false");
        $("#altekle").removeAttr('addid')
    } else if (durum == "true" && altid != sonid) {
        $("#altekle").attr('addid', altid);
        $("#altekle").attr('status', "true");
    } else {
        $("#altekle").attr('status', "true");
        $("#altekle").attr('addid', altid);
    }


    $("#altekle").html(ekle);
    sonid = "";

});

$(document).ready(function () {
    $(".image_list_container").on('change', '.isCover', function () {

        var $data = $(this).prop("checked");
        var $data_url = $(this).data("url");

        if (typeof $data !== "undefined" && typeof $data_url !== "undefined") {

            $.post($data_url, {data: $data, csrf_test_name: csrf_value}, function (response) {

                $(".image_list_container").html(response);

                $('[data-switchery]').each(function () {
                    var $this = $(this),
                    color = $this.attr('data-color') || '#188ae2',
                    jackColor = $this.attr('data-jackColor') || '#ffffff',
                    size = $this.attr('data-size') || 'default'

                    new Switchery(this, {
                        color: color,
                        size: size,
                        jackColor: jackColor
                    });
                });

                $(".sortable").sortable();
                iziToast.success({
                    title: 'Kapak Durumu Değiştirme',
                    message: 'Başarılı',
                    position: 'topRight',

                });
            });

        }

    })


    $(".button_usage_btn").change(function () {

        $(".button-information-container").slideToggle();

    })

    if (document.getElementById("dropzone")) {
        var uploadSection = Dropzone.forElement("#dropzone");

        uploadSection.on("sending", function (file, xhr, formData) {


            formData.append(csrf_test_name, csrf_value);

        });
        uploadSection.on("complete", function (file) {

            var $data_url = $("#dropzone").data("url");


            $.post($data_url, {
                csrf_test_name: csrf_value,
            }, function (response) {

                $(".image_list_container").html(response);

                $('[data-switchery]').each(function () {
                    var $this = $(this),
                    color = $this.attr('data-color') || '#188ae2',
                    jackColor = $this.attr('data-jackColor') || '#ffffff',
                    size = $this.attr('data-size') || 'default'

                    new Switchery(this, {
                        color: color,
                        size: size,
                        jackColor: jackColor
                    });
                });


                uploadSection.removeAllFiles();


                $(".sortable").sortable();
                iziToast.success({
                    title: 'Resim Ekleme',
                    message: 'Başarılı',
                    position: 'topRight',

                });

            });

        });

    }


})