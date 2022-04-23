<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Agriculteur;

class Parcelle extends Model
{
    use HasFactory;
    protected $fillable=[
        'Par_Nom',
        'Par_Lieu',
        'Par_Superficie',
        'agriculteur_id'
    ];
    public function agriculteurs(){
        return $this->hasMany(Agriculteur::class);
    }
    public function employes()
    {
        return $this->hasMany(Employe::class, 'Int_Emp_Nss');
    }
}
