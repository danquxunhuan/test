<?php
$abc = 'nimeiya';
function &returns_reference(){
    return global $abc;
}

$newref = &returns_reference();
var_dump($newref);

