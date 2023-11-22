<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Word extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'categorie_id',
        'is_daily_word',
        'is_weekly_word',
        'is_monthly_word'
    ];

    public function categorie() {
        return $this->belongsTo(Categorie::class);
    }
}
