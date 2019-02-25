<?php
    defined('BASEPATH') OR exit('No direct script access allowed');

    class Login extends CI_Controller{
        public function __construct(){
          parent::__construct();
        }

        function index(){
            session_destroy();
            $this->load->view('login_vw');
        }

        function checkLogin(){
        	$username=$this->input->post('username');
        	$password=md5($this->input->post('password'));

        	$sql="select * from sys_users where username='".$username."' and password='".$password."'";
        	$q=$this->db->query($sql) or die($this->db->error);
            $r=$q->result_array();
        	if($q->num_rows()>0){
                $datalogin=$r[0];
                unset($datalogin['password']);

                $sql="select * from users where id_user='".$datalogin['id_user']."'";
                $q=$this->db->query($sql);
                $r=$q->result_array();
                if($q->num_rows()>0){
                    $datauser=$r[0];

                    $result['status']=1;
                    $_SESSION['userlogin']=$datalogin;
                    $_SESSION['userdata']=$datauser;

                    $this->load->helper('getmenu');
                    $menus=getmenu();
                }else{
                    $result['status']=0;
                    $result['text']="Maaf, Data anda tidak terdaftar!";
                }      		
                
        	}else{
        		$result['status']=0;
        		$result['text']="Maaf, Username & Password anda Salah!";
        	}
        	
        	echo json_encode($result);
        }
    }

?>
