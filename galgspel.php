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
    <?php
    $aantalfouten = 0;
    if(isset($_POST['button'])){
        if($_POST['button']!='reset'){
            $changelater = $_POST['button'];
            if(isset($_COOKIE ['letters'])){
                $letters = $_COOKIE['letters'] . ',' . $_POST['button'];
            } else{
                $letters = $_POST['button'];
            }
            setcookie('letters' , $letters);
            header("location: galgspel.php");
        } else{
            setcookie("woord" , "");
            setcookie("letters" , "");
            setcookie("fouten" , "");
        }
    }
    if(!isset($_COOKIE['letters'])){
        $_COOKIE['letters'] = "";
    }
    $woord_letters = str_split($_COOKIE['woord']);
    $keuze = explode("," , $_COOKIE['letters']);

    $gewonnen = true;
    foreach($woord_letters as $woord){
        $correct = false;
        foreach($woord_letters as $woord){
            if($woord_letters === $keuze){
                $correct = true;
            }
        }
        echo "<div id='lijn'>";
            if($correct){
                echo($woord_letters);
            } else{
                echo('_ ');
                $gewonnen = false;
            }
        echo "</div>";
    }
    foreach($keuze as $keuze_letters){
        $correct = false;
        foreach($woord_letters as $woord){
            if($woord_letters === $keuze){
                $correct = true;
            }
        }
        if(!$correct){
            $aantalfouten++;
        }
    }
    $verloren = false;
    if($aantalfouten === 10){
        $verloren = true;
    }
    if($gewonnen){
        echo '<br>' . '<h1>Gewonnen</h1>';
    }
    if($verloren){
        echo '<br>' . '<h1>Verloren</h1>';
    }
    ?>

    <form action="galgspel.php" method='post'>
    <button type="submit" name="button" value="reset">Reset</button>

    <?php
    $alfabed = range("a" , "z");
    foreach($alfabed as $value){
        $game = true;
        foreach($keuze as $keuze_letters){
            if($value === $keuze_letters){
                $game = false;
            }
        }
        if($gewonnen){
                $game = false;
        }
        if($verloren){
                $game = true;
        }
        if($game){
            echo('<button type="submit" name="button" value="' . $value . '">' . $value . '</button>');
        } else{
            echo('<button type="submit" name="button" value="' . $value . '" disabled>' . $value . '</button>');
        }
    }
    ?>

    </form>
    
    <h3>Gebruikte letters:</h3><p>
    
    <?php
    foreach($keuze as $keuze_letters){
        echo($keuze_letters . ' , ');
    }
    ?>

    </P>
    </div>

    <div class="fout"

        <?php
        if($aantalfouten === 0){
            echo('<img id="dood" src="fout0.png">');
        } if($aantalfouten === 1) {
            echo('<img id="dood" src="fout1.png">');	
        } if($aantalfouten === 2) {
            echo('<img id="dood" src="fout2.png">');	
        }if($aantalfouten === 3) {
            echo('<img id="dood" src="fout3.png">');	
        }if($aantalfouten === 4) {
            echo('<img id="dood" src="fout4.png">');	
        }if($aantalfouten === 5) {
            echo('<img id="dood" src="fout5.png">');	
        }if($aantalfouten === 6) {
            echo('<img id="dood" src="fout6.png">');	
        }if($aantalfouten === 7) {
            echo('<img id="dood" src="fout7.png">');	
        }if($aantalfouten === 8) {
            echo('<img id="dood" src="fout8.png">');	
        }if($aantalfouten === 9) {
            echo('<img id="dood" src="fout9.png">');	
        }if($aantalfouten === 10) {
            echo('<img id="dood" src="END.png">');	
        }
        ?>
        
    </div>

</body>

</html>