<?php

namespace App;

class Common
{
    public static function getFileContent($fileName)
    {
        echo file_get_contents($fileName);
    }
}