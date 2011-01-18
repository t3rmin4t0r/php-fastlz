--TEST--
FastLZ: compression ratio tests
--SKIPIF--
<?php  
	if (!extension_loaded("fastlz")) die("skip");
?>
--INI--
--FILE--
<?php
$literature = <<<EOF
	And then he told us the real history of the fish.  It seemed that he had
	caught it himself, years ago, when he was quite a lad; not by any art or
	skill, but by that unaccountable luck that appears to always wait upon a
	boy when he plays the wag from school, and goes out fishing on a sunny
	afternoon, with a bit of string tied on to the end of a tree.
	
	He said that bringing home that trout had saved him from a whacking, and
	that even his school-master had said it was worth the rule-of-three and
	practice put together.
	
	He was called out of the room at this point, and George and I again
	turned our gaze upon the fish.
	
	It really was a most astonishing trout.  The more we looked at it, the
	more we marvelled at it.
	
	It excited George so much that he climbed up on the back of a chair to
	get a better view of it.
	
	And then the chair slipped, and George clutched wildly at the trout-case
	to save himself, and down it came with a crash, George and the chair on
	top of it.
	
	“You haven’t injured the fish, have you?” I cried in alarm, rushing up.
	
	“I hope not,” said George, rising cautiously and looking about.
	
	But he had.  That trout lay shattered into a thousand fragments—I say a
	thousand, but they may have only been nine hundred.  I did not count
	them.
	
	We thought it strange and unaccountable that a stuffed trout should break
	up into little pieces like that.
	
	And so it would have been strange and unaccountable, if it had been a
	stuffed trout, but it was not.
	
	That trout was plaster-of-Paris.

EOF;

$a = fastlz_compress($literature);
$b = fastlz_compress($literature, 2);

var_dump(strlen($a), strlen($b));
--EXPECT--
int(1144)
int(1144)
