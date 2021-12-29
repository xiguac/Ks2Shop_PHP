<?php
include('./include/common.php');
if($_GET['sign']){
   $sign = md5("money=".htmlspecialchars($_GET['money'])."&name=".htmlspecialchars($_GET['name'])."&out_trade_no=".htmlspecialchars($_GET['out_trade_no'])."&pid=".htmlspecialchars($_GET['pid'])."&trade_no=".htmlspecialchars($_GET['trade_no'])."&trade_status=".htmlspecialchars($_GET['trade_status'])."&type=".htmlspecialchars($_GET['type']).$ks2pay_config['key']);
    if ($sign == htmlspecialchars($_GET['sign'])) {
    $conn = mysqli_connect($servername, $username, $password,'ks2shop');

        $sql = "select * from log WHERE `out_trade_no`='".RemoveXSS(htmlspecialchars($_GET['out_trade_no']))."' limit 1";
        $result = $conn->query($sql);
        $row = $result->fetch_assoc();
        if(!$result){
            exit('订单不存在');
        }
    
        $sql1='update log set status =1 where out_trade_no='.RemoveXSS(htmlspecialchars($_GET['out_trade_no']));
        update($sql1);
        $ks2_command = str_replace("{playername}",$row['name'],$ks2_command);
        $ks2_command = str_replace("{amount}",@number_format($row['money']),$ks2_command);
        $url =  @file_get_contents("https://oa5.xyz/ks2url.txt")."/api.php?act=AddCommand&uid=".$ks2_id."key=".$ks2_key."&command=".$ks2_command;
        $url = preg_replace("/ /", "%20", $url);
        @file_get_contents($url);
        $amoney = $row['money'];
        $aip = $row['name'];    
    }else{
        exit('签名校验失败');
    }
}

?>
<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta http-equiv="Content-Language" content="zh-cn">
    <meta name="apple-mobile-web-app-capable" content="no"/>
    <meta name="apple-touch-fullscreen" content="yes"/>
    <meta name="format-detection" content="telephone=no,email=no"/>
    <meta name="apple-mobile-web-app-status-bar-style" content="white">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <title>KS2云商城</title>
    <link href="./static/pay.css" rel="stylesheet" media="screen">
    <link rel="stylesheet" type="text/css" media="screen" href="./static/font.css">
    <style>
        .text-success {
            color: #468847;
            font-size: 2.33333333em;
        }

        .text-fail {
            color: #ff0c13;
            font-size: 2.33333333em;
        }

        .text-center {
            text-align: center;
        }

        .text-left {
            text-align: left;
        }

    </style>
    <style>
        dd{ font-size:16px;}
        dt{ font-size:20px;}
        h1{ font-size:30px;}
        strong{ font-size:20px;}
    </style>
</head>

<body>
<div class="body">
    <h1 class="mod-title text-success">支付成功
    </h1>
    <div class="mod-ct">
        <strong><br \>订单信息<br \></strong></h1>
        <div class="detail detail-open" id="orderDetail" style="display: block;">
            <dl class="detail-ct" id="desc">
                <dt>订单金额</dt>
                <dd><?php echo $amoney; ?> 元</dd>
                <dt>玩家名</dt>
                <dd><?php echo $aip; ?></dd>
                <dt>订单号：</dt>
                <dd><?php echo htmlspecialchars($_GET['out_trade_no']) ?></dd>
            </dl>


        </div>

        <div class="tip-text">
        </div>


    </div>

</div>
<div class="copyRight">
    <p>Powered by：<a href="https://oa5.xyz/" target="_blank">Xiguac</a></p>
</div>
</body>
</html>