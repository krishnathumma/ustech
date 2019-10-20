<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;

class Points extends Authenticatable
{
    protected $table = 'mt_points_tbl';
    protected $primaryKey = 'id';
    
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'team_id', 'points',
    ];

    public function Team()
    {
        return $this->hasOne(Team::class, 'team_id','team_id');
    }

    public function getTeam($id){
    	return $this->where('team_id', $id)->get();
    }

    public function updateData($id,$pts){
    	Points::where('team_id', $id)->update(['points' => $pts]);
    } 

}
