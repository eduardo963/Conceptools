<?php
include_once '../Data.php';
include_once '../model/Usuario.php';
include_once '../dao/UsuarioDao.php';
/**
 * Created by PhpStorm.
 * User: Eduardo
 * Date: 28/09/2017
 * Time: 12:51
 */
class UsuarioController
{



    function encriptarSenha($Input) {
        // Convert the password from UTF8 to UTF16 (little endian)
        $Input=iconv('UTF-8','UTF-16LE',$Input);

        // You could use this instead, but mhash works on PHP 4 and 5 or above
        // The hash function only works on 5 or above
        $MD5Hash=hash('md5',$Input);

        // Make it uppercase, not necessary, but it's common to do so with NTLM hashes
        $HashCaixaAlta=strtoupper($MD5Hash);

        // Return the result
        return($HashCaixaAlta);
    }
}