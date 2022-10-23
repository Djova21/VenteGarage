<!Doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">  
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Creer Garage</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="css/Style1.css">
    </head>
    <style>
        body{
            background: linear-gradient(45deg, #fc466b, #3F5EFB);
        }
    </style>
    <body>

    <?php
        //include("Menu/MenuProjetCompte.php");
    ?>  
    
    <?php
    $provinces = array(
        'Territoire du Yukon',
        'Territoire du Nord-Ouest' ,
        'Nunavut' ,
        'Colombie-Britannique' ,
        'Alberta',
        'Saskatchewan' ,
        'Manitoba',
        'Ontario' ,
        'Québec' ,
        'Ile du Prince Edouard' ,
        'Terre-Neuve' ,
        'Nouveau-Brunswick',
        'Nouvelle-Ecosse' 
    );
   
    ?>
        <form>
            <div class="Form" >
                <h1>Creer une vente de garage</h1>
                <input type="text" placeholder="Nom"  name="txtNom" required>

                <input type="text" placeholder="Description"  name="desc" required>
                <input type="text" placeholder="Adresse"  name="adr" required>
                <input type="text" placeholder="Ville"  name="vil" required>
                <select name="ddlProvinces" id="selec">
                            <?php

                                foreach ($provinces as $value) {
                            
                                    echo "<option>$value</option>";
                                    
                                }
                            ?>
                </select>
                
                <input type="text" id="fichier_Image" name="fichierImage" placeholder="Copier une  adresse Image">
                <label>Date de Debut</label><input type="date" placeholder="DateDebut" name="dtdebut" required>
                <label>Date de Fin</label><input type="date" placeholder="DateFin" name="dtFin" required>
                <input type="submit" name="pub"  class='btn btn-success btn-lg' value="Publier"/><br/><br/>
                <input type="reset" name="an"  class='btn btn-success btn-lg' value="Annuler"/>
                
            </div>
        </form>
       <?php
        
        session_start();
       if(isset($_GET['id']))
           {
                
                 $_SESSION['id'] = $_GET['id'];
                 //$_SESSION['ma'] = $_GET['ma']; 
           }

        if(isset($_GET['pub']))
        {
            $conn = mysqli_connect('localhost', 'root', '', 'garage1');
            $nom = $_GET['txtNom'];
            $description = $_GET['desc'];
            $dDebut = $_GET['dtdebut'];
            $dFin = $_GET['dtFin'];
            $adresse = $_GET['adr'];
            $ville = $_GET['vil'];
            $province = $_GET['ddlProvinces'];
            $image = $_GET['fichierImage'];

            
            $user =  $_SESSION['id'];
            //$mil =  $_SESSION['ma'];
            

            $sql =  "INSERT INTO garage(IdUtilisateur,description, dateDebut, dateFin,adresse,Ville,Province,image,Nom) VALUES($user,'$description', '$dDebut', '$dFin','$adresse','$ville','$province','$image','$nom')";

            $garage = mysqli_insert_id($conn);
        

            $resultat = mysqli_query($conn, $sql);

            if(!$resultat)
            {
                echo mysqli_error($conn);  //affichage du message
                exit; //sortie de notre programme.
            }
            else
            {
                if(isset($_GET['pub']))
                    echo "<span>Publication de garage reussie</span>";

                header("Location: Compte.php?util=$user", false);
                exit();
            }
        }
       ?>
       <br/>;
       <?php
        include("Menu/PiedsPage.php");
    ?>
    </body>
</html>
