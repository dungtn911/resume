      <?php
    //Not valid when shift is negative
      //Only accecpt char and space

      function sub_cipher_encrypt($input, $shift)
      {
          while($shift > 27)
              $shift -= 27;

          $input = strtoupper($input);
          $tmp_letter = range('A', 'Z');
          $tmp_letter[] = ' ';
          $letter = implode('', $tmp_letter);

          $ciphertext = "";

          for($i = 0; $i < strlen($input); ++$i){
              $pos = strpos($letter, $input[$i]) + $shift;
              if($pos >'Z')
                  $pos = $pos % 27;
              $ciphertext .= $letter[$pos];
          }
          return $ciphertext;






         // echo "\nshift b: " . chr(ord($letter['b']) + 3);

      }

      function sub_cipher_decrypt($input, $shift) {
          while($shift > 27)
              $shift -= 27;

          $input = strtoupper($input);
          $tmp_letter = range('A', 'Z');
          $tmp_letter[] = ' ';
          $letter = implode('', $tmp_letter);

          $plaintext = "";
          for($i = 0; $i < strlen($input); ++$i){
              $pos = strpos($letter, $input[$i]) - $shift;
              if($pos < 'A')
                  $pos = $pos + 27;
              $plaintext .= $letter[$pos];

          }
          return $plaintext;

      }
      $a = sub_cipher_encrypt("     o     ", 1);
      echo  $a . "\n";
      echo sub_cipher_decrypt($a, 1);

?>