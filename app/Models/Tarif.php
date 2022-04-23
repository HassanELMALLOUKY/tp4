<?php

namespace App\Models;
use App\Models\Employe;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tarif extends Model
{
    use HasFactory;
    protected $primaryKey = 'Tar_Description';
    public $incrementing = false;
    protected $keyType = 'string';
    protected $fillable=[
        'Tar_Description',
        'Tar_Euro'
    ];
    public function employe(){
        return $this->belongsTo(Employe::class);
    }
}
