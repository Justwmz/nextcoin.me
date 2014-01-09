<?php
//$xml_answer_orig = $_POST['operation_xml'];
$xml_answer=base64_decode($_POST['operation_xml']);
$signature_answer=base64_encode(sha1($merc_sig.$xml_answer.$merc_sig,1)); 
$status = strpos($xml_answer, 'status');
$amount = strpos($xml_answer, 'amount');
echo $status;
echo "<br>".$amount;
?>