<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Modb extends CI_Model {
	
	public function __construct()
	{
		parent::__construct();
		$this->load->helper('date');
		date_default_timezone_set('Asia/Jakarta');
		$this->db = $this->load->database('default', TRUE);
		$this->db2 = $this->load->database('db2', TRUE);
	}
	public function login($data)
	{
		//$query = $this->db2->query("SELECT tbl_karyawan_struktur.*, tbl_jabatan_karyawan.jabatan_karyawan FROM  tbl_karyawan_struktur  RIGHT JOIN  tbl_jabatan_karyawan ON no_jabatan_karyawan  =  tbl_karyawan_struktur.jabatan_struktur  WHERE  tbl_karyawan_struktur.nik_baru = '".$data."'");
		$this->db2->select('*, tbl_jabatan_karyawan.jabatan_karyawan');
		$this->db2->from('tbl_karyawan_struktur');
		$this->db2->join('tbl_jabatan_karyawan', 'tbl_jabatan_karyawan.no_jabatan_karyawan  =  tbl_karyawan_struktur.jabatan_struktur' );
		$this->db2->where($data);
		$query = $this->db2->get();
		return $query;
	}
	public function getPrinterstat()
	{
		$query = $this->db->get('tiket');
		return $query->num_rows();
	}
	public function chartPr()
	{
		$query = $this->db->query("SELECT calendar.datefield AS DATE,IFNULL(COUNT(statusp.status),0) AS total FROM statusp RIGHT JOIN calendar ON (DATE(statusp.tgl) = calendar.datefield) WHERE (calendar.datefield BETWEEN (SELECT MIN(DATE(datefield)) FROM statusp) AND (SELECT MAX(DATE(datefield)) FROM statusp))GROUP BY MONTH(DATE)");
		if ($query->num_rows() > 0) {
			return $query->result();
		} else {
			return 0;
		}
	}
	public function chartPrFixed()
	{
		$query = $this->db->query("SELECT calendar.datefield AS DATE,IFNULL(COUNT(tiket.status),0) AS total FROM tiket RIGHT JOIN calendar ON (DATE(tiket.tgl) = calendar.datefield)AND(calendar.datefield BETWEEN (SELECT MIN(DATE(datefield)) FROM tiket) AND (SELECT MAX(DATE(datefield)) FROM tiket))AND tiket.status = 'Fixed' GROUP BY MONTH(DATE)");
		if ($query->num_rows() > 0) {
			return $query->result();
		} else {
			return 0;
		}
	}
	public function chartPrPending()
	{
		$query = $this->db->query("SELECT calendar.datefield AS DATE,
IFNULL(COUNT(tiket.status),0) AS total 
FROM tiket 
RIGHT JOIN calendar ON (DATE(tiket.tgl) = calendar.datefield)
AND(calendar.datefield BETWEEN (SELECT MIN(DATE(datefield)) FROM tiket) AND (SELECT MAX(DATE(datefield)) FROM tiket))
AND tiket.status = 'Pending'
GROUP BY MONTH(DATE)");
		if ($query->num_rows() > 0) {
			return $query->result();
		} else {
			return 0;
		}
	}
	public function chartPrOnPrg()
	{
		$query = $this->db->query("SELECT calendar.datefield AS DATE,
IFNULL(COUNT(tiket.status),0) AS total 
FROM tiket 
RIGHT JOIN calendar ON (DATE(tiket.tgl) = calendar.datefield)
AND(calendar.datefield BETWEEN (SELECT MIN(DATE(datefield)) FROM tiket) AND (SELECT MAX(DATE(datefield)) FROM tiket))
AND tiket.status = 'On Progress'
GROUP BY MONTH(DATE)");
		if ($query->num_rows() > 0) {
			return $query->result();
		} else {
			return 0;
		}
	}
	public function getPrinterfixed()
	{
		$query = $this->db->where('status','Fixed')->get('tiket');
		return $query->num_rows();
	}
	public function getPrinterpend()
	{
		$query = $this->db->where('status','Pending')->get('tiket');
		return $query->num_rows();
	}
	public function getPrinterProg()
	{
		$query = $this->db->where('status','On Progress')->get('tiket');
		return $query->num_rows();
	}
	function getnomor(){
        $query = $this->db->query("SELECT MAX(RIGHT(kodebrg,3)) AS nomax FROM masterprinter WHERE DATE(tgl)=CURDATE()");
        $kd = "";
        if($query->num_rows()>0){
            foreach($query->result() as $k){
                $tmp = ((int)$k->nomax)+1;
                $kd = sprintf("%03s", $tmp);
            }
        }else{
            $kd = "001";
        }
        date_default_timezone_set('Asia/Jakarta');
        return "PRT-".date('dmy')."-".$kd;
    }
    public function getstatus()
    {
		$query = $this->db->query("SELECT statusp.tgl, masterprinter.`kodebrg`,masterprinter.`serialnumber`, masterprinter.`model`, statusp.fromdepo, statusp.`divisi`,statusp.keterangan, statusp.`status`, statusp.action , statusp.tglclose, statusp.tgldeadline, statusp.keteranganpend
			
			FROM masterprinter 
			RIGHT JOIN statusp ON masterprinter.`serialnumber` = statusp.`serialnumber`");
		return $query->result();
	}
    public function simpan($data)
	{
		$this->db->insert('masterprinter', $data);
	}
	public function savealokasi($data)
	{
		$this->db->insert('alokasi', $data);
	}
	public function save($data)
	{
		$this->db->insert('statusp', $data);
	}
	public function savetiket($data)
	{
		$this->db->insert('tiket', $data);
	}
	public function savelog($data)
	{
		$this->db->insert('log', $data);
	}
	public function updateprogress($serial, $data)
	{
		$this->db->set('tgldeadline','DATE_ADD(tgl, interval 6 day)',FALSE);
		$this->db->where('serialnumber', $serial);
		return $this->db->update('statusp', $data);
		return $this->db->update('tike', $data);
	}public function updateprogtiket($serial, $data)
	{
		$this->db->set('tgldeadline','DATE_ADD(tgl, interval 6 day)',FALSE);
		$this->db->where('serialnumber', $serial);
		return $this->db->update('tiket', $data);
	}
	public function updatecontinue($serial, $data)
	{
		$this->db->set('tgldeadline','DATE_ADD(now(), interval 3 day)',FALSE);
		$this->db->where('serialnumber', $serial);
		return $this->db->update('statusp', $data);
		return $this->db->update('tiket', $data);
	}
	public function updateconttiket($serial, $data)
	{
		$this->db->set('tgldeadline','DATE_ADD(now(), interval 3 day)',FALSE);
		$this->db->where('serialnumber', $serial);
		return $this->db->update('tiket', $data);
	}
	public function update($serial, $data)
	{
		$this->db->where('serialnumber', $serial);
		return $this->db->update('statusp', $data);
	}
	public function updatetiket($serial, $data)
	{
		$this->db->where('serialnumber', $serial);
		return $this->db->update('tiket', $data);
	}
	public function deletestat($serial)
	{
		$this->db->where('serialnumber', $serial);
		$this->db->delete('statusp');
	}
	public function updatestatusmaster($serial, $data)
	{
		$this->db->where('serialnumber', $serial);
		return $this->db->update('masterprinter', $data);
	}
	public function report()
	{
		$query = $this->db->get('masterprinter');
		return $query->result();
	}
	public function histori()
	{
		$query = $this->db->get('tiket');
		return $query->result();
	}
	public function printer()
	{
		$query = $this->db->where('status', "Fixed")->get('masterprinter');
		return $query->result();
	}
	public function dataall()
	{
		$query = $this->db->order_by('serialnumber', 'ASC')->get('masterprinter');
		return $query->result();
		/*if($query->num_rows() > 0){
			return $query->result();
		}else{
			return array();
		}*/
	}
	public function getdepo()
	{
		$query = $this->db->order_by('namadepo', 'ASC')->get('depo');
		return $query->result();
	}
	public function getdetail($table, $id)
	{
		//$query = "SELECT datafastel.namadepo, datafastel.alamat, layanan.jenis, layanan.nosid FROM datafastel RIGHT JOIN layanan ON datafastel.iddepo = layanan.iddepo WHERE datafastel.iddepo = " . $id ."GROUP BY jenis";
		//return $query;

	//	$query =  $this->db->select('datafastel.namadepo, datafastel.alamat, layanan.jenis, layanan.nosid')
	//					->join('layanan', 'layanan.iddepo = datafastel.iddepo')						
	//					->group_by('layanan.jenis')
	//					->get_where($table, array('layanan.iddepo' => $id))->row();
		return $this->db->select('log.*, masterprinter.model')->join('masterprinter', 'log.serialnumber = masterprinter.serialnumber')->get_where($table, array('log.serialnumber' => $id))->result();
	}
	public function getmodel($table, $id)
	{
		return $this->db->get_where($table, array('no' => $id))->result();
    	//$this->db->where($id);
    	//$query = $this->db->where(array('iddepo' => $id))->get($table);
    	//$query = $this->db->get_where($table, array('iddepo' => $id));
 
    	//return $query->result();
		//return $this->db->get_where($table, array('iddepo' => $id))->row();
	}
	public function getmodelbyid($table, $id)
	{
		return $this->db->get_where($table, array('no' => $id))->result();
	}
	public function getmodelbysn($table, $id)
	{
		return $query =  $this->db->select('statusp.tgl, masterprinter.kodebrg,masterprinter.serialnumber, masterprinter.model, statusp.fromdepo, statusp.divisi,statusp.keterangan, statusp.status, statusp.action')
						->join('statusp', 'masterprinter.serialnumber = statusp.serialnumber')
						->get_where($table, array('statusp.serialnumber' => $id))->row();/*
		return $this->db->get_where($table, array('serialnumber' => $id))->row();*/
	}
	public function get_by_id($table,$id)
	{
		return $query =  $this->db->select('datafastel.namadepo, datafastel.alamat, layanan.jenis, layanan.nosid')
						->join('layanan', 'layanan.iddepo = datafastel.iddepo')						
						->group_by('layanan.jenis')
						->get_where($table, array('layanan.iddepo' => $id))->result();
    }
}