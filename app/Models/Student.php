<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;

    protected $table = 'students';

    protected $fillable = ['name', 'address', 'phone', 'email', 'birth_date', 'city_id'];

    public function city()
    {
        return $this->belongsTo(City::class);
    }
}
