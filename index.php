<HTML>
<HEAD>
<TITLE>ADADSD</TITLE>
<link rel="stylesheet" type="text/css" href="style.css" media="screen" />
</HEAD>
<BODY>
<?php
$ano = $_GET['ano'];
$mes = $_GET['mes'];
$dia = $_GET['dia'];
$hora = $_GET['hora'];
$regla = $_GET['regla'];

switch ($regla) { 
	case 1: 
		echo "esta activada la opcion 1"; 
	break; 
	case 2: 
		echo "esta activada la opcion 2"; 
	break; 
	case 3: 
		echo "esta activada la opcion 3";
	break; 
	case 4: 
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
		TITULO
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
			<li><a href="01">01</a></li>
			<li><a href="01">02</a></li>
                        <li><a href="01">03</a></li>
                        <li><a href="01">04</a></li>
                        <li><a href="01">05</a></li>
                        <li><a href="01">06</a></li>
                        <li><a href="01">07</a></li>
                        <li><a href="01">08</a></li>
                        <li><a href="01">09</a></li>
                        <li><a href="01">10</a></li>
                        <li><a href="01">11</a></li>
                        <li><a href="01">12</a></li>
                        <li><a href="01">13</a></li>
                        <li><a href="01">14</a></li>
                        <li><a href="01">15</a></li>
                        <li><a href="01">16</a></li>
                        <li><a href="01">17</a></li>
                        <li><a href="01">18</a></li>
                        <li><a href="01">19</a></li>
                        <li><a href="01">20</a></li>
                        <li><a href="01">21</a></li>
                        <li><a href="01">22</a></li>
                        <li><a href="01">23</a></li>
                        <li><a href="01">24</a></li>
                        <li><a href="01">25</a></li>
                        <li><a href="01">26</a></li>
                        <li><a href="01">27</a></li>
                        <li><a href="01">26</a></li>
                        <li><a href="01">29</a></li>
                        <li><a href="01">30</a></li>
                        <li id="fixli"><a href="01">31</a></li>
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



