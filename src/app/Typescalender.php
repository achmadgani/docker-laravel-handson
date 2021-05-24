<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Typescalender extends Model
{
    protected $fillable = [
        'type_id',
        'name',
        'value1',
        'value1_name',
        'value2',
        'value2_name',
        'value3',
        'value3_name',
        'value4',
        'value4_name',
        'value5',
        'value5_name'
     ];

     protected $table = 'types_calender';
     protected $primaryKey = 'type_id';
}
