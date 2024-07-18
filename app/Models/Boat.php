<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Boat extends Model
{
    use HasFactory;
    protected $fillable = ['created_at', 'updated_at', 'boatname','matricule','status','client_id'];
    public function certificates()
    {
        return $this->hasMany('App\Models\Certificate');
    }
    public function clients()
    {
        return $this->hasMany('App\Models\Client');
    }

}
