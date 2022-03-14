<?php
class topup {
    function giftcode($hash = null,$phone = null) {
        if (is_null($hash) || is_null($phone)) return false;
        $ch = curl_init();
    $hash = explode('?v=',$hash)[1];
        $headers  = [
            'Content-Type: application/json',
            'Accept: application/json'
        ];
        $postData = [
            'mobile' => $phone,
            'voucher_hash' => $hash
        ];
        curl_setopt($ch, CURLOPT_URL,"https://gift.truemoney.com/campaign/vouchers/$hash/redeem");
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($postData));           
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt ($ch, CURLOPT_SSLVERSION, 7);
        curl_setopt( $ch, CURLOPT_USERAGENT, "aaaaaaaaaaa" );
        $result     = curl_exec ($ch);
        $statusCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        return json_decode($result,true);
    }
}
