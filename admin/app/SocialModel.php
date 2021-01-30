<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SocialModel extends Model
{
    public $table = 'social';
    public $primaryKey = 'id';
    public $incrementing = true;
    public $keyType = 'int';
    public  $timestamps = false;
}
