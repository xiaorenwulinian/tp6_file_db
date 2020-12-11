<?php
declare (strict_types = 1);

namespace app\controller\cxjdb;

use app\common\cxjdb\lib\DbLib;
use think\helper\Str;
use think\Request;
use function Composer\Autoload\includeFile;

class Table
{
    /**
     * 显示资源列表
     *
     * @return \think\Response
     */
    public function index()
    {
        $databaseName = 'cxj';
        $databasePath = DbLib::getDatabaseFile($databaseName);
        if (!file_exists($databasePath)) {
            return failed('该数据库不存在');
        }

        $arr = $tableNameArr = require_once $databasePath;
        /*$arr = [
            'user',
            'order',
            'category',
        ];*/
        $data = [];
        foreach ($arr as $k => $v) {
            $data[] = [
                'id'            => $k+1,
                'table_mame'    => $v,
                'database_name' => $databaseName,
            ];
        }
        $ret = [
            'data' => $data
        ];
        return \view('cxjdb/table/index', $ret);
    }

    public function add()
    {
        $database = [
            'cxj' => 'cxj'
        ];
        $ret = [
            'database' => $database
        ];
        return view('', $ret);
    }

    public function addStore()
    {

        $params = \request()->param();

        $addTableName = $params['table_name'] ?? 'order';    // 表名
        $databaseName = $params['database_name'];   // 数据库名称 ，默认库 cxj

        if (empty($databaseName)) {
            return failed("数据库不存在11");
        }

//        $cxjdbPath = DbLib::getCxjdbDirPath();

//        $dbTemplateDirPath = DbLib::getTemplateDirPath();

//        $tableTemplatePath = $dbTemplateDirPath . '/TableTemplate.php';
//        $table_te = require_once $tableTemplatePath;

        // 创建数据表

        $databasePath = DbLib::getDatabaseFile($databaseName);
        if (!file_exists($databasePath)) {
            return failed('该数据库不存在');
        }

        $tableNameArr = require_once $databasePath;

        $commonTemplateFile = DbLib::getTemplateFile('common');

        $fileContent = file_get_contents($commonTemplateFile);


        if (in_array($addTableName, $tableNameArr)) {
            return failed("数据表已存在，不能重复添加");
        }

        array_push($tableNameArr, $addTableName);

        $tableNameStr = "";
        foreach ($tableNameArr as $v) {
            $tableNameStr .= "'" . $v . "'," . "\r\n";
        }

        $newContent = sprintf($fileContent,  $tableNameStr);

        file_put_contents($databasePath, $newContent);

        return successed();


    }



}
