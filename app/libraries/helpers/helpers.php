<?php
/**
 * @author Alankar More <a.more@easternenterprise.com>
 */
/*
  |--------------------------------------------------------------------------
  | Helper file with various functions
  |--------------------------------------------------------------------------
  |
  | Each helper function will provide some useful functionality
  |
 */

namespace App\Libraries\Helpers;

class Helper
{

    /**
     * This function will format the message accorind to the type
     * types will be as : info,error,success.
     *
     */
    static public function formatMessage($message, $type)
    {
        return '<p class="alert alert-' . $type . '">
                  <a href="#" class="close" data-dismiss="alert">&times;</a>
              <strong>' . ucfirst($type) . '!</strong> ' . $message . '</p>';
    }
    
    /**
     * Encryoting provided string
     * 
     * @param string $plainText
     * @param string $key
     * @return string
     */
    static public function encrypt($plainText, $key)
    {
        $secretKey = self::hextobin(md5($key));
        $initVector = pack("C*", 0x00, 0x01, 0x02, 0x03, 0x04, 0x05, 0x06, 0x07, 0x08, 0x09, 0x0a, 0x0b, 0x0c, 0x0d, 0x0e, 0x0f);
        $openMode = mcrypt_module_open(MCRYPT_RIJNDAEL_128, '', 'cbc', '');
        $blockSize = mcrypt_get_block_size(MCRYPT_RIJNDAEL_128, 'cbc');
        $plainPad = self::pkcs5_pad($plainText, $blockSize);
        if (mcrypt_generic_init($openMode, $secretKey, $initVector) != -1) {
            $encryptedText = mcrypt_generic($openMode, $plainPad);
            mcrypt_generic_deinit($openMode);
        }
        
        return bin2hex($encryptedText);
    }

    /**
     * Decrypting string 
     * 
     * @param string $encryptedText
     * @param string $key
     * @return string
     */
    static public function decrypt($encryptedText, $key)
    {
        $secretKey = self::hextobin(md5($key));
        $initVector = pack("C*", 0x00, 0x01, 0x02, 0x03, 0x04, 0x05, 0x06, 0x07, 0x08, 0x09, 0x0a, 0x0b, 0x0c, 0x0d, 0x0e, 0x0f);
        $encryptedText = self::hextobin($encryptedText);
        $openMode = mcrypt_module_open(MCRYPT_RIJNDAEL_128, '', 'cbc', '');
        mcrypt_generic_init($openMode, $secretKey, $initVector);
        $decryptedText = mdecrypt_generic($openMode, $encryptedText);
        $decryptedText = rtrim($decryptedText, "\0");
        mcrypt_generic_deinit($openMode);

        return $decryptedText;
    }

    /**
     * Padding string
     * 
     * @param string $plainText
     * @param string $blockSize
     * @return string
     */
    static public function pkcs5_pad($plainText, $blockSize)
    {
        $pad = $blockSize - (strlen($plainText) % $blockSize);

        return $plainText . str_repeat(chr($pad), $pad);
    }

    /**
     * Converting Hexadecimal to Binary for php 4.0 version
     * 
     * @param string $hexString
     * @return string
     */
    static public function hextobin($hexString)
    {
        $length = strlen($hexString);
        $binString = "";
        $count = 0;
        while ($count < $length) {
            $subString = substr($hexString, $count, 2);
            $packedString = pack("H*", $subString);
            if ($count == 0) {
                $binString = $packedString;
            } else {
                $binString.=$packedString;
            }

            $count+=2;
        }

        return $binString;
    }

}
