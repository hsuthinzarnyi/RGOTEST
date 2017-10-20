<!DOCTYPE html>
<html>
<head>
	<title></title>

	  <meta name="viewport" content="width=device-width,initital-scale=1.0">
   	  <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>index.css">
	  <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>template/css/bootstrap.min.css">
	  <script type="text/javascript" src="<?php echo base_url();?>template/js/jquery.js"></script>
	  <script type="text/javascript" src="<?php echo base_url();?>template/js/bootstrap.min.js"></script>
	  <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>template/css/jquery.dataTables.css">
	  <script src = "<?php echo base_url();?>jquery.com/jquery-1.10.2.js"></script>
	  <script src = "<?php echo base_url();?>jquery.com/ui/1.10.4/jquery-ui.js"></script>
      <script src="<?php echo base_url();?>template/js/jquery.localScroll.min.js" type="text/javascript"></script>
      <script src="<?php echo base_url();?>template/js/jquery.scrollTo.min.js" type="text/javascript"></script> 
</head>
<body>

<div class="nav"  style="background-color:#004167;padding:10px">

   <label style="color: white"><h3>rgo47</h3></label>
</div>
    
     <div class="panel panel-body">
        <div class="row col-md-offset-2 col-md-4 ">

			<?php 
			      $attribute=array("class"=> "form-horizontal","form-inline");
				  echo form_open('Server/create',$attribute); 
		    ?>
              <center><h5 class="title-class-2" style="color: white">Sign Up With Email</h5></center>

              <div class="form-group">
                <label>Name</label>
                <input type="text" class="form-control" name="name" placeholder="Enter name" required="required">
                 <?php echo form_error('name',"<div class='error'style='color:red'>","</div>");?>

              </div>

              <div class="form-group">
                <label for="email">Email</label>
                <input type="email" class="form-control" name="email" placeholder="Enter email" required="required">
                 <?php echo form_error('email',"<div class='error'style='color:red'>","</div>");?>
              </div>

              <div class="form-group">
              	<div class="col-md-3"><input type="radio" name="gender" required="required" value="male">MALE</div>
              	<div><input type="radio" name="gender" required="required" value="female">FEMALE</div>
              </div>
            
              <div class="form-group">
                <label>Website</label>
                <input type="text" class="form-control" name="website" placeholder="website" required="required">
                 <?php echo form_error('website',"<div class='error'style='color:red'>","</div>");?>
              </div>

              <div class="form-group">
              	<label>Comment</label>
              	<textarea name="comment" class="form-control" placeholder="Comment" required="required"></textarea>	
                 <?php echo form_error('comment',"<div class='error'style='color:red'>","</div>");?>
              </div>

              <button type="submit" class="btn col-md-offset-2" style="padding-bottom:10px;background-color: #004167"><font color="white">Sign In</font></button>
              
              </form>
        </div>  
      </div>


<center>
<div class="panel" style="padding: 20px;">
	<table class="table table-bordered table-responsive table-striped" style="width:90%;">
		<thead style="background-color: #004167;color: white;">
  
		<th>Name</th>
		<th>Email</th>
		<th>Gender</th>
		<th>Website</th>
		<th>Comment</th>
		</thead>
		<tbody>
			<?php foreach ($result as $row) { ?>
				<tr>
					<td><?= $row->name ?></td>
					<td><?= $row->email ?></td>        
					<td><?= $row->gender ?></td>
					<td><?= $row->website ?></td>
					<td><?= $row->comment ?></td>
				</tr>
			index<?php } ?>
		</tbody>
	</table>
</div>
</center>

</body>
</html>