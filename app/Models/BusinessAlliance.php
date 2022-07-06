<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use App\Models\Organization;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class BusinessAlliance extends Model
{

    use HasFactory;


    protected $fillable = [
       
        'name',
        'creation_date',
        'business_goal',
        'responsable_member_id',
        'user_id',
        'is_public',
    ];

    public function internalCollaborations()
    {
        $result = $this->hasMany('App\Models\InternalCollaboration', 'business_alliance_id', 'id');
        return $result;
    }
  
    public function externalCollaborations()
    {
        $result = $this->hasMany('App\Models\ExternalCollaboration', 'business_collaboration_main_id', 'id');
        return $result;
    }
    
    public function responsableMember()
    {
        $result =  $this->hasOne('App\Models\AllianceMember', 'id', 'responsable_member_id');
        return $result;
    }
    

    public function pops()
    {
        $result = $this->hasMany('App\Models\Pop', 'business_alliance_id', 'id');
        return $result;
    }

    public function users()
    {
        $result = $this->hasOne('App\Models\User', 'id', 'user_id');
        return $result;
    }
    
}
