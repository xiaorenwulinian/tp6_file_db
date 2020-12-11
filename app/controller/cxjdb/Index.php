<?php
declare (strict_types = 1);

namespace app\controller\cxjdb;

use think\Request;

class Index
{
    /**
     * 显示资源列表
     *
     * @return \think\Response
     */
    public function index()
    {
        $ret = [];
        return \view('cxjdb/index/index');
    }

   /* public function menu()
    {
        return 'menu';
        return \view('chjdb/index/menu');
    }*/

    public function content()
    {
        return \view('cxjdb/index/content');

    }



}
