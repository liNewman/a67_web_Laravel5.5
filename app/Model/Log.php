<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Log extends Model
{
    //指定表名
    protected $table='log';
    public $timestamps = false;
}
