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
        h2,
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
    </style>

</head>

<body>
    <?php

    $conn = mysqli_connect('localhost', 'root', '', 'garage1');

    $sql = 'SELECT idUtilisateur, description, image, dateDebut, dateFin, adresse, Ville, Province FROM garage ORDER BY dateDebut';

        $result = mysqli_query($conn, $sql);
  
       
        if (!$result) {  // si le $result est NULL
            echo mysqli_error($conn);  //affichage du message 
            exit; //sortie de notre programme.
        }
    
    
        while ($row = mysqli_fetch_assoc($result)) {
            ?>
                <div class="card" style="width: 30rem;">
                    <div class="card-body">
                        
                        <h5 class="card-title">Proprietaire : <?php echo $row['idUtilisateur']; ?></h5>
                        <h6 class="card-subtitle mb-2 text-muted"><?php echo'<img style="width:350px;height:350px;border-raduis;:500px" src = "'. $row['image'].'"/>' ?></h6>
                        <h6 class="card-subtitle mb-2 text-muted">Description : <?php echo $row['description']; ?></h6>
                        <h6 class="card-subtitle mb-2 text-muted">DateDebut : <?php echo $row['dateDebut']; ?></h6>
                        <h6 class="card-subtitle mb-2 text-muted">DateFin : <?php echo $row['dateFin']; ?></h6>
                        <h6 class="card-subtitle mb-2 text-muted">Adresse : <?php echo $row['adresse']; ?></h6>
                        <h6 class="card-subtitle mb-2 text-muted">Ville : <?php echo $row['Ville']; ?></h6>
                        <h6 class="card-subtitle mb-2 text-muted">Province : <?php echo $row['Province']; ?></h6>
                    </div>
                </div>    
                <br />
        
                <?php
            }
                mysqli_close($conn);       
    ?>
</body>

</html>