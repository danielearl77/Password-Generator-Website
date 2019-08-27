<?php
// Password Phrase Generator
$passwordLength = $_POST['numberOfWords1'];
$includeNumbers = $_POST['includeNums1'];
$list = file("words.dat");
$len = count($list);
if($passwordLength > "4") {
    $passwordLength = "4";
}
for ($i=1;$i <= $passwordLength; $i++) {
    $selector = random_int(0, $len);
    $result .= trim($list[$selector]);
    $result = strtolower($result);
}
if($includeNumbers == "true"){
    $number = random_int(1000, 9999);
    $finalPassword = $result . $number;
} else {
    $finalPassword = $result;
}
echo $finalPassword;
?>