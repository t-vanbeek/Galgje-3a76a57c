<?php
#session_start();
?>

<!DOCTYPE html>
<html>

<link rel="stylesheet" href="style.css">
<link href="icon.png" rel="icon" type="icon.png" />

<head>
    <title>Galgje</title>
</head>

<body>
    <div class="head">
        <h1>Galgje</h1>
    </div>
    <div class="text">
        <h3>Je hebt gekozen om zelf een woord in te voeren.</h3>
    </div>
    <div class="button">
        <form method="POST">
            <input type="text" name="WoordGalgje" id="WoordGalgje">
            <button type="submit" name="Opslaan" id="Start">Start</button>
        </form>
    </div>
    <div class="phpGalgWoord">
        <h1>
            <?php
            if (isset($_POST["Opslaan"])) {
                    setcookie("Galgwoord", $_POST["WoordGalgje"]);
                    header("refresh: 0 ");
                }
            
            if (isset($_COOKIE["Galgwoord"])) {
                echo ("Je hebt") . " " . $_COOKIE["Galgwoord"] . " " . "gekozen om mee te spelen!";
            }
            ?>
        </h1>
    </div>
    <div class="img">
        <img src="END.png" alt="Galgje">
    </div>
    <div class="startbutton">
        <form>
            <button class="startbutton" type="submit" formaction="">Begin het spel</button>
        </form>
</body>

</html>