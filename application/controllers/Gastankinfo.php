<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Gastankinfo extends CI_Controller {

	public function __construct(){

		parent::__construct();
		$this->load->helper('url');
		$this->load->view('/layout/header');
		$this->load->view('/layout/nav');
		
		
	}
	public function index()
	{
		$this->load->model('Mod_Gastank');
		$data['gastanklist'] = $this->Mod_Gastank->getGastanklist(0);
		
		
		$this->load->view('gastanklist',$data);
		

		
		$this->load->view('/layout/footer');
	}
	
}
