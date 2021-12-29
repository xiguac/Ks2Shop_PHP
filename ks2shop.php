<?php

include('./include/common.php');


$playername = htmlspecialchars($_POST['playername']);
$amount = htmlspecialchars($_POST['amount']);
$type = htmlspecialchars($_POST['type']);

$type = str_replace("支付宝","alipay",$type);
$type = str_replace("微信支付","wxpay",$type);
$type = str_replace("QQ钱包","qqpay",$type);

$conn = mysqli_connect($servername, $username, $password,'ks2shop');
$name = uniqid("Ks2Shop").md5(time().rand(1000,9999));
$sql = "INSERT INTO `ks2shop`.`log` (`name`, `out_trade_no`, `type`, `money`, `time`, `status`)VALUES ('$playername','$name','$type','$amount','$time','0')";

if(insert($sql)!=false){
$build = array(
    "pid" =>(int)$ks2shop['id'],
    "type" => $type,
    "out_trade_no" => $name,
    "notify_url" => $ks2shop['host']."/return.php",
    "return_url" => $ks2shop['host']."/return.php",
    "name" => $name,
    "money" => $amount,
    "sitename" => "Ks2Shop",
);

$ks2_shop_key = $ks2shop['key'];
function ks2shop_create_url($p, $ks2_key,$ks2_shop_url)
{
    ksort($p);
    reset($p);
    $sign = '';
    $urls = '';
    foreach ($p AS $key => $val) {
        if ($val == '') continue;
        if ($key != 'sign') {
            if ($sign != '') {
                $sign .= "&";
                $urls .= "&";
            }
            $sign .= "$key=$val";
            $urls .= "$key=" . urlencode($val);
        }
    }
    $key = md5($sign . $ks2_key);
    $query = $urls . '&sign=' . $key;
    $url = $ks2_shop_url."submit.php?". $query;
    header("Location:{$url}");
}
    ks2shop_create_url($build, $ks2_shop_key,$ks2_shop_url);
}