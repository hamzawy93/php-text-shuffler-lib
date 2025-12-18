# PHP Text Shuffler Lib

> Original Repos:   
> - PHP Text Shuffler Lib: https://github.com/a19836/php-text-shuffler-lib/   
> - Bloxtor: https://github.com/a19836/bloxtor/

## Overview

**PHP Text Shuffler Lib** is a PHP library that allows you to shuffle and unshuffle text strings in a reversible way, making them safer to store in a database.  
By obfuscating sensitive data while preserving the ability to restore the original content when needed, this library helps reduce direct exposure of personal information and supports **GDPR (RGPD) compliance**.  

The library provides **5 different shuffling engines**, allowing you to choose the approach that best suits your security and performance requirements.   

This is especially useful in the event of a database breach: even if an attacker gains access to your database, the stored data remains unreadable, as it is shuffled and protected by proprietary unshuffle algorithms that are not accessible without the application logic.   

However, if you require stronger and more robust encryption or hashing algorithms, please refer to **[PHP Encryption Lib](https://github.com/a19836/phpencryptionlib)**.   

To see a working example, open [index.php](index.php) on your server.

---

## Usage

### Shuffle and unshuffle a string based in a specific engine

```php
include __DIR__ . "/lib/TextShuffler.php";

$string = "This is some dummy text to be shuffled";
$type = 1; //choose between 1 to 5 different shuffles.
$shuffled_string = TextShuffler::shuffle($string, $type);
$unshuffled_string = TextShuffler::unshuffle($shuffled_string, $type);

echo $unshuffled_string == $string ? "OK" : "ERROR";

echo "<br/>";

//or call engine directly
$shuffled_string = TextShuffler::shuffle1($string); //or shuffle2, shuffle3, shuffle4 or shuffle5
$unshuffled_string = TextShuffler::unshuffle2($shuffled_string); //or unshuffle2, unshuffle3, unshuffle4 or unshuffle5

echo $unshuffled_string == $string ? "OK" : "ERROR";
```

### Choose the best algorithm to shuffle and unshuffle a string

```php
include __DIR__ . "/lib/TextShuffler.php";

$string = "This is some dummy text to be shuffled";
$options = array(
	"disable_email" => true, //do not shuffle emails
);
$shuffled_string = TextShuffler::autoShuffle($string, $options);
$unshuffled_string = TextShuffler::autoUnshuffle($shuffled_string, $options);

echo $unshuffled_string == $string ? "OK" : "ERROR";
```

