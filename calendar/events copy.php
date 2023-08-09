<?php 

    $servername = "localhost";
    $username = "lpaosf";
    $password = "passer";
    $dbname = "lpaosf";

    try {
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $stmt = $conn->prepare("SELECT * FROM events ORDER BY -date");
        $stmt->execute();
        $result = $stmt->fetchAll();

        $list = "";
        foreach ($result as $row) {
            
            $list .= "<div><div class='event'>";
            $list .= "<div class='event-day'>{$row['date']}</div>";
            $list .= "<div class='event-date'>{$row['date']}</div></div>";
            $list .= "<div class='event-name'>{$row['name']}</div>";
            $list .= " <div class='event-description'>{$row['description']}</div></div>";
           
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
    <link rel="stylesheet" href="css/main.css">
    <title>Liste</title>
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
                 <img src="./images/imagesLpaosf/logo1111.png" alt="logolpaosf">
                </a>
               </div>
                <a class="nav-link custom-btn btn d-lg-none" href="#"></a>

                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav ms-auto">
                        <li class="nav-item">
                            <a class="nav-link click-scroll" href="#section_1">Accueil</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link click-scroll" href="calendrier/index.html">Calendrier</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link click-scroll" href="#section_3">Membres</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link click-scroll" href="#section_4">Recherches</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link click-scroll" href="#section_5">Enseignements</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link click-scroll" href="partenaires">Collaborations</a>
                        </li 

                        <li class="nav-item">
                            <a class="nav-link click-scroll" href="#section_7">Contact</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link custom-btn btn d-none d-lg-block" target="_blank" href="admin/signup.php">Se connecter</a>
                        </li>
                    </ul>
                <div>   
            </div>
        </nav>
        <ul class="nav nav-pills justify-content-center">
            <li class="nav-item btn">
                <a class="nav-link text-dark" href="index.php">Calendrier</a>
            </li>
            <li class="nav-item btn">
                <a class="nav-link bg-secondary active " href="#">Tous les evenements</a>
            </li>
        </ul>
        <div class="container main-container">
            <div class="m-10" id="events-container">
            </div>
        </div>
    </div>
    <script src="scripts/list.js"></script>
</body>
</html>