<?php $segundosac = date('i'); ?>
<HTML>
<HEAD>
<TITLE><?php echo $titulo ?></TITLE>
<link rel="stylesheet" type="text/css" href="/grabadorv3/style.css" media="screen" />
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.5.2/jquery.min.js"></script>
<link href='http://fonts.googleapis.com/css?family=Quicksand' rel='stylesheet' type='text/css'>
<link href='http://fonts.googleapis.com/css?family=Concert+One' rel='stylesheet' type='text/css'>
<script type="text/javascript">
$(function() {
  setInterval(function() {
    $.get('/grabadorv3/ProximoCorte.php', function(data) {
      $('#proximo').html(data);
    });
  }, 5 * 1000);
});
</script>
</HEAD>
<BODY>
<?php

// Entradas de datos
$regla = $_GET["regla"];

// Configuracion General
#Default $base = "/"
$base = "/grabadorv3/rec/"; 
$titulo = "Grabador" ;

// Checkeos de Entradas:
if (empty($_GET["ano"]))
{
	echo "por aca " ;
	$anopro = date('Y');
}else {
$anopro = $_GET['ano'];
}

if (empty($_GET["mes"]))
{ 
	$mespro = date('m');
}else {
$mespro = $_GET['mes'];
}

if (empty($_GET["dia"]))
{
	$diapro = date('j');
}else {
$diapro = $_GET["dia"];
}

if (empty($_GET["hora"]))
{
	$horapro = date('H');
} else { 
$horapro = $_GET["hora"];
}

//Datos Actuales
$anoac = date('Y');
$mesac = date ('m');
$diaac = date ('j');
$horaac = date('H');
$minutosac = date('i');
$segundosac = date('s');

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
                <div class="inactivo" id="titulo">
		<h1><?php echo $titulo ?><h1>
                </div>
		<div id="tiempo">
		TIEMPO
		</div>
	</div>
	<div id="anobar">
		<div class="izquierda inactivo"><a href="<?php $anoiz= $anopro-1 ; echo "$base$anoiz/$mespro/$diapro" ;  ?>" > &lt; </a></div>
		<div id="ano"><span id="fix5" ><?php echo $anopro ?> </span> </div>
		<div class="derecha inactivo"><a href="<?php $anoiz= $anopro+1 ; echo "$base$anoiz/$mespro/$diapro" ;  ?>" > &gt; </a></div>
	</div>
	<div id="mesbar">
                <ul>
                <?php
		$meses = array(ENE, FEB, MAR, ABR, MAY, JUN, JUL, AGO, SEP, OCT, NOV, DIC) ;
                for ($i = 0; $i <= 11; $i++) {
                        $urlmesmes = str_pad((int) $i+1,2,"0",STR_PAD_LEFT);
                        $urlmes = "$base$anopro/$urlmesmes/$diapro";

			if ($mesac == $urlmesmes )
                        {
                                $mesclass= 'class="actual"';
                        } elseif ($mespro == $urlmesmes) {
				$mesclass= 'class="activo"';
			} else {
                                $mesclass= 'class=inactivo';
                        }

                        echo "<li $mesclass ><a href=$urlmes> $meses[$i] </a></li>";
                }
                ?>
                </ul>

        </div>
	<div id="dia">
		<div id="fixdia">DIA:</div>
		<ul>
		<?php
		for ($i = 1; $i <= 31; $i++) {
			$urldiadia = str_pad((int) $i,2,"0",STR_PAD_LEFT);
			$urldia = "$base$anopro/$mespro/$urldiadia";
                        if ($diaac == $urldiadia )
                        {
                                $diaclass= 'class="actual"';
                        } elseif ($diapro == $urldiadia) {
                                $diaclass= 'class="activo"';
                        } else {
                                $diaclass= 'class=inactivo';
                        }

			echo "<li $diaclass ><a href=$urldia>$urldiadia</a></li>";
		}
		?>
		</ul>
			
		
	</div>
	<div id="hora">
	hora
	</div>
</div>
<div id="pie">
        <div id="corte">
        	<div id="cortehora"><span id="proximo"></span></div>
		<div id="cortetitulo">PROXIMO CORTE<div>
        </div>
	<div id="ultimo">
	</div>
</div>




</BODY>
</HTML>



