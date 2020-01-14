<?php
session_start();
?>

<!DOCTYPE html>
<html>

<link rel="stylesheet" href="style.css">
<link href="icon.png" rel="icon" type="icon.png" />

<head>
    <title>Galgje | Zelf</title>
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
            <input class="textinput" type="text" name="WoordGalgje" id="WoordGalgje" placeholder="Voer een woord in" />
            <button class="start" type="submit" name="Opslaan" id="Start">opslaan</button>
        </form>
    </div>
    <div class="phpGalgWoord">
        <h2>
            <?php
            if (isset($_POST["Opslaan"])) {
                    setcookie('woord', $_POST["WoordGalgje"]);
                    header("refresh: 0 ");
                }
            
            if (isset($_COOKIE["woord"])) {
                echo ("Je hebt") . " '" . $_COOKIE["woord"] . "' " . "gekozen om mee te spelen!";
            }
            ?>
        </h2>
    </div>
    <div class="img">
        <img src="END.png" alt="Galgje">
    </div>
    <div class="startbutton">
        <form>
            <button class="startbutton" type="submit" formaction="galgspel.php">Begin het spel</button>
        </form>
    </div>
</body>

</html>