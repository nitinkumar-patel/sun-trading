<?php include_once("inc/header.php");
extract($_SESSION);
if(isset($_POST['submit'])){
	unset($_POST['submit']);
	$q = "INSERT INTO `users` SET ";
	foreach($_SESSION as $key=>$item){
		$_SESSION[$key] = trim(mysqli_real_escape_string($con, $item));
		$q .= "`".$key."`='".$item."', ";
	}
	$q .="`created_at`=".time();
	if($con->query($q)){
		echo "<script>
			location.href='index.php?msg=success'
		</script>";
	}else{
		$error = "Not Inserted try again";
	}
}?>
<div class="container">
  <div class="row">
    <h2>Add EMP-Information
    </h2>
    <div class="col-md-12">
      <a class="btn btn-success pull-right" title="Go back to edit" href="add-emp.php?from_session=yes">
        <i class="fa fa-arrow-left">
        </i> Back
      </a>
    </div>
  </div>
</div>
<div class="container">
	<form method="post" id="add-form" enctype="multipart/form-data">
		<div class="container">
			<form method="post">
				<table class="table table-bordered table-hover table-striped">
				  <tbody>
					<tr>
						<th>Fullname</th>
						<td><?=$fname?></td>
					</tr>
					<tr>
						<th>Email</th>
						<td><?=$email?></td>
					</tr>
					<tr>
						<th>Address</th>
						<td><?=$address?></td>
					</tr>
					<tr>
						<th>Phone</th>
						<td><?=$mobile?></td>
					</tr>
				  </tbody>
				</table>
				<center>
					<button class="btn btn-success" type="submit" name="submit">Confirm</button>
					<a class="btn btn-danger" href="add-emp.php?from_session=yes">Edit</a>
				</center>
			</form>
		</div>
	</form>
</div>
<?php include_once("inc/footer.php")?>