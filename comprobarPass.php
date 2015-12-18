<?php

	//incluimos la clase nusoap.php
	require_once("nusoap-0.9.5/lib/nusoap.php");
	require_once("nusoap-0.9.5/lib/class.wsdlcache.php");

	//creamos el objeto de tipo soap_server	
	$ns="http://swluzma.esy.es/laboratorio_7/nusoap-0.9.5/samples";
	$server = new soap_server;
	$server->configureWSDL('comprobarDiccionario',$ns);
	$server->wsdl->schemaTargetNamespace=$ns;
	
	//registramos la función que vamos a implementar
	//se podría registrar mas de una función ...
	$server->register('comprobarDiccionario',array('x'=>'xsd:string'),array('z'=>'xsd:string'),$ns);
	
	//implementamos la función
	function comprobarDiccionario( $x ) {		
							
	$filename = "toppasswords.txt"; 
	$word = $x; 

    $content = file_get_contents($filename);      
    $words = explode("\n", $content); 
     
    for($i=0; $i<count($words); $i++) 
    { 
        if(trim($words[$i]) == $word) 
            return  "INVALIDA"; 
    } 
    return  "VALIDA"; 	
    
    }
	

	//llamamos al método service de la clase nusoap
	$HTTP_RAW_POST_DATA = isset($HTTP_RAW_POST_DATA) ? $HTTP_RAW_POST_DATA : '';
	$server->service($HTTP_RAW_POST_DATA);
?>