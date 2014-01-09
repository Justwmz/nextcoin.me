<?php
$_POST['operation_xml'] = $operation_xml;
$_POST['signature'] = $signature;

$xml_decoded=base64_decode($operation_xml);

echo $xml_decoded;
?>