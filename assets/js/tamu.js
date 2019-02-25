function showForm(that){
	var url="tamu/showForm";
	var data={};
	var title="Kamar "+$(that).find(".kamar").html();
	general_sendPostDataNoLoading(url,data, function(f){
		//$("#wrapper-formTamu").html(f);
		general_showModal(f,title)
	})
}


function saveTamu(){
	var controller='tamu';
	var method    ='save';
	var formId	  ='formTamu';
	
	general_sendFormData(controller,method,formId,function(resp){
		showForm();
		showList();
	});
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