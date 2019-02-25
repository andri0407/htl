
/*function act(urlName,func,divResponse,dataPost){
	if (typeof(dataPost)==='undefined') dataPost = '';

	var data={};
		data['action']=func;
		data['data']=dataPost;
		if(IsJsonString(dataPost)){
			dataPost=str_replace('___',' ',dataPost);
			data['data']=JSON.parse(dataPost);
		}

		url=fileChild[urlName];
		postData=data;
		general_sendPostData(url,postData, function callback(response){
				var upperResponse=response.toUpperCase();
				if(!responseError(response)){
					if(response==='false'){

					}else{
						if(divResponse=='dialogBox'){
								 dialogBox(response);
						}else{
							$("#"+divResponse).html(response);
						}
					}
				}else{
					alert(response);
				}
		});
}

*/

function loginSuccess(response){
	response=JSON.parse(response);
	if(response['status']==0){
		$("#loginInfo").html("<p style='color:red'>"+response['text']+"</p>");
	}else{
		$("#loginInfo").html("Ok, please wait...");
		window.location.href="dashboard";
	}
}

function consoleCheck(response){
	console.log(response);
}



document.getElementById('password').onkeydown = function(e){
   if(e.keyCode == 13){
     $("#act_login").click();
   }
};
document.getElementById('username').onkeydown = function(e){
   if(e.keyCode == 13){
     $("#password").focus();
   }
};

