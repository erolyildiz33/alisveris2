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