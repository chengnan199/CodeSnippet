<?php

$dir = '/Users/chengnan/code/php/test/1010';
$mvDir = '/Users/chengnan/code/php/test/999';
merge($dir,$mvDir);
/**
 * @param $dir string 要移动的文件目录
 * @param $mvDir string 移动到
 * @param $ordDir string 要移动的文件原始目录（默认与$dir一致）
 * @return void
 */
function merge($dir,$mvDir,$ordDir=''){
    $ordDir = $ordDir?:$dir;
    $files = scandir($dir);
    foreach ($files as $k=>$v){
        if ($v[0] !== '.'){
            $tmpDir = $dir.'/'.$v;
            if (is_dir($tmpDir)){
                merge($tmpDir,$mvDir,$ordDir);
            }else{
                $diff = str_replace($ordDir,'',$dir);
                $fStr = '';
                if ($diff){
                    foreach (explode('/',$diff) as $kk=>$vv){
                        if (!$vv || ($vv === '')) continue;
                        $fStr .= '_'.$vv;
                    }
                }
                $fName = preg_replace('/(.*)(\..*)$/','$1'.$fStr.'$2',$v);
                copy($tmpDir,$mvDir.'/'.$fName);
            }

        }
    }
}
