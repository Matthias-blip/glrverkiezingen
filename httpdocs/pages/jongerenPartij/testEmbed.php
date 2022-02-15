<?php
    $normalUrl = "https://youtu.be/4pLUm7K3CGw";

    // Or we can write ltrim($str, $str[0]);
    $YTCode = ltrim($normalUrl, 'https://youtu.be/');

    echo $YTCode;
?>
