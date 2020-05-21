<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Holiday extends Model
{
    //The table associated with the model.
    protected $table = 'holidays';

    //The columns associated with the model.
    protected $primaryKey = 'id';
    
    protected $fillable = [
        'name',
        'date',
        'country_code'
    ];
}
