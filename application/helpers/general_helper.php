<?php
	function dump($array){
		echo "<pre>";
		var_dump($array);
		echo "</pre>";
	}

	function checkLogin(){
		if(!isset($_SESSION['userdata'])){
			echo '<script>window.location.href="login";</script>';
	      	//redirect('login');
	    }
	}

	function namaBulan(){
		$m['01']='Januari';
		$m['02']='Februari';
		$m['03']='Maret';
		$m['04']='April';
		$m['05']='Mei';
		$m['06']='Juni';
		$m['07']='Juli';
		$m['08']='Agustus';
		$m['09']='September';
		$m['10']='Oktober';
		$m['11']='Nopember';
		$m['12']='Desember';

		return $m;
	}

	function convertTgl($tgl){
		$t=explode("-",$tgl);
		$tanggal=$t[2]."-".$t[1]."-".$t[0];
		return $tanggal;
	}

	function showNumber($number,$dec=0) {
		$zero="";
		if($number==0 or $number==''){
				return false;	
		}
		for($i=1;$i<=$dec;$i++){
			if($i==1)$zero.='.';
			$zero.='0';	
		}
	    return str_replace($zero, '', number_format($number, $decimals=$dec, $dec_point='.', $thousands_sep=','));
	}

	function showRupiah($number) {
	    return "<span class='pull-left'>Rp.</span><span class='pull-right'>".showNumber($number)."</span>";
	}
?>