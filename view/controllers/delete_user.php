<?php
  require_once "../model/class_model.php";;
	if(ISSET($_POST)){
		$conn = new class_model();
		$user_id = trim($_POST['user_id']);
		$course = $conn->delete_user($user_id);
		if($course == TRUE){
		    echo '<div class="alert alert-danger">Delete User Successfully!</div><script> setTimeout(function() {  window.history.go(-0); }, 1000); </script>';

		  }else{
			echo '<div class="alert alert-danger">Cannot be deleted since this user had sent some file, you can deactivate the user.!</div><script> setTimeout(function() {  window.history.go(-0); }, 8000); </script>';
		}
	}
?>

