<?php
include_once '../../MPDF54/mpdf.php';
include_once '../../config/connect.php';

$nowdate = date('d-m-Y');

// get order_header,person
$sql = "SELECT * FROM order_header h,person p,province v
        WHERE h.pers_id = p.pers_id 
        AND v.prov_id = p.prov_id 
        AND h.order_id = " . $_GET['id'];

$query = mysql_query($sql) or die(mysql_error());


//get order_package
$s_pac = "SELECT * FROM order_package o,package_set p
          WHERE o.pack_id = p.pacset_id 
          AND o.cart_id =" . $_GET['id'];
$q_pac = mysql_query($s_pac) or die(mysql_error());

//get order_product
$s_pro = "SELECT * FROM order_product o,product p
          WHERE o.prod_id  = p.prod_id 
          AND o.cart_id = " . $_GET['id'];
$q_pro = mysql_query($s_pro) or die(mysql_error());

//get order_location
$s_loc = "SELECT * FROM order_location o,location l 
            WHERE o.loc_id = l.loc_id
            AND o.order_id = " . $_GET['id'];
$q_loc = mysql_query($s_loc) or die(mysql_error());


$stylesheet = file_get_contents('../../css/bootstrap.css');

$mpdf = new mPDF('UTF-8', 'A4');
$mpdf->SetAutoFont();
$mpdf->WriteHTML($stylesheet, 1);


$html = '
        <style>
            .cell-header{
                border-bottom: #808080 3px solid;
                background-color: #f9f8f7;
                padding: 5px;
            }
            .cell-body{
                border-bottom: #808080 1px solid;
                padding: 5px;
            }
        </style>
    ';

$html .= "
        <table width='100%'>
            <tbody>
                <tr>
                    <td colspan='8' height='50px'></td>
                </tr>
                <tr>
                    <td colspan='8' style='text-align: center;'>
                        <h2>ใบสั่งจองการถ่ายภาพ</h2>
                    </td>
                </tr>
                <tr>
                    <td colspan='8' style='text-align: center;'>
                        <h3>ร้าน บูรพา สตูดิโอ</h3>
                    </td>
                </tr>
                <tr>
                    <td colspan='8' height='60px'></td>
                </tr>";

while ($r = mysql_fetch_assoc($query)) {
            $price = $r['order_totalprice'];
            $deposit = $r['order_deposit'];
    $html .= "
                <tr>
                    <td>รหัสใบจอง</td>
                    <td>{$r['order_id']}</td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td>วันที่</td>
                    <td>{$nowdate}</td>
                </tr>
                <tr>
                    <td colspan='8' height='30px'></td>
                </tr>
                <tr>
                    <td>ชื่อ</td>
                    <td>{$r['pers_fname']}</td>
                    <td>นามสกุล</td>
                    <td>{$r['pers_lname']}</td>
                    <td>บัตร</td>
                    <td>{$r['pers_idcard']}</td>
                    <td>วันเกิด</td>
                    <td>{$r['pers_birthday']}</td>
                </tr>
                <tr>
                    <td>ที่อยู่</td>
                    <td>{$r['pers_address']}</td>
                    <td>หมู่บ้าน</td>
                    <td>{$r['pers_alley']}</td>
                    <td>ตำบล</td>
                    <td>{$r['pers_district']}</td>
                    <td>อำเภอ</td>
                    <td>{$r['pers_prefecture']}</td>
                </tr>
                <tr>
                    <td>จังหวัด</td>
                    <td>{$r['prov_name']}</td>
                    <td>รหัสไปรษณีย์</td>
                    <td>{$r['pers_postcode']}</td>
                    <td>โทร</td>
                    <td>{$r['pers_phone']}</td>
                    <td>email</td>
                    <td>{$r['pers_email']}</td>
                </tr>
                <tr>
                    <td colspan='8' height='30px'></td>
                </tr>
                <tr>
                    <td>วันที่นัดถ่าย</td>
                    <td>{$r['order_date']}</td>
                    <td>เวลาที่นัดถ่าย</td>
                    <td>{$r['order_time']}</td>
                    <td>จำนวนชาย</td>
                    <td>{$r['order_number_male']}</td>
                    <td>จำนวนหญิง</td>
                    <td>{$r['order_number_fermale']}</td>
                </tr>
                <tr>
                    <td colspan='8' height='60px'></td>
                </tr>
           ";
}

$html .= "
            </tbody>
        </table>
        </hr>
    ";
    
    $html .= "
        <table width='100%'>
        <tbody>
            <tr>
                <td width='50%'>
                    <table width='100%'>
                        <thead>
                            <tr>
                                <th>ชื่อ แพ็คเก็ต</th>
                                <th>ราคา</th>
                            </tr>
                        </thead>
                        <tbody>
     ";
    while ($r = mysql_fetch_array($q_pac)) {
      $html .= "
                            <tr>
                                <td>{$r['pacset_name']}</td>
                                <td>{$r['pacset_price']}</td>
                            </tr>
        ";
    }
    $html .= "
                        </tbody>
                    </table>

                </td>
                <td width='50%'>

                    <table width='100%'>
                        <thead>
                            <tr>
                                <th>ชื่อสินค้า</th>
                                <th>ราคา</th>
                            </tr>
                        </thead>
                        <tbody>
    ";
    while ($r = mysql_fetch_array($q_pro)) {
            $html .= "
                    <tr>
                        <td>{$r['prod_name']}</td>
                        <td>{$r['prod_price']}</td>
                    </tr>
            ";
    }
    $html .= "
                        </tbody>
                    </table>

                </td>
            </tr>
            <tr>
                <td colspan='2' height='60px'></td>
            </tr>
            <tr>
                <td></td>
                <td>
                    <table width='100%'>
                        <thead>
                            <tr>
                                <th>สถานที่ถ่าย</th>
                                <th>ราคา</th>
                            </tr>
                        </thead>
                        <tbody>
                        ";
                        while ($r = mysql_fetch_array($q_loc)) {
                                $html .= "
                                        <tr>
                                            <td>{$r['loc_name']}</td>
                                            <td>{$r['loc_price']}</td>
                                        </tr>
                                ";
                        }
                        $html .= "
                        </tbody>
                    </table>
                </td>
            </tr>
            <tr>
                <td colspan='2' height='60px'></td>
            </tr>
            <tr>
                <td style='text-align:right;'>ยอด สุทธิ {$price}</td>
                <td style='text-align:right;'>มัดจำ {$deposit}</td>
            </tr>
            <tr>
                <td colspan='2' height='60px'></td>
            </tr>
            <tr>
                <td style='text-align:center;'>
                ..................................................................</td>
                <td style='text-align:center;'>
                ..................................................................</td>
            </tr>
            <tr>
                <td style='text-align:center;'>ผู้จอง</td>
                <td style='text-align:center;'>ผู้ถ่าย</td>
            </tr>
        </tbody>
    </table>

    ";
    
    

$mpdf->WriteHTML($html);
$mpdf->Output();
?>



