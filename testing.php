<?php
/**
 * Created by PhpStorm.
 * User: frm
 * Date: 18/12/14
 * Time: 19:59
 */

if(isset($_GET['x']) AND isset($_GET['y']))
{
    $x = $_GET['x'];
    $y = $_GET['y'];
}

$x = 10;
$y = 5;

phpinfo();

$pwd = password_hash('12345', PASSWORD_DEFAULT);
echo $pwd;





function suma($x, $y)
{
    $var = $x + $y;
    return $var;
}

function multiplica($value,$por)
{
    $result = $value * $por;
    return $result;
}


$suma = suma($x,$y);
$multiplica = 5;

$resultado = multiplica($suma, $multiplica);

//echo $resultado;
