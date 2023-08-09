<?php
if(isset($_POST['Envoyer'])) {
      $name = $_POST['name'];
      $email = $_POST['email'];
      $subject = $_POST['subject'];
      $message = $_POST['message'];
      if($name == "" || $email == "" || $subject == "" || $message == "")
      ?>
      <div class="alert">
            <?php echo"Vous devez remplir tous les champs" ?>
      </div>
      <?php
} else {
      if (mail($email, $subject, $message, "")) {

}

?>