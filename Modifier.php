<!Doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">  
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Modifier la vente de Garage</title>
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
       // include("Menu/MenuProjetCompte.php");
    ?>  
      
    <?php
    $provinces = array(
        'Territoire du Yukon',
        'Territoire du Nord-Ouest',
        'Nunavut',
        'Colombie-Britannique',
        'Alberta' ,
        'Saskatchewan',
        'Manitoba' ,
        'Ontario' ,
        'Québec',
        'Ile du Prince Edouard' ,
        'Terre-Neuve' ,
        'Nouveau-Brunswick' ,
        'Nouvelle-Ecosse' 
    );
   
    ?>
    
    
        
       <form>
            <div class="Form" >
                <h1>Modifier la vente de garage</h1>
                <?php 
                session_start();

                
                if(isset($_GET['ga'])){
                    $_SESSION['ga'] = $_GET['ga'];
                   
                }

                if(isset($_GET['ut'])){
                    $_SESSION['ut'] = $_GET['ut'];
                   
                }

                if(!isset($_GET['nom']))
                    $n =  $_SESSION['nom'];
                else{
                    $_SESSION['nom'] = $_GET['nom'];
                    $n = $_GET['nom'];
                }
                
                echo "<input type='text' placeholder='Nom' value='{$n}' name='txtNom' >";
                
                ?>
                
                <?php 
                

                if(!isset($_GET['des']))
                    $d =  $_SESSION['des'];
                else{
                    $_SESSION['des'] = $_GET['des'];
                    $d = $_GET['des'];
                    
                }
                echo "<input type='text' placeholder='Description' value='{$d}' name='desc' >";
                
                ?>
                <?php 

                

                if(!isset($_GET['adres']))
                    $ad =  $_SESSION['adres'];
                else{
                    $_SESSION['adres'] = $_GET['adres'];
                    $ad = $_GET['adres'];
                }
                
                echo "<input type='text' placeholder='Adresse'  value='{$ad}'  name='adr' >";
                
                ?>
                <?php 
                 
                 if(!isset($_GET['vill']))
                     $v =  $_SESSION['vill'];
                 else{
                    $_SESSION['vill'] = $_GET['vill'];

                     $v = $_GET['vill'];
                 }


                echo "<input type='text' placeholder='Ville' value='{$v}'  name='vil'>";
                
                ?>
                <select name="ddlProvinces" id="selec">
                            <?php

                                foreach ($provinces as $value) {
                            
                                    echo "<option>$value</option>";
                                    
                                }
                            ?>
                </select>
                
                
                <?php 
                
               

                if(!isset($_GET['im']))
                    $i =  $_SESSION['im'];
                else{
                    $_SESSION['im'] = $_GET['im'];
                    $i = $_GET['im'];
                }

                echo "<input type='text'  value='{$i}' name='fichierImage' placeholder='Copier une  adresse Image'>";
                
                ?>
                <label>Date de Debut</label><?php 
                
                
                if(!isset($_GET['dt1']))
                    $dt1 =  $_SESSION['dt1'];
                else{
                    $_SESSION['dt1'] = $_GET['dt1'];

                    $dt1 = $_GET['dt1'];
                }

                echo "<input type='date' value='{$dt1}'  placeholder='DateDebut' name='dtdebut'>";
                
                ?>
                <label>Date de Fin</label><?php
                

                 if(!isset($_GET['dt2']))
                     $dt2 =  $_SESSION['dt2'];
                 else{
                    $_SESSION['dt2'] = $_GET['dt2'];
                     $dt2 = $_GET['dt2'];
                 }
                echo "<input type='date' value='{$dt2}'  placeholder='DateFin' name='dtFin'>";
                
                ?>
                <input type="submit" name="Mod"  class='btn btn-success btn-lg'  value="Modifier"/><br/><br/>
                <input type="reset" name="an"  class='btn btn-success btn-lg' value="Annuler"/>
                
            </div>
        </form>
        
       <?php
       //session_start();

       /*if(isset($_GET['id']))
           {
                 $_SESSION['id'] = $_GET['id'];
                 //$_SESSION['ma'] = $_GET['ma']; 
           }*/

       
        if(isset($_GET['Mod']))
        {
            $conn = mysqli_connect('localhost', 'root', '', 'garage1');
            $nom = $_GET['txtNom'];
            $g = $_SESSION['ga'];
            $usr = $_SESSION['ut'];
            $description = $_GET['desc'];
            $dDebut = $_GET['dtdebut'];
            $dFin = $_GET['dtFin'];
            $adresse = $_GET['adr'];
            $ville = $_GET['vil'];
            $province = $_GET['ddlProvinces'];
            $image = $_GET['fichierImage'];
            
            //$user =  $_SESSION['id'];
            //$mil =  $_SESSION['ma'];
            

            $sql =  "Update garage  SET description = '$description', dateDebut = '$dDebut',  dateFin = '$dFin', adresse = '$adresse', Ville = '$ville' , Province = '$province' , image='$image', Nom='$nom'
            where IdUtilisateur = $usr and IdGarage = $g";
            
           
            

            $resultat = mysqli_query($conn, $sql);

            if(!$resultat)
            {
                echo mysqli_error($conn);  //affichage du message
                exit; //sortie de notre programme.
            }
            else
            {
                if(isset($_GET['Mod']))
                    echo "<span>Modification de garage reussie</span>";

                header("Location:Compte.php?set=$usr", false);
                exit();
            }
        }
       
       ?>
    <br/>
    <?php
        include("Menu/PiedsPage.php");
    ?>
    </body>
</html>





