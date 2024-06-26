<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    use HasFactory;

    protected $fillable = [
        "nom","prenom","addresse","telephone","user_id"
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function vehicules()
    {
        return $this->hasMany(Vehicule::class);
    }

}
