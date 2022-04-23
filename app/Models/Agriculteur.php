<?php

namespace App\Models;
use App\Models\Parcelle;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Agriculteur extends Model
{
    use HasFactory;
    protected $fillable=[
        'Agr_Nom',
        'Agr_Prn',
        'Agr_Resid',
    ];
    public function parcelle(){
        return $this->belongsTo(Parcelle::class);
    }
}
