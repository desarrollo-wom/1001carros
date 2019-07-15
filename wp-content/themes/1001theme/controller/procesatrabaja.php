<?php

include 'connect.php';
require('../email/class.phpmailer.php');

$pagRedirect="http://localhost/1001carros/gracias-trabaja";

$mail = new PHPMailer();

$nombres=$_POST['nombres'];
$apellidos=$_POST['apellidos'];
$email=$_POST['email'];
$telefono=$_POST['telefono'];
$ciudad=$_POST['ciudad'];
$fecha=date('Y-m-d');
$hora=date('H:i:s');

$nameFile = $_FILES['adjuntos']['name'];
$sizeFile=$_FILES['adjuntos']['size'];
$typeFile=$_FILES['adjuntos']['type'];
$tempFile = $_FILES['adjuntos']['tmp_name'];


/*

$sql="INSERT INTO `trabaja` (`id`, `nombres`, `apellidos`, `correo`, `telefono`, `ciudad`, `fecha`, `hora`) 
VALUES (NULL, '$nombres', '$apellidos', '$email', '$telefono', '$ciudad', '$fecha', '$hora');";

$result= mysqli_query($link, $sql);

//proceso para el envio del eamail
$para="desarrollo@wom.ec";
$titulo="Formulario de Trabaja con nosotros (1001carros.com)";

// cuerpo del email
$mensaje = '
<html>
<head>
  <title>Formulario de Trabaja con nosotros (1001carros.com)</title>
</head>
<body>
<div style="width:100%;max-width:800px;">
  <h2 style="color:#293659;font-size:18px;">Datos del interesado</h2>
  <p style="color:#767e85;font-size:14px;">Nombres y apellidos: ' . $nombres . " ".$apellidos.'</p>
  <p style="color:#767e85;font-size:14px;">Email: ' . $email . '</p>
  <p style="color:#767e85;font-size:14px;">Celular: ' . $telefono . '</p>
  <p style="color:#767e85;font-size:14px;">Ciudad: ' . $ciudad . '</p> 
  <div style="text-align:center;margin-top:75px;">
   <p  style="color:#767e85;font-size:11px;margin:5px 0;">Formulario de Trabaja con nosotros enviado desde 1001carros.com</p>
  </div>
</div>
</body>
</html>
';

$mail->Body = $mensaje;

$mail->From = ("contacto@torrelife.ec"); //Dirección desde la que se enviarán los mensajes. Debe ser la misma de los datos de el servidor SMTP.
$mail->FromName = "Trabaja con nosotros | 1001carros.com";
$mail->AddAddress($para); // Dirección a la que llegaran los mensajes.
$mail->IsHTML(true);
$mail->Subject = "Formulario de contacto(1001carros.com)";

$mail->IsSMTP();
$mail->Host = "imap.gmail.com";  // Servidor de Salida.
$mail->SMTPAuth = true;
$mail->SMTPSecure = "ssl";
$mail->Port = 465;
$mail->Username = "1001carrossa@gmail.com";  // Correo Electrónico
$mail->Password = "1001CARROS2018"; // Contraseña
// Activo condificacción utf-8
$mail->CharSet = 'UTF-8';

$adjunto = $_FILES['adjuntos'];
//if (isset($_FILES['adjuntos']) && $_FILES['adjuntos']['error'] == 'UPLOAD_ERR_OK'){
           $mail->AddAttachment($adjunto['name'][0]);
  //  }
$mail->Send();

s
//echo '<meta http-equiv="refresh" content="0; url=$pagRedirect">';










