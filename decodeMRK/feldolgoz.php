<html lang="hu">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Document</title>
</head>

<body>

    <?php

    require "index.html";
    include('decode.php');

    //kapcsolódás az adatbázishoz
    $conn = mysqli_connect("localhost", "root", "")
        or die("Failed to connect database");

    //kapcsolódás a táblához
    mysqli_select_db($conn, "adatok")
        or die("Failed to choose database");


    $email = $_POST["email"];
    $password = $_POST["password"];

    //kikeressük az általunk megadott email cimnek megfelelő Usernevet az adatbázisból
    $resoult_check_email_sql = mysqli_query($conn, "SELECT Username from tabla where Username='$email'") 
        or die(mysqli_error($conn));
    $Numer_of_Email = mysqli_num_rows($resoult_check_email_sql);

    //ellőrizzük hogy a felhasználó megadott-e email címet illetve jelszót
    if ((empty($email)) and (empty($password))) {
        echo "Adjon meg email címet és jelszót!";
    } elseif (empty($email)) {
        echo "Adjon meg email címet";
    } elseif (empty($password)) {
        echo "Adjon meg jelszót!";
    } elseif ($Numer_of_Email > 0) {
        //Ha megfelelő email címet adtak meg akkor dekódoljuk a neki megfelelő jelszót
        $Decoded_Text = $text;
        $Cut_Decoded_text = strstr($Decoded_Text, $email . "*");
        $Password_Startig_Point = strpos($Cut_Decoded_text, "*") + 1;
        $Decoded_Password = "";

        while ($Cut_Decoded_text[$Password_Startig_Point] != " ") {
            $Decoded_Password = $Decoded_Password . $Cut_Decoded_text[$Password_Startig_Point];
            $Password_Startig_Point++;
        }

        //ellenőrizzük, hogy a megadott és a password.txt-ben megadott jelszavak megegyeznek-e
        if ($_POST["password"] == $Decoded_Password) {

            $sql = "SELECT Titkos FROM tabla WHERE Username='$email'";
            $result = mysqli_query($conn, $sql) or die(mysqli_error($conn));
            
            //lekérjuk az adatbázisból a megadott email cím alapján a a felhasználó kedven színét
            while ($row = mysqli_fetch_assoc($result)) {
                $color = $row['Titkos'];
            }

            if ($color == "piros") {
                echo '<body style="background-color:red">';
            } elseif ($color == "zold") {
                echo '<body style="background-color:green">';
            } elseif ($color == "sarga") {
                echo '<body style="background-color:yellow">';
            } elseif ($color == "kek") {
                echo '<body style="background-color:blue">';
            } elseif ($color == "fekete") {
                echo '<body style="background-color:black">';
            } elseif ($color == "feher") {
                echo '<body style="background-color:white">';
            }
        } else {
            //ha hibás jelszót adtak meg hibaüzenete írunk ki majd átirányítjuk a felhasználót a police.hu-ra
            echo "Hibás jelszó!"; ?>
    <?php }
    } else {
        //ha hibás email címet adtak meg
        echo "Nincs ilyen felhasználó!";
    }
    mysqli_close($conn);

    ?>

</body>

</html>