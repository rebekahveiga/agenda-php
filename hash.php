<?php
$senha = "123ses";
$senha_cript = hash('sha256', $senha);

var_dump($senha);
echo "<br>";
var_dump($senha_cript);

?>