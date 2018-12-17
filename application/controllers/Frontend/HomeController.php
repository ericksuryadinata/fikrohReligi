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
		$wilayah = $this->home->selectData('*','wilayah','where id = "'.$wilayah_id.'"')->first_row();
		$tipe = $this->home->selectData('*','tipe','where id="'.$tipe_id.'"')->first_row();
		$religi = $this->home->selectData('*','tempatibadah','where tipe_id="'.$tipe_id.'" and wilayah_id = "'.$wilayah_id.'"')->result();
		echo $this->page->tampil('website.landing.result',compact('religi','wilayah','tipe'));
	}
	
	public function input(){
		$wilayah = $this->home->selectData('*','wilayah','')->result();
		$tipe = $this->home->selectData('*','tipe','')->result();
		echo $this->page->tampil('website.landing.input',compact('tipe','wilayah'));
	}

	public function inputSave(){
		$nama = $this->input->post('nama');
		$alamat = $this->input->post('alamat');
		$wilayah = $this->input->post('wilayah');
		$tipe = $this->input->post('tipe');
		$lat = $this->input->post('lat');
		$lng = $this->input->post('lng');
		$this->form_validation->set_rules('nama','nama','required');
		$this->form_validation->set_rules('alamat','alamat','required');
		$this->form_validation->set_rules('wilayah','wilayah','required');
		$this->form_validation->set_rules('tipe','tipe','required');
		$this->form_validation->set_rules('lat','lat','required');
		$this->form_validation->set_rules('lng','lng','required');
		if($this->form_validation->run() == FALSE){
			$wilayah = $this->home->selectData('*','wilayah','')->result();
			$tipe = $this->home->selectData('*','tipe','')->result();
			echo $this->page->tampil('website.landing.input',compact('tipe','wilayah'));
		}
		$data = array(
			'nama' => $nama,
			'alamat' => $alamat,
			'wilayah_id' => $wilayah,
			'tipe_id' => $tipe,
			'lat' => $lat,
			'lng' => $lng
		);
		$tambah = $this->home->insertData('tempatibadah',$data);
		$wilayah = $this->home->selectData('*','wilayah','')->result();
		$tipe = $this->home->selectData('*','tipe','')->result();
		$pesan = "sukses";
		echo $this->page->tampil('website.landing.input',compact('tipe','wilayah','pesan'));
	}

}