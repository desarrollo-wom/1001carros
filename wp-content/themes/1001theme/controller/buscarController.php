<?php

include './connect.php';

$tipos = array();
$marcas = array();
$precio=array();
$years=array();
$kms=array();
$placa=-1;

$pathSite="/var/www/html/1001carros";

$tiposSelected=array();
$marcasSelected=array();

if (isset($_POST["tipos"])) {
    $tipos = $_POST["tipos"];

    foreach ($tipos as $tipo){
        $valor=$tipo['valor'];
        $tiposSelected[]=$valor;
    }
}

if (isset($_POST["marcas"])) {
    $marcas = $_POST["marcas"];

    foreach ($marcas as $marca){
        $valor2=$marca['valor'];
        $marcasSelected[]=$valor2;
    }
}


$precioMin=-1;
$precioMax=-1;

$yearMin=-1;
$yearMax=-1;

$kmsMin=-1;
$kmsMax=-1;

if(isset($_POST['precio'])){
    $precio=$_POST["precio"];

    $precioMin=floatval($precio[0]);
    $precioMax=floatval($precio[1]);
}

if(isset($_POST['annos'])){
    $years=$_POST["annos"];

    $yearMin=intval($years[0]);
    $yearMax=intval($years[1]);
}

if(isset($_POST['kms'])){
    $kms=$_POST["kms"];

    $kmsMin=intval($kms[0]);
    $kmsMax=intval($kms[1]);
}


if(isset($_POST['placa'])) {
    $placa = $_POST["placa"];
}

$tiposSTR = "";
$marcasSTR = "";

$cantTipos = count($tiposSelected);
for ($i = 0; $i < $cantTipos; $i++) {
    $tiposSTR .= $tiposSelected[$i] . ",";
}

$cantMarcas = count($marcasSelected);
for ($j = 0; $j < $cantMarcas; $j++) {
    $marcasSTR .= $marcasSelected[$j] . ",";
}

$tiposSTR = substr($tiposSTR, 0, -1);
$marcasSTR = substr($marcasSTR, 0, -1);


//variables para armar la consulta
$filterApliqued=false;
$filtrosTipoSQL="";
$filtrosMarcasSQL="";
$filtrosPrecioMinSQL="";
$filtrosPrecioMaxSQL="";
$filtrosYearMinSQL="";
$filtrosYearMaxSQL="";
$filtrosKmsMinSQL="";
$filtrosKmsMaxSQL="";
$filtrosPlacaSQL="";


$sql = "SELECT * FROM `carro`";

if($cantTipos>0){
    $filterApliqued=true;
    $filtrosTipoSQL="`id_tipo` IN($tiposSTR)";
}

if($cantMarcas>0){
   if($filterApliqued==true){
       $filtrosMarcasSQL=" AND `id_marca` IN($marcasSTR)";
   }else{
       $filterApliqued=true;
       $filtrosMarcasSQL="`id_marca` IN($marcasSTR)";
   }
}

if($precioMin>0){
    if($filterApliqued==true){
        $filtrosPrecioMinSQL=" AND `precioPvp`>= $precioMin";
    }else{
        $filterApliqued=true;
        $filtrosPrecioMinSQL="`precioPvp`>= $precioMin";
    }
}

if($precioMax>0){
    if($filterApliqued==true){
        $filtrosPrecioMaxSQL=" AND `precioPvp`<= $precioMax";
    }else{
        $filterApliqued=true;
        $filtrosPrecioMaxSQL="`precioPvp`<= $precioMax";
    }
}

if($yearMin>0){
    if($filterApliqued==true){
        $filtrosYearMinSQL=" AND `anioFabricacion`>= $yearMin";
    }else{
        $filterApliqued=true;
        $filtrosYearMinSQL="`anioFabricacion`>= $yearMin";
    }
}

if($yearMax>0){
    if($filterApliqued==true){
        $filtrosYearMaxSQL=" AND `anioFabricacion`<= $yearMax";
    }else{
        $filterApliqued=true;
        $filtrosYearMaxSQL="`anioFabricacion`<= $yearMax";
    }
}

if($kmsMin>0){
    if($filterApliqued==true){
        $filtrosKmsMinSQL=" AND `kilometraje`>= $kmsMin";
    }else{
        $filterApliqued=true;
        $filtrosKmsMinSQL="`kilometraje`>= $kmsMin";
    }
}

if($kmsMax>0){
    if($filterApliqued==true){
        $filtrosKmsMaxSQL=" AND `kilometraje`<= $kmsMax";
    }else{
        $filterApliqued=true;
        $filtrosKmsMaxSQL="`kilometraje`<= $kmsMax";
    }
}

if($placa>-1){
    if($filterApliqued==true){
        $filtrosPlacaSQL=" AND `placa` LIKE '%$placa'";
    }else{
        $filterApliqued=true;
        $filtrosPlacaSQL="`placa` LIKE '%$placa'";
    }
}


//si se aplican filtros se arma la consulta final
if($filterApliqued==true){

    $sql.=" WHERE ";

    if($filtrosTipoSQL!=""){
        $sql.=$filtrosTipoSQL;
    }

    if($filtrosMarcasSQL!=""){
        $sql.=$filtrosMarcasSQL;
    }

    if($filtrosPrecioMinSQL!=""){
        $sql.=$filtrosPrecioMinSQL;
    }

    if($filtrosPrecioMaxSQL!=""){
        $sql.=$filtrosPrecioMaxSQL;
    }

    if($filtrosYearMinSQL!=""){
        $sql.=$filtrosYearMinSQL;
    }

    if($filtrosYearMaxSQL!=""){
        $sql.=$filtrosYearMaxSQL;
    }

    if($filtrosKmsMinSQL!=""){
        $sql.=$filtrosKmsMinSQL;
    }

    if($filtrosKmsMaxSQL!=""){
        $sql.=$filtrosKmsMaxSQL;
    }

    if($filtrosPlacaSQL!=""){
        $sql.=$filtrosPlacaSQL;
    }

}

$sql.=";";

$result = mysqli_query($link, $sql);

$carros = array();
$carro = array();

while ($row = mysqli_fetch_array($result)) {
    $carro['placa'] = $row[0];
    $carro['modelo'] = $row[5];
    $carro['anno'] = $row[10];
    $carro['kilometros'] = $row[9];

    $precioPvp=$row[7];

    $precioF = "";
    $longitudP = strlen($precioPvp);

    if ($longitudP == 4) {
        $pre_pref = substr($precioPvp, 0, 1);
        $pre_suf = substr($precioPvp, 1, 3);
        $precioF = $pre_pref . "," . $pre_suf;
    }
    if ($longitudP == 5) {
        $pre_pref = substr($precioPvp, 0, 2);
        $pre_suf = substr($precioPvp, 2, 3);
        $precioF = $pre_pref . "," . $pre_suf;
    }
    if ($longitudP == 6) {
        $pre_pref = substr($precioPvp, 0, 3);
        $pre_suf = substr($precioPvp, 2, 3);
        $precioF = $pre_pref . "," . $pre_suf;
    }

    $precioCarro = $precioF;

    $carro['transmicion'] = $row[12];
    $carro['precio']= "$".$precioCarro;

    $urlImagenCarro="";
    $haveImage=0;

    if(file_exists($pathSite.'/fotosftp/'.$row[0])){

        if(file_exists($pathSite.'/fotosftp/'.$row[0].'/'.$row[0].'_1.JPG')){
           $urlImagenCarro=$host_url.'/fotosftp/'.$row[0].'/'.$row[0].'_1.JPG';
           $haveImage=1;
        }else{
           $urlImagenCarro=$host_url.'/fotosftp/'.$row[0].'/'.$row[0].'_1.jpg'; 
           $haveImage=2;
        }
 
      }else{
        $urlImagenCarro=$host_url.'/fotosftp/proxima.png';
    }

    $carro['image']=$haveImage;
    
    $carros[] = $carro;
}


echo json_encode($carros);














