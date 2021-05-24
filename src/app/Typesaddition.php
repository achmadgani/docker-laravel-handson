<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Typesaddition extends Model
{
    protected $fillable = [
        'name',
        'value_unit',
        'time_interval',
     ];

     protected $table = 'types_addtion';
     protected $primaryKey = 'type_id';
}
