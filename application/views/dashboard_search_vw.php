  <?php
  	if(count($tamu)<=0){
  		echo "<span style='color:red'>Data tidak ditemukan!</span>";
  	}else{
  		
  		echo '<table class="table table-hover table-bordered">
			  <thead><tr>
			    <th>Nama</th>
			    <th>No. Identitas</th>
			    <th>Alamat</th>
			  </tr>
			  </thead>
			  <tbody>';
  		foreach($tamu as $t){
			echo '<tr class="clickable" onclick="loadDataToForm(\''.$t['id_tamu'].'\')">
	            <td>'.$t['nama'].'</td>
	            <td>'.$t['noId'].'</td>
	            <td>'.$t['alamat'].'</td>
	          </tr>';
		}

		echo '</tbody></table>';
  	}
	
  ?>
  
                