<?php

include 'connect.php';
require('../email/class.phpmailer.php');

$mail = new PHPMailer();

$placa=$_POST['placa'];
$year=$_POST['year'];
$marca=$_POST['marca'];
$modelo=$_POST['modelo'];
$kilometraje=$_POST['kilometraje'];
$color=$_POST['color'];
$valoresperado=$_POST['valoresperado'];
$accidente_selected=$_POST['accidente_selected'];
$fallamec_selected=$_POST['fallamec_selected'];
$nollaves_selected=$_POST['nollaves_selected'];
$fumadocarro_selected=$_POST['fumadocarro_selected'];
$condcarro_selected=$_POST['condcarro_selected'];
$nombres=$_POST['nombres'];
$apellidos=$_POST['apellidos'];
$celular=$_POST['celular'];
$email=$_POST['email'];
$agencia=$_POST['agencia'];
$cambiarcarro=$_POST['cambiarcarro'];
$fecha=date('Y-m-d');
$hora=date('H:i:s');


$sql="INSERT INTO `venta` (`id`, `placa`, `year`, `marca`, `modelo`, `kilmetraje`, `color`, `valor_esperado`, `accidetado`, `falla_mecanica`, 
`numero_llaves`, `fumado`, `condicion`, `nombre`, `apellidos`, `celular`, `email`, `agencia`, `cambiar`, `fecha`, `hora`) 
VALUES (NULL, '$placa', '$year', '$marca', '$modelo', '$kilometraje', '$color', '$valoresperado', '$accidente_selected', '$fallamec_selected', '$nollaves_selected', '$fumadocarro_selected', '$condcarro_selected', '$nombres', 
'$apellidos', '$celular', '$email', '$agencia', '$cambiarcarro', '$fecha', '$hora');";


mysqli_query($link,$sql);

//proceso para el envio del eamail
$para = "desarrollo@wom.ec";
$titulo = "Formulario de contacto (1001carros.com)";

// cuerpo del email
$mensaje = '
<html>
<head>
  <title>Formulario de venta (1001carros.com)</title>
</head>
<body>
<div style="width:100%;max-width:800px;">
  <h2 style="color:#293659;font-size:18px;">Datos del carro</h2>
  <p style="color:#767e85;font-size:14px;">Placa: ' . $placa . '</p>
  <p style="color:#767e85;font-size:14px;">Año: ' . $year . '</p>
  <p style="color:#767e85;font-size:14px;">Marca: ' . $marca . '</p>
  <p style="color:#767e85;font-size:14px;">Modelo: ' . $modelo . '</p>
  <p style="color:#767e85;font-size:14px;">Kilometraje: ' . $kilometraje . '</p>
  <p style="color:#767e85;font-size:14px;">Color: ' . $color . '</p>
  <h2 style="color:#293659;font-size:18px;">Preguntas sobre tu carro</h2>
  <p style="color:#767e85;font-size:14px;">¿Qué valor esperas recibir por tu carro?: ' . $valoresperado . '</p>
  <p style="color:#767e85;font-size:14px;">¿Tuvieron algún accidente?: ' . $accidente_selected . '</p>
  <p style="color:#767e85;font-size:14px;">¿Tu carro tiene alguna falla mecánica?: ' . $fallamec_selected . '</p>
  <p style="color:#767e85;font-size:14px;">¿Cuántas llaves tienes para este carro?: ' . $nollaves_selected . '</p>
  <p style="color:#767e85;font-size:14px;">¿Han fumado dentro de este carro?: ' . $fumadocarro_selected . '</p>
  <p style="color:#767e85;font-size:14px;">¿En qué condiciones está el carro?: ' . $condcarro_selected . '</p>
  <h2 style="color:#293659;font-size:18px;">Datos dueño</h2>
  

  <p style="color:#767e85;font-size:14px;">Nombres y apellidos: ' . $nombres . " " . $apellidos . '</p>
  <p style="color:#767e85;font-size:14px;">Email: ' . $email . '</p>
  <p style="color:#767e85;font-size:14px;">Celular: ' . $celular . '</p>
  <p style="color:#767e85;font-size:14px;">Agencia: ' . $agencia . '</p>
  <p style="color:#767e85;font-size:14px;">Cambiar carro: ' . $cambiarcarro . '</p>
      
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




