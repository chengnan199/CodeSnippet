<?php
use Illuminate\Support\Facades\DB;

DB::connection()->enableQueryLog();#开启执行日志

// 具体orm语句
//Model::select('*')->get();

$sqlObj = DB::getQueryLog();
var_dump($sqlObj);