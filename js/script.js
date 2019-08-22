$(function(){
	$('.navbar-toggler').click(function(){
  		$('.side-nav').toggle();
	});

 $('.alert').delay(5000).slideUp(400);

 $('#c_password').change(function(){
 	pass = $('#password').val();
 	cpass = $(this).val();

 	if(pass != cpass){
 		$(this)[0].setCustomValidity('password not confirmed');
 	}
 	else{
 		$(this)[0].setCustomValidity('');
 	}
 });

 $('.delete').click(function(e){
	e.preventDefault();
	url = $(this).attr('href');

	if(confirm('Are you sure you want to delete this item')){
		location.href = url;
	}

 });
 
});