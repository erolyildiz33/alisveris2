<?php $this->load->view('back/include/header');?>
<?php $this->load->view('back/include/sidebar');?>
<style type="text/css">
	.custom-file-label::after {
  content: "Gözat"!important;
}
</style>
<div class="row">


	<div class="col-md-6">

		<div class="card">
			<div class="card-body">
				<form action="<?=base_url('admin/save_config')?>" method="post" autocomplete="off" enctype="multipart/form-data">
					<div class="row">
						<div class="col-sm-12">
							<div class="form-group">
								<label>Site Adı</label>
								<input type="text" value="<?=$config->title?>" class="form-control" name="title" placeholder="Site Adı" required>
								<input type="hidden" name="configid" value="<?=$config->id?>">
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-sm-12">
							<div class="form-group">
								<label>Mail Adresi</label>
								<input type="email" class="form-control" value="<?=$config->mail?>" name="mail" placeholder="Mail Adresi" required>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-sm-12">
							<div class="form-group">
								<label>Adres</label>
								<textarea name="info"class="form-control" rows="3" required><?=$config->info?></textarea> 
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-sm-6">

						
							<div class="custom-file">
								<input type="file" name="logo" class="custom-file-input" id="logo">
								<label class="custom-file-label" for="logo">Site Logo</label>
								

							</div>
						</div>
						<div class="col-sm-6">
							<div class="custom-file">
								<input type="file" name="icon" class="custom-file-input" id="icon">
								<label class="custom-file-label" for="icon">Site İkon</label>
								
							</div>
						</div>
					</div>
					<div class="row">

						<div class="col-sm-6">
							<div class="form-group">
								<label>Facebook</label>
								<input type="text" name="facebook" value="<?=$config->facebook?>" class="form-control">
								

							</div>
						</div>

						<div class="col-sm-6">
							<div class="form-group">
								<label>Twitter</label>
								<input type="text" name="twitter" value="<?=$config->twitter?>" class="form-control">

							</div>
						</div>
					</div>
					<div class="row">


						<div class="col-sm-6">
							<div class="form-group">
								<label>Youtube</label>
								<input type="text" name="youtube" value="<?=$config->youtube?>" class="form-control">

							</div>	
						</div>
						<div class="col-sm-6">
							<div class="form-group">
								<label>Instagram</label>
								<input type="text" name="instagram" value="<?=$config->instagram?>" class="form-control">

							</div>
						</div>
					</div>

				</div>
				<!-- /.card-body -->

				<div class="card-footer">
					<button type="submit" class="btn btn-primary btn-flat btn-block">Güncelle</button>
				</div>
			</form>
		</div>
	</div>
</div>
</div>


<?php $this->load->view('back/include/footer');?>