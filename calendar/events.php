<?php 

    
$servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "lpaosf";

    try {
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $stmt = $conn->prepare("SELECT * FROM events ORDER BY -date");
        $stmt->execute();
        $result = $stmt->fetchAll();

        $list = "";
        foreach ($result as $row) {
            $list =`
                <div class='event'>
                    <div class='event-day'>{$row['date']}</div>
                    <div class='event-content'>
                        <div class='event-name>{$row['name']}</div>
                        <div class='event-description'>{$row['description']}</div>
                    </div>
                </div>
            `;
                       
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
    <link href="../css/bootstrap.min.css" rel="stylesheet">
    <link href="../css/bootstrap-icons.css" rel="stylesheet">
    <link href="../css/templatemo-leadership-event.css" rel="stylesheet">
    <title>Liste</title>
</head>
<body>
    <div class="main">
    <nav class="navbar navbar-expand-lg">
                <div class="container">

                    <div id="logolpaosf">
                        <a href="index.html" class="navbar-brand mx-auto mx-lg-0">
                            <img style="width:145px;height: auto" src="newlogo.png" alt="logolpaosf">
                        </a>
                    </div>
                    
                    <button  class="navbar-toggler bg-primary" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                        <span  class="navbar-toggler-icon"></span>
                    </button>
                   
                    <div class="collapse navbar-collapse menu" id="navbarNav">
                        <ul class="navbar-nav ms-auto">
                            <li class="nav-item">
                                <a class="nav-link click-scroll" href="../index.php#section_1">Accueil</a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link click-scroll" href="#">Evénements</a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link " href="../about.html">A propos</a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link click-scroll" href="../index.php#section_4">Recherches</a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link click-scroll" href="../index.php#section_5">Enseignements</a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link click-scroll">Collaborations</a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link click-scroll" href="../index.php#section_7">Contact</a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link custom-btn btn d-none d-lg-block" target="_blank" href="../signup.php">Se Connecter</a>
                            </li>
                        </ul>
                    <div>   
                </div>
            </nav>
        <ul class="nav nav-pills justify-content-center">
            <li class="nav-item btn">
                <h4>
                    <a class="nav-link text-dark" href="index.php">Calendrier</a>
                </h4>
            </li>
            <li class="nav-item btn">
                <h4>
                    <a class="nav-link bg-primary active " href="#">Tous les evenements</a>
                </h4>
            </li>
        </ul>
        <div class="container-fluid ">
            <ul class="" id="events-container">
                
            </ul>
        </div>
    </div>
    <script src="scripts/list.js"></script>
</body>
</html>