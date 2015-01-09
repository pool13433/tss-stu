<?php include '../config/connect.php'; ?>
<div class="panel panel-success">
    <div class="panel-heading">
        <i class="glyphicon glyphicon-th"></i> Albums
    </div>
    <div class="panel-body">
        <?php
        $sql_album = "SELECT * FROM album ";
        $sql_album .= " WHERE album_id not in(51)";
        $sql_album .= " ORDER BY album_id";
        //echo "<pre> sql : " . $sql_album . "</pre>";
        $query_album = mysql_query($sql_album) or die(mysql_error());
        while ($row = mysql_fetch_array($query_album)):
            ?>
            <div class="col-md-12">
                <div class="panel panel-info">
                    <div class="panel-heading"><?= $row['album_nameth'] ?></div>
                    <div class="panel-body">
                        <?php
                        $sql_file = "SELECT * FROM album_file af";
                        $sql_file .= " JOIN album a on af.album_id = a.album_id";
                        $sql_file .= " WHERE af.album_id = " . $row['album_id'];
                        //echo "<pre> sql : " . $sql_album . "</pre>";
                        $query_file = mysql_query($sql_file) or die(mysql_error());
                        while ($row1 = mysql_fetch_array($query_file)):
                            ?>
                            <div class="col-md-2">
                                <img 
                                    src="<?= '../images/albums/' . $row1['album_nameeng'] . '/' . $row1['file_name'] ?>" 
                                    class="img-thumbnail img-size125x125"/>
                            </div>
                            <?php
                        endwhile;
                        ?>
                    </div>
                </div>                
            </div>
        <?php endwhile; ?>
    </div>
    <div class="panel-footer"></div>
</div>



