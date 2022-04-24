<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Intervention extends Model
{
    use HasFactory;
    protected $primaryKey = ['Int_Debut','Int_Emp_Nss','Int_Par_Id'];
    public $incrementing = false;


    protected $fillable = [
        'Int_Debut',
        'Int_Emp_Nss',
        'Int_Par_Id',
        'Int_Nb_Jours',
    ];
}
