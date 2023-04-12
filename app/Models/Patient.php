<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Patient extends Model
{
    use HasFactory;

    protected $fillable = [
        'nom',
        'prenom',
        'age',
        'telephone',
        'profession',
        'adresse',
        'date',
        'dent',
        'traitement',
    ];

    public function user()
{
    return $this->belongsTo(User::class);
    
}

}
