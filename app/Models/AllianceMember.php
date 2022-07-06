<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class AllianceMember extends Model
{
    use HasFactory;

    protected $fillable = [

        'cnpj',
        'name',
        'zip_code',
        'street',
        'number',
        'neighborhood',
        'city',
        'state',
        'country',
        'site',
        'category_id',
        'user_id',
       
    ];
    
    public function category()
    {
        return $this->hasOne('App\Models\Category', 'id', 'category_id');
    }

    public function users()
    {
        $result = $this->hasOne('App\Models\User', 'id', 'user_id');
        return $result;
    }

}
