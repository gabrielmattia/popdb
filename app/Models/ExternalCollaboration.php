<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ExternalCollaboration extends Model
{
    use HasFactory;

    protected $fillable = [

        'business_collaboration_main_id',
        'business_collaboration_partner_id',
        'entry_date',
        'exit_date',
        'relationship',
        'type_view_process' // puclic ou privado 
    ];

    public function businessCollaborationMain()
    {
        return $this->belongsTo('App\Models\BusinessAlliance', 'business_collaboration_main_id', 'id');
    }

    public function businessCollaborationPartner()
    {
        return $this->belongsTo('App\Models\BusinessAlliance', 'business_collaboration_partner_id', 'id');
    }
    
}
