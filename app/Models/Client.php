<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    use HasFactory;
    protected $fillable = ['created_at', 'updated_at', 'name', 'rut','contact','status'];
    public function certificates()
    {
        return $this->hasMany('App\Models\Certificate');
    }
    public function boats()
    {
        return $this->hasMany('App\Models\Boat');
    }

}
