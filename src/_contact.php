<?php

@ob_start();
@session_start();
include '../config/connect.php';

$message = "";

switch ($_GET['method']) { // $_GET[] , $_POST[]}
	case 'create':

		// 
		if(!empty($_POST)){ // ตรวจสอบ ค่า post ที่ส่งมา ว่ามีหือเปล่า			
			// มีค่า
			if(empty($_POST['id'])){ // สร้างไหม่
				$sql = "INSERT INTO contact (con_id,pres_fullname,con_title";
				$sql .= " ,con_detail,con_createdate,con_mobile)";
				$sql .= " VALUES (";
				$sql .= " '',";
				$sql .= "'".$_POST['fullname']."',";
				$sql .= "'".$_POST['title']."',";
				$sql .= "'".$_POST['detail']."',";
				$sql .= "'".$_POST['mobile']."',";
				$sql .= " NOW())";

				$message = "INSERT Success";
			}else{ // การแก้ไขข้อมูล
				$sql = "UPDATE contact SET";
				$sql .= " pres_fullname = '".$_POST['fullname']."'";
				$sql .= " ,con_title = '".$_POST['title']."'";
				$sql .= " ,con_detail = '".$_POST['detail']."'";
				$sql .= " ,con_mobile = '".$_POST['mobile']."'";
				$sql .= " ,con_createdate = NOW()";
				$sql .= " WHERE con_id = ".$_POST['id'];

				//echo "sql : ".$sql;
				//exit();
				$message = "UPDATE Success";
			}
			// ประมวลผล
			$query = mysql_query($sql) or die(mysql_error());
			// ตรวจสอบว่าประมวลผลสำเร็จหรือเปล่า
			if ($query) {
                echo '<div style="background-color: yellowgreen;color: red;padding: 20px;font-size: large">'.$message.'</div>';
                echo '<META HTTP-EQUIV="refresh" CONTENT="1.5; URL=./index.php?page=i-m">';
            } else {
                echo "alert('add cantact fail !!');";
            }
		}else{
			// ไม่มีค่า
		}
		break;
	case 'delete':
		$sql = "DELETE FROM contact WHERE con_id = ".$_POST['id'];
		echo mysql_query($sql) or die(mysql_error());
		break;	
	default:
		// default
		break;
}