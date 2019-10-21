// var name = 'Asd';
// var car = {
//     "color" : "green",
//     "engine" : "V16",
//     "volume" : 12,
//     "summ" : function(){
//         console.log(4*4);
//     }
// }
// console.log(car.color);
// car.summ();
// var firstImage = document.getElementById('first-img');
// console.log();
// $ = jQuery

$('document').ready(function(){
	$('#last-posts-button').click(function(event){
		event.preventDefault();
		// $(this).hide();
		$('#last-posts-ul').fadeIn(1000);
		console.log('clicked');
	});

$('#comment-toggle-btn').click(function(event){
	event.preventDefault();
	var form = $('#comment-form');
	if (form.hasClass('shown') ){
		form.fadeToggle().removeClass('shown');
		$(this).html('Комметировать');
	} else {
		form.fadeToggle().addClass('shown');
		$(this).html('Скрыть');	
	}
	console.log('clicked');
});
	

	// var windowHeight = $(window).height();
	// var bodyHeight = $('body').height();

	// if(windowHeight > bodyHeight){
	// 	$('.footer').addClass('sticky-footer');
	// }
	// else {
		
	// }

	$('#reg-button').click(function(event){
		event.preventDefault();

		var username = $('#username').val();
		var email = $('#email').val();
		var phone = $('#phone').val();
		var password = $('#password').val();
		var confirmPassword = $('#confirmPassword').val();

		var error = false;

		$('.valid-feedback').remove();
		$('.invalid-feedback').remove();

		if(username.length < 3){
			$('#username').addClass('is-invalid').after('<div class="invalid-feedback">Имя не может быть короче двух символов!</div>');
			error = true;
		} else{
			$('#username').addClass('is-valid').after('<div class="valid-feedback">OK</div>');
		}

		if (!checkEmail(email)){
			$('#email').addClass('is-invalid').after('<div class="invalid-feedback">Нет @</div>');
		} else {
			$('#email').addClass('is-valid').after('<div class="valid-feedback">OK</div>');
		}

		if(phone.length < 10){
			$('#phone').addClass('is-invalid').after('<div class="invalid-feedback">Телефон не может быть короче десяти символов!</div>');
		} else{
			$('#phone').addClass('is-valid').after('<div class="valid-feedback">OK</div>');
		}

		// if(comment.length < 1){
		// 	$('#comment').addClass('is-invalid').after('<div class="invalid-feedback">Комментарий не может быть пустым!</div>');
		// } else{
		// 	$('#comment').addClass('is-valid').after('<div class="valid-feedback">OK</div>');
		// }


		if(password != confirmPassword){
			$('#confirmPassword').addClass('is-invalid').after('<div class="invalid-feedback">Пароли не совпадают!</div>');
		} else {
			$('#confirmPassword').addClass('is-valid').after('<div class="valid-feedback">OK</div>');
		}

		if(!error){
			$('form').submit();
		}


	});


});

function checkEmail(email){
	for (var i=0; i < email.length; i++){
		if(email[i] == '@'){
			return true;
		}
	}
	return false;
}
// function show (){s
// 	console.log();
// }