<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="UTF-8" />
        <title>Afficher Garages</title>

        <!-- Latest compiled and minified CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" />

        <!-- Optional theme -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" />

        <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>

        <!-- Latest compiled and minified JavaScript -->
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

        <script type="text/javascript">

            $(document).ready(function () {

                $("#nametxt").keyup(function(){

                let valeur = $("#nametxt").val();

                let xhr = new XMLHttpRequest();

                xhr.open("GET", "RechercherGarageParVille.php?txtGarage=" +valeur, true);

                xhr.onreadystatechange = function() {

                    if (xhr.readyState == 4) {

                        $("#resultat").html(xhr.responseText);
                    }
                        
                };

                xhr.send(null);

            });

        });

        </script>

        <style type="text/css">
            h2 {
                text-align: center;
            }

            form {
                width: 300px;
                margin: 0 auto;
            }

            .big {
                font-size: 18pt;
            }


            select {
                margin-right: 25px;
            }

            ol {
                width: 450px;
                margin: 0 auto;
                font-size: 14pt;
            }

            body {
                background-color: silver;
                margin: 25px;
            }

            p {
                font-size: 14pt;
                text-align: center;
            }

            h1 {
                text-align: center;
            }


            .div_button {
                margin: 10px 500px;
            }
        </style>

    </head>

    <body>

    <?php
        include("../Menu/MenuProjet.php");
    ?>  

        <div class="jumbotron centered">
            <h1>Garages disponibles</h1>

        </div>
        <br/>
        <form>
            <div>
                <label class="big">Rechercher des garages:

                    <input type="text" name="txtGarage" id="nametxt"/>

                </label>

            </div>
        </form>

       <div id="resultat">
           
        </div>

        <br/>
        <?php
        include("../Menu/PiedsPage.php");
    ?>  
    </body>
</html>