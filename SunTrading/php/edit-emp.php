<?php include_once("inc/header.php")?>
<?php if(isset($_POST['submit'])){
	extract($_POST);
	unset($_POST['submit']);
	$q = "UPDATE `users` SET ";
	foreach($_POST as $key=>$item){
		$_POST[$key] = trim(mysqli_real_escape_string($con, $item));
		$q .= "`".$key."`='".$item."', ";
	}
	$q .="`updated_at`=".time();
	
	$q .=" WHERE id=". $id;
	
	if($con->query($q)){
		echo "<script>
			location.href='index.php?msg=updated'
		</script>";
	}else{
		$error = "Not Inserted try again";
	}
}?>
<div class="container">
  <div class="row">
    <h2>Edit EMP-Information
    </h2>
    <div class="col-md-12">
      <a class="btn btn-success pull-right" title="Download CSV format" href="index.php">
        <i class="fa fa-arrow-left">
        </i> Back
      </a>
    </div>
  </div>
</div>
<div class="container">
<?php $data = $con->query("SELECT * FROM users WHERE id=".$_GET["id"]);
if($data->num_rows==0){?>
	<div class="alert alert-success">
	  <button type="button" class="close" data-dismiss="alert">x</button>
		oops, No record found..!
	</div>
<?php }else{
	$row = $data->fetch_object();?>
	<form method="post" id="add-form" enctype="multipart/form-data">
		<input type="hidden" class="form-control" name="id" value="<?=$row->id?>" id="id">
		<div class="form-group">
			<label for="fname">Full Name:</label>
			<input type="text" class="form-control" name="fname" value="<?=$row->fname?>" id="fname">
		</div>
		<div class="form-group">
			<label for="email">Email address:</label>
			<input type="email" name="email" class="form-control" value="<?=$row->email?>" id="email">
		</div>
		<div class="form-group">
			<label for="email">Mobile:</label>
			<input type="tel" name="mobile" class="form-control" value="<?=$row->mobile?>" id="mobile">
		</div>
		<div class="form-group">
			<label for="email">Country Code:</label>
			<input type="tel" name="country_code" class="form-control" value="<?=$row->country_code?>" id="country_code">
		</div>
		<div class="form-group">
			<label for="address">Address:</label>
			<textarea name="address" class="form-control" id="address"><?=$row->address?></textarea>
		</div>
		<button type="submit" class="btn btn-default" name="submit">Submit</button>
	</form>
<?php }
?>
	
</div>
<script>
    $(function () {
        $('#add-form').validate({
            rules: {
				fname: {
                    required: true,
                },
                email: {
                    email: true,
					required: true
                },
                mobile:{
                    minlength:10,
                    maxlength:13,
                    number :true,
					required:true
                },
				address:{
					required: true,
				},
				country_code:{
					required: true,
				}
            }, messages: {
				fname: {
                    required: "Please enter your name"
                },
                mobile:{
                    required : "Please enter mobile number"
                },
				address:{
					required: "Please enter address"
				},
				country_code:{
					required: "Please entry country code",
				}
            }
        })
    })
</script>
<?php include_once("inc/footer.php")?>