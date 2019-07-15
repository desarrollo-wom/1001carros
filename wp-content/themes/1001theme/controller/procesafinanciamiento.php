<?php

include 'connect.php';
require('../email/class.phpmailer.php');

$mail = new PHPMailer();

$nombres = $_POST['nombres'];
$apellidos = $_POST['apellidos'];
$celular = $_POST['celular'];
$cedula = $_POST['cedula'];
$correo = $_POST['email'];
$fecha = date('Y-m-d');
$hora = date('H:i:s');
$valortotal = $_POST['valortotal'];
$entradavalue = $_POST['entradavalue'];
$mesesvalue = $_POST['mesesvalue'];
$meses_rastreo = $_POST['meses_rastreo'];
$costo_rastreo = $_POST['costo_rastreo'];
$cuotavalue = $_POST['cuotavalue'];


$sql = "INSERT INTO `preca` (`id`, `nombres`, `apellidos`, `celular`, `cedula`, `correo`, `valortotal`, `entrada`, `meses`, `meses_rastreo`, `costo_rastreo`, `cuota`, `fecha`, `hora`) 
VALUES (NULL, '$nombres', '$apellidos', '$celular', '$cedula', '$correo', '$valortotal', '$entradavalue', '$mesesvalue', '$meses_rastreo', '$costo_rastreo', '$cuotavalue', '$fecha', '$hora');";

mysqli_query($link, $sql);

//proceso para el envio del eamail
$para = "desarrollo@wom.ec";
$titulo = "Formulario de precalificación (1001carros.com)";

// cuerpo del email
$mensaje = '
<html>
<head>
  <title>Formulario de precalificación (1001carros.com)</title>
</head>
<body>
<div style="width:100%;max-width:800px;">
  <h2 style="color:#293659;font-size:18px;">Datos del cliente</h2>
  <p style="color:#767e85;font-size:14px;">Nombres y apellidos: ' . $nombres . " " . $apellidos . '</p>
  <p style="color:#767e85;font-size:14px;">Email: ' . $correo . '</p>
  <p style="color:#767e85;font-size:14px;">Celular: ' . $celular . '</p>
  <p style="color:#767e85;font-size:14px;">Cédula: ' . $cedula . '</p>

  <h2 style="color:#293659;font-size:18px;">Datos de cotización</h2>
  <p style="color:#767e85;font-size:14px;">Valor del carro: ' . $valortotal . '</p>
  <p style="color:#767e85;font-size:14px;">Entrada: ' . $entradavalue . '</p>
  <p style="color:#767e85;font-size:14px;">Meses plazo: ' . $mesesvalue . '</p>
  <p style="color:#767e85;font-size:14px;">Rastreo satelital(meses): ' . $meses_rastreo . '</p>
  <p style="color:#767e85;font-size:14px;">Costo de rastreo: ' . $costo_rastreo . '</p>
  <p style="color:#767e85;font-size:14px;">Cuota referencial: ' . $cuotavalue . '</p>
      
  <div style="text-align:center;margin-top:75px;">
   <p  style="color:#767e85;font-size:11px;margin:5px 0;">Formulario de precalificación enviado desde 1001carros.com</p>
  </div>
</div>
</body>
</html>
';

$mail->Body = $mensaje;

$mail->From = ("contacto@1001carros.com"); //Dirección desde la que se enviarán los mensajes. Debe ser la misma de los datos de el servidor SMTP.
$mail->FromName = "Precalificación | 1001carros.com";
$mail->AddAddress($para); // Dirección a la que llegaran los mensajes.
$mail->AddAddress('geovanny@wom.ec');
$mail->IsHTML(true);
$mail->Subject = "Formulario de precalificación(1001carros.com)";

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


//proceso para el envio del eamail al cliente
$titulo = "Formulario de precalificación (1001carros.com)";

// cuerpo del email
$mensaje = '
<html>
<head>
  <title>Formulario de precalificación (1001carros.com)</title>
</head>
<body>
<div style="width:100%;max-width:800px;">
  
  <h2 style="color:#293659;font-size:18px;">Datos de cotización</h2>
  <p style="color:#767e85;font-size:14px;">Valor del carro: ' . $valortotal . '</p>
  <p style="color:#767e85;font-size:14px;">Entrada: ' . $entradavalue . '</p>
  <p style="color:#767e85;font-size:14px;">Meses plazo: ' . $mesesvalue . '</p>
  <p style="color:#767e85;font-size:14px;">Rastreo satelital(meses): ' . $meses_rastreo . '</p>
  <p style="color:#767e85;font-size:14px;">Costo de rastreo: ' . $costo_rastreo . '</p>
  <p style="color:#767e85;font-size:14px;">Cuota referencial: ' . $cuotavalue . '</p> 
  <div style="text-align:center;margin-top:75px;">
  <p  style="color:#767e85;font-size:11px;margin:5px 0;">Formulario de precalificación enviado desde 1001carros.com</p>
  <p>&nbsp;</p>
  <p style="color:#767e85;font-size:14px;">Gracias por usar nuestro simulador, pronto un asesor se pondra en contacto con usted.</p>
  </div>
</div>
</body>
</html>
';

$mail->Body = $mensaje;

$mail->From = ("contacto@1001carros.com"); //Dirección desde la que se enviarán los mensajes. Debe ser la misma de los datos de el servidor SMTP.
$mail->FromName = "Precalificación | 1001carros.com";
$mail->AddAddress($correo); // Dirección a la que llegaran los mensajes.
$mail->AddAddress('geovanny@wom.ec');
$mail->IsHTML(true);
$mail->Subject = "Formulario de precalificación(1001carros.com)";

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