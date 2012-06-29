<HTML>
<HEAD>
<TITLE>ADADSD</TITLE>
<link rel="stylesheet" type="text/css" href="/grabadorv3/style.css" media="screen" />
</HEAD>
<BODY>
<?php
// Ingreso de datos PREFIJO IN
$regla = $_GET["regla"];
if (empty($_GET["ano"]))
{
	$anopro = date('Y');
}
$anopro = $_GET['ano'];

if (empty($_GET["mes"]))
{ 
	$mespro = date ('m');
}
$mespro = $_GET['mes'];

if (empty($_GET["dia"]))
{
	$diapro = date ('j');
}
$diapro = $_GET["dia"];

if (empty($_GET["hora"]))
{
	$horapro = date('H');
}
$horapro = $_GET["hora"];

//Datos Actuales
$anoac = date('Y');
$mesac = date ('m');
$diaac = date ('j');
$horaac = date('H');
$minutos = date('m');
//Datos Produccion
if (empty($anoin))
{ 
	$anopro = date('Y');
}


echo "$anopro - $mespro - $diapro - $horapro - $minutopro";

$titulo = "Grabador" ;
switch ($regla) { 
	case 1:
		$titulo = "Descarga" ;
	break; 
	case 2: 
		echo "esta activada la opcion 2"; 
	break; 
	case 3: 
		echo "esta activada la opcion 3";
	break; 
	case 4:
		$titulo = "NO ENCONTRADO"; 
		echo "ERROR: El contenido no esta disponible";
	break; 
} 

print "hora: $hora - dia: $dia - mes: $mes - año: $ano";
print "REGLA= $regla" ;
if ( $mode1 == 'generated' && $generated == 'pass' ) 
    echo $pass;
?>

<div id="home">
	<div id="header">
                <div id="titulo">
		<h1><?php echo $titulo ?><h1>
                </div>
		<div id="tiempo">
		TIEMPO
		</div>
	</div>
	<div id="anobar">
		<div class="izquierda">IZQ</div>
		<div id="ano"> 2010 </div>
		<div class="derecha">DER</div>
	</div>
	<div id="mesbar">
		<div id="mes"> ENE </div>
		<div id="mes"> FEB </div>
                <div id="mes"> MAR </div>
		<div id="mes"> ABR </div>
		<div id="mes"> MAY </div>
		<div id="mes"> JUN </div>
		<div id="mes"> JUL </div>
		<div id="mes"> AGO </div>
		<div id="mes"> SEP </div>
		<div id="mes"> OCT </div>
		<div id="mes"> NOV </div>
		<div id="mes"> DIC </div>
        </div>
	<div id="dia">
		<div id="fixdia">DIA:</div>
		<ul>
		<?php
		for ($i = 1; $i <= 31; $i++) {
			$urldiadia = str_pad((int) $i,2,"0",STR_PAD_LEFT);
			$urldia = "/$anopro/$mespro/$urldiadia/";
			echo "<li><a href=$urldia>$urldiadia</a></li>";
		}
		?>
		</ul>
			
		
	</div>
	<div id="hora">
	hora
	</div>
</div>
<div id="pie">
	<div id="ultimo">
	ULTIMO
	</div>
	<div id="corte">
	CORTE
	</div>
</div>




</BODY>
</HTML>



