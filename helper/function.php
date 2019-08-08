<?php

function P($var)
{
    echo "<pre>";
    print_r($var);
    echo "</pre>";
}

function createCatalog()
{
    $path = 'uploads/' . date('Y-m-d') . '/';
    if (!\file_exists($path)) {
        $arr = explode('/', $path);
        if (!empty($arr)) {
            $path = '';
            foreach ($arr as $k => $v) {
                $path .= $v . '/';
                if (!file_exists($path)) {
                    mkdir($path, 0777);
                    chmod($path, 0777);
                }
            }
        }
    }
    return $path;
}

/**
 * 生成目录
 *
 * @param [type] $str
 *
 * @return void
 */
function createDir($str)
{
    $arr = explode('/', $str);
    if (!empty($arr)) {
        $path = '';
        foreach ($arr as $k => $v) {
            $path .= $v . '/';
            if (!file_exists($path)) {
                mkdir($path, 0777);
                chmod($path, 0777);
            }
        }
    }
}
