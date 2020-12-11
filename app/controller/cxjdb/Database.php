<?php
declare (strict_types = 1);

namespace app\controller\cxjdb;

use think\helper\Str;
use think\Request;
use function Composer\Autoload\includeFile;

class Database
{
    /**
     * 显示资源列表
     *
     * @return \think\Response
     */
    public function index()
    {
        $arr = [
            'user',
            'order',
            'category',
        ];
        $data = [];
        foreach ($arr as $k => $v) {
            $data[] = [
                'id' => $k+1,
                'title' => $v,
            ];
        }
        $ret = [
            'data' => $data
        ];
        return \view('cxjdb/database/index', $ret);
    }

    public function add()
    {
        return view();
    }

    public function addStore()
    {

        $addTableName = \request()->param('table_name', 'order');

        $cxjdbPath = root_path() . "app/common/cxjdb";

        $dbTemplatePath = $cxjdbPath . '/dbtemplate';

        $tableTemplatePath = $dbTemplatePath . '/TableTemplate.php';
        $table_te = require_once $tableTemplatePath;

        // 创建数据表
        // 1选择数据库 ，默认库 cxj
        $databaseName = 'cxj';

        $databaseFile = ucfirst(strtolower($databaseName)) . '.php';
        $databasePath = $cxjdbPath . "/database/{$databaseFile}";

        $tableNameArr = require_once $databasePath;

        $commonTemplateFile = $cxjdbPath . "/dbtemplate/CommonTemplate.txt";
        $fileContent = file_get_contents($commonTemplateFile);



        if (in_array($addTableName, $tableNameArr)) {
            return "数据表已存在，不能重复添加";
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
