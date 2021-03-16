<?php $this->load->view('back/include/header'); ?>
<?php $this->load->view('back/include/sidebar'); ?>
<input type="hidden" id="homepage" value="<?= base_url() ?>">
<input type="hidden" id="urunid" data-options="<?= $urun->options ?>" value="<?= $urun->id ?>">
<div class="row">
    <div class="col-md-12 ">
        <div class="card">
            <div class="card-body">

                <div class="d-flex justify-content-center">

                    <div class="row">

                        <?php foreach ($secenekler as $secenek) { ?>
                            <div class="col-md-4">
                                <span>Table Header</span>
                                <select id="tableHeader" class="select2 select2-multiple" style="width: 100%" multiple="multiple" data-placeholder="Choose">      
                                   <?= selectBoxSecenekler($secenek['id']) ?>           
                               </select>
                           </div>



                       <?php } ?>



                       <div class="col-md-12">    
                           <div class="d-flex justify-content-center">
                               <div class="row">
                                <?php foreach ($secenekler as $secenek) { ?>
                                    <div class="<?=(count($secenekler)==1)?"col-md-12":"col-md-6"?> col-xs-12">
                                        <div class="form-label-group in-border">
                                            <div class="form-group border rounded " id="urunetiket<?= $secenek['id'] ?>">
                                                <div class=" p-3 mx-2">
                                                    <select multiple="multiple" data-optionname="<?= $secenek['name'] ?>"
                                                        id="secenek<?= $secenek['id'] ?>"
                                                        name="secenek<?= $secenek['id'] ?>[]" class="searchable">
                                                        <?= selectBoxAltSecenekler($secenek['id']) ?>
                                                    </select>
                                                    <label for="urunetiket<?= $secenek['id'] ?>"><?= $secenek['name'] ?>
                                                Seçenekleri</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php } ?>
                        </div>
                    </div>
                    <div class="d-flex justify-content-center">
                        <div class="d-flex justify-content-end">
                            <input disabled type="checkbox" checked data-toggle="toggle" id="toplumu" name="toplumu"
                            data-on="Toplu" data-off="Tekil" data-onstyle="success" data-offstyle="danger">
                        </div>
                        <div class="col-md-4" style="min-height: 3.5em;">
                            <div class="form-group" id="toplamstoktag">
                                <div class="form-label-group in-border">
                                    <input class="form-control" name="toplamstok" id="toplamstok" autocomplete="off">
                                    <label for="toplamstok">Toplu Stok Miktarı</label>
                                </div>
                            </div>
                        </div>
                    </div>


                    <div id="altliste">


                    </div>
                    <input type="hidden" name="urunid" value="<?= $urun->id ?>">
                    <div class="d-flex justify-content-end mt-2">
                        <button type="button" id="yukle" class="btn btn-primary mr-2">Kaydet</button>
                        <a href="<?= base_url("admin/urunler") ?>" class="btn btn-danger">İptal</a>
                    </div>
                </div>
            </div>


        </div>

    </div>
</div>

<style type="text/css">
    .test {

        line-height: 0;
        margin-top: 40px;
    }

    .test .baslik {
        background-color: #ffffff;
        padding: 0 10px;
        margin: 0 20px;
        font-size: 1em;
        font-weight: 700;
        color: #6c757d;

    }

</style>

<?php $this->load->view('back/include/footer'); ?>