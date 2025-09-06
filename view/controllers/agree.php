<?php
  require_once "../model/class_model.php";;
	if(ISSET($_POST)){
		$conn = new class_model();
		$file_id = trim($_POST['file_id']);
		$course = $conn->delete_file($file_id);
		if($course == TRUE){
		    echo '<div class="alert alert-success">File has been Deleted Successfully!</div><script> setTimeout(function() {  window.history.go(-0); }, 1000); </script>';

		  }else{
			echo '<div class="alert alert-danger">Delete Folder Failed!</div><script> setTimeout(function() {  window.history.go(-0); }, 1000); </script>';
		}
	}
?>

