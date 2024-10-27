<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Etudiant extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'address', 'phone', 'email', 'birth_date', 'ville_id'];

    public function ville()
    {
        return $this->belongsTo(Ville::class);
    }
}
