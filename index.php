<?php    

$userName = "Guest";
$bgColor  = "#ffffff";
$language = "fr";

$currentDate = date("d/m/Y H:i");


if(isset($_COOKIE["name_cookie"])){
    $userName = $_COOKIE["name_cookie"];
}

if(isset($_COOKIE["color_cookie"])){
    $bgColor = $_COOKIE["color_cookie"];
}

if(isset($_COOKIE["lang_cookie"])){
    $language = $_COOKIE["lang_cookie"];
}


switch ($language){

     case "en":
        $welcomeText   = "Welcome, ";
        $lastUpdate    = "Last update is: ";
        $labelName     = "Name";
        $labelLanguage = "Language";
        $btnSave       = "Save your choices";
        $btnReset      = "Reset all";
        $labelColor    = "Background color";
    break;

    case "fr":
        $welcomeText   = "Bienvenue, ";
        $lastUpdate    = "Dernière mise à jour : ";
        $labelName     = "Nom";
        $labelLanguage = "Langue";
        $btnSave       = "Enregistrer mes choix";
        $btnReset      = "Réinitialiser tout";
        $labelColor    = "Couleur de fond";
    break;
}


// handle form
if($_SERVER["REQUEST_METHOD"] === "POST"){
    
    if(!empty($_POST["f_name"])){
        $userName = trim($_POST["f_name"]);
        setcookie("name_cookie", $userName, time() + 3600 * 24 * 30);
    }

    if(!empty($_POST["bg_color"])){
        $bgColor = $_POST["bg_color"];
        setcookie("color_cookie", $bgColor, time() + 3600 * 24 * 30);
    }

    if(!empty($_POST["choose"])){
        $language = $_POST["choose"];
        setcookie("lang_cookie", $language, time() + 3600 * 24 * 30);
    }

    header("Location: index.php");
    exit();
}


if(isset($_GET["action"]) && $_GET["action"] === "reset"){

    setcookie("name_cookie", "", time() - 3600 * 24 * 30);
    setcookie("color_cookie", "", time() - 3600 * 24 * 30);
    setcookie("lang_cookie", "", time() - 3600 * 24 * 30);

    header("Location: index.php");
    exit();
}

?>
<!DOCTYPE html>
<html lang="<?php echo $language; ?>">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Preference App</title>

    <style>
        body{
            background-color: <?php echo htmlspecialchars($bgColor); ?>;
            font-family: Arial, sans-serif;
            padding: 30px;
        }
    </style>
</head>

<body>

    <div>

        <h1>
            <?php echo $welcomeText . htmlspecialchars($userName); ?>
        </h1>

        <h3>
            <?php echo $lastUpdate . $currentDate; ?>
        </h3>

        <form method="post">

            <label for="name"><?php echo $labelName; ?></label><br>
            <input type="text"  name="f_name"  id="name" required>

            <br><br>

            <label for="bg_color"><?php echo $labelColor; ?></label><br>
            <input type="color" name="bg_color" value="<?php echo htmlspecialchars($bgColor); ?>">

            <br><br>

            <label><?php echo $labelLanguage; ?></label>
            
            <br>

            <select name="choose">
                <option value="en" <?php if($language === "en") echo "selected"; ?>>English</option>
                <option value="fr" <?php if($language === "fr") echo "selected"; ?>>Francais</option>
            </select>

            <br><br>

            <input type="submit" value="<?php echo $btnSave; ?>">

        </form>

        <br><hr>

        <a href="index.php?action=reset">
            <?php echo $btnReset; ?>
        </a>

    </div>

</body>
</html>
















































































<!-- 
  -->

<!-- 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>

    <style>

        body{
             background-color:pink;
             display: flex;
             justify-content: center;
                align-items: center;
        }
        from{
            width: 300px;
            
        }
    </style>


     <div>
          <h1> <?php  echo  "Bienvenue, " .  $name ?></h1>
          <h3>Derniere mis a jour: 22-1-2026 12:02:15</h3>

          <form action="" method="post">

            <label for="name">nom:</label>
            <input type="text" name="f_name" id="name">

            <br>
            <br>

            <label for="bg_color">couleur de fond :</label>
            <input type="color" name="bg_color" name="bg_color">

            <br>
            <br>

             <label for="">Langue</label>

            <select name="choose">

                <option value="en">English</option>
                <option value="fr">francis</option>
            </select>

             <br>
             <br>

            <input type="submit" name="save_your" value="Enredister mes choix">
           <br><br>
          <hr>
          </form>

          <a href="index.php?action=rest">Reintialiser tout</a>
     </div>
    
</body>
</html> -->