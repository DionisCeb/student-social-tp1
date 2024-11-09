<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',
        'content',
        'publication_date',
        'student_id',
    ];

    public function student()
    {
        return $this->belongsTo(Student::class);
    }
}
