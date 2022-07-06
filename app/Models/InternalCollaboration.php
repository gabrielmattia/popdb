<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InternalCollaboration extends Model
{
    use HasFactory;

    protected $fillable = [
       
        'alliance_member_id',
        'business_alliance_id',
        'entry_date',
        'exit_date',
        'relationship'
    ];

    public function allianceMember()
    {
        return $this->belongsTo('App\Models\AllianceMember', 'alliance_member_id', 'id');
    }
    
    public function businessAlliance()
    {
        return $this->belongsTo('App\Models\BusinessAlliance', 'id','business_alliance_id');
    }
}
