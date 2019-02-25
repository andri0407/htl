function general_sendFormData(controller,method,formId,successFunc){
		var data={};
		var formdata={};
		$('#'+formId+'  '+':input').each(function() {
				if(this.type!="radio" && this.type!="checkbox"){
            		formdata[this.id]=this.value;
				}
        });

        $('#'+formId+'  '+':input[type="radio"]').each(function() {
        		var v    =$('input[name='+this.name+']:checked').val();
            	formdata[this.name]=v;
        });

        $('#'+formId+'  '+'select').each(function() {
            	formdata[this.id]=this.value;
        });

        $('#'+formId+'  '+'textarea').each(function() {
            	formdata[this.id]=this.value;
        });

        $('#'+formId+'  '+'.arrayInput').each(function() {
        		if(formdata[this.name]==undefined){
        			formdata[this.name]=[];
        		}
        		
        		formdata[this.name].push(this.value);
        });

		postData=formdata;
		url=controller+'/'+method;
		general_sendPostData(url,postData, successFunc);

}


function general_sendPostData(url,postData,successFunc){
	$.LoadingOverlay("show", {
	    image       : "",
	    text		:"Loading...",
	    size		:10
	});

	var result;
	var send=$.ajax({
				      type: 'POST',
				      url: url,
				      data: postData,
				      dataType: "text",
				      success: function(resultData) { 
				      	if(!responseError(resultData)){
							successFunc(resultData);
				      	 	$.LoadingOverlay("hide");
						}else{
							alert(resultData);
							$.LoadingOverlay("hide");
						}
				      	 
					  },
					  fail:function(resultData){
					  	 alert('Failed '+resultData);
					  	 $.LoadingOverlay("hide");
					  },
					  error:function(resultData){
					  	 alert('Error '+resultData);
					  	 $.LoadingOverlay("hide");
					  }

				});

	function responseError(txt)
	{
		txt=txt.toUpperCase();
		if (txt.lastIndexOf('ERROR') > -1)// || txt.lastIndexOf('WARNING') > -1)
	      return true;
		else
		  return false;
	}

}

function general_sendPostDataNoLoading(url,postData,successFunc){
	
	var result;
	var send=$.ajax({
				      type: 'POST',
				      url: url,
				      data: postData,
				      dataType: "text",
				      success: function(resultData) { 
				      	if(!responseError(resultData)){
							successFunc(resultData);
						}else{
							alert(resultData);
						}
				      	 
					  },
					  fail:function(resultData){
					  	 alert('Failed '+resultData);
					  },
					  error:function(resultData){
					  	 alert('Error '+resultData);
					  }

				});

	function responseError(txt)
	{
		txt=txt.toUpperCase();
		if (txt.lastIndexOf('GAGAL') > -1 || txt.lastIndexOf('ERROR') > -1)// || txt.lastIndexOf('WARNING') > -1)
	      return true;
		else
		  return false;
	}

}

function general_showDialog(htmlData,title,width="700"){
	$( "#dialog" ).dialog({ width: width });
	$("#dialog").html(htmlData);
	$("#dialog").dialog('option', 'title', title);
	$("#dialog").dialog( "open" );
}

function general_closeDialog(){
	$("#dialog").dialog( "close" );
}

function general_showModal(htmlData,title){
	$('#myModal .modal-title').html(title);
	$('#myModal .modal-body').html(htmlData);
	$('#myModal').modal({backdrop: 'static', keyboard: false})  

    $('#myModal').modal('show')  ;
}

function general_closeModal(){
	$('#myModal').modal('hide')  ;
}

$( function() {
    $( "#dialog" ).dialog({
      autoOpen: false,
      show: {
        effect: "fadeIn",
        duration: 200
      },
      hide: {
        effect: "fadeOut",
        duration: 200
      }
    });	
  } );

function toMenu(menu){
	window.location.href=menu;
}

