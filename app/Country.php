<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    //The table associated with the model.
    protected $table = 'countries';

    //The columns associated with the model.
    protected $primaryKey = 'code';
    
    protected $fillable = [
        'name'
    ];
}
