<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OthersModel extends Model
{
    public $table = 'others';
    public $primaryKey = 'id';
    public $incrementing = true;
    public $keyType = 'int';
    public  $timestamps = false;
}
