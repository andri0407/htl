//GENERAL===============================

function listExcel(){
	var data={}; 
	var tempHtml=$("#list_fieldset").clone().find('.no_print,button').remove().end().appendTo("#list_fieldset_temp");
	$('#list_fieldset_temp input').each(function(){
		var temp=$(this).val();
		$(this).after('<b>'+temp+'</b>');
		$(this).remove();
	});
	$('#list_fieldset_temp a').each(function(){
		var temp=$(this).html();
		$(this).after('<b>'+temp+'</b>');
		$(this).remove();
	});

	data['htmlData']=$("#list_fieldset_temp").html();
	data['title']	=$("#list_fieldset .title").html();

	url='hrd_data_child_listExcel.php';
	postData=data;
	sendPostData(url,postData, function callback(response){
		showBox(response);
		$("#list_fieldset_temp").html('');
		closeBox();
	});
}

function listPdf(){
	var data={}; 
	data['htmlData']=$("#list_fieldset ").html();
	url='hrd_data_child_listPdf.php';
	postData=data;
	sendPostData(url,postData, function callback(response){
   		content="<iframe id='tesPdf' frameborder=0 width=100% height=100%></iframe>"
		showBox(content);
   		$('#tesPdf')[0].contentDocument.write(response)
	});
}


function showBox(htmlData,title){
	$("#dialog").html(htmlData);
	$("#dialog").dialog('option', 'title', title);
	$("#dialog").dialog( "open" );
}

function closeBox(){
	$("#dialog").dialog( "close" );
}

function showWindow(url){
	
	if(url==''){
		$("#dialog").html('Link not found!');
	}else{
		$("#dialog").html('<iframe id="iframe_" src="'+url+'?iframe_layout=no-menus" style="height:600px; width:100%;"></iframe>');
	}
	$("#dialog").dialog( "open" );
}

function exportExcel(divId,title){
	var data={};
	$("#list_fieldset_temp").remove();
	$("#"+divId).after("<div id='list_fieldset_temp'></div>");
	console.log(divId);
	console.log($("#"+divId).html());
	var tempHtml=$("#"+divId).clone().find('.no_print,button').remove().end().appendTo("#list_fieldset_temp");
	$("#list_fieldset_temp").find('table').attr('border','1');
	$("#list_fieldset_temp").find('.rowheader').attr('bgcolor','DEDEDE');
	$('#list_fieldset_temp input').each(function(){
		var temp=$(this).val();
		$(this).after('<b>'+temp+'</b>');
		$(this).remove();
	});
	$('#list_fieldset_temp a').each(function(){
		var temp=$(this).html();
		$(this).after('<b>'+temp+'</b>');
		$(this).remove();
	});

	data['htmlData']=$("#list_fieldset_temp").html();
	data['title']	=title;
	data['export']='excel';

	url='lib/andri_export.php';
	postData=data;
	sendPostData(url,postData, function callback(response){
		showBox(response,'Excel Report');
		$("#list_fieldset_temp").remove();
		closeBox();
	});
}

function sendPostData(url,postData,callback){
	$("#progress").css("display","block");
	var result;
	var send=$.ajax({
				      type: 'POST',
				      url: url,
				      data: postData,
				      dataType: "text",
				      success: function(resultData) { 
				      	 callback(resultData);
				      	 $("#progress").css("display","none");
					  },
					  fail:function(){
					  	 alert(resultData);
					  	 $("#progress").css("display","none");
					  }

				});
	send.error(function() { alert("Something went wrong: "+url); $("#progress").css("display","none");});

}

function responseError(resp)
{
	resp=resp.toUpperCase();
	if (resp.lastIndexOf('GAGAL') > -1 || resp.lastIndexOf('ERROR') > -1 || resp.lastIndexOf('WARNING') > -1)
      return true;
	else
	  return false;  
}


$( document ).on("focus",".input_tgl_indo",function() {
		$( ".input_tgl_indo" ).datepicker({
		  changeMonth: true,
		  changeYear: true,
		  dateFormat: 'dd-mm-yy'
		});
	  } 
);

/////////////////////////////////
function addCommas(nStr)
{
	nStr += '';
	var x = nStr.split('.');
	var x1 = x[0];
	var x2 = x.length > 1 ? '.' + x[1] : '';
	var rgx = /(\d+)(\d{3})/;
	while (rgx.test(x1)) {
		x1 = x1.replace(rgx, '$1' + ',' + '$2');
	}
	return x1 + x2;
}

function resizeIFrameToFitContent( iFrame ) {

	    iFrame.width  = iFrame.contentWindow.document.body.scrollWidth;
	    iFrame.height = iFrame.contentWindow.document.body.scrollHeight;
	}

	window.addEventListener('DOMContentReady', function(e) {

	    var iFrame = document.getElementById( 'iframe_' );
	    resizeIFrameToFitContent( iFrame );

	    // or, to resize all iframes:
	    var iframes = document.querySelectorAll("iframe");
	    for( var i = 0; i < iframes.length; i++) {
	        resizeIFrameToFitContent( iframes[i] );
	    }
	} );


 $( function() {
    $( "#tabsDetail, #tabs" ).tabs();
  } );
  
  $( function() {
    $( "#accordion" ).accordion({
		collapsible: true,
		active: false
		});
  } );


  $( function() {
    $( "#dialog" ).dialog({
      autoOpen: false,
	  width: 1050,
      show: {
        effect: "fadeIn",
        duration: 200
      },
      hide: {
        effect: "fadeOut",
        duration: 200
      }
    });
 
    $( "#opener" ).on( "click", function() {
      $( "#dialog" ).dialog( "open" );
    });
	
	 $( ".btn_profil" ).on( "click", function() {
      $( "#dialog" ).dialog( "open" );
    });
	
  } );

  $('.input_').keypress(function (e) {
	  if (e.which == 13) {
	    return false; 
	  }
	});