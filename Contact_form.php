<?php
$errors = [];
$errorMessage = '';

if (!empty($_POST)) {
   $name = $_POST['nom'];
   $prenom = $_POST['prenom'];
   $email = $_POST['email'];
   $message = $_POST['message'];

    if (empty($name)) {
       $errors[] = 'pas de nom';
    }

    if (empty($prenom)) {
        $errors[] = 'pas de prenom';
    }

   if (empty($email)) {
       $errors[] = 'pas de mail.';
   } else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
       $errors[] = 'Mail invalide.';
   }

    if (empty($message) || $message == "--choissisez une option--") {
        $errors[] = 'Veiullez choisir le motif de prise de contact';
    }

   if (empty($errors)) {
        $toEmail = 'adam.bakir@edu.devinci.fr';
        $emailSubject = 'New email from your contact form';
        $headers = ['From' => $email, 'Reply-To' => $email, 'Content-type' => 'text/html; charset=utf-8'];
        $bodyParagraphs = ["Nom: {$name}, <br>","Prenom: {$prenom}, <br>", "Email: {$email}, <br><br>", "Message: <br>", $message];
        $body = join(PHP_EOL, $bodyParagraphs);


        if (mail($toEmail, $emailSubject, $body, $headers)) {
           header('Location: Index2.html');
        } else {
           $errorMessage = 'Oops, something went wrong. Please try again later';
        }

   } else {

       $allErrors = join('<br/>', $errors);
       $errorMessage = "<p style='color: red;'>{$allErrors}</p>";
   }
}

?>
<!DOCTYPE html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form</title>
    <link rel="stylesheet" href="css/style.css">    
</head>
<body>
    <form  method="post" id="contact-form">
        <h2>Contact us</h2>
        <?php echo((!empty($errorMessage)) ? $errorMessage : '') ?>
        <p>
            <label>Nom:</label>
            <input name="nom" type="text" placeholder="nom..." required/>
        </p>
        <p>
            <label>Prénom:</label>
            <input name="prenom" type="text" placeholder="prénom..." required/>
        </p>
        <p>
            <label>Email Address:</label>
            <input  name="email" type="text"  placeholder="e-mail..." required/>
        </p>
        <p>
            <label>Prise de contact pour:</label>
            <select style="cursor: pointer;" name="message" id="pet-select">
                <option value="">--choissisez une option--</option>
                <option value="curieux">curieux</option>
                <option value="interessé">interessé</option>
                <option value="entreprise">nous sommes une entreprise</option>
            </select>
        </p>
        <p>
            <input type="submit" value="Send"/>
        </p>
    </form>

 <script src="//cdnjs.cloudflare.com/ajax/libs/validate.js/0.13.1/validate.min.js"></script>
</body>
</html>