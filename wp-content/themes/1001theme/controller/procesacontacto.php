<?php

include 'connect.php';
require('../email/class.phpmailer.php');

$mail = new PHPMailer();

$nombres = $_POST['nombres'];
$apellidos = $_POST['apellidos'];
$agencia = $_POST['agencia'];
$celular = $_POST['celular'];
$correo = $_POST['correo'];
$mensajeLeads = $_POST['mensaje'];


$sqlAgencia = "SELECT * FROM `agencias` WHERE `id_agencia`=$agencia";

$resultado = mysqli_query($link,$sqlAgencia);

$agenciasStr = "";
$email_to="";

while($row=mysqli_fetch_array($resultado)){
  $agenciasStr=$row[1];
  $email_to=$row[9];
}


//proceso para el envio del eamail
$para = "desarrollo@wom.ec";
$titulo = "Formulario de contacto (1001carros.com)";

// cuerpo del email
$mensaje = '
<html>
<head>
  <title>Formulario de contacto (1001carros.com)</title>
</head>
<body>
<div style="width:100%;max-width:800px;">
  <h2 style="color:#293659;font-size:18px;">Datos del cliente</h2>
  <p style="color:#767e85;font-size:14px;">Nombres y apellidos: ' . $nombres . " " . $apellidos . '</p>
  <p style="color:#767e85;font-size:14px;">Email: ' . $correo . '</p>
  <p style="color:#767e85;font-size:14px;">Celular: ' . $celular . '</p>
  <p style="color:#767e85;font-size:14px;">Mensaje: ' . $mensajeLeads . '</p>
  <p style="color:#767e85;font-size:14px;">Agencia: ' . $agenciasStr . '</p>
      
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
$mail->AddAddress($para); // Dirección a la que llegaran los mensajes.
$mail->AddAddress('geovanny@wom.ec'); // Dirección a la que llegaran los mensajes.
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
$mail->AddAddress($correo); // Dirección a la que llegaran los mensajes.
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


//insertar los datos en la base de datos

$fecha = date('Y-m-d');
$hora = date('H:i:s');

$sqlLeads = "INSERT INTO `contacto` (`id`, `agencia`, `nombres`, `apellidos`, `celular`, `email`, `fecha`, `hora`, `mensaje`) VALUES "
        . "(NULL, '$agenciasStr', '$nombres', '$apellidos', '$celular', '$email', '$fecha', '$hora', '$mensajeLeads');";

$result = mysqli_query($link, $sqlLeads);


mysqli_close($link);