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
function woordControle($woord_letters, $keuze) {
    foreach ($woord_letters as $woord) {
        $correct = false;
        foreach ($woord_letters as $woord) {
            if ($woord_letters == $keuze) {
                $correct = true;
            }
        }
}
function lijnCreatie($woord_letters, $correct = false, $gewonnen = true) {
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
function WoordControle2($keuze, $woord_letters) {
    foreach ($keuze as $keuze_letters) {
        $correct = false;
        foreach ($woord_letters as $woord) {
            echo "vergelijk: $woord en $keuze_letters";
            if ($woord == $keuze_letters) {
                echo "letter is goed";
                $correct = true;
            }
        }
    }
}
function foutTeller($keuze, $woord, $aantalfouten=0) {
    foreach ($keuze as $keuze_letters) {
        if ($woord != $keuze_letters) {
            $aantalfouten++;
        }
    }
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
    $woord_letters = str_split($_SESSION['woord']);
    $keuze = explode(",", $_SESSION['letters']);

$gewonnnen = true;
foreach ($woord_letters as $woord) {
    $correct = false;
    foreach ($woord_letters as $woord) {
        if ($woord_letters == $keuze) {
            $correct = true;
        }
    }  /* Lijn word gecreeërd */

    echo "<div class='letters' id='lijn'>";
    if ($correct) {
        echo ($_SESSION['woord']);
    } else {
        echo ('_ ');
        $gewonnen = false;
    }
    echo "</div>";
}
    /* Woord fout of niet? */
    foreach ($keuze as $keuze_letters) {
        $correct = false;
        foreach ($woord_letters as $woord) {
            echo "vergelijk: $woord en $keuze_letters";
            if ($woord == $keuze_letters) {
                echo "letter is goed";
                $correct = true;
            }
        }
        /* Als woord fout is tel op */
        if ($woord != $keuze_letters) {
            $aantalfouten++;
        }
    }
    $verloren = false;
   
   if ($woord != $keuze_letters) {
    $aantalfouten++;
}

   $verloren = false;
   if ($aantalfouten === 10) {
       $verloren = true;
   }
   if ($gewonnen) {
       echo "<br>" . "<h1 class='Gewonnen'>Gewonnen</h1>";
   }
   if ($verloren) {
       echo "<br>" . "<h1 class='Verloren'>Verloren</h1>";
   }
   ?>

   <form action="galgspel.php" method='post'>
       <button type="submit" name="button" value="reset">Reset</button>

       <?php
       $alfabed = range("a", "z");
       foreach ($alfabed as $value) {
           $game = true;
           foreach ($keuze as $keuze_letters) {
               if ($value == $keuze_letters) {
                   $game = false;
               }
           }
           if ($gewonnen) {
               $game = false;
           }
           if ($verloren) {
               $game = true;
           }
           if ($game) {
               echo ('<button type="submit" name="button" value="' . $value . '">' . $value . '</button>');
           } else {
               echo ('<button type="submit" name="button" value="' . $value . '" disabled>' . $value . '</button>');
           }
       }
       ?>

   </form>

   <h3>Gebruikte letters:</h3>
   <p>

       <?php
       foreach ($keuze as $keuze_letters) {
           echo ($keuze_letters . ' , ');
       }
       ?>

   </P>
   </div>

   <div class="fout">

       <?php
       if ($aantalfouten === 0) {
           echo ('<img id="dood" src="fout0.png">');
       }
       if ($aantalfouten === 1) {
           echo ('<img id="dood" src="fout1.png">');
       }
       if ($aantalfouten === 2) {
           echo ('<img id="dood" src="fout2.png">');
       }
       if ($aantalfouten === 3) {
           echo ('<img id="dood" src="fout3.png">');
       }
       if ($aantalfouten === 4) {
           echo ('<img id="dood" src="fout4.png">');
       }
       if ($aantalfouten === 5) {
           echo ('<img id="dood" src="fout5.png">');
       }
       if ($aantalfouten === 6) {
           echo ('<img id="dood" src="fout6.png">');
       }
       if ($aantalfouten === 7) {
           echo ('<img id="dood" src="fout7.png">');
       }
       if ($aantalfouten === 8) {
           echo ('<img id="dood" src="fout8.png">');
       }
       if ($aantalfouten === 9) {
           echo ('<img id="dood" src="fout9.png">');
       }
       if ($aantalfouten === 10) {
           echo ('<img id="dood" src="END.png">');
       }
       ?>

   </div>

</body>

</html>