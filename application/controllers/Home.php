<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {
	public function __construct()
    {
		parent::__construct();
		date_default_timezone_set("Asia/Jakarta");
		$this->load->model('Modb');
		$this->db = $this->load->database('default', TRUE);
		$this->db2 = $this->load->database('db2', TRUE);
		if ($this->session->userdata('status') != "login") {
			redirect(base_url('login'));
		}	
	}
	public function index()
	{
		$data['totalp'] = $this->Modb->getPrinterstat();
		$data['chartp'] = $this->Modb->chartPr();
		$data['chtotfix'] = $this->Modb->chartPrFixed();
		$data['chtotpend'] = $this->Modb->chartPrPending();
		$data['chtotprog'] = $this->Modb->chartPrOnPrg();
		$data['totalFixed'] = $this->Modb->getPrinterfixed();
		$data['totalPend'] = $this->Modb->getPrinterpend();
		$data['totalProg'] = $this->Modb->getPrinterProg();
		$this->template->load('template', 'dashboard', $data);
	}
	public function master()
	{
		if ($this->session->userdata('nik') != "0100044200" && $this->session->userdata('nik') != "0100034100") {
			redirect(base_url('service'));
		}else{
			$data['report'] = $this->Modb->report();
			$data['nomor'] = $this->Modb->getnomor();
			$data['depo'] = $this->Modb->getdepo();
			$this->template->load('template', 'masterp', $data);
		}
	}	
	public function histori()
	{
		$data['tiket'] = $this->Modb->histori();
		$this->template->load('template', 'historitiket', $data);
	}
	public function alokasi(){
		if ($this->session->userdata('nik') != "0100044200" && $this->session->userdata('nik') != "0100034100") {
			redirect(base_url('service'));
		}else{
			$data['dataprinter'] = $this->Modb->printer();
			$data['depo'] = $this->Modb->getdepo();			
			$this->template->load('template', 'alokasi', $data);
		}
	}
	public function service()
	{
		$data['printin'] = $this->Modb->dataall();
		$data['rekap'] = $this->Modb->getstatus();
		$data['depo'] = $this->Modb->getdepo();
		$this->template->load('template','masuk', $data);
	}
	public function getdetaillog()
	{
		$id = $this->input->get('id');
        $data = $this->Modb->getdetail('log',$id);
		echo json_encode($data); 
	}
	public function getmod()
	{
		$arr = array();
		$id = $this->input->get('id');
        $datax = $this->Modb->getmodel('masterprinter',$id);
		foreach($datax as $row){
			$kode = $row->kodebrg;
			$model = $row->model;
			$tipe = $row->tipe;
			$sn = $row->serialnumber;
			$arr[] = array(
				"kodebrg"	=> $kode,
				"model" => $model,
				"tipe" => $tipe,
				"serialnumber" => $sn);
		}
		echo json_encode($arr); 
	}
	public function getmodelid()
	{
		$id = $this->input->get('id');
        $data = $this->Modb->getmodelbyid('masterprinter',$id);
		echo json_encode($data); 
	}
	public function getbysn()
	{
		$sn = $this->input->get('serialnumber');
        $data = $this->Modb->getmodelbysn('masterprinter',$sn);
		echo json_encode($data); 
	}
	public function getdetailid()
	{
		$id = $this->input->get('id');
        $data = $this->Modb->getdetail('datafastel',$id);
		echo json_encode($data); 
	}
	public function submitdata()
	{
		$tgl = $this->input->post('tgl');
		$kode = $this->input->post('kode');
		$model = $this->input->post('model');
		$tipe = $this->input->post('tipe');
		$sn = $this->input->post('sn');
		$data = array(
			'tgl' => $tgl,
			'kodebrg' => $kode,
			'model' => $model,
			'tipe' => $tipe,
			'serialnumber' => $sn
		);
		$datalog = array(
			'logtgl' => date('Y-m-d H:i:s'),
			'kodebrg' => $kode,
			'serialnumber' => $sn,
			'loguser' => $this->session->userdata('name'),
			'logdata'  => "Input data printer " . $model ." - " . $sn
		);
		//var_dump($data);
		$this->Modb->simpan($data);
		$this->Modb->savelog($datalog);
		$this->session->set_flashdata('saved', 'Data Saved!');
		redirect(base_url());
	}
	public function savedata()
	{
		$tgl = $this->input->post('tgl');
		$kode = $this->input->post('kode');
		$depo = $this->input->post('depo');
		$divisi = $this->input->post('divisi');
		$serial = $this->input->post('serial');
		$model = $this->input->post('model');
		$keterangan = $this->input->post('keterangan');
		$status = $this->input->post('status');
		$data = array(
			'tgl' => $tgl,
			'serialnumber' => $serial,
			'fromdepo' => $depo,
			'divisi' => $divisi,
			'keterangan' => $keterangan,
			'status' => $status,
			'tgldeadline' => $tgl
		);
		$datatik = array(
			'tgl' => $tgl,
			'serialnumber' => $serial,
			'model' => $model,
			'fromdepo' => $depo,
			'divisi' => $divisi,
			'keterangan' => $keterangan,
			'status' => $status,
			'tgldeadline' => $tgl
		);
		$this->Modb->save($data);
		$this->Modb->savetiket($datatik);
		$datalog = array(
			'logtgl' => date('Y-m-d H:i:s'),
			'kodebrg' => $kode,
			'serialnumber' => $serial,
			'loguser' => $this->session->userdata('name'),
			'logdata'  => "Update Status printer: ". $status
		);
		$this->Modb->savelog($datalog);
		$datastat = array('status' => $status);
		$this->Modb->updatestatusmaster($serial, $datastat);
		
		$this->session->set_flashdata('saved', 'Data Saved!');
		redirect(base_url('service'));
	}
	public function savealokasi()
	{
		$tglalokasi = $this->input->post('tglalokasi');
		$kode = $this->input->post('kode');
		$depo = $this->input->post('depo');
		$divisi = $this->input->post('divisi');
		$serial = $this->input->post('serial');
		$data = array(
			'tglalokasi' => $tglalokasi,
			'kodebrg' => $kode,
			'serialnumber' => $serial,
			'kedepo' => $depo,
			'divisi' => $divisi,
			'status' => "Delivered to Depo ". $depo
		);
		$this->Modb->savealokasi($data);
		$datalog = array(
			'logtgl' => date('Y-m-d H:i:s'),
			'kodebrg' => $kode,
			'serialnumber' => $serial,
			'loguser' => $this->session->userdata('name'),
			'logdata'  => "Update Status printer: Alokasi Ke Depo " . $depo
		);
		$this->Modb->savelog($datalog);
		$datastat = array('status' => "Delivered to Depo ". $depo);
		$this->Modb->updatestatusmaster($serial, $datastat);
		
		//$this->Modb->deletestat($serial);
	}
	public function updatedata()
	{
		$serial = $this->input->post('serial');
		$kode = $this->input->post('kode');
		$action = $this->input->post('action');
		$status = $this->input->post('status');
		$tglclose = date('Y-m-d H:i:s');
		$tglcon = date('Y-m-d H:i:s');
		$pending = $this->input->post('ketpending');
		if ($status == "Fixed"){
			$data = array(
				'status' => $status,
				'action' => $action,
				'tglclose'=> $tglclose
			);
			$datatik = array(
				'status' => $status,
				'action' => $action,
				'tglclose'=> $tglclose
			);
			$this->Modb->update($serial, $data);
			$this->Modb->updatetiket($serial, $data);
		}elseif($status == "Continue"){
			$data = array(
				'status' => $status,
				'action' => $action,
				'tglcontinue' => $tglcon
			);
			$datatik = array(
				'status' => $status,
				'action' => $action,
				'tglclose'=> $tglclose
			);
			$this->Modb->updatecontinue($serial, $data);
			$this->Modb->updateconttiket($serial, $data);
		}elseif($status == "Pending"){
			$data = array(
				'status' => $status,
				'keteranganpend' => $pending,
				'tglcontinue' => $tglcon
			);
			$datatik = array(
				'status' => $status,
				'action' => $action,
				'tglclose'=> $tglclose
			);
			$this->Modb->updatecontinue($serial, $data);
			$this->Modb->updateconttiket($serial, $data);
		}else{
			$data = array(
				'status' => $status,
				'action' => $action
			);
			$datatik = array(
				'status' => $status,
				'action' => $action,
			);
			$this->Modb->updateprogress($serial, $data);
			$this->Modb->updateprogtiket($serial, $data);
		}
		$datalog = array(
			'logtgl' => date('Y-m-d H:i:s'),
			'kodebrg' => $kode,
			'serialnumber' => $serial,
			'loguser' => $this->session->userdata('name'),
			'logdata'  => "Update Status printer: ". $status .". Action: " . $action
		);
		$this->Modb->savelog($datalog);
       $datastat = array('status' => $status);
	   $this->Modb->updatestatusmaster($serial, $datastat);
	   
	   $this->session->set_flashdata('updated', 'Data Updated!');
	   redirect(base_url('service'));
	}
}