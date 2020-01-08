<?php
session_start();
function SpelStart()
{
    if (isset($_POST['button'])) {
        if ($_POST['button'] != 'reset') {
            $changelater = $_POST['button'];
            if (isset($_SESSION['letters'])) {
                $letters = $_SESSION['letters'] . ',' . $_POST['button'];
            } else {
                $letters = $_POST['button'];
            }
            $_SESSION['letters'] = $letters;
            header("location: galgspel.php");
        } else {
            $_SESSION["woord"] = "";
            $_SESSION["letters"] = "";
            $_SESSION["fouten"] = "";
            header("refresh: 0");
        }
    }
}
function woordControle($woord_letters = str_split($_SESSION['woord']),$keuze = explode(",", $_SESSION['letters'])) {
    foreach ($woord_letters as $woord) {
        $correct = false;
        foreach ($woord_letters as $woord) {
            if ($woord_letters == $keuze) {
                $correct = true;
            }
        }
}
function lijnCreatie($woord_letters = str_split($_SESSION['woord']), $correct = false, $gewonnen = true) {
    foreach ($woord_letters as $woord) {
    if ($correct) {
        echo ($_SESSION['woord']);
    } else {
        echo ('_ ');
        $gewonnen = false;
    }
    echo "</div>";
}
}
?>
<!doctype html>
<html>

<link rel="stylesheet" href="style.css">
<link href="icon.png" rel=" icon" type="icon.png" />
<meta charset="UTF-8">

<head>
    <title>Galgje | Spel</title>
</head>

<body>
    <div class="head">
        <h1>Galgje</h1>
    </div>
    <?php
    $aantalFouten = 0;

    SpelStart();

    if (!isset($_SESSION['letters'])) {
        $_SESSION['letters'] = "";
    }
$gewonnnen = true;
    woordControle();
    ?>
    <div class="letters" id="lijn">
        <?php
    lijnCreatie();
   
</body>

</html>