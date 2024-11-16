<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class File extends Model
{
    use HasFactory;

    protected $fillable = ['student_id', 'title', 'upload_date', 'file_path'];

    public function student()
    {
        return $this->belongsTo(Student::class);
    }
}

