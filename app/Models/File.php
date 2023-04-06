<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class File extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'path',
        'language_id',
        'user_id'
    ];

    // Pour connecter l'information de la table de langues à la table des fichiers
    public function language()
    {
        return $this->belongsTo(Language::class);
    }
}
