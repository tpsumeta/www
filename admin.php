<?php
include('config.php');
$sql = "SELECT * FROM `personnel` LIMIT 0, 30 ";
$result = mysqli_query($con,$sql);
$row = mysqli_fetch_array($result); 
$id_pe = $row[0];
$name = $row[1];
$se = $row['sex'];

function  member_sex($sex){
	 if($sex == 'm')
	 echo "ชาย";
 	else if($sex == 'w')
	  echo "หญิง";
	 else 
	 	echo "ไม่ระบุ";
	 }

function member_show(){
	global $sql,$result,$row,$id_pe,$name,$se;

	echo"<table width=200 border=1 class=\"table table-striped\">
  <tr>
    <th>รหัสสมาชิก</th>
    <th>ชื่อ - นามสกุล</th>
    <th>แก้ไข</th>
    <th>ลบ</th>
  </tr>
  <tr>
    <td><a href=\"member.php?f=det&id_pe=$id_pe\" >$id_pe</a></td>
    <td>$name</td>
    <td><a href=\"member.php?f=e&id_pe=$id_pe\" >Edit</a></td>
    <td><a href=\"member.php?f=del&id_pe=$id_pe\" >Delete</a></td>
  </tr>
</table>";

	}
	

function member_detail(){
 global $sql,$result,$row;
 echo'<h3 align="center">หน้าจอรายละเอียดพนักงาน</h3>';
	
	echo" 
				<form action=\"\" method=\"get\" class=form-inline>
				<input type=text   class=nput-medium search-query value=$row[0]>
				<button  type=submit  class=btn  />ส่งค่า</button>
				</form>
	";
	}	


function member_edit(){
 global $sql,$result,$row;
 echo'<h3 align="center">หน้าจอแก้ไข</h3>';
	
	echo" 
				<form action=\"\" method=\"get\" class=form-inline>
				<input type=text   class=nput-medium search-query value=$row[0]>
				<button  type=submit  class=btn  />ส่งค่า</button>
				</form>
	";
	}	
	
	
function member_delete(){
include('config.php');
global $id_pe,$name;
echo $id_pe;
echo'<h3 align="center">หน้าจอลบ</h3>';
$sql_det = "delete from personnel where  id_pe=\"$id_pe\"";   // command sql delete
$result=mysqli_query($con,$sql_det);     // run sql
	}	
	
?>

