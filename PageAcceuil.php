<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>VENTES DE GARAGES </title>

        <!-- Le haut de page -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
        <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>

        <style>
            .image {
                margin-top: 50px;
                margin-bottom: 60px;
            }
            h1 {
                text-align: center;
                color: blue;
                font-style: bold;
                font-family: Arial, Helvetica, sans-serif;
            }

        </style>

    </head>
    <body>

    <?php
        include("Menu/MenuProjet.php");
    ?>   

    <h1> Vente De Garages </h1>

        <!-- Le corps de page -->
        <div class="image">
            <div align="center">
                <img  src="imageGa.jpg" width="1500" height="1000" alt="image">
            </div>
        </div>

        <!-- Le pied de page -->
        <?php
        include("Menu/PiedsPage.php");
    ?>  
    </body>
</html>