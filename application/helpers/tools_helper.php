<?php

function sef($text) {
    $find = array('Ç', 'Ş', 'Ğ', 'Ü', 'İ', 'Ö', 'ç', 'ş', 'ğ', 'ü', 'ö', 'ı', '+', '#');
    $replace = array('c', 's', 'g', 'u', 'i', 'o', 'c', 's', 'g', 'u', 'o', 'i', 'plus', 'sharp');
    $text = strtolower(str_replace($find, $replace, $text));
    $text = preg_replace("@[^A-Za-z0-9\-_\.\+]@i", ' ', $text);
    $text = trim(preg_replace('/\s+/', ' ', $text));
    $text = str_replace(' ', '-', $text);

    return $text;
}

function __construct()
{
	$this->ci=&get_instance();

}
function postval($val){
	$ci=&get_instance();
	return $ci->input->post($val,true);
}

function active($val){
	$ci=&get_instance();
	if($ci->uri->segment(2)==$val){
		return "active";
	}
}

function imageupload($filename,$path,$allowed){
	$ci=&get_instance();
	$config['upload_path']          = 'assets/upload/'.$path.'/';
	$config['allowed_types']        = $allowed;
	$ci->upload->initialize($config);



	if($ci->upload->do_upload($filename)){
		$image=$ci->upload->data();
		return $config['upload_path'].$image['file_name'];

	}else{
		//$ci->session->flash_data();
	}
	
	
}


function geri(){
	return redirect($_SERVER['HTTP_REFERER']);
}
function mesaj($type,$icon,$title,$content=null){
	$ci=&get_instance();
	$mesaj= '<div class="alert alert-'.$type.' alert-dismissible">
	<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
	<h5><i class="icon fas fa-'.$icon.'"></i> '.$title.'</h5>
	'.$content.'
	</div>';
	$ci->session->set_flashdata('flashmessage',$mesaj);
}
function mesajoku(){
	$ci=&get_instance();
	echo $ci->session->flashdata('flashmessage');

}


function get_sub_category_title($category_id = 0){
	$category = Kategoriler::select(
		array(
			"ustmenu"    => $category_id
		)
	);


	return $category;

}