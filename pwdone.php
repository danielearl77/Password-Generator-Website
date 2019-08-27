<?php
// Standard Password Generator
$passwordLength = $_POST['pwdLength1'];
$symbolsIncluded = $_POST['symbols1'];
$removeAmbiguous = $_POST['ambig1'];
$ambig = array("48","49","73","79","105","108","111","124");
if($passwordLength > "30") {
    $passwordLength = "30";
}
if($symbolsIncluded == "true" && $removeAmbiguous == "true") {
    // a password with symbols but no ambig chars
    for ($i=1;$i <= $passwordLength; $i++) {
        $pwdRawPreTest = random_int(33, 126);
        if(in_array($pwdRawPreTest, $ambig)) {
            $pwdRaw = random_int(50,57);
        } else {
            $pwdRaw = $pwdRawPreTest;
        }
        $Rpwd .= chr($pwdRaw); 
        $x = random_int(63,126);
        $xx = chr($x);
        $finalPassword = str_replace("<", $xx, $Rpwd);
	}
}
if($symbolsIncluded == "false" && $removeAmbiguous == "false") {
    // a password with no symbols and ambig chars
    for ($i=1;$i <= $passwordLength; $i++) {
        $numAlph = random_int(1, 3);
        if ( $numAlph == 1 ) {$pwdRaw = random_int(48, 57);} 
        if ( $numAlph == 2 ) {$pwdRaw = random_int(65, 90);}
        if ( $numAlph == 3 ) {$pwdRaw = random_int(97, 122);}
        $finalPassword .= chr($pwdRaw);
    }
}
if($symbolsIncluded == "true" && $removeAmbiguous == "false" ) {
    // a password with symbols and ambig chars
    for ($i=1;$i <= $passwordLength; $i++) {
        $pwdRaw = random_int(33, 126);
        $Rpwd .= chr($pwdRaw); 
        $x = random_int(63,126);
        $xx = chr($x);
        $finalPassword = str_replace("<", $xx, $Rpwd);
    }
}
if($symbolsIncluded == "false" && $removeAmbiguous == "true") {
    // a password with no symbols and no ambig chars
    for ($i=1;$i <= $passwordLength; $i++) {
        $numAlph = random_int(1, 3);
        if ( $numAlph == 1 ) {$pwdRaw = random_int(50, 57);} 
        if ( $numAlph == 2 ) {
            $pwdRawPreTest = random_int(65, 90);
            if(in_array($pwdRawPreTest, $ambig)) {
                if($numAlph == 1){$pwdRaw = random_int(65,72);}
                if($numAlph == 2){$pwdRaw = random_int(74,78);}
                if($numAlph == 3){$pwdRaw = random_int(80,90);}
            } else {
                $pwdRaw = $pwdRawPreTest;
            }
        }
        if ( $numAlph == 3 ) {
            $pwdRawPreTest = random_int(97, 122);
            if(in_array($pwdRawPreTest, $ambig)) {
                if($numAlph == 3){$pwdRaw = random_int(97,104);}
                if($numAlph == 2){$pwdRaw = random_int(106,107);}
                if($numAlph == 1){$pwdRaw = random_int(112,122);}           
            } else {
                $pwdRaw = $pwdRawPreTest;
            }
        }
        $finalPassword .= chr($pwdRaw);
    }
}
echo $finalPassword;
?>