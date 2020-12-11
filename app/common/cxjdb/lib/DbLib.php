<?php

namespace app\common\cxjdb\lib;

class DbLib
{
    public static function getCxjdbDirPath()
    {
        return root_path() . "app/common/cxjdb";
    }

    public static function getDatabaseDirPath()
    {
        $cxjdbPath = static::getCxjdbDirPath();
        return $cxjdbPath . '/database';
    }

    public static function getTemplateDirPath()
    {
        $cxjdbPath = static::getCxjdbDirPath();
        return $cxjdbPath . '/dbtemplate';
    }

    public static function getTemplateFile($name = 'table')
    {
        $dbTemplatePath = static::getTemplateDirPath();

        $databaseFile =  ucfirst(strtolower($name)) . "Template.txt";

        return $dbTemplatePath . "/{$databaseFile}";
    }

    public static function getDatabaseFile($databaseName = 'cxj')
    {
        $databaseFile = ucfirst(strtolower($databaseName)) . '.php';
        $databaseDirPath = static::getDatabaseDirPath();
        return $databaseDirPath . "/{$databaseFile}";
    }


}