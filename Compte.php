<!DOCTYPE html>
<html>
    <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Compte utilisateurs</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" 
        integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" 
            crossorigin="anonymous" 
                referrerpolicy="no-referrer" />
    <style>
        h1{
            text-align: center;
            color: red;
            padding: 30px 30px 30px 30px;
        }
        .card_div{
            padding: 30px 30px 30px 30px;
        }
        p{
            text-align: center;
            font-size: x-large;
            margin-top: 50px;

        }
        .psecond{
            font-size: large;
        }
        body{
            background: linear-gradient(45deg, #fc466b, #3F5EFB);
        }
        .card-body{
            background: rgb(224, 235, 235);
        }
        p a{
            color: rgb(255, 198, 26);
        }
    </style>
    </head>
    <body>

    <?php
        include("Menu/MenuProjetCompte.php");
    ?>  

    <div class="verte">

    <!-- Le haut de page -->

        <h1>Les ventes de garage</h1>
        
        <?php
        //session_start();

        if(isset($_GET['in']) ||isset($_GET['util']) || isset($_GET['it']) || isset($_GET['set']) ){

            if(isset($_GET['util']))
            $set_User = $_GET['util'];

            if(isset($_GET['in'])){
                $set_User = $_GET['in'];
            }

            if(isset($_GET['it'])){
                $set_User = $_GET['it'];
            }
            if(isset($_GET['set'])){
                $set_User = $_GET['set'];
            }

            $conn = mysqli_connect('localhost', 'root', '', 'garage1');
                   
            $sql = "SELECT idUtilisateur, IdGarage, Nom, image, description,dateDebut, dateFin, adresse, Ville, Province FROM garage where idUtilisateur = $set_User ORDER BY dateFin";

            $result = mysqli_query($conn, $sql);
        
            if (!$result) {  // si le $result est NULL
                echo mysqli_error($conn);  //affichage du message
                exit; //sortie de notre programme.
            }

            if(mysqli_num_rows($result) > 0)
            {

            echo "<p class='psecond'><a href='CreerGarage.php?id=$set_User'><i class='fa-solid fa-plus-large'></i>+ Créer une vente de garage</a></p><br/>";
            echo"<div style='display: flex' class:'card_div'>";

            
            while ($row = mysqli_fetch_assoc($result)) {
                ?>

                <?php
                
                $garage = $row['IdGarage'];
                $utili = $row['idUtilisateur'];
                $image = $row['image'];
                $desc = $row['description'];
                $date1 = $row['dateDebut'];
                $date2 = $row['dateFin'];
                $adresse = $row['adresse'];
                $ville = $row['Ville'];
                $province = $row['Province'];
                $nom = $row['Nom'];
                
                ?>&nbsp;&nbsp;&nbsp;&nbsp;
                    <div class="card column" style="width: 100rem; flex-grow: initial;">
                        <div class="card-body">
                            <h6 class="card-subtitle mb-2 text-muted"><?php echo'<img style="width:350px;height:350px;border-raduis;:500px" src = "'. $row['image'].'"/>' ?></h6>
                            <h6 class="card-subtitle mb-2 text-muted"><?php echo "<h3>Description de la vente de garage:</h3>". $row['description']; ?></h6>
                            <h6 class="card-subtitle mb-2 text-muted"><?php echo "<h3>Date de disponibilité:</h3>".$row['dateDebut']; ?></h6>
                            <h6 class="card-subtitle mb-2 text-muted"><?php echo "<h3>Date de fin de disponibilité:</h3>".$row['dateFin']; ?></h6>
                            <h6 class="card-subtitle mb-2 text-muted"><?php echo "<h3>Adresse de la vente de garage:</h3>".$row['adresse']; ?></h6>
                            <h6 class="card-subtitle mb-2 text-muted"><?php echo "<h3>Ville de la vente de  garage:</h3>".$row['Ville']; ?></h6>
                            <h6 class="card-subtitle mb-2 text-muted"><?php echo "<h3>Province de la vente de  garage:</h3>".$row['Province']; ?></h6><br/><br/>

                            <h6 class="card-subtitle mb-2 text-muted"><?php echo "<a href='SupprimerGarage.php?ga=$garage&amp;ut=$utili'><i class='fa-solid fa-trash'></i>Supprimer la vente de garage</a>"?></h6>
                            <h6 class="card-subtitle mb-2 text-muted"><?php echo "<a href='Modifier.php?ga=$garage&amp;ut=$utili&amp;im=$image&amp;des=$desc&amp;dt1=$date1&amp;dt2=$date2&amp;adres=$adresse&amp;vill=$ville&amp;pro=$province&amp;nom=$nom'><i class='fa-solid fa-pen-to-square'></i>Modifier la vente de garage</a>"?></h6>
                        </div>
                    </div>    
                    &nbsp;&nbsp;&nbsp;&nbsp;
            
                    <?php
                }
                echo"</div>";
            }
            else
            {
                echo "<p>Aucune vente de garage existant. </br></br></br></br>
                <a href='CreerGarage.php?id=$set_User'><i class='fa-solid fa-plus'></i>Créer un garage</a></p>
                </br> </br> </br> </br> </br> </br> </br></br> </br></br> </br> </br> </br> </br> </br>";
            }
               
            mysqli_close($conn);
        }
        
            ?>  
    <!-- Le pied de page -->
        <br/>
    <?php
        include("Menu/PiedsPage.php");
    ?>
    </body>
</html>