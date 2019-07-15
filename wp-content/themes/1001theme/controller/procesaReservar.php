<?php

include 'connect.php';
require('../email/class.phpmailer.php');


$mail = new PHPMailer();

$nombres = $_POST['nombres'];
$celular = $_POST['celular'];
$email = $_POST['email'];
$mensajeLeads = $_POST['mensaje'];
$placa=$_POST['placa'];
$fecha=date('Y-m-d');
$hora=date('H:i:s');

$sql="INSERT INTO `reserva` (`id`, `nombres`, `celular`, `email`, `mensaje`,`placa`, `fecha`, `hora`)
 VALUES (NULL, '$nombres', '$celular', '$email', '$mensajeLeads', '$placa', '$fecha', '$hora');";

mysqli_query($link,$sql);

mysqli_close($link);


//proceso para el envio del eamail
$para = "desarrollo@wom.ec";
$titulo = "Formulario de reserva (1001carros.com)";

// cuerpo del email
$mensaje = '
<html>
<head>
  <title>Formulario de reserva (1001carros.com)</title>
</head>
<body>
<div style="width:100%;max-width:800px;">
  <h2 style="color:#293659;font-size:18px;">Datos del cliente</h2>
  <p style="color:#767e85;font-size:14px;">Nombres: ' . $nombres.'</p>
  <p style="color:#767e85;font-size:14px;">Email: ' . $email . '</p>
  <p style="color:#767e85;font-size:14px;">Celular: ' . $celular . '</p>
  <p style="color:#767e85;font-size:14px;">Placa: ' . $placa . '</p>
  <p style="color:#767e85;font-size:14px;">Mensaje: ' . $mensajeLeads . '</p>
      
  <div style="text-align:center;margin-top:75px;">
   <p  style="color:#767e85;font-size:11px;margin:5px 0;">Formulario de reserva enviado desde 1001carros.com</p>
  </div>
</div>
</body>
</html>
';

$mail->Body = $mensaje;

$mail->From = ("contacto@1001carros.com"); //Dirección desde la que se enviarán los mensajes. Debe ser la misma de los datos de el servidor SMTP.
$mail->FromName = "Contacto | 1001carros.com";
$mail->AddAddress($para); // Dirección a la que llegaran los mensajes.
$mail->AddAddress('geovanny@wom.ec');
$mail->IsHTML(true);
$mail->Subject = "Formulario de contacto(1001carros.com)";

$mail->Body = $mensaje;

$mail->IsSMTP();
$mail->Host = "imap.gmail.com";  // Servidor de Salida.
$mail->SMTPAuth = true;
$mail->SMTPSecure = "ssl";
$mail->Port = 465;
$mail->Username = "1001carrossa@gmail.com";  // Correo Electrónico
$mail->Password = "1001CARROS2018"; // Contraseña
// Activo condificacción utf-8
$mail->CharSet = 'UTF-8';
$mail->Send();


//proceso para el envio del email al cliente
$titulo = "Formulario de contacto (1001carros.com)";

// cuerpo del email
$mensaje = '
<html>
<head>
  <title>Formulario de contacto (1001carros.com)</title>
</head>
<body>
<div style="width:100%;max-width:800px;">
  <h2 style="color:#293659;font-size:18px;">Formulario de contacto</h2>
  <p style="color:#767e85;font-size:14px;">Muchas gracias ' . $nombres . " " . $apellidos . ' por ponerce en contacto con nosotros. Pronto un acesor se pondra en contacto con usted.</p>
      
  <div style="text-align:center;margin-top:75px;">
   <p  style="color:#767e85;font-size:11px;margin:5px 0;">Formulario de contacto enviado desde 1001carros.com</p>
  </div>
</div>
</body>
</html>
';



$mail->Body = $mensaje;

$mail->From = ("contacto@1001carros.com"); //Dirección desde la que se enviarán los mensajes. Debe ser la misma de los datos de el servidor SMTP.
$mail->FromName = "Contacto | 1001carros.com";
$mail->AddAddress($email); // Dirección a la que llegaran los mensajes.
$mail->AddAddress('geovanny@wom.ec');
$mail->IsHTML(true);
$mail->Subject = "Formulario de contacto(1001carros.com)";

$mail->Body = $mensaje;

$mail->IsSMTP();
$mail->Host = "imap.gmail.com";  // Servidor de Salida.
$mail->SMTPAuth = true;
$mail->SMTPSecure = "ssl";
$mail->Port = 465;
$mail->Username = "1001carrossa@gmail.com";  // Correo Electrónico
$mail->Password = "1001CARROS2018"; // Contraseña
// Activo condificacción utf-8
$mail->CharSet = 'UTF-8';
$mail->Send();


