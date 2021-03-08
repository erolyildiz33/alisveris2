<?php $this->load->view('back/include/header');?>
<?php $this->load->view('back/include/sidebar');?>

<div class="row">

	<?php if (empty($items)) { ?>
		<div class="mx-auto">
			<div class="alert alert-info text-center ">
				<p>Burada herhangi bir veri bulunmamaktadır. Eklemek için lütfen <span class="text-danger yeniekle"
					data-altid="0" data-toggle="modal" data-target="#myModal"
					data-kategoriler="<?php echo selectBoxKategori(); ?>"
					data-url='<?php echo base_url("admin/save_urunler"); ?>'>tıklayınız</span></p>
				</div>
			</div>
		<?php }else{ ?>
			<div class="col-sm-12">
				<div class="float-sm-right my-2">
					<button data-altid="0" data-toggle="modal" data-target="#myModal"
					data-url='<?php echo base_url("admin/save_urunler"); ?>'
					data-kategoriler="<?php echo selectBoxKategori(); ?>"
					class="btn btn-outline btn-primary yeniekle btn-xs-block">
					<i class="fa fa-plus"></i>  Yeni Ekle
				</button>
			</div>
		</div>
		<div class="col-md-12 ">
			<div class="card">
				<div class="card-body">
					<div class="widget p-lg">
						<table class="table table-responsive table-hover table-striped table-bordered content-container">
							<thead>

								<th class="w50">Sıra</th>
								<th>Ürün Adı</th>
								<th>Kategori</th>
								<th>Ürün Fiyatı</th>
								<th >İşlem</th>
							</thead>
							<tbody>

								<?php $i=1; foreach ($items as $item) { ?>

									<tr>

										<td class="w50 text-center sirano"><?php echo $i++; ?></td>
										<td><?=$item->title?></td>
										<td><?=Kategoriler::select(["id"=>$item->category])[0]->title?></td>
                                        <td><?=($item->discount)?"<del class='text-red'>".$item->price." TL</del> ".$item->discount." TL":$item->price." TL"?></td>
										<td class="text-center w300" >
											<div class="d-flex justify-content-center">
												<button  data-analiste="evet"
												data-url="<?php echo base_url("admin/delete_kategoriler/$item->id"); ?>"
												class="btn btn-sm btn-danger btn-outline remove-btn " >
												<i class="fa fa-trash"></i><span class="d-none d-sm-inline"> Sil </span>
											</button>
											<button data-altid="<?=$item->id?>" style="margin-left: 1rem;"
												type="button" data-toggle="modal" data-target="#myModal"
												data-title="<?=$item->title?>"
												data-url='<?php echo base_url("admin/update_kategoriler/").$item->id; ?>'
												class="btn btn-sm btn-info btn-outline altguncelle ">
												<i class="fas fa-edit"></i><span class="d-none d-sm-inline">Düzenle</span>
											</button>
										</div>
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
<?php } ?>
<div class="modal fade" data-backdrop="static"  id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered">
		<div class="modal-content">
			<form  method="post" id="modalform" name="modalform">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
					<div id="myModalLabel" name="myModalLabel">
						<h2 class="modal-title"></h2>
					</div>
				</div>
				<div class="modal-body" name="modalbody" id="modalbody">
				</div>
				<div class="modal-footer" id="modalfooter" name="modalfooter">
				</div>
			</form>
		</div>
	</div>
</div>

<div class="col-md-12">
	<div id="altekle" status="false">

	</div>
</div>
</div>

<style type="text/css">
	body.modal-open .background-container{

		-webkit-filter: blur(1px);
		-moz-filter: blur(1px);
		-ms-filter: blur(1px);
		-o-filter: blur(1px);
		/* FF doesn't support blur filter, but SVG */
		filter: url("data:image/svg+xml;utf8,<svg height='0' xmlns='http://www.w3.org/2000/svg'><filter id='svgBlur' x='-5%' y='-5%' width='110%' height='110%'><feGaussianBlur in='SourceGraphic' stdDeviation='5'/></filter></svg>#svgBlur");
		filter: progid: DXImageTransform.Microsoft.Blur(PixelRadius = '1');
		filter: blur(1px);
	}
	.close{
		right: 1rem;
		position: absolute;
		font-size: 3rem;
	}
	@media (max-width: 767px) {
		.btn-xs-block {
			display: block;
			width: 100%;
		}
		input[type="submit"].btn-xs-block,
		input[type="reset"].btn-xs-block,
		input[type="button"].btn-xs-block {
			width: 100%;
		}
		.btn-block + .btn-xs-block,
		.btn-xs-block + .btn-block,
		.btn-xs-block + .btn-xs-block {
			margin-top: 0.5rem;
		}
	}
	@media (min-width: 767px) {
		.table-responsive {
			display: table;
		}
	}
</style>

<?php $this->load->view('back/include/footer');?>