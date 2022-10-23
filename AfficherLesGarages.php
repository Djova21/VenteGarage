<!DOCTYPE html>
<html lang="fr">

<head>
<meta charset="UTF-8" />
    <title>Pays</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

   
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <style type="text/css">

        
        h5,
        h6 {
            text-align: left;
        }

        body {
            margin: 100px;
            background-color: silver;
        }

        p {
            text-align: center;
        }

        hr {
            width: 50%;
        }

        .important {
            font-weight: bold;
        }

        h1 {
            margin: 50px;
        }
        body{
            background: linear-gradient(45deg, #fc466b, #3F5EFB);
        }
        .card-body{
            background: rgb(224, 235, 235);
        }
        .card{
            margin-bottom: 15px;
        }
        .column {
        float: left;
        width: 25%;
        padding: 0 10px;
        }
        .row {margin: 0 -5px; margin-left: 50px;}
        /* Clear floats after the columns */
        .row:after {
        content: "";
        display: table;
        clear: both;
        }
        @media screen and (max-width: 600px) {
        .column {
        width: 100%;
        display: block;
        margin-bottom: 20px;
        }
        }
        * {
            box-sizing: border-box;
            }
    </style>

</head>

<body>
<?php
        include("Menu/MenuProjet.php");
    ?>  
    <br/>;
    <?php

    $conn = mysqli_connect('localhost', 'root', '', 'garage1');

    $sql = 'SELECT idUtilisateur, description, image, dateDebut, dateFin, adresse, Ville, Province FROM garage ORDER BY dateDebut';

        $result = mysqli_query($conn, $sql);
  
       
        if (!$result) {  // si le $result est NULL
            echo mysqli_error($conn);  //affichage du message 
            exit; //sortie de notre programme.
        }

        echo "<div class='row'>";
        while ($row = mysqli_fetch_assoc($result)) {
                
        $nomUser = "SELECT nom FROM utilisateur WHERE idUtilisateur = {$row['idUtilisateur']}";
        $resultatNom = mysqli_query($conn, $nomUser);
        $nomtrouver = mysqli_fetch_assoc($resultatNom);
            ?>
            
                    <div class="card column" style="width: 30rem;">
                        <div class="card-body">
                            
                            <h5 class="card-title">Proprietaire : <?php echo $nomtrouver['nom']; ?></h5>
                            <h6 class="card-subtitle mb-2 text-muted"><?php echo'<img style="width:350px;height:350px;border-raduis;:500px" src = "'. $row['image'].'"/>' ?></h6>
                            <h6 class="card-subtitle mb-2 text-muted">Description : <?php echo $row['description']; ?></h6>
                            <h6 class="card-subtitle mb-2 text-muted">DateDebut : <?php echo $row['dateDebut']; ?></h6>
                            <h6 class="card-subtitle mb-2 text-muted">DateFin : <?php echo $row['dateFin']; ?></h6>
                            <h6 class="card-subtitle mb-2 text-muted">Adresse : <?php echo $row['adresse']; ?></h6>
                            <h6 class="card-subtitle mb-2 text-muted">Ville : <?php echo $row['Ville']; ?></h6>
                            <h6 class="card-subtitle mb-2 text-muted">Province : <?php echo $row['Province']; ?></h6>
                        </div>
                    </div>    
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                
                
                <?php
            }
        echo "</div>";

                mysqli_close($conn);       
    ?>

    <br/>

<?php
        include("Menu/PiedsPage.php");
    ?>  
    </body>
</body>

</html>