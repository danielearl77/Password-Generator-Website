<?php
// PIN Generator
$PINLength = $_POST['PINLength1'];
if($passwordLength > "10") {
    $passwordLength = "10";
}
for($i=1;$i<=$PINLength;$i++) {
    $rawPIN = mt_rand(48,57);
    $finalPIN .= chr($rawPIN);
}
echo $finalPIN;
?>