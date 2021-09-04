<?php

// iconv = (PHP 4 >= 4.0.5, PHP 5, PHP 7, PHP 8)
// hash = (PHP 5 >= 5.1.2, PHP 7, PHP 8, PECL hash >= 1.1)

function ntlm_hash(string $input = ''): string {
  return hash('md4', iconv('UTF-8', 'UTF-16LE', $input));
}

?>
