<?php try
{
	$bdd = new PDO('mysql:host=localhost;dbname=lpaosf;charset=utf8', 'root', 'root');
}
catch (Exception $e)
{
        die('Erreur : ' . $e->getMessage());
}


session_start();
$id=$_SESSION['id'];
$nom=$_SESSION["nom"];
$prenom=$_SESSION["prenom"];
$fonction=$_SESSION["fonction"];

$data=$bdd->query('SELECT * FROM traveaux INNER JOIN users ON traveaux.idproprietaire = users.id ORDER BY date DESC');
if(isset($_POST["disconnect"])){
    session_destroy();
    header("location:signup.php");

}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="//netdna.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="css/réseau.css">
    <link rel="stylesheet" href="css/home.css">
    <title>Document</title>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light bg-white">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo03" aria-controls="navbarTogglerDemo03" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <img src="../images/imagesLpaosf/logo1111.png" class="logo" alt="">
        <p><?php echo"<p class='text-success'>$prenom,$nom  , $fonction </p>";?>
      
        <div class="collapse navbar-collapse" id="navbarTogglerDemo03">
          <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
            <li class="nav-item ">
              <a class="nav-link active " href="#">Acceuil<span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item ">
              <a class="nav-link " href="secondBoard.php">Mes traveaux  </a>
            </li>
            <li class="nav-item ">
                <form action="" method="POST">
                <input type="text" name="disconnect" style="display:none">
                <button class="btn btn-danger" type="submit">Se deconnecter</button>
                </form>
            </li>
          </ul>
         
        </div>
      </nav>
    <hr>

 

<div class="container bootstrap snippets bootdey">
    <div class="row">
        <div class="col-lg-12">
            <div class="main-box no-header clearfix">
                <div class="main-box-body clearfix">
                    <div class="table-responsive">
                        <table class="table user-list">
                            <thead>
                                <tr>
                                <th><span>Utilisateur</span></th>
                                <th class="text-center"><span>Email</span></th>
                                <th class="text-center"><span>fonction</span></th>
                                <th class="text-center"><span>titre</span></th>
                                <th class="text-center"><span>document</span></th>
                                <th class="text-center"><span>date</span></th>
                                <th class="text-center">&nbsp;</th>
                                </tr>
                            </thead>
                            <tbody>
                          
                               
                                      <?php  while($info=$data->fetch()){
                                          ?>
                                <tr>
                                    
                                    <td>
                                        <p><?php echo $info["prenom"]." ".$info["nom"]; ?> </p>
                                        <span class="user-subhead"></span>
                                    </td>
                                    <td>
                                        <p><?php echo $info["login"]; ?></p>
                                    </td>
                                    <td class="text-center">
                                    <p><?php echo $info["fonction"] ;?></p>
                                    </td>
                                    <td class="text-center">
                                    <p><?php echo $info["titre"] ;?></p>
                                    </td>
                                   
                                    <td>
                                        <a href="documents/<?php echo $info['document'] ?>"><?php echo $info["document"]; ?></a>
                                    </td>
                                    <td>
                                        <p><?php echo $info["date"] ;?></p>
                                    </td>

                                  
                                    
                                </tr>
                               

                      
                            <?php  }?>
                        
                 
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>