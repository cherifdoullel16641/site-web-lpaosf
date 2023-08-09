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

        $list = "<table class='table'>";
        $list .= '<thead>';
        $list .= '<tr>';
        $list .= '<th>ID</th>';
        $list .= '<th>Titre</th>';
        $list .= '<th>Description</th>';
        $list .= '<th>Date</th>';
        $list .= '<th colspan="2">Actions</th>';
        $list .= '</tr>';
        $list .= '</thead>';
        $list .= '<tbody>';
        foreach ($result as $row) {
            
            $list.= '<tr>';
            $list.= '<td>'.$row['idEvent'].'</td>';
            $list.= '<td>'.$row['name'].'</td>';
            $list.= '<td>'.$row['description'].'</td>';
            $list.= '<td>'.$row['date'].'</td>';
            $list.= '<td> <a href="modifier.php?id='.$row['idEvent'].'">Modifier</a> </td>';
            $list.= '<td> <a href="supprimer.php?id='.$row['idEvent'].'">Supprimer</a> </td>';
            $list.= '</tr>';
        }
        
        $list .= "</tbody></table>";
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
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/bootstrap-icons.css" rel="stylesheet">
    <link href="css/templatemo-leadership-event.css" rel="stylesheet">
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
                            <a class="nav-link click-scroll" href="#section_1"></a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link click-scroll" href="calendrier/index.html"></a>
                        </li>
                    </ul>
                <div>   
            </div>
        </nav>
        <div class="container m-5">
            <h3>
                Liste des evenements
            </h3>
        </div>
        <div class="container">
            <?php
                echo $list;
            ?>
        </div>
    </div>      
</body>
</html>