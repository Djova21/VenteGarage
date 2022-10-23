<?php

$conn = mysqli_connect('localhost', 'root', '', 'garage1');

if(isset($_POST['forminscription']))
{
    $nom = htmlspecialchars($_POST['nom']);
    $prenom = htmlspecialchars($_POST['prenom']);
    $mail = htmlspecialchars($_POST['mail']);
    $mail2 = htmlspecialchars($_POST['mail2']);
    $mdp = sha1($_POST['mdp']);
    $mdp2 = sha1($_POST['mdp2']);
    

    if(!empty($_POST['nom']) AND !empty($_POST['prenom']) AND !empty($_POST['mail']) AND !empty($_POST['mail2']) AND 
    !empty($_POST['mdp']) AND !empty($_POST['mdp2']))
    {
        $nomLength = strlen($nom);
        $prenomLength = strlen($prenom);

        if($nomLength <= 80)
        {
            if($prenomLength <= 80)
            {
                if($mail == $mail2)
                {
                    if(filter_var($mail, FILTER_VALIDATE_EMAIL))
                    {
                        $reqmail = "SELECT * FROM utilisateur WHERE mail = '$mail'";
                        $executeReq = mysqli_query($conn,$reqmail);
                        $mailexiste = mysqli_num_rows($executeReq);
                        if($mailexiste == 0)
                        {
                            if($mdp == $mdp2)
                            {
                                $insererUtilisateur = "INSERT INTO utilisateur(nom, prenom, mail, mdp) VALUES('$nom', '$prenom', '$mail', '$mdp')";
                                
                                $inserer = mysqli_query($conn,$insererUtilisateur);

                               

                                header("Location: AppelConnexion.php");
                                exit();

                               



                                $erreur = "Votre compte a bien été créé !";
                            }
                            else
                            {
                                $erreur = "Vos mots de passent ne correspondent pas";
                            }
                        }
                        else
                        {
                            $erreur = "Adresse mail déjà utilisé";
                        }
                    }
                    else
                    {
                        $erreur = "Votre adrrese mail n'est pas valide";
                    }
                }
                else
                {
                    $erreur = "Vos adresses mails ne correspondent pas";
                }

            }
            else
            {
                $erreur = "Votre prenom ne doit pas depasser 50 caracteres !";
            }           
        }
        else 
        {
            $erreur = "Votre nom ne doit pas depasser 50 caracteres !";
        }
    }
    else
    {
        $erreur = "Tous les champs doivent être complétés";
    }
}

?>

<!DOCTYPE html>
<html lang="fr" dir="ltr">
<head>
<title>Creation compte utilisateur</title>
<meta charset="UTF-8">
<!--<link rel="stylesheet" href="D:\Temp\cssConnection.css" type="text/css">-->
<?php

echo ' <style>

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
    height: 410px;
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
    font-weight: 700;
    opacity: .7;
    font-size: 3rem;
    margin-bottom: 5px;
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
    width: 300px;
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

input[type="submit"] {
    cursor: pointer;
    margin-top: 10px;
    font-size: 1rem;
    width: 150px;
}

</style>';

?>

</head>

<body>

    <div align="center">
        <p>Inscription</p><br/><br/>

        <form method="POST" action="">

            <table>
                <tr>
                    <td align="right"><label for="nom"> Nom : </label></td>
                    <td><input type="text" placeholder="Votre nom" id="nom" name="nom" value="<?php if(isset($nom)) { echo $nom; } ?>"/></td>
                </tr>
                <tr>
                    <td align="right"><label for="prenom"> Prenom : </label></td>
                    <td><input type="text" placeholder="Votre prenom" id="prenom" name="prenom" value="<?php if(isset($prenom)) { echo $prenom; } ?>" /></td>
                </tr>
                <tr>
                    <td align="right"><label for="mail"> Mail : </label></td>
                    <td><input type="text" placeholder="Votre mail" id="mail" name="mail" value="<?php if(isset($mail)) { echo $mail; } ?>" /></td>
                </tr>
                <tr>
                    <td align="right"><label for="mail2"> Confirmation du mail : </label></td>
                    <td><input type="text" placeholder="Confirmer votre mail" id="mail2" name="mail2" value="<?php if(isset($mail2)) { echo $mail2; } ?>"/></td>
                </tr>
                <tr>
                    <td align="right"><label for="mdp"> Mot de passe : </label></td>
                    <td><input type="password" placeholder="Votre mot de passe" id="mdp" name="mdp" /></td>
                </tr>
                <tr>
                    <td align="right"><label for="mdp2"> Confirmation du mot de passe : </label></td>
                    <td><input type="password" placeholder="Votre mot de passe" id="mdp2" name="mdp2" /></td>
                </tr>
                <tr>
                    <td></td>
                    <td align="center"><br /><input type="submit" name="forminscription" value="S'inscrire"/></td>
                </tr>
            </table>

        </form>

        <?php
        if(isset($erreur))
        {
            echo '<font color="red">' .$erreur. "</font>";
        }
        ?>

    </div>

</body>

</html>