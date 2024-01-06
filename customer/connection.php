<?php
// date_default_timezone_set("Asia/Kolkata");
// session_start();

$server = "localhost";
$username = "root";
$password = "";
$database = "digi_card";

$conn = mysqli_connect($server, $username, $password, $database);
if (!$conn){
//     echo "success";
// }
// else{
    die("Error". mysqli_connect_error());
}

?>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="/digital_card_v2/node_modules/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="/digital_card_v2/node_modules/bootstrap/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
    </script>
    <link rel="stylesheet" href="/digital_card_v2/assets/css/user.css">
    <link rel="stylesheet" href="/digital_card_v2/assets/css/style.css">
    <link rel="stylesheet" href="/digital_card_v2/assets/css/index.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <script src="/digital_card_v2/assets/jquery/jquery.min.js"></script>
</head>