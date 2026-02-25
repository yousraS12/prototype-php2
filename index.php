

<?php    

  
   $name= "Guest";

   if(isset($_COOKIE["name"])){
      
      $name = $_COOKIE["name"];
   }

   if($_SERVER["REQUEST_METHOD"] === "POST"){
         
    
    if(!empty($_POST["f_name"])){

    $name= $_POST["f_name"];
    setcookie("name" , $name , time() + 3600 * 24 * 30);
    }

   }


    if($_SERVER["REQUEST_METHOD"] === "GET"){

        if(isset($_GET["action"]) && $_GET["action"] == "rest"){
        $name="Guest";
        setcookie("name" , $name , time() - 3600 * 24 * 30);

   }
   
    }

   

?>


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
</html>