<?php try
{
	$bdd = new PDO('mysql:host=localhost;dbname=lpaosf;charset=utf8', 'root', '');
}
catch (Exception $e)
{
        die('Erreur : ' . $e->getMessage());
}


session_start();
if(isset($_SESSION["id"])){
$id=$_SESSION['id'];
$nom=$_SESSION["nom"];
$email=$_SESSION["login"];
$prenom=$_SESSION["prenom"];
$fonction=$_SESSION["fonction"];

/*$data=$bdd->prepare('SELECT * FROM traveaux where idproprietaire =?');
$data->execute(array($id));*/
$data=$bdd->prepare('SELECT * FROM traveaux where idproprietaire=? ORDER BY date DESC');
$data->execute(array($id));

if(isset($_POST["sup"])){
    $data=$bdd->prepare('Delete  FROM traveaux where id=? ');
$data->execute(array($_POST["sup"]));
echo"<script>alert('travail supprimer avec succes');</script>";
header("location:secondBoard.php");


}

if(isset($_POST["disconnect"])){
    session_destroy();
    header("location:signup.php");

}


if(isset($_POST["titre"])){
    $file_name=$_FILES["monfichier"]["name"];
    $file_tmp_name=$_FILES["monfichier"]["tmp_name"];
    $file_extension=strrchr($file_name,".");
    $extension_autorisees=array('.png','.jpg','.gif','.jpeg','.pdf','.PNG','.JPG','.GIF','.JPEG','.PDF');
    $file_dest='documents/'.$file_name;
    if(in_array($file_extension,$extension_autorisees)){
        if(move_uploaded_file($file_tmp_name,$file_dest)){
         
          $datas=$bdd->prepare('INSERT INTO traveaux(idproprietaire,titre,document,date) VALUES(?,?,?,DATE(NOW())) ');
        $datas->execute(array($id,$_POST["titre"],$file_name));
       
        
        echo"<script>alert('travail ajouter avec succes');</script>";
        
        }else{
            echo"<script>alert('une erreur est survenu lors de l'envoie du fichier');</script>"; 
        }
    }
    else{
        echo"<script>alert('seules les fichiers png,jpg,jpeg et pdf sont autorisées');</script>";
    }
}
}
else{
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
        <p><?php echo"<p class='text-success'>$prenom $nom  , $fonction </p>";?>
      
        <div class="collapse navbar-collapse" id="navbarTogglerDemo03">
          <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
            <li class="nav-item ">
              <a class="nav-link  " href="board.php">Acceuil</a>
            </li>
            <li class="nav-item active">
              <a class="nav-link active " href="#">Mes traveaux <span class="sr-only">(current)</span> </a>
            </li>
            <li class="nav-item ">
                <form action="" method="POST">
                <input type="text" name="disconnect" style="display:none">
                <button class="btn btn-danger" type="submit">se deconnecter</button>
                </form>
            </li>
          </ul>
         
        </div>
      </nav>
    <hr>

 

<div class="container bootstrap snippets bootdey">
<form action="" method="POST" enctype="multipart/form-data" class="bg-white container"><br>
    <h5 class="text-center">Ajouter un travail</h5>
                    <div class="mb-3">
                         <label for="exampleFormControlInput1" class="form-label">Titre:</label>
                         <input type="text" class="form-control" name="titre" id="exampleFormControlInput1" placeholder="mon titre">
                    </div>
                    <div class="mb-3">
                        <label for="formFile" class="form-label">Document:</label>
                         <input class="form-control" name="monfichier" type="file" id="formFile">
                    </div><br>
                    <input  class="btn btn-success" type="submit" value="valider">

                    <br><br>
                    </form><br><br>
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
                                <th class="text-center"><span>supprimer</span></th>
                                <th class="text-center">&nbsp;</th>
                                </tr>
                            </thead>
                            <tbody>
                          
                               
                                      <?php  while($info=$data->fetch()){
                                          ?>
                                <tr>
                                    
                                    <td>
                                        <p><?php echo $prenom." ".$nom; ?> </p>
                                        <span class="user-subhead"></span>
                                    </td>
                                    <td>
                                        <p><?php echo $email; ?></p>
                                    </td>
                                    <td class="text-center">
                                    <p><?php echo $fonction ;?></p>
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
                                    <td>
                                        <form action="" method="POST">
                                            <input type="text" name="sup" value="<?php echo $info["id"] ?>" style="display:none">
                                        <button class="btn btn-danger" type="submit">supprimer</button>

                                        </form>

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