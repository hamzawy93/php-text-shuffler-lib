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

class TextSanitizer {
	
	/**
	* mbStrSplit: returns the multibyte character list of a string. 
	* This function splits a multibyte string into an array of characters. Comparable to str_split().
	* A (simpler) way to extract all characters from a UTF-8 string to array.
	*/
	public static function mbStrSplit($str) {
		# Split at all position not after the start: ^
		# and not before the end: $
		return function_exists("mb_str_split") ? mb_str_split($str) : preg_split('//u', $str, null, PREG_SPLIT_NO_EMPTY);
	}
}
?>
