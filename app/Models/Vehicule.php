<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vehicule extends Model
{
    use HasFactory;
    protected $table = "vehicules";
    protected $fillable = [
        "id","marque","model","typeCarburant","immatriculation","photos","client_id"
    ];
    public function client() {
        return $this->hasOne(Client::class);
    }
    public function repairs()
    {
        return $this->hasMany(Reparation::class);
    }
}
