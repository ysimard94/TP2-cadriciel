<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'body',
        'user_id',
        'language_id'
    ];

    // Pour connecter l'information de la table de langues à la table des articles
    public function language()
    {
        return $this->belongsTo(Language::class);
    }
}
