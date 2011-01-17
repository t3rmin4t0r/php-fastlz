--TEST--
FastLZ: compression ratio tests (for serialize())
--SKIPIF--
<?php  
	if (!extension_loaded("fastlz")) die("skip");
?>
--INI--
--FILE--
<?php
$a = array();
$count = 400;

for($i = 0; $i < $count; $i++)
{
	array_push($a, "value$i");
}
$big = serialize($a);
$small = fastlz_compress($big);

print "Compression To: ".((strlen($small)/strlen($big))*100)." % \n";

$b = unserialize(fastlz_decompress($small));

for($i = 0; $i < $count; $i++)
{
	print ($b[$i] == "value$i") ? "." : "_";
}

print "\n";

?>
===DONE===
<?php exit(0); ?>
--EXPECTF--
Compression To: 37.689301416707 % 
................................................................................................................................................................................................................................................................................................................................................................................................................
===DONE===
