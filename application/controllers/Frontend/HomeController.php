<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class HomeController extends CI_Controller{

	public function __construct(){
		parent::__construct();
		$this->load->model(array('HomeModel' => 'home'));
	}
	
    public function index(){
        echo $this->page->tampil('website.landing.index');
	}
	
	public function wilayah(){
		$wilayah = $this->home->selectData('*','wilayah','')->result();
		echo $this->page->tampil('website.landing.wilayah', compact('wilayah'));
	}

	public function tipe($wilayah_id){
		$fa = ['fa-mosque','fa-church','fa-torii-gate','fa-gopuram','fa-vihara'];
		$tipe = $this->home->selectData('*','tipe','')->result();
		echo $this->page->tampil('website.landing.tipe',compact('tipe','wilayah_id','fa'));
	}

	public function result($wilayah_id,$tipe_id){

	}
}