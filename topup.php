<?php
require_once("class_topup.php");
$tc = new topup();
$vc = (object) $tc->giftcode("ซองอั่งเปา","เบอร์ผู้รับ"); 
if($vc->status['code'] != 'ERROR'){
    $data = [ 'code' => '503', 'msg' => 'เกิดข้อผิดผลาดกับระบบ โปรดติดต่อผู้ดูแล API' ];
}
if($vc->status['code'] != 'SUCCESS'){
    $data = [ 'code' => '404', 'msg' => 'ไม่พบซองนี้ในระบบ' ];
}else{
    if($vc->data['voucher']['member'] != "1"){
        $data = [ 'code' => '406', 'msg' => 'ผู้รับซองต้องเป็น 1 คนเท่านั้น !' ];
    }else{
        $amounts = $vc->data['voucher']['amount_baht'];
        $links = $vc->data['voucher']['link'];
        $amount = str_replace(",", "", trim($amounts));
        $timeload = time();
        $data = [ 'code' => '200', 'amount' => $amount ];

    }
}
