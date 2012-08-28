<?php 

$regla = $_GET["regla"];

// Configuracion 
// Default $base = "/"
$base = "/";
$titulo = "Grabador" ;

// No editar bajo esta linea----

//Datos Actuales
$anoac = date('Y');
$mesac = date ('m');
$diaac = date ('j');
$horaac = date('H');
$minutosac = date('i');
$segundosac = date('s');
// $segundosac = date('i');  // ? que paso con esto?

// Chequeos
// Anio
if (empty($_GET["ano"]))
{
	// si esta vacio pongo anio actual
        $anopro = date('Y');
}else {
	$anopro = $_GET['ano'];
}

// Mes
if (empty($_GET["mes"]))
{
	// si esta vacio pongo mes actual
        $mespro = date('m');
}else {
	$mespro = $_GET['mes'];
}

// Dia
if (empty($_GET["dia"]))
{
	// si esta vacio pongo dia actual
        $diapro = date('j');
}else {
	$diapro = $_GET["dia"];
}

# Hora
if (empty($_GET["hora"]))
{
	// si esta vacio pongo hora actual
        $horapro = date('H');
} else {
	$horapro = $_GET["hora"];
}
?>
<HTML>
<HEAD>
<TITLE><?php echo $titulo ?></TITLE>
<link rel="stylesheet" type="text/css" href="/style.css" media="screen" />
<script type="text/javascript" src="/jquery.min.js"></script>
<link href='/Quicksand' rel='stylesheet' type='text/css'>
<link href='/Concert' rel='stylesheet' type='text/css'>
<script type="text/javascript">
$(function() {
  setInterval(function() {
    $.get('/ProximoCorte.php', function(data) {
      $('#proximo').html(data);
    });
  }, 5 * 1000);
});
$(function() {
  setInterval(function() {
    $.get('/HoraOficial.php', function(data) {
      $('#hsficial').html(data);
    });
  }, 2 * 1000);
});
$(function() {
  setInterval(function() {
    $.get('/RadioOnline.php', function(data) {
      $('#escuchas').html(data);
    });
  }, 10 * 1000);
});

</script>
</HEAD>
<BODY>
<?php
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
			<div id="corte">
		                <span id="proximo">--:--</span></BR>
				<span>PROXIMO CORTE </span>
		        </div>
			<div id="horaoficial">
				<span>Hora Oficial</span></BR>
				<span id="hsficial"> --:--:-- </span>
			</div>
			<div id="radioonline">
				 <span>Escuchas</span></BR>
				<span id="escuchas" >----</span>
			</div>
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
                <?php
		$diraudios= "/var/www/audios/$anopro-$mespro/$diapro";

                for ($i = 1; $i <= 24; $i++) {
                        $urlhorahora = str_pad((int) $i,2,"0",STR_PAD_LEFT);
			$filename= "$anopro-$mespro-$diapro-$urlhorahora";
			$urlhora = "$base$anopro/$mespro/$diapro/$urlhorahora";
                        if ($horaac == $urlhorahora )
                        {
                                $horaclass= 'class="actual"';
                        } elseif ($horapro == $urlhorahora) {
                                $horaclass= 'class="activo"';
                        } else {
                                $horaclass= 'class=inactivo';
                        }
			echo "<li $horaclass ><a href=$urlhora>$urlhorahora Hs.</a><div id=exentos style=\"width:600px\"><ul>";

				$output = explode("\n", `/usr/bin/sudo /usr/local/bin/filestatus $diraudios $filename`); 
				foreach($output as $line) 
				{ 
					if ($line == ''){
					}else{
					list($comienso, $archivo) =explode(',', $line);
					if ($comienso > '01:00'){
					echo "MAYOR";
					$duracion = "60";
					}else{
						$duracion = `/usr/bin/sudo /usr/local/bin/fileinfo $diraudios/$archivo `;
					}
					list($hora, $minutos) =explode(':', $comienso);
					$duracionfix= $duracion-($minutos+($hora*60));
					echo "<li><div><div style=\"width:60;background-color:#919191;float:left;\"><div style=\"width:$minutos px;background-color:#919191;float:left;\">&nbsp;</div><div style=\"width:$duracionfix px;background-color:green;float:left;\">&nbsp;</div></div><div style=\"float:left;\"><a href=\"/audios/$anopro-$mespro/$diapro/$archivo\"> $archivo  </a> Inicio: $minutos grabado: $duracion </div></div> </li>";
					}
				}  
//file = explode('/', $lsopen);	
//				echo $file[1]."DUR:". $file[0];
//				$timesss = shell_exec("/usr/bin/sudo /usr/local/bin/fileinfo $pathmp");
//				list($hms, $milli) = explode('.', $timesss);
//				list($hours, $minutes, $seconds) = explode(':', $hms);
//				$total_seconds = "$minutes:$seconds";		
//				echo "hoa";
			//	echo "<li class=exentos >".$file."Duracion: ".$total_seconds.$iniciorec."</li>";
				
                        echo "</ul></div></li>";
                }
                ?>


	</div>
<div id="pie">
	<div id="ultimo">
	</div>
</div>

</div>


</BODY>
</HTML>



