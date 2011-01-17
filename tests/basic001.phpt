--TEST--
FastLZ: fastlz simple tests
--SKIPIF--
<?php  
	if (!extension_loaded("fastlz")) die("skip");
?>
--INI--
--FILE--
<?php
$foo = 'hello world';
var_dump($foo);
$bar = fastlz_compress($foo);
var_dump(bin2hex($bar));
$foo = fastlz_decompress($bar);
var_dump($foo);
?>
===DONE===
<?php exit(0); ?>
--EXPECTF--
string(11) "hello world"
string(32) "0b0000000a68656c6c6f20776f726c64"
string(11) "hello world"
===DONE===
