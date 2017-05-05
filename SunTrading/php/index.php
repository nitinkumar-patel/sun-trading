<?php include_once("inc/header.php");
unset($_SESSION);
if(isset($_GET['did'])) 
{
	$did = $_GET['did'];
	$sql = "DELETE FROM `users` where `id` = $did";
	$result = $con->query($sql) or die($con->error());
	if($result)
	{
		echo "<script>document.location.href='index.php?msg=delete'</script>";
	}
}
?>
<div class="container">
  <div class="row">
    <h2>EMP-Information
    </h2>
    <div class="col-md-4">
      <a class="btn btn-success" title="Download CSV format" href="export-csv.php" target="_blank">
        <i class="fa fa-download">
        </i>
      </a>
      <a class="btn btn-success" title="Upload JSON format" href="upload-emp-json.php" target="_blank">
        <i class="fa fa-upload">
        </i>
      </a>
      <a class="btn btn-success" title="Add Emp" href="add-emp.php">
        <i class="fa fa-plus">
        </i>
      </a>
    </div>
  </div>
  <?php if(@$_GET["msg"]=="success"){?>
	<div class="alert alert-success">
	  <button type="button" class="close" data-dismiss="alert">x</button>
		Added Successfully..!
	</div>
  <?php }else if(@$_GET["msg"]=="updated"){?>
	<div class="alert alert-success">
	  <button type="button" class="close" data-dismiss="alert">x</button>
		Updated Successfully..!
	</div>
  <?php }else if(@$_GET["msg"]=="delete"){?>
	<div class="alert alert-success">
	  <button type="button" class="close" data-dismiss="alert">x</button>
		Deleted Successfully..!
	</div>
  <?php }?>
  <div class="table-responsive">
	
    <table class="table table-bordered table-hover table-striped">
      <thead>
        <tr>
          <th>#</th>
          <th>Fullname</th>
          <th>Email</th>
          <th>Address</th>
		  <th>Country Code</th>
          <th>Phone</th>
          <th>Registered Date</th>
          <th>Action</th>
        </tr>
      </thead>
      <tbody>
        <?php 
$q = "SELECT * FROM users order by id desc";
$data= $con->query($q);
if(!$data->num_rows){?>
        <tr>
          <td colspan="6" class="text-center">No Records found
          </td>
        </tr>
        <?php }else{
			$i=0;
      while($row = $data->fetch_assoc()){
        $i++;
				extract($row);?>
			<tr>
			  <td><?=$i?></td>
			  <td><?=$fname?></td>
			  <td><?=$email?></td>
			  <td><?=$address?></td>
			  <td><?=$country_code?></td>
			  <td><?=$mobile?></td>
			  <td><?=date("m-d-Y h:iA",$created_at)?></td>
			  <td>
				<a href="edit-emp.php?id=<?=$id?>&action=edit">
				  <button class="btn btn-success btn-xs">Edit
				  </button>
				</a>
				<a href="javascript:msgbox(<?=$id?>);">
				  <button class="btn btn-success btn-xs">Delete
				  </button>
				</a>
			  </td>
			</tr>
        <?php }
		}?>
      </tbody>
    </table>
  </div>
</div>
<script language="javascript">
  function msgbox(id)
  {
    if(confirm("Are you sure want to delete ?")) {
	  document.location.href = 'index.php?did='+id;
	}
  }
</script>
<?php include_once("inc/footer.php")?>
