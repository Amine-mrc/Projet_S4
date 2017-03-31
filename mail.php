	<?php 
	if(isset($_POST["boutton_envoyer"])){
                 require ('PHPMailerAutoload.php');

    // if(isset($_POST["file"])){
 $mail = new PHPmailer();
  $mail->IsSMTP(); // activation des fonctions SMTP
 $mail->SMTPAuth = true; // on l’informe que ce SMTP nécessite une autentification

 $mail->Username = "demandedesubvention@gmail.com"; // le nom d’utilisateur SMTP
 $mail->Password = "projetsubvention"; // son mot de passe SMTP

 $mail->SMTPSecure = 'tls';
$mail->Host = 'smtp.gmail.com';
$mail->Port = 587;

// Paramètres du mail
 
 $mail->AddAttachment($_POST["file"]); // ajout de la pièce jointe
  
 $mail->AddAddress('zoubair.haja@gmail.com','Zoubair'); // ajout du destinataire
 $mail->From = "demandedesubvention@gmail.com"; // adresse mail de l’expéditeur
 $mail->FromName =  "Demandeur de subvention"; // nom de l’expéditeur
 //$mail->AddReplyTo("expediteur@domaine.fr","Expediteur"); // adresse mail et nom du contact de retour
 $mail->IsHTML(true); // envoi du mail au format HTML
 $mail->Subject = "Demande de subvention"; // sujet du mail

 

 $mail->Body = '<html>Bonjour '.'Je vous envoie ma demande de subvention mise en piece jointe au-dessus. Vous y trouverez tous les renseignements me concernant ainsi que la demande en question '."\r\n".'  Cordialement,'."</html>"; // le corps de texte du mail en HTML
 $mail->AltBody = "Bonjour"; // le corps de texte du mail en texte brut si le HTML n'est pas supporté

  if(!$mail->Send()) { // envoi du mail
 echo "Mailer Error: " . $mail->ErrorInfo; // affichage des erreurs, s’il y en a
 } 
 else {
 echo  "Le message a bien été envoyé !";
 }
$mail->SMTPDebug = 1;


   //     }

/*else echo "Veuillez uploader votre fichier";

}*/

?>
