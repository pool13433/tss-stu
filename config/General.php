<?php

class General {

    public function getUserStatus() {
        return array(
            '' => '-',
            '1' => 'Admin',
            '2' => 'Customer',
            '3' => 'Other',
        );
    }

    public function getDate() {

        $nowYear = date('Y');

        $arrDay = array();

        $arrYear = array();

        for ($i = 0; $i < 31; $i++) {
            $arrDay[i] = $i;
        }

        $arrMouth = array(
            '' => '-เลือก-',
            '1' => 'มกราคม',
            '2' => 'กุมภาพันธ์',
            '3' => 'มีนาคม',
            '4' => 'เมษายน',
            '5' => 'พฤษภาคม',
            '6' => 'มิถุนายน',
            '7' => 'กรกฎาคม',
            '8' => 'สิงหาคม',
            '9' => 'กันยายน',
            '10' => 'ตุลาคม',
            '11' => 'พฤศจิกายน',
            '12' => 'ธันวาคม',
        );

        for ($i = $nowYear; $i > ($nowYear-100); $i--) {
            $arrYear[$i] = $i;
        }
        return array(
            'day' => $arrDay,
            'mouth' => $arrMouth,
            'year' => $arrYear,
        );
    }

}

?>
