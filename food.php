<!DOCTYPE html>
<html lang="en">
  <head>
   <?php include('con_head.php'); ?>
   <?php include('con_menu.php'); ?>
  </head>
  <body>
  
<a href="food.php?choice=add">เพิ่มรายการอาหาร</a>
<a href="food.php?choice=show"> | แสดงรายกรอาหาร</a>
<a href="food.php?choice=edit"> | แก้ไขรายการอาหาร</a>

	<?php 
			$obj= new food;
			$obj2 = new food_edit;
					if (isset($_POST["send"]))
  						$obj->add_process();
					if (isset($_POST["edit_food"]))
  						$obj2->edit_process();
					else if(isset($_GET['choice'])){
						 if ($_GET['choice'] == "show")
						 	$obj->show();
						else if  ($_GET['choice'] == "edit"){
							
						 	$obj2->edit_form();
						}else if ($_GET['choice'] == "add")
  							$obj->add_form();
					}
		
 	?>

<?php include('con_js.php'); ?>

  </body>
</html>

<?php  
 // class แสดงอาหาร
class food{ 
	
	// แสดงรายการอาหาร
	public function show(){
?>
    <div class="container-fluid">
      <div class="row-fluid">
        <div class="span3">
          <div class="well sidebar-nav">
            <ul class="nav nav-list">
              <li class="nav-header">หมวดหมู่</li>
              <li class="active"><a href="#">A la carte</a></li>
              <li><a href="#">Donburi</a></li>
              <li><a href="#">Link</a></li>
              <li><a href="#">Link</a></li>
            </ul>
          </div><!--/.well -->
        </div><!--/span-->
        <div class="span9">
          <div class="hero-unit">
            <h1>Food </h1>
            <p>รายการอาหาร</p>
            <p><a href="#" class="btn btn-primary btn-large">Learn more &raquo;</a></p>
          </div>
			<?php   include('config.php');
			$sql = "SELECT * FROM food"; 
			$re = mysqli_query($con,$sql);
			$num_row = mysqli_num_rows($re);
			echo $num_row;
			$num = $num_row/3;
			
			$b = "1";$c="3";
			for($a=0;$a<=$num;$a++){	?>
          <div class="row-fluid">
			<?php 	
				$sel = "SELECT * FROM food LIMIT {$b},{$c}  ";
				$result = mysqli_query($con,$sel);
				while($row = mysqli_fetch_array($result)){ ?>
            			<div class="span4">
              			<h2><?=$row[1]?></h2>
                        <img  src="img/<?=$row[4]?>"/>
		              <p><?=$row[2]?></p>
        		      <p><a class="btn" href="food.php?choice=edit&id_food=<?=$row[0]?>">Edit</a></p>
            		</div><!--/span-->
           		 <?php   } 
				$b=$b+3;
			//	$c=$c+3;
			?>
     	</div><!--/row fluid-->
 <?php } ?>
         </div><!--/span9-->
      	</div><!--/row-->
	  </div><!--/container->
<?php
		}
		
	// แบบฟอร์มเพิ่มรายการอาหาร	
	public function add_form(){
		?>
		<form action="<?="{$_SERVER['PHP_SELF']}"?>" method="post" enctype="multipart/form-data">
		id อาหาร:<input type="text" name="food_id"/><br />
		ชื่ออาหาร :<input type="text" name="food_name"/><br />
		รายละเอียด :<input type="text" name="food_detail"/><br />
		ราคา : <input size="3"  name="food_price"/>บาท<br />
        สถานะ: <select name ="f_status">
        			<option value ="O">เลือกสถานะ</option>
                    <option value ="N">ใหม่</option>
                    <option value ="H">ยอดฮิต</option>
        </select><br/>
		<?php 
		include('config.php');
		$result = mysqli_query($con, "SELECT * FROM category ORDER BY ca_id  ASC"); 
		$row = mysqli_fetch_array($result);
		echo "หมวดหมู่ <select  name=\"ca_id\"/>";
			echo "<option value=\"0\">เลือกหมวดหมู่</option>";
		while ($row = mysqli_fetch_array($result)) {
			echo "<option value=\"{$row['ca_id']}\">{$row['ca_name']}</option>";
		}
		echo"</select><br />";        
 		?>        
		รูปภาพ<input type="file" name="fileUpload" id="file"/><br/>
		<input type="submit" name="send" value="บันทึก"/>
		</form>
		<?php 
	}

	// 	process การเพิ่มรายการอาหาร
 	public function add_process() {    //ฟังก์ชั่นที่ใช้ประมวลผลฟอร์ม
  		$food_id = trim($_POST["food_id"]);
  		$food_name = trim($_POST["food_name"]);
  		$food_detail = trim($_POST["food_detail"]);	
  		$food_price = trim($_POST["food_price"]);
		$food_status = $_POST["f_status"];
		$ca_id = $_POST["ca_id"];
  		if ($food_id == "") {
    			echo "<font color=\"red\">เกิดข้อผิดพลาด: คุณป้อนข้อมูลไม่ครบ</font><br>";
    			add();
    			exit;
  		}
		echo "ชื่อไฟล์ = ".$_FILES["fileUpload"]["name"]."<br>";
		echo "สกุลไฟล์ = ".$_FILES["fileUpload"]["type"]."<br>"; 
		echo "ขนาด = ".$_FILES["fileUpload"]["size"]." bytes<br>"; 
		echo "ความผิดพลาด(ไฟล์เสียหาย) = ".$_FILES["fileUpload"]["error"]."<br>"; 
		if(copy($_FILES["fileUpload"]["tmp_name"],"img/".$_FILES["fileUpload"]["name"])){
			echo "<p>อับโหลดสำเร็จ<br><p/>";
			echo "<p>สามารถตลวจสอบได้ที่<br>";
			echo "<HR color=#FFFFFF>images/".$_FILES["fileUpload"]["name"]."<HR color=#FFFFFF><br><p/>";
			echo "<HR color=#FFFFFF>tpsumeta@gmail.com<HR color=#FFFFFF><br>";
			}else{
	     	echo "<p>อับโหลดไม่สำเร็จ ไม่สามารถอับโหลดได้<br>";
     		}
  		$food_id = addslashes($food_id);
		$food_name = addslashes($food_name);
		$food_detail = addslashes($food_detail);
		$food_price = addslashes($food_price);
		$food_img = $_FILES["fileUpload"]["name"];
		 include('config.php');
  		$sql = "INSERT INTO `food`(`f_id`, `f_name`, `f_detail`, `f_price`, `f_img`, `f_status`, `ca_id`) 
		VALUES ('{$food_id}','{$food_name}','{$food_detail}','{$food_price}','{$food_img}','{$food_status}','{$ca_id}')";	
  		$result = mysqli_query($con, $sql);
  		echo "<h3>ผลการเพิ่มข้อมูล</h3>\n";
  		if ($result) {
    		echo "เพิ่มอาหารฐานข้อมูลจำนวน " . mysqli_affected_rows($con) . " รายการ<br>";
    		echo "<a href=\"admin_member_list.php\">แสดงรายการชื่อสมาชิกทั้งหมด</a><br>";
  		}
  		else {
    		echo "เกิดข้อผิดพลาดในการเพิ่รหัสสมาชิกหรื่อชื่อสมาชิกอาจมีอยู่แล้ว<br>";
  		}

	}
		
	
	// ลบรายการอาหาร	
	public function delete(){
	
		
	}
	
}

class food_edit{
	
	
		public function edit_form(){
			## Get value id food 
			## make SQL SELECT About food  eneryting input to fill
			include('config.php');
		if(isset($_GET['id_food'])){
			$id_food =$_GET['id_food'];
		}
		$sql_food = "SELECT * FROM food WHERE f_id='$id_food'";
		$result_food = mysqli_query($con,$sql_food);
		$row_food = mysqli_fetch_array($result_food);
		
		
		?>
		<form action="<?="{$_SERVER['PHP_SELF']}"?>" method="post"
        enctype="multipart/form-data">
		id อาหาร:<input type="text" name="food_id" readonly value="<?=$row_food[0]?>"/><br />
		ชื่ออาหาร :<input type="text" name="food_name" value="<?=$row_food[1]?>"/><br />
		รายละเอียด :<input type="text" name="food_detail" value="<?=$row_food[2]?>"/><br />
		ราคา : <input size="3"  name="food_price" value="<?=$row_food[3]?>"/>บาท<br />
        สถานะ: <select name ="f_status"/>
        			<option value ="O" >เลือกสถานะ</option>
                    <option value ="N">ใหม่</option>
                    <option value ="H">ยอดฮิต</option>
        </select><br/>
		<?php 
	
		$result = mysqli_query($con, "SELECT * FROM category ORDER BY ca_id  ASC"); 
		$row = mysqli_fetch_array($result);
		echo "หมวดหมู่ <select  name=\"ca_id\"/>";
			echo "<option value=\"0\">เลือกหมวดหมู่</option>";
			while ($row = mysqli_fetch_array($result)) {
			echo "<option value=\"{$row['ca_id']}\">{$row['ca_name']}</option>";
			}
		echo"</select><br />";        
 		?>        
		รูปภาพ<input type="file" name="fileUpload" id="file"/><br/>
		<input type="submit" name="edit_food" value="บันทึก"/>
		</form>
		<?php 
		}
	
		public function edit_process(){	
		$food_id = trim($_POST["food_id"]);
  		$food_name = trim($_POST["food_name"]);
  		$food_detail = trim($_POST["food_detail"]);	
  		$food_price = trim($_POST["food_price"]);
		$food_status = $_POST["f_status"];
		$ca_id = $_POST["ca_id"];
		
		$food_id = addslashes($food_id);
		$food_name = addslashes($food_name);
		$food_detail = addslashes($food_detail);
		$food_price = addslashes($food_price);
		
		include('config.php');
  		$sql = "UPDATE food SET f_name='{$food_name}' WHERE f_id='{$food_id}'";
	/*	 `food`(`f_id`, `f_name`, `f_detail`, `f_price`, `f_img`, `f_status`, `ca_id`) 
		VALUES ('{$food_id}','{$food_name}','{$food_detail}','{$food_price}','{$food_img}','{$food_status}','{$ca_id}')";	
  		$result = mysqli_query($con, $sql);*/
		$result = mysqli_query($con, $sql);
  		echo "<h3>ผลการแก้ไขข้อมูล</h3>\n";
  		if ($result) {
    		echo "แก้ไขอาหารฐานข้อมูลจำนวน " . mysqli_affected_rows($con) . " รายการ<br>";
    		echo "<a href=\"admin_member_list.php\">แสดงรายการอ</a><br>";
  		}
  		else {
    		echo "เกิดข้อผิดพลาดในการเพิ่รหัสสมาชิกหรื่อชื่อสมาชิกอาจมีอยู่แล้ว<br>";
  		}
		}
		
	
	
}

 //  class ประเภทอาหาร
class food_category{  

}

?>
