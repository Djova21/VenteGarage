<html>

    <head>
        <title>Page Contacts-Vente Garages</title>
        <link rel="stylesheet" href="css/styleGarage.css">
    </head>
    <style>
        .image {
                margin-top: 50px;
                margin-bottom: 60px;
            }
        section{
            background-image: url("image.png");
        }
        
    </style>
    <body>
    <?php
        include("Menu/MenuProjet.php");
    ?>  
<?php 

$valide = true;
$user_name;
$user_email;
$user_message;

 if (isset($_POST['name']) && isset($_POST['email']) && isset($_POST['message'])) {
    $user_name = $_POST['name'];
    $user_email = $_POST['email'];
    $user_message = $_POST['message'];


 }
 else{
     $valide = false;
 }

?>

   <section id="passage"> <div class="contact-form">
        <h1>CONTACTEZ-NOUS</h1>
        <form method="post" action="venteGarage.php#passage">
            <input type="text" name="name" placeholder="Votre nom" required>
            <input type="text" name="email" placeholder="Votre email" required>
            <textarea name="message" placeholder="Votre message" required></textarea>
            <?php
            if(!$valide )
            echo "<input type=\"submit\" name=\"submit\" value=\"Envoi du message\" class=\"submit-btn\" onclick=\"retournerMessage()\">";
            else
            echo "<p>Envoi du message reussie</p>";
            ?>

        </form>

        <h2>Important</h2>
   <p>
        Dans le but de satisfaire tout utilisateur <br> 
        desirant se servir de notre plateforme pour <br>
        des services relatifs a la  vente d'articles <br>
        nous restons a votre disposition pour  des<br> 
        eventuelles preoccupations qui pourraient <br> 
        faire l'objet des explications precises...
   </p>

    <br><br>
   <p>
       Projet vente garage
       <a href="venteGarage.php" target="_blank">Access Ici</a>
   </p>

        <div class="status">
    <?php
       
    ?>
        </div>
    </div>
   </section>
   <br/>
   <?php
        include("Menu/PiedsPage.php");
    ?>  
    </body>
</html>
