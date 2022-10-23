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
   
   <?php 
    $conn = mysqli_connect('localhost', 'root', '', 'garage1');

    if (isset($_GET['txtGarage']) && !empty($_GET['txtGarage'])) {

        mysqli_set_charset($conn, 'utf8');

        $getText = htmlspecialchars($_GET['txtGarage']);
        $getText = mysqli_real_escape_string($conn, $getText);

        $sql = "SELECT idUtilisateur,description, image, dateDebut, dateFin, adresse, Ville, Province FROM garage WHERE ville LIKE  '%$getText%' ORDER BY ville";

        $result = mysqli_query($conn, $sql);
  
       
        if (!$result) {  // si le $result est NULL
            echo mysqli_error($conn);  //affichage du message 
            exit; //sortie de notre programme.
        }

    
            echo "<div class='row'>";
            echo "<br/>";
            while ($row = mysqli_fetch_assoc($result)) {
                    
            $nomUser = "SELECT nom FROM utilisateur WHERE idUtilisateur = {$row['idUtilisateur']}";
            $resultatNom = mysqli_query($conn, $nomUser);
            $nomtrouver = mysqli_fetch_assoc($resultatNom);
                ?>
                
                        <div class="card column" style="width: 40rem;">
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

    }   
    ?>
