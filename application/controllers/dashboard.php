<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

  private $template;

  public function __construct(){
      parent::__construct();
      $this->template = 'false';  
  }

  public function index()
  {
      checkLogin(); 
      $this->template=true;
      $data['title']='Dashboard';
      $data['info']='';
      $data['breadcrumb']='Dashboard';

      /*
        format data untuk tulis kartu    = tipeIntruksi/noKamar/date_in/time_in/date_out/time_out/idTamu/namaTamu/0
        ex : tulisKartu#31/19-02-25/17:00:00/19-02-26/13:00:00/1002/guest/0
      */
      $command = "tulisKartu#00000000000#31/19-02-25/17:00:00/19-03-26/13:00:00/1002/guest/0/14/1";
        //$output="tes";
      // $command = "bacaKartu#0#0";
        //exec('HotelManagementSystem.exe -data '.$command,$output,$return);
        //exec('D:\DATA\PROJECT\HOTEL\HMS\HotelManagementSystem\HotelManagementSystem\bin\x86\Release\HotelManagementSystem.exe -data '.$command,$output,$return);
      if($output[0]=='Error'){
         echo "Maaf, Terjadi kesalahan hubungi Administrator";
      }else{
         //dump($output);
      }
      $data['content']  = $this->showList();
      $this->load->view('dashboard_vw',$data);
  }

  public function showList(){
    #get kamar
    $sql                = "select * from kamar";
    $data['kamar']      = $this->fetchSql($sql);

    #get transaksi dgn status 1:checkin, 2:cleaning
    $sql                = "select trx.*, t.nama from transaksi trx
                          left join tamu t on trx.id_tamu=t.id_tamu  where trx.status in (1,2) order by trx.check_in asc";
    $transaksi          = $this->fetchSql($sql);

    foreach($transaksi as $trx){
       $data['transaksi'][$trx['id_kamar']]=$trx;
    }

   /* $sql                = "select b.*, a.nama, a.status from transaksi a right join kamar b on (a.id_kamar=b.id_kamar) group by id_kamar order by a.id_kamar asc";
    $data['update']     = $this->fetchSql($sql);*/

    return $this->load->view('dashboard_list_vw',$data,$this->template);
  }

  public function showSearchList(){
     $keyword       = $this->input->post("keyword");
     $data ['tamu'] = $this->getTamu($keyword);
     return $this->load->view("dashboard_search_vw",$data);
  }

  public function showForm($type){
    $data['dataKamar']          = $this->getKamarReady();


    #if new
    if($type=="new"){
        $id_kamar                   = $this->input->post("id_kamar");

        $data['transaksi']          = array(0=>array("id_kamar"=>$id_kamar,
                                                    "check_in"=>date("Y-m-d H:i:s"),
                                                    "jlh_org"=>1,
                                                    "jlh_hari"=>1,
                                                    "bts_check_out"=>date("d-m-Y 13:00:00",strtotime(date("d-m-Y") . "+1 days")),
                                                    "jenis_tarif"=>"d",
                                                    "tarif"    =>350000
                                                    )
                                      );
        $data['action']             = 'add';

    }
    else if($type=="edit"){
        $notransaksi                = $this->input->post("notransaksi");
        $data['transaksi']          = $this->getTransaksi($notransaksi);
        $data['action']             = 'edit';
    }

    $id_tamu                        = $this->input->post("id_tamu");

    if($id_tamu !=""){
       $data['tamu']                = $this->getTamu($id_tamu);
    }
    
    /*
*/
    return $this->load->view('dashboard_form_vw',$data,$this->template);
  }

 /* public function showFormEdit_all(){
     $data['dataKamar']          = $this->getKamarEdit();
     $id                         = $this->input->post("id");
     $data['transaksi']          = $this->getTransaksi_all($id);
     $data['action']             = 'edit';
     return $this->load->view('dashboard_form_vw',$data,$this->template);
  }


   public function showFormEdit(){
     $data['dataKamar']          = $this->getKamarEdit();
     $notransaksi                = $this->input->post("notransaksi");
     $data['action']             = 'edit';
     return $this->load->view('dashboard_form_vw',$data,$this->template);
  }*/

  public function checkIn(){
        $data['profile']=array(
                          "noId"        => $this->input->post("noId"),
                          "nama"        => $this->input->post("nama"),
                          "kelamin"     => $this->input->post("kelamin"),
                          "umur"        => $this->input->post("umur"),
                          "hp"          => $this->input->post("hp"),
                          "alamat"      => $this->input->post("alamat"),
                          "perusahaan"  => $this->input->post("perusahaan"),
                          "keterangan"  => $this->input->post("keterangan"),
                        );

        $this->db->insert('tamu',$data['profile']);
        $id_tamu = $this->db->insert_id();

       if($id_tamu>0){
            foreach($this->input->post("id_kamar") as $i=>$k){
                 $bts_check_out    = $this->convertDateTime($this->input->post("bts_check_out")[$i]);
                 $notransaksi      = $this->generateNotransaksi(substr($this->input->post("check_in"),0,10));

                 $data['transaksi']= array(
                          "notransaksi"  => $notransaksi,
                          "id_tamu"      => $id_tamu,
                          "kendaraan"    => $this->input->post("kendaraan"),
                          "no_kendaraan" => $this->input->post("noKendaraan"),
                          "check_in"     => $this->input->post("check_in"),
                          "bts_check_out"=> $bts_check_out,
                          "id_kamar"     => $this->input->post("id_kamar")[$i],
                          "jlh_org"      => $this->input->post("jlh_org")[$i],
                          "jlh_hari"     => $this->input->post("jlh_hari")[$i],
                          "tarif"        => $this->input->post("tarif")[$i],
                          "jenis_tarif"  => $this->input->post("jns_tarif")[$i],
                          "status"       => 1,
                          "id_operator"  => 1
                  );

                 $this->db->insert("transaksi",$data['transaksi']);

                 $this->db->where("id_kamar",$this->input->post("id_kamar")[$i]);
                 $this->db->update("kamar",array("status_kamar"=>1));
            }
       }

  }


  public function edit(){
        $id_tamu     = $this->input->post("id_tamu");
        $notransaksi = $this->input->post("notransaksi"); 

        $data['profile']=array(
                          "noId"        => $this->input->post("noId"),
                          "nama"        => $this->input->post("nama"),
                          "kelamin"     => $this->input->post("kelamin"),
                          "umur"        => $this->input->post("umur"),
                          "hp"          => $this->input->post("hp"),
                          "alamat"      => $this->input->post("alamat"),
                          "perusahaan"  => $this->input->post("perusahaan"),
                          "keterangan"  => $this->input->post("keterangan"),
                        );

        $this->db->where('id_tamu',$id_tamu);
        $this->db->update('tamu',$data['profile']);

       if($id_tamu>0){
            foreach($this->input->post("id_kamar") as $i=>$k){
                 $bts_check_out    = $this->convertDateTime($this->input->post("bts_check_out")[$i]);
                 $data['transaksi']=array(
                    "id_tamu"     => $id_tamu,
                    "kendaraan"   => $this->input->post("kendaraan"),
                    "no_kendaraan"=> $this->input->post("noKendaraan"),
                    "check_in"    => $this->input->post("check_in"),
                    "bts_check_out"=> $bts_check_out,
                    "id_kamar"    => $this->input->post("id_kamar")[$i],
                    "jlh_org"     => $this->input->post("jlh_org")[$i],
                    "jlh_hari"    => $this->input->post("jlh_hari")[$i],
                    "tarif"       => $this->input->post("tarif")[$i],
                    "jenis_tarif" => $this->input->post("jns_tarif")[$i],
                    "id_operator"    => 1
                  );

                 $this->db->where("notransaksi",$notransaksi);
                 $this->db->update("transaksi",$data['transaksi']);
            }
       }

  }

  public function batal(){
     $notransaksi = $this->input->post("notransaksi");

      #update transaksi
      $data['status']    = 5;
      $data['check_out'] = date('Y-m-d H:i:s');

      $this->db->where("notransaksi",$notransaksi);
      $this->db->update("transaksi",$data);

      $transaksi = $this->getTransaksi($notransaksi);
      $dKamar['status_kamar'] = 5;
      $this->db->where("id_kamar",$transaksi[0]['id_kamar']);
      $this->db->update("kamar",$dKamar);
  }


  public function checkOut_all(){
      $id = explode("/",$this->input->post("id"));
      $id_tamu  = $id[0];
      $check_in = $id[1];

      #update transaksi
      $data['status']    = 2;
      $data['check_out'] = date('Y-m-d H:i:s');

      $this->db->where("id_tamu",$id_tamu);
      $this->db->where("check_in",$check_in);
      $this->db->update("transaksi",$data);

      $transaksi = $this->getTransaksi_all($this->input->post("id"));

      foreach($transaksi as $trx){
         $dKamar['status_kamar'] = 2;
         $this->db->where("id_kamar",$trx['id_kamar']);
         $this->db->update("kamar",$dKamar);
      }
  }

   public function checkOut(){
      $notransaksi = $this->input->post("notransaksi");
    
      #update transaksi
      $data['status']    = 2;
      $data['check_out'] = date('Y-m-d H:i:s');

      $this->db->where("notransaksi",$notransaksi);
      $this->db->update("transaksi",$data);

      $transaksi = $this->getTransaksi($notransaksi);
      $dKamar['status_kamar'] = 2;
      $this->db->where("id_kamar",$transaksi[0]['id_kamar']);
      $this->db->update("kamar",$dKamar);
  }

  public function getTgl(){
    $jenis_tarif = $this->input->post("jns_tarif");
    if($jenis_tarif=="d"){//1 day
        $bts_check_out = date('d-m-Y / 13:00:00',strtotime(date('d-m-Y') . "+1 days"));
    }else{
        $bts_check_out = date('d-m-Y / H:i:s',strtotime(date('d-m-Y H:i:s') . "+8 hours"));
    }

    echo $bts_check_out;
  }

  private function generateNotransaksi($tgl){
      $sql = "SELECT MAX(CAST(SUBSTRING(notransaksi, 12, length(notransaksi)-3) AS UNSIGNED)) as maxNo FROM transaksi where check_in like '%".$tgl."%' ";
      $data= $this->fetchSql($sql);
      $notransaksi = date("Ymd")."/T/".sprintf("%04d",($data[0]['maxNo']+1));
      return $notransaksi;
  }

  private function getTransaksi_all($id){
     $id = explode("/",$id);
     $id_tamu = $id[0];
     $check_in= $id[1];

     $sql = "select * from transaksi trx 
             left join tamu t on trx.id_tamu = t.id_tamu
             where trx.id_tamu='".$id_tamu."' and trx.check_in='".$check_in."'";

     return $this->fetchSql($sql);
  }

  private function getTransaksi($notransaksi){

     $sql = "select * from transaksi trx 
             left join tamu t on trx.id_tamu = t.id_tamu
             where trx.notransaksi='".$notransaksi."'";
     return $this->fetchSql($sql);
  }


  private function getTamu($keyword){
    if($keyword!=""){
       $sql ="select * from tamu where nama like '%".$keyword."%'";
       return $this->fetchSql($sql);
    }
  }

  private function getKamarReady(){
      #get kamar
      $sql                = "select * from kamar where status_kamar=0 or status_kamar>4 order by id_kamar asc";
      $data['kamar']      = $this->fetchSql($sql);

      return $data['kamar'];
  }

  private function getKamarEdit(){
      #get kamar
      $sql                = "select * from kamar where status_kamar=0 or status_kamar=1 order by id_kamar asc";
      $data['kamar']      = $this->fetchSql($sql);

      return $data['kamar'];
  }

  private function convertDateTime($stringTime){
     $str = explode("/", $stringTime);
     $date = trim($str[0]);
     $time = trim($str[1]);

     $date = convertTgl($date);

     return $date." ".$time;
  }

  


  private function saveTransaksi(){

  }

  private function fetchSql($sql){
    $q=$this->db->query($sql);
    return $q->result_array();
  }



}

