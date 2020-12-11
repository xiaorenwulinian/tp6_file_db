<?php
// 应用公共文件

if (!function_exists('failed')) {

    function failed($message = 'error', $code = 1, $data = [])
    {
        $ret = [
            'code'    => $code,
            'message' => $message,
            'data'    => $data,

        ];
        return json($ret);
    }
}

if (!function_exists('successed')) {

    function successed( $data = [], $message = 'success', $code = 0)
    {
        $ret = [
            'code'    => $code,
            'message' => $message,
            'data'    => $data,

        ];
        return json($ret);
    }
}

