<?php

function lm_hash(string $input = '', bool $double = true): string {
  if($double)
    return call_user_func(__FUNCTION__, substr($input, 0, 7), false).
           call_user_func(__FUNCTION__, substr($input, 7, 7), false);

  $input = unpack('C*', strtoupper($input));

  for($i=0,$key=chr(@$input[1]&254);$i<7;$i++)
    $key.= chr((@$input[$i+1]<<7-$i)|(@$input[$i+2]>>$i+1));

  return bin2hex(openssl_encrypt('KGS!@#$%', 'des-ecb', $key, OPENSSL_RAW_DATA | OPENSSL_ZERO_PADDING));
}

?>
