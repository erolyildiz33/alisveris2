<?php $this->load->view('back/include/header');?>
<?php $this->load->view('back/include/sidebar');?>

<div class="row">
	<div class="col-sm-12">
		<div class="float-sm-right my-1">
			<a data-altid="0"
			data-url='<?php echo base_url("admin/save_category"); ?>'
			class="btn btn-outline btn-primary yeniekle" data-analiste="evet">
			<i class="fa fa-plus"></i>  Yeni Ekle
		</a>
	</div>
</div>
<div class="col-md-12">
	<div class="card">
		<div class="card-body">
			<div class="widget p-lg">
				<table class="table table-hover table-striped table-bordered content-container">
					<thead>
						<th class="order"><i class="fa fa-reorder"></i></th>
						<th class="w50">Sıra</th>
						<th>Üst Kategori</th>
						<th>Başlık</th>
						<th>Durumu</th>
						<th>Alt Kategori</th>
						<th>İşlem</th>
					</thead>
					<tbody class="sortable" data-sirano="0" data-url="<?php echo base_url("admin/rankSetter"); ?>">

						<?php $i=1; foreach ($items as $item) { ?>

							<tr id="ord-<?php echo $item->id; ?>">
								<td class="order"><i class="fa fa-reorder"></i></td>
								<td class="w50 text-center sirano"><?php echo $i++; ?></td>
								<th>Ana Kategori</th>
								<td><?php echo $item->title; ?></td>
								<td class="text-center w100">
									<input
									data-url="<?php echo base_url("admin/isActiveSetter/$item->id"); ?>"
									class="isActive"
									type="checkbox"
									data-switchery
									data-color="#10c469"
									<?php echo ($item->isActive) ? "checked" : ""; ?>
									/>
								</td>
								<td class="w400 text-center">
									<div class="text-center" style="margin-left: 30px;">
										<a data-altid="<?=$item->id?>" 
											data-title="<?=$item->title?>"
											data-url='<?php echo base_url("admin/save_subcategory"); ?>'
											style="float: left;"
											class="btn btn-sm btn-success btn-outline add-btn altekle" data-analiste="evet">
											<i class="fa fa-plus"></i> Alt Kategori Ekle
										</a>
										<?php if (get_sub_category_title($item->id)) { ?>
											<button data-altid="<?=$item->id?>" data-getustid="0" style="margin-left: 10px;float: left;"
												data-title="<?=$item->title?>"
												data-geturl='<?php echo base_url("admin/"); ?>'
												class="btn btn-sm btn-warning btn-outline add-btn altgetir" data-analiste="evet">
												<i class="fa fa-cog"></i> Alt Kategori İşlemleri
											</button>
										<?php } ?>
									</div>
								</td>
								<td class="text-center w300" >

									<button 
									data-url="<?php echo base_url("admin/delete/$item->id"); ?>"
									class="btn btn-sm btn-danger btn-outline remove-btn" style="margin-left: 30px;" data-analiste="evet">
									<i class="fa fa-trash"></i> Sil 
								</button>
								<button data-altid="<?=$item->id?>"
									data-title="<?=$item->title?>"
									data-url='<?php echo base_url("admin/categoriy_update/").$item->id; ?>'
									class="btn btn-sm btn-info btn-outline altguncelle" data-analiste="evet">
									<i class="fa fa-pencil-square-o"></i> Düzenle
								</button>





							</td>
						</tr>

					<?php } ?>

				</tbody>

			</table>



		</div><!-- .widget -->

	</div>
</div>	
</div><!-- END column -->

<div class="col-md-12">
	<div id="altliste" status="false">

	</div>	
</div>
</div>
</div>


<div class="col-md-12">
	<div id="altekle" status="false">

	</div>
</div>
</div>



<?php $this->load->view('back/include/footer');?>