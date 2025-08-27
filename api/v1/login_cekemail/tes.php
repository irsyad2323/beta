<?php
$password = "duar12"; 
$hashed_password = '$2y$10$EtSw/yboFxasnnac4WDrrecXjFEHIXXw2qqrV5Q4X.KCFY2bEF9M6';

if (password_verify($password, $hashed_password)) {
    echo "Password sesuai";
} else {
    echo "Password tidak sesuai";
}

?>
