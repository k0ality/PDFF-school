<?php

setlocale(LC_TIME, 'en_US');
echo(strftime("%A, %d %B, %G\n"));

//revisited version that returns the same result:

echo(date("l, d F, o\n"));

/* Write program, that will print time in format:
Wednesday, 22 November, 2018

one PHP file, that should be rung like
php date.php
*/
