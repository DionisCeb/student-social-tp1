<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    use HasFactory;

    protected $fillable = ['student_id', 'publication_date'];

    public function translations()
    {
        return $this->hasMany(ArticleTranslation::class);
    }

    public function translation($language = 'en')
    {
        return $this->translations()->where('language', $language)->first();
    }
}
