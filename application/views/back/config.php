<?php $this->load->view('back/include/header');?>
<?php $this->load->view('back/include/sidebar');?>

<div class="row">


	<div class="col-md-6">
		<div class="card card-primary">
			<form action="<?=base_url('admin/save_config')?>" autocomplete="off">
				<div class="card-body">
					<div class="form-group">
						<label>Site Adı</label>
						<input type="text" class="form-control" name="title" placeholder="Site Adı">
					</div>
					<div class="form-group">
						<label>Mail Adresi</label>
						<input type="mail" class="form-control" name="mail" placeholder="Mail Adresi">
					</div>
					<div class="form-group">
						<label>Adres</label>
						<textarea name="info"class="form-control" rows="3"></textarea> 
					</div>
					<div class="row">
						<div class="col-xs-6">
							
							<label>Site Logo</label>
							<input type="file" name="icon" class="form-control">
							
						</div>
						<div class="col-xs-6">

							<label>Site İkon</label>
							<input type="file" name="icon" class="form-control">
							

						</div>
					</div>
				</div>
				<!-- /.card-body -->

				<div class="card-footer">
					<button type="submit" class="btn btn-primary">Güncelle</button>
				</div>
			</form>
		</div>
	</div>
</div>


<?php $this->load->view('back/include/footer');?>