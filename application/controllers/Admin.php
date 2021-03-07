<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		if(!$this->session->userdata('adminlogin') && $this->uri->segment(2) && $this->uri->segment(2)!="login"){
			redirect('admin');
		}

	}
	public function index()
	{
		if($this->session->userdata('adminlogin')){redirect('admin/panel');}
		$this->load->view('back/login');
	}
	public function login()
	{
		$exist=Yonetim::find(['mail'=>postval("email"),
			'password'=>postval("sifre")]);
		if($exist){
			$this->session->set_userdata('adminlogin',true);
			$this->session->set_userdata('admininfo',$exist);
			redirect('admin/panel');

		}else{
			$hata="Email veya Şifre Hatalıdır!";
			$this->session->set_flashdata('error',$hata);
			redirect('admin');
		}
	}
	public function panel(){
		$data['head']="Panel";
		$this->load->view('back/panel',$data);
	}
	public function logout(){
		$this->session->sess_destroy();
		redirect('admin');
	}
	public function ayarlar(){
		$data['head']="Ayarlar";
		$data['config']=Ayarlar::find(1);
		$this->load->view('back/config',$data);
	}

	public function save_ayarlar(){
		$config=Ayarlar::find(postval('configid'));
		$data=['title'=>postval("title"),
		'info'=>postval("info"),
		'mail'=>postval("mail"),
		'facebook'=>postval("facebook"),
		'twitter'=>postval("twitter"),
		'instagram'=>postval("instagram"),
		'youtube'=>postval("youtube"),

	];
	if($_FILES['logo']['size']>0){

		$data['logo']=imageupload('logo','config','png');
		unlink($config->logo);
	}
	if($_FILES['icon']['size']>0){

		$data['icon']=imageupload('icon','config','ico|jpg|png|jpeg');
		unlink($config->icon);
	}
	$exist=Ayarlar::update(postval('configid'),$data);
	mesaj('success','check','Ayarlar Başarıyla Güncellendi.');
	geri();
}
public function kategoriler(){
	$data['head']="Ürün Kategorileri";
	$data['items'] = Kategoriler::select(["ustmenu"=>0], ["rank"=>"asc"]);
	$data['altitems'] = Kategoriler::select(["ustmenu !="=>0],["rank"=>"asc"]);

	$this->load->view('back/kategori/categories',$data);
}


public function save_kategoriler(){

	$this->load->library("form_validation");

	$this->form_validation->set_rules("title", "Başlık", "required|trim");

	$this->form_validation->set_message(
		array(
			"required"  => "{field} alanı doldurulmalıdır."
		)
	);

	$validate = $this->form_validation->run();

	if($validate){
		$exist=Kategoriler::select(["title"=> postval("title"),"ustmenu"=>postval("altid")]);
		if (!$exist){
			$rank=Kategoriler::select(["ustmenu"=>0], ["rank"=>"desc"],1);
			$insert = Kategoriler::insert(array(
				"title"         => postval("title"),
				"isActive"      => 1,
				"createdAt"     => date("Y-m-d H:i:s"),
				"rank"          =>($rank)?$rank[0]->rank+1:0,
			));
			if($insert){
				mesaj('success','check','Kayıt başarılı bir şekilde eklendi.');
			} else {
				mesaj('danger','ban','Kayıt Ekleme sırasında bir problem oluştu.');	
			}
		}
		else{
			mesaj('danger','ban',"Bu Kategoyi Daha Önce Kullanılmış!");	

		}	
	}else{
		mesaj('danger','ban',validation_errors());	}

		geri();
	}

	public function save_sub_kategoriler(){

		$this->load->library("form_validation");

		$this->form_validation->set_rules("title", "Başlık", "required|trim");

		$this->form_validation->set_message(
			array(
				"required"  => "{field} alanı doldurulmalıdır."
			)
		);

		$validate = $this->form_validation->run();

		if($validate){
			$exist=Kategoriler::select(["title"=> postval("title"),"ustmenu"=>postval("anamenu")],["rank"=>"desc"],1);
			if (!$exist){
				$rank=Kategoriler::select(["ustmenu"=>postval("anamenu")], ["rank"=>"desc"],1);
				$insert = Kategoriler::insert(array(
					"title"         => postval("title"),
					"isActive"      => 1,
					"ustmenu"		=>postval("anamenu"),
					"createdAt"     => date("Y-m-d H:i:s"),
					"rank"          =>$rank?$rank[0]->rank+1:0,
				));
				if($insert){
					mesaj('success','check','Kayıt başarılı bir şekilde eklendi.');
				} else {
					mesaj('danger','ban','Kayıt Ekleme sırasında bir problem oluştu.');	
				}
			}
			else{
				mesaj('danger','ban',"Bu Kategoyi Daha Önce Kullanılmış!");	

			}	
		}else{
			mesaj('danger','ban',validation_errors());	}

			geri();
		}

		public function delete_kategoriler($id){

			$delete = Kategoriler::delete(array("id"    => $id));
			if($delete){
				mesaj('success','check','Kayıt başarılı bir şekilde silindi.');
			} else {
				mesaj('danger','ban','Kayıt silme sırasında bir problem oluştu.');	
			}
			geri();
		}

		public function isActiveSetter_kategoriler($id){

			if($id){
				$isActive = (postval("data") === "true") ? 1 : 0;
				Kategoriler::update($id,["isActive"  => $isActive]);
			}
		}

		public function update_kategoriler($id){

			$this->load->library("form_validation");

			$this->form_validation->set_rules("title", "Başlık", "required|trim");

			$this->form_validation->set_message(
				array(
					"required"  => "{field} alanı doldurulmalıdır."
				)
			);

			$validate = $this->form_validation->run();

			if($validate){
				$exist=Kategoriler::select(["title"=> postval("title")]);

				if (!$exist){

					$update = Kategoriler::update($id,[ "title" => postval("title")]);
					if($update){
						mesaj('success','check','Kayıt başarılı bir şekilde güncellendi.');
					} else {
						mesaj('danger','ban','Kayıt Güncelleme sırasında bir problem oluştu.');	
					}

				}
				else{
					if(postval("title")!=$exist[0]->title){
						mesaj('danger','ban',"Bu Kategoyi Daha Önce Kullanılmış!");	
					}else{
						mesaj('warning','exclamation-triangle',"Bu Kategoyide Değişiklik Yapılmamıştır!");	
					}
				}
			}else{
				mesaj('danger','ban',validation_errors());		
			}

			geri();
		}
		public function find_kategoriler(){

			if(postval("title")!=null){ 
				$result =Kategoriler::query("select IF(categories.ustmenu = 0, 'Ana Kategori', (select ara.title from categories as ara where ara.id=categories.ustmenu)) as ustname,categories.* from categories where title like'%".postval("title")."%'");
				if($result)
					echo json_encode($result);
				else echo "yok";
			}

			else echo "bos";
		}
		public function rankSetter_kategoriler(){


			$data = postval("data");

			parse_str($data, $order);

			$items = $order["ord"];

			foreach ($items as $rank => $id){

				Kategoriler::update(
					array(
						"id"        => $id,
						"rank !="   => $rank
					),
					array(
						"rank"      => $rank
					)
				);

			}
		}
		public function getAlt_kategoriler($ustmenuid=null){
			$result=Kategoriler::select(["ustmenu"=>$ustmenuid], ["rank"=>"ASC"]);
			if($result)
				echo json_encode($result);
		}

		public function secenekler(){
			$data['head']="Ürün Seçenekleri";
			$data['items'] = Secenekler::select();


			$this->load->view('back/secenekler/options',$data);
		}

		public function save_secenekler(){

			$this->load->library("form_validation");

			$this->form_validation->set_rules("name", "Seçenek Adı", "required|trim");

			$this->form_validation->set_message(
				array(
					"required"  => "{field} alanı doldurulmalıdır."
				)
			);

			$validate = $this->form_validation->run();

			if($validate){
				$exist=Secenekler::select(["name"=> postval("name")]);
				if (!$exist){
					
					$insert = Secenekler::insert(array(
						"name"         => postval("name"),
						
						"slug"          =>sef(postval("name")),
					));
					if($insert){
						mesaj('success','check','Kayıt başarılı bir şekilde eklendi.');
					} else {
						mesaj('danger','ban','Kayıt Ekleme sırasında bir problem oluştu.');	
					}
				}
				else{
					mesaj('danger','ban',"Bu Seçenek Daha Önce Kullanılmış!");	

				}	
			}else{
				mesaj('danger','ban',validation_errors());	}

				geri();
			}
		
		public function update_secenekler($id){

					$this->load->library("form_validation");

					$this->form_validation->set_rules("name", "Seçenek Adı", "required|trim");

					$this->form_validation->set_message(
						array(
							"required"  => "{field} alanı doldurulmalıdır."
						)
					);

					$validate = $this->form_validation->run();

					if($validate){
						$exist=Secenekler::select(["name"=> postval("name")]);

						if (!$exist){

							$update = Secenekler::update($id,[ "name" => postval("name"),"slug"=>sef(postval("name"))]);
							if($update){
								mesaj('success','check','Kayıt başarılı bir şekilde güncellendi.');
							} else {
								mesaj('danger','ban','Kayıt Güncelleme sırasında bir problem oluştu.');	
							}

						}
						else{
							if(postval("title")!=$exist[0]->title){
								mesaj('danger','ban',"Bu Seçenek Adı Daha Önce Kullanılmış!");	
							}else{
								mesaj('warning','exclamation-triangle',"Bu Seçenekte Değişiklik Yapılmamıştır!");	
							}
						}
					}else{
						mesaj('danger','ban',validation_errors());		
					}

					geri();
		}

public function save_sub_secenekler(){

				$this->load->library("form_validation");

				$this->form_validation->set_rules("title", "Başlık", "required|trim");

				$this->form_validation->set_message(
					array(
						"required"  => "{field} alanı doldurulmalıdır."
					)
				);

				$validate = $this->form_validation->run();

				if($validate){
					$exist=Kategoriler::select(["title"=> postval("title"),"ustmenu"=>postval("anamenu")],["rank"=>"desc"],1);
					if (!$exist){
						$rank=Kategoriler::select(["ustmenu"=>postval("anamenu")], ["rank"=>"desc"],1);
						$insert = Kategoriler::insert(array(
							"title"         => postval("title"),
							"isActive"      => 1,
							"ustmenu"		=>postval("anamenu"),
							"createdAt"     => date("Y-m-d H:i:s"),
							"rank"          =>$rank?$rank[0]->rank+1:0,
						));
						if($insert){
							mesaj('success','check','Kayıt başarılı bir şekilde eklendi.');
						} else {
							mesaj('danger','ban','Kayıt Ekleme sırasında bir problem oluştu.');	
						}
					}
					else{
						mesaj('danger','ban',"Bu Kategoyi Daha Önce Kullanılmış!");	

					}	
				}else{
					mesaj('danger','ban',validation_errors());	}

					geri();
				}				

public function delete_secenekler($id){

					$delete = Kategoriler::delete(array("id"    => $id));
					if($delete){
						mesaj('success','check','Kayıt başarılı bir şekilde silindi.');
					} else {
						mesaj('danger','ban','Kayıt silme sırasında bir problem oluştu.');	
					}
					geri();
				}

				public function isActiveSetter_secenekler($id){

					if($id){
						$isActive = (postval("data") === "true") ? 1 : 0;
						Kategoriler::update($id,["isActive"  => $isActive]);
					}
				}


				public function find_secenekler(){

					if(postval("title")!=null){ 
						$result =Kategoriler::query("select IF(categories.ustmenu = 0, 'Ana Kategori', (select ara.title from categories as ara where ara.id=categories.ustmenu)) as ustname,categories.* from categories where title like'%".postval("title")."%'");
						if($result)
							echo json_encode($result);
						else echo "yok";
					}

					else echo "bos";
				}
				public function rankSetter_secenekler(){


					$data = postval("data");

					parse_str($data, $order);

					$items = $order["ord"];

					foreach ($items as $rank => $id){

						Kategoriler::update(
							array(
								"id"        => $id,
								"rank !="   => $rank
							),
							array(
								"rank"      => $rank
							)
						);

					}
				}
				public function getAlt_secenekler($ustmenuid=null){
					$result=Kategoriler::select(["ustmenu"=>$ustmenuid], ["rank"=>"ASC"]);
					if($result)
						echo json_encode($result);
				}









				public function save_options(){


				}

			}
