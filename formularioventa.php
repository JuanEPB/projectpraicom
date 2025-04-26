<?php
if($_SERVER['REQUEST_METHOD'] != 'POST' ){
    header("Location: landinpage.php" );
    exit;
}

$name = $_POST['name'] ?? '';
$email = $_POST['email'] ?? '';
$subject = $_POST['subject'] ?? '';
$marca = $_POST['marca'] ?? '';
$message = "Marca a cotizar: $marca";

if( empty(trim($name)) || empty(trim($email)) || empty(trim($subject)) || empty($marca) ){
    header("Location: landinpage.php" );
    exit;
}

$body = <<<HTML
    <h1>Contacto desde la web</h1>
    <p>De: $name / $email</p>
    <h2>Asunto</h2>
    <p>$subject</p>
    <h2>Marca a cotizar</h2>
    <p>$marca</p>
HTML;

$headers = "MIME-Version: 1.0 \r\n";
$headers.= "Content-type: text/html; charset=utf-8 \r\n";
$headers.= "From: $name <$email> \r\n";
$headers.= "To: Sitio web <cotizacion@praicom.com> \r\n";

// Enviar correo
$rta = mail('cotizacion@praicom.com', "Solicitud de cotización: $subject", $body, $headers );

if ($rta) {
    header("Location: landinpage.php");
} else {
    header("Location: index.php");
}
exit;
?>
