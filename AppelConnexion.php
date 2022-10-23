<html>

    <head>
        <meta charset="UTF-8" />
        <title>Se connecter</title>

    </head>

    <body>

    
        <div class="container">
            <!-- FORMULAIRE-->
            <form method="POST">
                <p>Bienvenue</p>
                <input type="email" name='mailConnect' placeholder="Email"><br/>
                <input type="password" name='mdpConnect' placeholder="Mot de passe"><br/>
                <input type="submit" name="formConnexion" value="Se connecter !"><br/>
                <a href="#">Mot de passe oublié</a><br/><br/>
                <a href="CreationCompte.php">Créer un compte</a>
            </form>

            <?php
                if(isset($erreur))
                {
                    echo '<font color="red">' .$erreur. "</font>";
                }
            ?>

            <!-- OMBRES-->
            <div class="ombre ombre1"></div>
            <div class="ombre ombre2"></div>
            <div class="ombre ombre3"></div>
            <div class="ombre ombre4"></div>
            <div class="ombre ombre5"></div> 

        </div>

    </body>

</html>





<?php
session_start();

if(isset($_POST['mdpConnect']) && isset($_POST['mailConnect']))
{
    $mdpConnect = sha1($_POST['mdpConnect']);
$mailConnnect = htmlspecialchars($_POST['mailConnect']);


if(empty($mailConnnect))
{
    $erreur = "Veuillez saisir votre mail";
}
else if(empty($mdpConnect))
{
    $erreur = "Veuillez saisir votre mot de passe";
}
else
{
    $conn = mysqli_connect('localhost', 'root', '', 'garage1');
    $passeword = md5($mdpConnect);

    $login = "SELECT idUtilisateur FROM utilisateur WHERE mail = '$mailConnnect' AND mdp = '$mdpConnect' ";
    $executeReq = mysqli_query($conn,$login);
    $userExist = mysqli_num_rows($executeReq);

    if($userExist == 1)
    {
        $_SESSION['mailConnect'] = $mailConnnect;
        
        $ma = $_SESSION['mailConnect'];
        $d = mysqli_fetch_array($executeReq);
        $idUser = $d['idUtilisateur'];

        header("Location:Compte.php?in=$idUser");
        exit();
    }
    else
    {
        if($_POST['mailConnect'])
             echo "Mail ou mot de passe incorrect svp veuillez créer un compte utilisateur";
       
    }
}

}
echo '<style>

*{
    margin: 0;
    padding: 0;
    outline: none;
}

body {
    background: linear-gradient(45deg, #fc466b, #3F5EFB);
    height: 100vh;
    display: flex;
    justify-content: center;
    align-items: center;
}

.container {
    position: relative;
}


form {
    background: rgba(255, 255, 255, .3);
    padding: 3rem;
    height: 320px;
    border-radius: 20px;
    border-left: 1px solid rgba(255, 255, 255, .3);
    border-top: 1px solid rgba(255, 255, 255, .3);
    backdrop-filter: blur(10px);
    -webkit-backdrop-filter: blur(10px);
    -moz-backdrop-filter: blur(10px);
    box-shadow: 20px 20px 40px -6px rgba(0, 0, 0, .2);
    text-align: center;
}

p {
    color: white;
    font-weight: 500;
    opacity: .7;
    font-size: 1.9rem;
    margin-bottom: 20px;
    text-shadow: 2px 2px 4px rgba(0, 0, 0, .2);
}

a {
    color: #ddd;
    text-decoration: none;
    font-size: 20px;
    transition: all .3s
}

a:hover {
    text-shadow: 2px 2px 4px rgba(0, 0, 0);
}

input {
    background: transparent;
    border: none;
    border-left: 1px solid rgba(255, 255, 255, .3);
    border-top: 1px solid rgba(255, 255, 255, .3);
    padding: 1rem;
    width: 200px;
    border-radius: 50px;
    backdrop-filter: blur(5px);
    -webkit-backdrop-filter: blur(5px);
    -moz-backdrop-filter: blur(5px);
    box-shadow: 4px 4px 60px rgba(0, 0, 0, .2);
    color: white;
    font-weight: 500;
    text-shadow: 2px 2px 4px rgba(0, 0, 0, .2);
    transition: all .3s;
    margin-bottom: 2em;
}

::placeholder {
    color:white;
}

input:hover,
input[type="email"]:focus,
input[type="password"]:focus {
    background: rgba(255, 255, 255, .1);
    box-shadow: 20px 20px 40px 8px rgba(0, 0, 0, .2);
}

input[type="button"] {
    cursor: pointer;
    margin-top: 10px;
    font-size: 1rem;
    width: 150px;
}

.ombre {
    background: rgba(255, 255, 255, .3);
    backdrop-filter: blur(10px);
    -webkit-backdrop-filter: blur(10px);
    -moz-backdrop-filter: blur(10px);
    position: absolute;
    border-left: 1px solid rgba(255, 255, 255, .3);
    border-top: 1px solid rgba(255, 255, 255, .3);
    border-radius: 10px;
    box-shadow: 10px 10px 60px -8px rgba(0, 0, 0, .2);
}

.ombre1 {
    height: 80px; width: 80px;
    top: -20px; left: -40px;
    z-index: -1;
}

.ombre2 {
    height: 80px; width: 80px;
    bottom: -30px; right: 10px;
    z-index: -1;
}

.ombre3 {
    height: 100px; width: 100px;
    bottom: 120px; right: -50px;
    z-index: -1;
}

.ombre4 {
    height: 120px; width: 120px;
    top: -60px; right: -50px;
}

.ombre5 {
    height: 60px; width: 60px;
    bottom: 170px; left: 90px;
    z-index: -1;
}

</style>';

?>

