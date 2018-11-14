<?php

function getElementByType(array $tab, string $type="") : array {
    $maFonction = 'is_'.$type;
    echo $maFonction."<br>";
    $newTab=[];
    if(function_exists($maFonction)){
        foreach ($tab as $value){
            if($maFonction($value)){
                $newTab[]=$value;
            }
        }
    }else{
        echo "$maFonction is not a function";
    }
    return($newTab);
}

var_dump(getElementByType(array(1,2,3,'abce',3.14,array("a",1,true)),'blabla'));
