<!-- action = คือ หน้า คำสั่ง sql-->
<!-- method = post , get-->
<?php 
	include '../../config/connect.php';
	$con_id = "";
	$fullname = "";
	$title = "";
	$detail = "";
	$mobile = "";

	// ตรวจสอบ
	if(!empty($_GET['id'])){ // ! = ไม่
		$sql_contact = "SELECT * FROM contact WHERE con_id = ".$_GET['id'];
		$query = mysql_query($sql_contact) or die(mysql_error());

		$result = mysql_fetch_assoc($query);

		$con_id = $result['con_id'];
		$fullname = $result['pres_fullname'];
		$title = $result['con_title'];
		$detail = $result['con_detail'];
		$mobile = $result['con_mobile'];

	}
	
?>


<form action="_contact.php?method=create" method="post" class="form-horizontal">
	<div class="panel panel-success">
	    <div class="panel-heading">
	        <i class="glyphicon glyphicon-cog"></i> Contact
	    </div>
	    <div class="panel-body">
	    	<div class="form-group">
	    		<label class="col-sm-3">ชื่อ</label>
	    		<div class="col-sm-3">
	    			<input type="hidden" name="id" value="<?=$con_id?>"/>
	    			<input type="text" class="form-control" name="fullname" value="<?=$fullname?>" require/>
	    		</div>
	    		<label class="col-sm-2">เบอร์โทร</label>
	    		<div class="col-sm-3">
	    			<input type="text" class="form-control" name="mobile" value="<?=$mobile?>" require/>
	    		</div>
	    	</div>
	    	<!-- title-->
	    	<div class="form-group">
	    		<label class="col-sm-3">หัวข้อ</label>
	    		<div class="col-sm-4">	    			
	    			<input type="text" class="form-control" name="title" value="<?=$title?>" require/>
	    		</div>
	    	</div>	
	    	<!-- detail-->
	    	<div class="form-group">
	    		<label class="col-sm-3">รายละเอียด</label>
	    		<div class="col-sm-4">
	    			<textarea class="form-control" name="detail"><?=$detail?></textarea>
	    		</div>
	    	</div>	
	    	<!-- tel -->
	    </div>
	    <div class="panel-footer">
	    	<button type="submit" class="btn btn-primary" onclick="return confirm('ยืนยันการบันทึก');">บันทึก</button>
	    	<button type="button" class="btn btn-warning">ยกเลิก</button>
	    </div>
	</div>
</form>
