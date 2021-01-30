<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class orderModel extends Model
{
    public $table = 'orders';
    public $primaryKey = 'id';
    public $incrementing = true;
    public $keyType = 'int';
    public  $timestamps = false;
}
