<?php 
    
    $password = fopen("password.txt", "r") 
        or exit("Unable to open file!");

    $shift = array(5, -14, 31, -9, 3);
    $count = 0;
    $text = "";

    while (!feof($password)) {

        $char = fgetc($password);
        $hex = bin2hex($char); //beolvasott karakter hexadecimális alakban

        if ($hex == "0a") {
            $text = $text . " "."<br>";
            $count = 0;
        } else {
            //eltolás a megfelelő értékkel és vissza alakítás ascii(olvasható) karakterré
            $ascii = chr(hexdec($hex) - $shift[$count]); 
            $text = $text . $ascii; 
            $count++;   
        }

        if ($count == 5) {
            $count = 0;
        }
        
    }

    /*echo $text;*/

    fclose($password);

/*
katika@gmail.com*katica85
arpi40@freemail.hu*polip
zsanettka@hotmail.com*csillag12
hatizsak@protonmail.com*tracking
terpeszterez@citromail.hu*cukorka
nagysanyi@gmail.hu*julcsika
*/
