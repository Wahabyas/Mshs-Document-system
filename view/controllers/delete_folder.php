<?php
  require_once "../model/class_model.php";;
	if(ISSET($_POST)){
		$conn = new class_model();
		$folder_id = trim($_POST['folder_id']);
		$course = $conn->delete_folder($folder_id);
		if($course == TRUE){
		    echo '<div class="alert alert-danger">Delete Folder Successfully!</div><script> setTimeout(function() {  window.history.go(-0); }, 1000); </script>';

		  }else{
			echo '<div class="alert alert-danger">Delete Folder Failed!</div><script> setTimeout(function() {  window.history.go(-0); }, 1000); </script>';
		}
	}
?>

