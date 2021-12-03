<?php
// Subject must be a valid document checkbox TV
// Example:
// [[if? &is=`TVName:myArrayCheckbox` &custom=`myArrayCheckbox` &then=`Matched [+myArrayCheckboxResult+] Results` ]] 
//
// this is more dynamic and only requires the TV name.  It will get the choosen documnet values and TV options from the TV Name
// 
// Returns the number of matches.
//
// See: https://forum.evo.im/d/176-if-or-modifiers-targeting-the-various-options-in-a-checkbox-tv/

function myArrayCheckbox ($subject, $operand) {
	$modx = EvolutionCMS();

	$i = 0;
	
	$data = $modx->getTemplateVarOutput($subject);
	$data[0] = $data[$subject];

	$tv = $modx->getTemplateVar($subject);
	$tvValues = $tv['elements'];	
	$tvResults = explode("||", $tvValues);

	foreach ( $tvResults as $tvVal )
	{
		//echo $tvKey. $tvVal;
		if ( strpos($tvVal, "==") ) 
		{
			$val = explode("==", $tvVal);
			$values[] = $val[1];
		} else {
			$values[] = $tvVal;
		}
	}

	$output = explode(",", $data[0]);
	
	foreach ( $output as $check )
	{
	    if ( in_array($check, $values) )
	    {
	    	$i++;
	    }
	}
    
    $modx->setPlaceholder("myArrayCheckboxResult", $i);
    return $i;
}
