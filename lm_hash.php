<?php

/* LM Hash
 *
 * This program is free software; you can redistribute it and/or modify it under
 * the terms of the GNU General Public License as published by the Free Software
 * Foundation; either version 2 of the License; or (at your option) any later
 * version.
 * 
 * This program is distributed in the hope that it will be useful, but without
 * any warranty; without even the implied warranty of merchantability or fitness
 * for a particular purpose. See the GNU General Public License for more
 * details.
 * 
 * This script relies primarily on one major function: openssl_encrypt supported
 * as early as PHP 4.0.5 and is currently fully supported as of PHP 8 and later.
 * 
 * This function was written by @nitrxgen and was based on a more manual
 * calculation. The openssl library proved to support the algorithms necessary
 * and so the function was rewritten to utilise openssl.
*/

function lm_hash(string $input = '', bool $double = true): string {
  if($double)
    return call_user_func(__FUNCTION__, substr($input, 0, 7), false).
           call_user_func(__FUNCTION__, substr($input, 7, 7), false);

  $input = unpack('C*', strtoupper($input));

  for($i=0,$key=chr(@$input[1]&254);$i<7;$i++)
    $key.= chr((@$input[$i+1]<<7-$i)|(@$input[$i+2]>>$i+1));

  return bin2hex(openssl_encrypt('KGS!@#$%', 'des-ecb', $key, OPENSSL_RAW_DATA | OPENSSL_ZERO_PADDING));
}

lm_hash('');
// aad3b435b51404eeaad3b435b51404ee

lm_hash('asdf');
// 1ef2ac3c7865b1f2aad3b435b51404ee

lm_hash('The quick brown fox jumps over the lazy dog');
// a7b07f9948d8cc7f97c4b0b30cae500f

lm_hash('THE QUICK BROW');
// a7b07f9948d8cc7f97c4b0b30cae500f
// Because the input gets truncated to an effective 14 bytes and converted to
// uppercase, the above two test vectors yield the same resulting hash.

?>
