<?php
/*
 * Copyright (c) 2025 Bloxtor (http://bloxtor.com) and Joao Pinto (http://jplpinto.com)
 * 
 * Multi-licensed: BSD 3-Clause | Apache 2.0 | GNU LGPL v3 | HLNC License (http://bloxtor.com/LICENSE_HLNC.md)
 * Choose one license that best fits your needs.
 *
 * Original PHP Text Shuffler Lib Repo: https://github.com/a19836/php-text-shuffler-lib/
 * Original Bloxtor Repo: https://github.com/a19836/bloxtor
 *
 * YOU ARE NOT AUTHORIZED TO MODIFY OR REMOVE ANY PART OF THIS NOTICE!
 */
?>
<style>
h1 {margin-bottom:0; text-align:center;}
h5 {font-size:1em; margin:40px 0 10px; font-weight:bold;}
p {margin:0 0 20px; text-align:center;}

.note {text-align:center;}
.note span {text-align:center; margin:0 20px 20px; padding:10px; color:#aaa; border:1px solid #ccc; background:#eee; display:inline-block; border-radius:3px;}
.note li {margin-bottom:5px;}

.code {display:block; margin:10px 0; padding:0; background:#eee; border:1px solid #ccc; border-radius:3px; position:relative;}
.code:before {content:"php"; position:absolute; top:5px; left:5px; display:block; font-size:80%; opacity:.5;}
.code textarea {width:100%; height:300px; padding:30px 10px 10px; display:inline-block; background:transparent; border:0; resize:vertical; font-family:monospace;}
</style>
<h1>PHP Text Shuffler Lib</h1>
<p>Shuffle and unshuffle text</p>
<div class="note">
		<span>
		This library allows you to shuffle and unshuffle text strings in a reversible way, making them safer to store in a database.<br/>  
		By obfuscating sensitive data while preserving the ability to restore the original content when needed, this library helps reduce direct exposure of personal information and supports <b>GDPR (RGPD) compliance</b>.<br/>
		<br/>
		The library provides <b>5 different shuffling engines</b>, allowing you to choose the approach that best suits your security and performance requirements.
		<br/>
		This is especially useful in the event of a database breach: even if an attacker gains access to your database, the stored data remains unreadable, as it is shuffled and protected by proprietary unshuffle algorithms that are not accessible without the application logic.<br/>
		<br/>
However, if you require stronger and more robust encryption or hashing algorithms, please refer to <a href="https://github.com/a19836/phpencryptionlib" target="phpencryptionlib"><b>PHP Encryption Lib</b></a>.
		</span>
</div>

<div>
	<h5>Shuffle and unshuffle a string based in a specific engine:</h5>
	<div class="code">
		<textarea readonly>
include __DIR__ . "/lib/TextShuffler.php";

$string = "This is some dummy text to be shuffled";
$type = 1; //choose between 1 to 5 different shuffles.
$shuffled_string = TextShuffler::shuffle($string, $type);
$unshuffled_string = TextShuffler::unshuffle($shuffled_string, $type);

echo $unshuffled_string == $string ? "OK" : "ERROR";

echo "&lt;br/>";

//or call engine directly
$shuffled_string = TextShuffler::shuffle1($string); //or shuffle2, shuffle3, shuffle4 or shuffle5
$unshuffled_string = TextShuffler::unshuffle2($shuffled_string); //or unshuffle2, unshuffle3, unshuffle4 or unshuffle5

echo $unshuffled_string == $string ? "OK" : "ERROR";
		</textarea>
	</div>
</div>


<div>
	<h5>Choose the best algorithm to shuffle and unshuffle a string:</h5>
	<div class="code">
		<textarea readonly>
include __DIR__ . "/lib/TextShuffler.php";

$string = "This is some dummy text to be shuffled";
$options = array(
	"disable_email" => true, //do not shuffle emails
);
$shuffled_string = TextShuffler::autoShuffle($string, $options);
$unshuffled_string = TextShuffler::autoUnshuffle($shuffled_string, $options);

echo $unshuffled_string == $string ? "OK" : "ERROR";
		</textarea>
	</div>
</div>

