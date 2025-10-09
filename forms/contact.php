<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $name    = strip_tags(trim($_POST["name"]));
  $email   = filter_var(trim($_POST["email"]), FILTER_SANITIZE_EMAIL);
  $subject = strip_tags(trim($_POST["subject"]));
  $message = trim($_POST["message"]);

  // Adresse de réception
  $to = "theo.huger04@gmail.com";

  // Sujet de l'email
  $email_subject = "Nouveau message de $name : $subject";

  // Corps de l'email
  $email_body = "Nom: $name\n";
  $email_body .= "Email: $email\n\n";
  $email_body .= "Message:\n$message\n";

  // En-têtes
  $headers = "From: $name <$email>";

  // Envoi
  if (mail($to, $email_subject, $email_body, $headers)) {
    echo "Votre message a été envoyé avec succès.";
  } else {
    echo "Une erreur est survenue lors de l'envoi.";
  }
}
?>
