<?php
  require_once "../model/class_model.php";;
	if(ISSET($_POST)){
		$conn = new class_model();
		$folder_name = trim($_POST['Folder_name']);
		$folder_icon = trim($_POST['icons']);
		$folder_id = trim($_POST['folder_id']);
		$course = $conn->edit_folder($folder_name, $folder_icon, $folder_id);
		if($course == TRUE){
		    echo '<div class="alert alert-success">Edit Folder Successfully!</div><script>  sessionStorage.setItem("refreshBackPage", "true");  setTimeout(function() {
        window.history.back();
    }, 4000); </script>';

		  }else{
			echo '<div class="alert alert-danger">Edit Course Failed!</div><script> setTimeout(function() {  window.history.go(-0); }, 1000); </script>';
		}
	}
?>

