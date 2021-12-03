<?php
/*
 Structure of a Custom Condition
 
 function nameOfCustomCondition($subject, $operand) {
    // Add your conditions here
    $result = $subject == $operand ? true : false;

    // If $operand is not used, return boolean
    return $result;

    // If $operand is used, return array
    // "true" causes $i++
    return array($result, true);
 }
 
*/

// Example: [[if?	&is=`Site Admins:webGroup` &custom=`webGroup` &then=`@TPL:SiteAdminsTPL`]]

function webGroup($subject, $operand) {
	$modx = EvolutionCMS();
    return $modx->isMemberOfWebGroup(explode(',',$subject));
}
