<?php
include '../inc/connection.php';
include '../inc/login.php';

if (!$loggedIn) {
	header('location: login.php');
}


$query = $DBcon->query("SELECT * FROM `comment`");
$comments = $query->fetch_all(MYSQLI_ASSOC);


?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<!-- Bootstrap core CSS -->
    <link href="../css/bootstrap.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="../css/style.css" rel="stylesheet">
	<title>Добро пожаловать на мой блог</title>
</head>
<body>	
	<div class="wrap">
	<?php
	  include "../inc/admin-navbar.php";
	?>
		<div class="container mt-4 mb-4">
			<div class="row">
				<div class="col-sm-3">
					<?php
						include "../inc/admin-sidebar.php";
					?>
				</div>
				<div class="col-sm-9">
					<table class="table">
						 
					  <thead class="thead-dark">
					    <tr>
					      <th scope="col">id</th>
					      <th scope="col">username</th>
					      <th scope="col">email</th>
					      <th scope="col">comment</th>
					      <th scope="col">created_at</th>
						  <th scope="col">view</th>
						  <th scope="col">edit</th>
						  <th scope="col">delete</th>
					    </tr>
					  </thead>
					   <?php
			                  foreach ($comments as $comment) {
		                  ?>
					  <tbody>
					  	<?php
					   	echo " <td>" . $comment['id'] . "</td>";
						echo " <td>" . $comment['username'] . "</td>";
						echo " <td>" . $comment['email'] . "</td>";
						echo " <td>" . mb_substr($comment['comment'], 0, 20) .  "...</td>";
						echo " <td>" . date('d-m-y H:i', $comment['created_at']) . "</td>";
						echo " <td><a href=
					   	view-comment.php?id=" . $comment['id'] . ">" . "view". "</a></td>";
						echo "<td><a href=\"edit-comment.php?id=". $comment['id'] . "\">Edit</a></td>\n";
						echo "<td><a class='show-delete-modal' data-id='".$comment['id']."' href='#'>Delete</a></td>\n";
						}
						?>
					  </tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
<div class="alert alert-success del-alert">
	<span>Удаление прошло успешно</span>
</div>
<div id="delete-comment-modal" class="modal" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Удаление комменартия</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <p>Вы уверены, что хотите удалить комментарий?</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" id="delete-comment-btn">Удалить!</button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Не удалять.</button>
      </div>
    </div>
  </div>
</div>
<script
  src="https://code.jquery.com/jquery-3.3.1.js"
  integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60="
  crossorigin="anonymous"></script>
<script type="text/javascript" src="../js/bootstrap.min.js"></script>
<script>
	$('.show-delete-modal').click(function(event){
		event.preventDefault();
		var commentId = $(this).data('id');
		$('#delete-comment-btn').data('id', commentId);
		$('#delete-comment-modal').modal('show');
	});
	$('#delete-comment-btn').click(function(event){
		event.preventDefault();
		var commentId = $(this).data('id');
		console.log(commentId);
		$.ajax({
			url: "../ajax/delete-comment.php",
			type: "POST",
			data: {
				id: commentId
			},
			success: function(response){
				$('#delete-comment-modal').modal('hide');
				$('.del-alert').removeClass('alert-success').removeClass ('alert-danger');
				if(response == "Success"){
					$('.del-alert').addClass('alert-success').html("Deleted!");
					$('.comment-row-' + commentId).remove();
				} else if(response == "Fail"){
					$('.del-alert').addClass('alert-danger').html("Произошла ошибка!");
				}
				$('.del-alert').fadeIn(500);
				setTimeout(function(){
					$('.del-alert').fadeOut(500);

				}, 4000);
			}
		});
	});
</script>
</body>
</html>
