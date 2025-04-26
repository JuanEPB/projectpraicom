<?php
if($_SERVER['REQUEST_METHOD'] != 'POST' ){
    header("Location: index.html" );
}

/*
if( ! isset( $_POST['name'] ) ){
    header("Location: index.html" );
}
*/


$name = $_POST['name'];
$email = $_POST['email'];
$subject = $_POST['subject'];
$message = $_POST['message'];

if( empty(trim($name)) );

$body = <<<HTML
    <h1>Contacto desde la web</h1>
    <p>De: $name / $email</p>
    <h2>Mensaje</h2>
    <p>$message</p>$message
HTML;

//sintaxis de los emails email@algo.com || 
// name <email@algo.com>

$headers = "MIME-Version: 1.0 \r\n";
$headers.= "Content-type: text/html; charset=utf-8 \r\n";
$headers.= "From: $name $ <$email> \r\n";
$headers.= "To: Sitio web <cotizacion@praicom.com> \r\n";
// $headers.= "Cc: copia@email.com \r\n";
// $headers.= "Bcc: copia-oculta@email.com \r\n";


//REMITENTE (name/ - EMAIL)
//subject 
//CUERPO 
$rta = mail('cotizacion@praicom.com', "message web: $subject", $body, $headers );
//var_dump($rta);

header("Location: index.php" );