<?php include_once("inc/header.php")?>
<?php if(isset($_POST['submit'])){
	if(check_for_email_existance($_POST['email'])==false){
		echo "<script>
			alert('Email registered');
		</script>";
	}else{
		unset($_POST['submit']);
		$_SESSION = $_POST;
		echo "<script>
			location.href='confirm-page.php?msg=success'
		</script>";
	}
}?>
<div class="container">
  <div class="row">
    <h2>Add EMP-Information
    </h2>
    <div class="col-md-12">
      <a class="btn btn-success pull-right" title="Go to home page" href="index.php">
        <i class="fa fa-arrow-left">
        </i> Back
      </a>
    </div>
  </div>
</div>
<div class="container">
	<form method="post" id="add-form" enctype="multipart/form-data">
		<?php if(isset($_SESSION)){
			extract($_SESSION);
		}?>
		<div class="form-group">
			<label for="fname">Full Name:</label>
			<input type="text" class="form-control" value="<?=isset($fname)?$fname:""?>" name="fname" id="fname">
		</div>
		<div class="form-group">
			<label for="email">Email address:</label>
			<input type="email" name="email" class="form-control"  value="<?=isset($email)?$email:""?>" id="email">
		</div>
		<div class="form-group">
			<label for="email">Mobile:</label>
			<input type="tel" name="mobile" class="form-control"  value="<?=isset($mobile)?$mobile:""?>" id="mobile">
		</div>
		<div class="form-group">
			<label for="email">Country Code:</label>
			<input type="tel" name="country_code" class="form-control"  value="<?=isset($country_code)?$country_code:""?>" id="country_code">
		</div>
		<div class="form-group">
			<label for="address">Address:</label>
			<textarea name="address" class="form-control" id="address"><?=isset($address)?$address:""?></textarea>
		</div>
		<button type="submit" class="btn btn-default" name="submit">Submit</button>
	</form>
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