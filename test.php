<?php
	
	echo comprobarDiccionario();
	
	function comprobarDiccionario() {		
	$filename = "toppasswords.txt"; 
	$word = "123456"; 

    $content = file_get_contents($filename);      
    $words = explode("\n", $content); 
     
    for($i=0; $i<count($words); $i++) 
    { 
        if(trim($words[$i]) == $word) 
            return  "encontrada"; 
    } 
    return  "no encontrada"; 
} 
			
?>