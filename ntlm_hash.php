<?php

/* NTLM Hash
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
 * This script relies primarily on two major functions: iconv supported as early
 * as PHP 4.0.5, and hash supported as early as PHP 5.1.2. Both are currently
 * fully supported as of PHP 8 and later.
*/

function ntlm_hash(string $input = ''): string {
  return hash('md4', iconv('UTF-8', 'UTF-16LE', $input));
}

ntlm_hash('');
// 31d6cfe0d16ae931b73c59d7e0c089c0

ntlm_hash('asdf');
// e5810f3c99ae2abb2232ed8458a61309

ntlm_hash('The quick brown fox jumps over the lazy dog');
// 4e6a076ae1b04a815fa6332f69e2e231

?>
