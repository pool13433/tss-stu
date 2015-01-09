<!-- action = คือ หน้า คำสั่ง sql-->
<!-- method = post , get-->
<form action="./_contact.php?method=create" method="post" class="form-horizontal">
	<div class="panel panel-success">
	    <div class="panel-heading">
	        <i class="glyphicon glyphicon-cog"></i> Contact
	    </div>
	    <div class="panel-body">
	    	<div class="form-group">
	    		<label class="col-sm-3">ชื่อ</label>
	    		<div class="col-sm-3">
	    			<input type="text" class="form-control" name="fullname" require/>
	    		</div>
	    		<label class="col-sm-2">เบอร์โทร</label>
	    		<div class="col-sm-3">
	    			<input type="text" class="form-control" name="mobile" require/>
	    		</div>
	    	</div>
	    	<!-- title-->
	    	<div class="form-group">
	    		<label class="col-sm-3">หัวข้อ</label>
	    		<div class="col-sm-4">
	    			<input type="hidden" name="id"/>
	    			<input type="text" class="form-control" name="title" require/>
	    		</div>
	    	</div>	
	    	<!-- detail-->
	    	<div class="form-group">
	    		<label class="col-sm-3">รายละเอียด</label>
	    		<div class="col-sm-4">
	    			<textarea class="form-control" name="detail"></textarea>
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
