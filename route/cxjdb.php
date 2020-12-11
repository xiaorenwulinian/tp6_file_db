<?php
// +----------------------------------------------------------------------
// | ThinkPHP [ WE CAN DO IT JUST THINK ]
// +----------------------------------------------------------------------
// | Copyright (c) 2006~2018 http://thinkphp.cn All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: liu21st <liu21st@gmail.com>
// +----------------------------------------------------------------------
use think\facade\Route;

Route::get('think', function () {
    return 'hello,ThinkPHP6!';
});
Route::group('cxjdb', function () {
    Route::get('', 'cxjdb.index/index');

    Route::group('index', function (){
        Route::get('', 'cxjdb.index/index');
        Route::get('index', 'cxjdb.index/index');
        Route::get('top', 'cxjdb.index/index');
        Route::get('menu', 'cxjdb.index/menu');
        Route::get('content', 'cxjdb.index/content');
    });

    Route::group('database', function (){
        Route::get('index', 'cxjdb.database/index');
        Route::get('add', 'cxjdb.database/add');
        Route::post('addStore', 'cxjdb.database/addStore');
        Route::get('edit', 'cxjdb.database/edit');
        Route::post('editStore', 'cxjdb.database/editStore');
        Route::post('delete', 'cxjdb.database/delete');

    });

    Route::group('table', function (){
        Route::get('index', 'cxjdb.table/index');
        Route::get('add', 'cxjdb.table/add');
        Route::post('addStore', 'cxjdb.table/addStore');
        Route::get('edit', 'cxjdb.table/edit');
        Route::post('editStore', 'cxjdb.table/editStore');
        Route::post('delete', 'cxjdb.table/delete');

    });

    Route::group('field', function (){
        Route::get('index', 'cxjdb.field/index');
        Route::get('add', 'cxjdb.field/add');
        Route::post('addStore', 'cxjdb.field/addStore');
        Route::get('edit', 'cxjdb.field/edit');
        Route::post('editStore', 'cxjdb.field/editStore');
        Route::post('delete', 'cxjdb.field/delete');

    });


})->middleware([think\middleware\SessionInit::class]);;

