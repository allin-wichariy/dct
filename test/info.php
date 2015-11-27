<?php
/* Convierte de la codificación interna a SJIS */

$str = 'áéíóúÁÉÍÓÚÑñ';

$str = mb_convert_encoding($str, "SJIS");

print $str."<br>";

/* Convierte EUC-JP a UTF-7 */
$str = mb_convert_encoding($str, "UTF-7", "EUC-JP");

print $str."<br>";

/* Autodetecta la codificación, desde JIS, eucjp-win o sjis-win, y después convierte str a UCS-2LE */
$str = mb_convert_encoding($str, "UCS-2LE", "JIS, eucjp-win, sjis-win");

print $str."<br>";

/* "auto" es un alias de "ASCII,JIS,UTF-8,EUC-JP,SJIS" */
$str = mb_convert_encoding($str, "EUC-JP", "auto");

print $str."<br>";
?>

