<?php
// Subject must be in the form of input||output
// Input is what you have to check
// output is what you are matching against

// example:
// [[if? &is=`A,B,C||A,B,C,D,E,F,G,H:myArray` &custom=`myArray` &then=`[+myArrayResult+]` ]] 
// the input can also be a checkbox TV i.e. [*checkbox*] but it must be set with a comma delimiter

function myArray($subject, $operand) {
	$modx = EvolutionCMS();
	
	$i = 0;
	$data = explode("||", $subject);
	
	// data[0] is input
	// data[1] is output
	
	$output = explode(",", $data[1]);
	
	foreach ( $output as $check )
	{
	    if ( in_array($check, explode(",", $data[0])) )
	    {
	    	$i++;
	    }
	}
    
    $modx->setPlaceholder("myArrayResult", $i);
    return $i;
}
