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
				<form action="<?=base_url('admin/save_ayarlar')?>" method="post" autocomplete="off" enctype="multipart/form-data">
					<div class="row">


<!--	<div class="form-label-group">

									<select id="ex3">

										<option selected>Choose...</option>

										<option value="1">One</option>

										<option value="2">Two</option>

										<option value="3">Three</option>

									</select>

									<label for="ex3" >Floating Label</label>

								</div>
								!-->





								<div class="col-sm-12">
									<div class="form-group">
										<div class="form-label-group in-border">
											<input type="text" id="title" value="<?=$config->title?>" class="form-control" name="title" placeholder="Site Adı" required />
											<label for="title">Site Adı</label>
										</div>
										<input type="hidden" name="configid" value="<?=$config->id?>">
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-sm-12">
									<div class="form-group"><div class="form-label-group in-border">								
										<input type="email" class="form-control" value="<?=$config->mail?>" name="mail" id="mail" placeholder="Mail Adresi" required>
										<label for="mail">Mail Adresi</label>
									</div>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-sm-12">
								<div class="form-group"><div class="form-label-group in-border">								
									<textarea placeholder="Adres" name="info" id="info" class="form-control" rows="3" required><?=$config->info?></textarea> 
									<label for="info">Adres</label>
								</div>
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
					<div class="row mt-3">
						<div class="col-sm-6">
							<div class="form-group">
								<div class="form-label-group in-border">
									<input type="text" id="facebook" placeholder="Facebook" name="facebook" value="<?=$config->facebook?>" class="form-control">
									<label for="facebook">Facebook</label>
								</div>
							</div>
						</div>
						<div class="col-sm-6">
							<div class="form-group">
								<div class="form-label-group in-border">

									<input type="text" id="twitter" placeholder="Twitter" name="twitter" value="<?=$config->twitter?>" class="form-control">
									<label for="twitter">Twitter</label>
								</div>
							</div>
						</div>
					</div>
					<div class="row">


						<div class="col-sm-6">
							<div class="form-group">
								<div class="form-label-group in-border">

									<input type="text" id="youtube" placeholder="Youtube" name="youtube" value="<?=$config->youtube?>" class="form-control">
									<label for="youtube">Youtube</label>
								</div>	
							</div>
						</div>
						<div class="col-sm-6">
							<div class="form-group">
								<div class="form-label-group in-border">

									<input type="text"  id="instagram" placeholder="Instagram" name="instagram" value="<?=$config->instagram?>" class="form-control">
									<label for="instagram">Instagram</label>
								</div>
							</div>
						</div>

					</div>
				</div>

				<div class="card-footer">
					<button type="submit" class="btn btn-primary btn-flat btn-block">Güncelle</button>
				</div>
			</form>
		</div>
	</div>
</div>
</div>


<?php $this->load->view('back/include/footer');?>