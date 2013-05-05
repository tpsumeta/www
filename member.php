 <!DOCTYPE html>
<html lang="en">
  <head>
   <?php include('con_head.php'); ?>
  </head>

  <body>

<?php include('con_menu.php'); ?>

<div class="hero-unit">
  <h2 align="center">Member</h2>
</div>
  <?php  
 include('admin.php');
 if(isset($_GET['f'])){
	 
	 $f = $_GET['f'];
 	if($f=='s')
 		member_show();	
	else if($f=='e')
		member_edit();
	else if($f=='det')
		member_detail();
	else if($f=='del')
		member_delete();
	else 
		member_sex();
		
 }else{
	 	member_show();
}
 
?> 



    <!-- Le javascript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
   <?php include('con_js.php'); ?>

  </body>
</html>
