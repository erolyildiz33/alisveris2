<?php $this->load->view('back/include/header');?>
<?php $this->load->view('back/include/sidebar');



//echo json_encode($data);


?>
<div class="row">

	<select class="form-control selectpicker" name="id" id="id">
		<?php
		selectBoxKategoriGroub();?>
	</select>
</div>

<?php $this->load->view('back/include/footer');?>