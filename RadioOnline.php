<?php
if(@file_get_contents('http://admin:lambare873@ns1.telepuerto.com.ar:8000/admin/stats.xml')){
	$xml = simplexml_load_string(file_get_contents('http://admin:lambare873@ns1.telepuerto.com.ar:8000/admin/stats.xml'));
	$escuchas = $xml->listeners;
	$status = str_pad((int) $escuchas,4,"0",STR_PAD_LEFT);
	echo "$status  ";

//	echo "<div style=\"height:3px; width:100 ; background-color:#fff \"><div style=\"width:$status%; height: 3px; background-color:green\"> </div> </div>";
		 
}else{
	echo 'Fuera de aire ';

}
?>

