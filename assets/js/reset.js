function reset(){
	var data={};
	data['oldPassword']=$("#oldPassword").val();
	data['newPassword']=$("#newPassword").val();
	data['repeatPassword']=$("#repeatPassword").val();

	if(data['newPassword']!=data['repeatPassword']){
		alert("Harap Ulangi Password baru anda dengan benar!");
	}else{
		var controller='reset';
		var method    ='resetPassword';
	
		general_sendPostData(controller+"/"+method,data,function(resp){
			alert('Password berhasil di ubah, silahkan login kembali');
			window.location.href="login";
		});
	}
}