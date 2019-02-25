function showForm(that){
	var url="dashboard/showForm/new";
	var data={};
	data['id_kamar']=$(that).attr("value");
	var title="Check In";
	general_sendPostDataNoLoading(url,data, function(f){
		general_showModal(f,title)
	})
}

function showList(){
	var url="dashboard/showList";
	var data={};
	general_sendPostDataNoLoading(url,data, function(f){
		$("#content").html(f);
	})
}

function showFormSearch(){
	var url="dashboard/showSearchList";
	var data={};

	data['keyword'] = $("#nama").val();
	general_sendPostDataNoLoading(url,data, function(resp){
		general_showDialog(resp,"Pencarian Data Tamu");
	})
}

function loadDataToForm(id_tamu){
	var url="dashboard/showForm/new";
	var data={};
	data['id_tamu']=id_tamu;
	general_sendPostDataNoLoading(url,data, function(f){
		showForm();
		general_closeDialog();
	})
}

function checkIn(){
	var controller='dashboard';
	var method    ='checkIn';
	var formId	  ='formGuest';
	
	general_sendFormData(controller,method,formId,function(resp){
		showList();
		general_closeModal();
	});
}

function checkOut(that){
	var url="dashboard/checkOut";
	var data={};
	data['notransaksi']=$(that).attr("value");
	var title=$(that).find(".kamar").html();
	general_sendPostDataNoLoading(url,data, function(f){
		showList();
		general_closeModal();
	})
}

/*function showFormEdit_all(that){
	var url="dashboard/showFormEdit_all";
	var data={};
	data['id']=$(that).attr("value");
	var title=$(that).find(".kamar").html();
	general_sendPostDataNoLoading(url,data, function(f){
		general_showModal(f,title)
	})
}*/



function showFormEdit(that){
	var url="dashboard/showForm/edit";
	var data={};
	data['notransaksi']=$(that).attr("value");
	var title=$(that).find(".kamar").html();
	general_sendPostDataNoLoading(url,data, function(f){
		general_showModal(f,title)
	})
}

function edit(that){
	var url="dashboard/edit";
	var controller='dashboard';
	var method    ='checkIn';
	var formId	  ='formGuest';
	
	general_sendFormData(controller,method,formId,function(resp){
		showList();
		general_closeModal();
	});
}

function batal(that){
	var url="dashboard/batal";
	var data={};
	data['notransaksi']=$(that).attr("value");
	var title=$(that).find(".kamar").html();
	general_sendPostDataNoLoading(url,data, function(f){
		showList();
		general_closeModal();
	})
}

function addRoom(){
	var copy = $('#myRooms tbody > tr:last').clone().html();
	$('#myRooms tr:last').after("<tr>"+copy+"</tr>");
}

function deleteRoom(that){
	var jumlah = $('#myRooms tbody>tr').length;
	if(jumlah==1){
		alert("Minimal harus memilih 1 kamar!");
	}else{
		$(that).closest("tr").remove();
	}
}

function getPrice(that){
	var tipe = $(that).val();
	var price;
	var bts_check_out = getDate(that);
	if(tipe=="d"){
		price="350000";
	}else{
		price="275000";
	}

	$(that).closest("tr").find("input[name='tarif']").val(price);
}

function getDate(that){
	var url="dashboard/getTgl";
	var data={};
	var tgl;
	data['jns_tarif']=$(that).val();

	general_sendPostDataNoLoading(url,data, function(resp){
		$(that).closest("tr").find("input[name='bts_check_out']").val(resp);
	})
}


function load_page(category,page){
  var url=base_url+'tamu/showList';
  var data={};
  data['keyword']=$("#searchInput").val();
  data['category']=category;
  data['page']    =page;

  general_sendPostData(url,data,function(response){
      $("#wrapper-listTamu").html(response);
  })
}

function load_search(){
	var url=base_url+'tamu/showList';
	  var data={};
	  data['keyword']=$("#searchInput").val();

	  general_sendPostData(url,data,function(response){
	      $("#wrapper-listTamu").html(response);
	  })
}