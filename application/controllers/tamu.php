<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tamu extends CI_Controller {
  private $template;

	public function __construct(){
      parent::__construct();
      $this->template=false;
      checkLogin();   
  }

	public function index()
	{
      $this->template=true;
		  $this->load->helper('getmenu');
      $menus=getmenu();
      
      $data['title']='Data Tamu';
      $data['info']='';
      $data['breadcrumb']='Data Tamu';

      $data['listTamu']=$this->showList();
      $this->load->view('tamu_vw',$data);
	}

  public function showList(){
    #get kamar
    $sql                = "select * from kamar";
    $data['kamar']      = $this->fetchSql($sql);


    #get transaksi
    $sql                = "select * from transaksi where status=0 group by id_kamar order by check_in desc";
    $data['transaksi']  = $this->fetchSql($sql);

    return $this->load->view('tamu_list_vw',$data,$this->template);
  }

  public function showForm(){
    $data['tamu']="";
    return $this->load->view('tamu_form_vw',$data,$this->template);
  }

  
  

  public function save(){

    $transaksi['notransaksi'] =$this->generateNoTrx();
    $transaksi['nokamar']   =$this->input->post('noKamar');
    $transaksi['nama']        =$this->input->post('nama');
    $transaksi['tgl_lahir']   =$this->input->post('thnLahir')."-".$this->input->post('blnLahir')."-".$this->input->post('tglLahir');
    $transaksi['kelamin']     =$this->input->post('kelamin');
    $transaksi['hp']          =$this->input->post('hp');
    $transaksi['dokter']      =$this->input->post('dokter');
    $transaksi['keluhan']     =$this->input->post('keluhan');
    $transaksi['diagnosa']    =$this->input->post('diagnosa');
    $transaksi['tindakan']    =$this->input->post('tindakan');
    $transaksi['tgl_in']      =date("Y-m-d");
    $transaksi['tgl_out']     ="";
    $transaksi['jenis_bayar'] =$this->input->post('jenis_bayar');
    $transaksi['no_jenis_bayar'] =$this->input->post('no_jenis_bayar');
    $transaksi['biaya_checkup']=$this->input->post('biayaCheckup');
    $transaksi['status']      =0;
    $tempObat                 =$this->input->post('tempObat');

    #jika data checkup sudah di isi
    if($transaksi['dokter']!="" || $transaksi['keluhan']!="" || $transaksi['diagnosa']!="" || $transaksi['tindakan'] !="" || $transaksi['biaya_checkup']>0){
        $transaksi['status']      =1;//sudah di periksa
    }

    #insert or update transaksi
    if($this->input->post('noTransaksi')==""){
      #insert new
     // $this->checkStockObat($jlhReqObat);
      $this->db->insert('transaksi', $transaksi);
    }else{
      #update
      //$this->checkStockObat($jlhReqObat,$tempObat,true);
      $transaksi['notransaksi']=$this->input->post('noTransaksi');
      $this->db->where('notransaksi',$transaksi['notransaksi']);
      $this->db->update('transaksi', $transaksi);
    }
  }

  private function fetchSql($sql){
      $q=$this->db->query($sql);
      return $q->result_array();
  }


}
