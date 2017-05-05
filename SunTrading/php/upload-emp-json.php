<?php include_once("inc/header.php")?>
<?php 
if(isset($_POST["Import"])){
	$target_dir = "tmp/";
	$filename=$_FILES["file"]["tmp_name"];		
	if($_FILES["file"]["size"] > 0){
		if(move_uploaded_file($_FILES["file"]["tmp_name"], $target_dir.$_FILES["file"]["name"])){
			$json_data = file_get_contents($target_dir.$_FILES["file"]["name"]);
		}
		$data = json_decode($json_data);
		$is_inserted = false;
		foreach($data as $key=>$item){
			$data_to_insert_array = (array) $item;
			unset($data_to_insert_array["id"]);
			unset($data_to_insert_array["created_at"]);
			$q = "INSERT INTO `users` SET ";
			foreach($data_to_insert_array as $data_key=>$data_item){
				$data_to_insert_array[$data_key] = trim(mysqli_real_escape_string($con, $data_item));
				$q .= "`".$data_key."`='".$data_item."', ";
			}
			$q .="`created_at`=".time();
			if($con->query($q)){
				$is_inserted = true;
			}
		}
		if($is_inserted==true){
			echo "<script type=\"text/javascript\">
					alert(\"Invalid File:Please Upload JSON File.\");
					window.location = \"index.php\"
				  </script>";		
		}else {
			  echo "<script type=\"text/javascript\">
				alert(\"Json File has been successfully Imported.\");
				window.location = \"index.php\"
			</script>";
		}
	}
}
?>
<div id="wrap">
	<div class="container">
		<div class="row">
			<form class="form-horizontal" method="post" name="upload_excel" enctype="multipart/form-data">
				<fieldset>
					<!-- Form Name -->
					<legend>Import EMP Json File</legend>
					<!-- File Button -->
					<div class="form-group">
						<label class="col-md-4 control-label" for="filebutton">Select File</label>
						<div class="col-md-4">
							<input type="file" name="file" id="file" class="input-large">
						</div>
					</div>
					<!-- Button -->
					<div class="form-group">
						<label class="col-md-4 control-label" for="singlebutton">Import data</label>
						<div class="col-md-4">
							<button type="submit" id="submit" name="Import" class="btn btn-primary button-loading">Import</button>
						</div>
					</div>
				</fieldset>
			</form>
		</div>
	</div>
</div>
<?php include_once("inc/footer.php")?>