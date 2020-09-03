<?php
class coderaes256{


    /**
     * 解密字符串
     * @param string $data 字符串
     * @param string $key 加密key
     * @return string
     */
    public static function Decrypt($data){
        $key = self::getKey();
        $iv=AES_IV;
        return openssl_decrypt(base64_decode($data),"AES-256-CBC",$key,OPENSSL_RAW_DATA,$iv);
    }

    /**
     * 加密字符串
     * @param string $data 字符串
     * @param string $key 加密key
     * @return string
     */
    public static function Encrypt($data){
        $key = self::getKey();
        $iv=AES_IV;
        return base64_encode(openssl_encrypt($data,"AES-256-CBC",$key,OPENSSL_RAW_DATA,$iv));
    }

    private static function getKey(){
        return  hash( 'sha256', AES_KEY  , true );
    }


}

?>