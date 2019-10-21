$('document').ready(function(){
	

	$('#com-btn').click(function(event){
		event.preventDefault();

		var email = $('[name="comment-email"]');
		var name = $('[name="comment-username"]');
		var comment = $('[name="comment-comment"]');


			$.ajax({
				type: "POST",
				url: "ajax/add-comment.php",
				// beforeSend: function {
				// 	$('.loader').css('display' = 'block');
				// }
				data: {
					"comment-email" : email.val(),
					"comment-username" : name.val(),
					"comment-comment" : comment.val()
				},
				success: function (response){
					// $('.loader').css('display' = 'none');
					email.val('');
					name.val('');
					comment.val('');
					console.log(response);
				}
		});

	});

	$('.page-link').click(function(event){
		event.preventDefault();
		if ($(this).parent().hasClass('active')){
			return false;
		}
		var clicked = $(this);
		var pg = $(this).data('pg');

		$.ajax({
			url: 'ajax/pagination.php',
			type: 'GET',
			data: {
				"pg" : pg
			},
			success: function(response){
				var comments = JSON.parse(response);
				$('.comments-block').html('');
				comments.forEach(function(item, i, arr){
					$('.comments-block').append('<div class="pl-2 comment mb-2 row">' +
  '<div class="comment-avatar col-md-1 col-sm-2 text-center pr-1">' + 
      '<a href=""><img class="mx-auto rounded-circle img-fluid" src="https://pbs.twimg.com/profile_images/687218472032546816/Zl0jUAbf_400x400.jpg" alt="avatar"></a>' +
  '</div>' + 
  '<div class="comment-content col-md-11 col-sm-10">' +
      '<h6 class="small comment-meta">' + 
        '<span>' + item.username + '</span>' + item.created_at + '</h6>' +
      '<div class="comment-body">' +
          '<p>' + item.comment +
              '<br>' +
              '<a href="" class="text-right small"><i class="ion-reply"></i> Reply</a>' +
          '</p>' +
      '</div>' +
  '</div>' +
'</div>');
				});

				$('.page-item').removeClass('active');
				
				$('#pg-' + pg).parent().addClass('active');

				$('#pg-prev').data('pg', pg-1);
				$('#pg-next').data('pg', pg+1);

				if(pg != 1){
					$('#pg-prev').parent().removeClass('disabled');
				} else {
					$('#pg-prev').parent().addClass('disabled');
				}

				var pgLinkCount = $('.page-item').length;
				pgLinkCount -=2; // pgLinkCount = pgLinkCount -2;

				if(pg != pgLinkCount){
					$('#pg-next').parent().removeClass('disabled');
				} else {
					$('#pg-next').parent().addClass('disabled');
				}
				
				console.log(comments);
			}
		});
	});

	

});

	
