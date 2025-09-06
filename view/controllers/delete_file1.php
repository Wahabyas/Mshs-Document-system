<?php
  require_once "../model/class_model.php";;
	if(ISSET($_POST)){
		$conn = new class_model();
		$file_id = trim($_POST['file_id']);
		$user_id = trim($_POST['user_idx']);
		$course = $conn->delete_file1($user_id,$file_id);
		if($course == TRUE){
		    echo '<div class="alert alert-danger">Delete Request has been send to the User!</div><script>  sessionStorage.setItem("refreshBackPage", "true");  setTimeout(function() {
        window.history.back();
    }, 4000); </script>';

		  }else{
			echo '<div class="alert alert-danger">Delete Request failed!</div><script> setTimeout(function() {  window.history.go(-0); }, 8000); </script>';
		}
	}
?>

