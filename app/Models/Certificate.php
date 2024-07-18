<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Certificate extends Model
{
    use HasFactory;
    protected $fillable = ['created_at', 'updated_at', 'date','preventive','corrective','maritime','client_id','place_id','boat_id','user_id','clean','Cnumber','origen',
    'desinfection','observations','productdesinfection_id','productclean_id','entrytime','finishtime','status','pay','motive','destiny'];
    public function product()
    {
        return $this->belongsTo(Product::class);
    }
    public function client()
    {
        return $this->belongsTo(Client::class);
    }
    public function place()
    {
        return $this->belongsTo(Place::class);
    }
    public function boat()
    {
        return $this->belongsTo(Boat::class);
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    protected static function boot()
    {
        parent::boot();

        self::creating(function ($model) {
            $lastCert = self::orderBy('id', 'desc')->first();
            $lastCertNum = $lastCert ? $lastCert->Cnumber : 100000;
            $model->Cnumber = $lastCertNum + 1;
        });
    }
    public function productclean(){
        return $this->belongsTo(Productclean::class);
    }
    public function productdesinfection(){
        return $this->belongsTo(Productdesinfection::class);
    }
}
