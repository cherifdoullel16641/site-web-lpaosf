<?php 

    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "lpaosf";

    $result = null;

    try {
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        if (isset($_GET['id'])) {
            $stmt = $conn->prepare("SELECT * FROM events WHERE idEvent =".$_GET['id']);
            $stmt->execute();
            $result = $stmt->fetchAll();
            $result = $result[0];
           
        }
        if (isset($_POST['remove'])) {
            $stmt = $conn->prepare("DELETE FROM events  WHERE idEvent = ".$_GET['id']);
            $stmt->execute();
            header("location: liste.php");
        }

        if (isset($_POST['annuler'])) {
            header("location: liste.php");
        }
    } catch(PDOException $e) {

    }

    

    

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"rel="nofollow" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link href="../calendar/css/bootstrap.min.css" rel="stylesheet">
    <link href="../calendar/css/bootstrap-icons.css" rel="stylesheet">
    <link href="../calendar/css/templatemo-leadership-event.css" rel="stylesheet">
    <title>Modifier</title>
</head>
<body>
    <div class="main">
        <nav class="navbar navbar-expand-lg">
            <div class="container">

                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

               <div id="logolpaosf">
                 <a href="index.html" class="navbar-brand mx-auto mx-lg-0">
                 <img src="../calendar/images/imagesLpaosf/logo1111.png" alt="logolpaosf">
                </a>
               </div>
                <a class="nav-link custom-btn btn d-lg-none" href="#"></a>

                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav ms-auto">
                        <li class="nav-item">
                            <a class="nav-link click-scroll" href="#section_1"></a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link click-scroll" href="calendrier/index.html"></a>
                        </li>
                    </ul>
                <div>   
            </div>
        </nav>
        <div class="container">
            <div class="">
                <h3 class='m-5'>Etes vous sur de vouloir supprimer ?</h3>

                <form action="" method="post">
                    <button type="submit" class="btn btn-primary" name="annuler">Annuler</button>
                    <button type="submit" class="btn btn-primary" name="remove">Supprimer</button>
                </form>
            </div>
        </div>
    </div>
</body>
</html>