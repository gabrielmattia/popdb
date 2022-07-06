<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MissionProcess extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'pop_mission_id',
        'constituent_process_id',
        'pop_id',
        'entry_date',
        'exit_date',
    ];

    public function popMission()
    {
        return $this->belongsTo('App\Models\PopMission', 'id', 'pop_mission_id');
    }
    
    public function constituentProcess()
    {
        return $this->hasOne('App\Models\ConstituentProcess', 'id','constituent_process_id');
    }

    public function pop()
    {
        return $this->hasOne('App\Models\Pop', 'id','pop_id');
    }
}
