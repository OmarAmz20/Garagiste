<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reparation extends Model
{
    use HasFactory;
    protected $fillable = [
        "description", "statut", "date_debut", "date_fin", "notes_mecanicien", "notes_client", "id_mecanicien", "id_vehicule"
    ];
    public function mechanic()
    {
        return $this->belongsTo(User::class);
    }
    public function vehicule()
    {
        return $this->belongsTo(Vehicule::class,"id_vehicule");
    }
    public function facture()
    {
        return $this->hasOne(Vehicule::class);
    }
}
