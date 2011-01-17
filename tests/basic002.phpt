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

var_dump($literature);
$shorter = fastlz_compress($literature);
var_dump(bin2hex($shorter));
$postmodern_literature = fastlz_decompress($shorter);
var_dump($postmodern_literature);
print "Compression To: ".((strlen($shorter)/strlen($literature))*100)." % \n";
?>
===DONE===
<?php exit(0); ?>
--EXPECTF--
string(1552) "	And then he told us the real history of the fish.  It seemed that he had
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
"
string(2288) "100600001309416e64207468656e20686520746f6c64207573400f0f207265616c20686973746f7279206f6660130e666973682e20204974207365656d65403801617440380c6861640a096361756768742069201113696d73656c662c2079656172732061676f2c2077a063197761732071756974652061206c61643b206e6f7420627920616e20030f7274206f720a09736b696c6c2c2062756019606411756e6163636f756e7461626c65206c75636b801702617070606308746f20616c77617973206020810a75706f6e20610a09626f79e0007901706c401e20eb20220b672066726f6d207363686f6f20690061210405676f6573206f207240e503696e67204041102073756e6e790a0961667465726e6f6f6e20c802697468201800622065211602737472402b017469210d2030208640600065204f201c106120747265652e0a090a09486520736169a13100624033403602686f6d21754144017472407a214720260076204b214280a2006120bf0261636b202d60a6010a09602e01657641b1016973a0c1032d6d617320a0a03f2066209c416802776f7220ac40910972756c652d6f662d7468209140ef080a0970726163746963211820f403746f676520270072c0ac403d0363616c6c208a409820cc201d0220726f213421f20074407a04706f696e746094052047656f7267605601204921ee0261696e20a70275726e603d06722067617a652061924044415f606622474265006c21a222140461206d6f7321d02271006e226720f0811422700054207a026d6f72209521fa026f6f6b205620840069207c204f010a09c01a046d6172766560b2601dc06302657863226ee000a405736f206d756341152025205804636c696d62201e01757061c020110062216f40f10661206368616972211b010a09211d200f02626574416603766965774020a063004120f6203780dd803202736c6922980064e1041d05636c7574636820690377696c6420f4207e203580e4032d63617320c9223e41fe21d9a340429803646f776e206a218e222ca27d0563726173682ce10377404a807b006f417c006f20cde000a005e2809c596f75221d223502e28099213a036e6a757220894034418e002c601b0720796f753fe2809d21c301637242d000692343046c61726d2c223e819101757061552050004922bc01706543bd002c403262758206202d01697341be24100474696f757340eb212241b940160161622251604600422278210122f561e44110630623a8012073200e216b20a4226523dc20ab204a40470c667261676d656e7473e2809449207821492139a01d843520d70079220e0079205a20d6016f6e208101626521a0026e696e206e02756e642057207202492064232b4480645a404501656d6099005721972051a4cf04737472616ea2dfe4058862442425037475666620aa80be007320392548006222dc026b0a09225760c1036c69747424ba03706965632468026c696b803d606e4241229721e40077603a60b660b1e0107a022c206941df202a206940db2104e0048681092021435c20e36068e102644016251244370a2d6f662d50617269732e0a"
string(1552) "	And then he told us the real history of the fish.  It seemed that he had
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
"
Compression To: 73.711340206186 % 
===DONE===
