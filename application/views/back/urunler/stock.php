<?php $this->load->view('back/include/header'); ?>
<?php $this->load->view('back/include/sidebar'); ?>
    <input type="hidden" id="homepage" value="<?= base_url() ?>">
    <input type="hidden" id="urunid" value="<?= $urun->id ?>">
    <div class="row">
        <div class="card">
            <div class="card-body">

                <div class="col-md-12 ">
                    <div class="row">
                        <div class="d-flex justify-content-center">


                            <?php foreach ($secenekler as $secenek) { ?>

                                <div class="form-label-group in-border">
                                    <div class="form-group border" id="urunetiket<?= $secenek['id'] ?>">
                                        <div class=" p-3 mx-2">
                                            <select multiple="multiple" id="option<?= $secenek['id'] ?>"
                                                    name="my-select[]" class="searchable">
                                                <?= selectBoxAltSecenekler($secenek['id']) ?>
                                            </select>
                                            <label for="urunetiket<?= $secenek['id'] ?>"><?= $secenek['name'] ?>
                                                Seçenekleri</label>
                                        </div>
                                    </div>
                                </div>
                            <?php } ?>

                        </div>

                    </div>

                </div>
            </div>
        </div>


    </div>


    <div class="row">
        <div class="col-md-12 ">
            <div class="card">
                <div class="card-body">
                    <div id="altliste">


                    </div>
                    <button type="submit" disabled="true" id="yukle" class="btn btn-primary">Kaydet</button>
                    <button type="button" class="btn btn-danger" data-dismiss="modal">İptal</button>
                </div>
            </div>
        </div>
    </div>

<?php $this->load->view('back/include/footer'); ?>