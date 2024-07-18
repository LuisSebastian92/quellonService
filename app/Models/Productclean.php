<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Productclean extends Model
{
    use HasFactory;
    protected $fillable = ['created_at', 'updated_at', 'name', 'desolution','status'];
    public function certificates()
    {
        return $this->hasMany('App\Models\Certificate');
    }
}
