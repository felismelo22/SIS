$(document).ready(function(){
	// $('#user_edit').on('submit', function(e){
	// 	e.preventDefault();
	// 	var a = $(this).find('input[name="password"]').val();
	// 	var b = $(this).find('input[name="re-password"]').val();
	// 	var c = $(this).find('input[name="username"]').val();
	// 	var d = $(this).find('input[name="id"]').val();
	// 	var ready = 0;
	// 	if(a!=b){
	// 		$('#pass_error').html('<div class="alert alert-danger">'+
	//   		'<strong>danger !</strong> password tidak cocok.'+
	// 			'</div>');
	// 		ready = 0;
	// 	}else{
	// 		$('#pass_error').html('');
	// 		ready = 1;
	// 	}
	// 	if(d>0){
	// 		ready = 1;
	// 	}else{
	// 		$.ajax({
	// 		  type: "GET",
	// 		  url:  _url+"user/check_exist",
	// 		  data: {
	// 		  	"username": c
	// 		  },
	// 		  dataType: "json",
	// 		  beforeSend: function(i){

	// 		  },
	// 		  success: function(i){
	// 		  	if(i.success==1){
	// 		  		$('#user_error').html('<div class="alert alert-danger"><strong>danger !</strong> username sudah ada.</div>');
	// 		  		ready = 0;
	// 		  	}else{
	// 		  		$('#user_error').html('');
	// 		  		ready = 1;
	// 		  	}
	// 		  },
	// 		});
	// 	}
	// 	if(ready == 1){
	// 		// e.isDefaultPrevented();
	// 		// alert();
	// 		$('#user_edit').unbind('submit');
	// 		$(this).submit();
	// 	}
	// });
	$('input[name="re-password"]').on('focusout', function(){
		var a = $('#user_edit').find('input[name="password"]').val();
		var b = $(this).val();
		if(a!=b){
			$('#pass_error').html('<div class="alert alert-danger">'+
	  		'<strong>danger !</strong> password tidak cocok.'+
				'</div>');
		}else{
			$('#pass_error').html('');
		}
	});
	$('input[name="username"]').on('focusout', function(){
		var a = $(this).val();
		var b = $(this).siblings('input[name="id"]').val();
		$.ajax({
		  type: "GET",
		  url:  _url+"user/check_exist",
		  data: {
		  	"username": a,
		  	"id": b
		  },
		  dataType: "json",
		  beforeSend: function(i){

		  },
		  success: function(i){
		  	console.log(b);
		  	if(b>0){
		  		if(i.success==1){
			  		$('#user_error').html('<div class="alert alert-danger"><strong>danger !</strong> username sudah ada.</div>');
			  		$('#user_edit').on('submit',function(e){
			  			e.preventDefault();
			  		});
			  	}else{
			  		$('#user_error').html('');
			  	}
		  	}else{
			  	if(i.success==1){
			  		$('#user_error').html('<div class="alert alert-danger"><strong>danger !</strong> username sudah ada.</div>');
			  		$('#user_edit').on('submit',function(e){
			  			e.preventDefault();
			  		});
			  	}else{
			  		$('#user_error').html('');
			  	}
		  	}
		  },
		});
	});
});