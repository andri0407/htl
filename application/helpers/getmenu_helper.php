<?php
	function getmenu(){
		$ci =& get_instance();
		$ci->load->database();
		$sql = "select * from menus b
				left join sys_auth a on b.id_menu=a.id_menu
				where (a.id_user='".$_SESSION['userlogin']['id_user']."'
				and b.status=1) or a.id_user=0
				order by b.order";
		$q = $ci->db->query($sql);
		if($q->num_rows() > 0)
		{
		   $menus=$q->result_array();
		   $_SESSION['menus']=$menus;
		}	

		//dump($menus);

		return false;
	}
	
?>