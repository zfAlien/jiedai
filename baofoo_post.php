<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>自动处理提交页</title>
<?php
$_MerchantID=$_POST['_MerchantID'];//商户号
$_TransID=$_POST['_TransID'];//流水号
$_PayID=$_POST['_PayID'];//支付方式
$_TradeDate=$_POST['_TradeDate'];//交易时间
$_OrderMoney=$_POST['_OrderMoney']*100;//订单金额
$_ProductName=$_POST['_ProductName'];//产品名称
$_Amount=$_POST['_Amount'];//数量
$_ProductLogo=$_POST['_ProductLogo'];//产品logo
$_Username=$_POST['_Username'];//支付用户名
$_Email=$_POST['_Email'];
$_Mobile=$_POST['_Mobile'];
$_AdditionalInfo=$_POST['_AdditionalInfo'];//订单附加消息
$_Merchant_url=$_POST['_Merchant_url'];//商户通知地址 
$_Return_url=$_POST['_Return_url'];//用户通知地址
$_NoticeType=$_POST['_NoticeType'];//通知方式
$_Md5Sign=$_POST['_Md5Sign'];
//此处加入判断，如果前面出错了跳转到其他地方而不要进行提交
?>
</head>

<body onload="document.form1.submit()">
<form id="form1" name="form1" method="post" action="http://paygate.baofoo.com/PayReceive/bankpay.aspx">
        <input type='hidden' name='MerchantID' value="<?php echo $_MerchantID; ?>" />
        <input type='hidden' name='PayID' value="<?php echo $_PayID; ?>" />
        <input type='hidden' name='TradeDate' value="<?php echo $_TradeDate; ?>" />
        <input type='hidden' name='TransID' value="<?php echo $_TransID; ?>" />
        <input type='hidden' name='OrderMoney' value="<?php echo $_OrderMoney; ?>" />
        <input type='hidden' name='ProductName' value="<?php echo $_ProductName; ?>" />
        <input type='hidden' name='Amount' value="<?php echo $_Amount; ?>" />
        <input type='hidden' name='ProductLogo' value="<?php echo $_ProductLogo; ?>" />
        <input type='hidden' name='Username' value="<?php echo $_Username; ?>" />
        <input type='hidden' name='Email' value="<?php echo $_Email; ?>" />
        <input type='hidden' name='Mobile' value="<?php echo $_Mobile; ?>" />
        <input type='hidden' name='AdditionalInfo' value="<?php echo $_AdditionalInfo; ?>" />
        <input type='hidden' name='Merchant_url' value="<?php echo $_Merchant_url; ?>" />
        <input type='hidden' name='Return_url' value="<?php echo $_Return_url; ?>" />
        <input type='hidden' name='NoticeType' value="<?php echo $_NoticeType; ?>" />
        <input type='hidden' name='Md5Sign' value="<?php echo $_Md5Sign; ?>" />
</form>
</body>
</html>
