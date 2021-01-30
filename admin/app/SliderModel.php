<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SliderModel extends Model
{
    public $table = 'slider';
    public $primaryKey = 'id';
    public $incrementing = true;
    public $keyType = 'int';
    public  $timestamps = false;
}
