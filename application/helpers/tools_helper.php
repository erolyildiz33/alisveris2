<?php

$ci;



function __construct()
{
	$this->ci=&get_instance();

}
function postval($val){
	$ci=&get_instance();
	return $ci->input->post($val);
}

function active($val){
	$ci=&get_instance();
	if($ci->uri->segment(2)==$val){
		return "active";
	}
}
