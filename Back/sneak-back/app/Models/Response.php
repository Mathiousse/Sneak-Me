<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Response extends Model
{
    use HasFactory;

    protected $fillable = [
        'message',
        'type',
    ];

    protected $attributes = [
        'name' => 'Nom de la réponse',
    ];

     /**
     * Get the keywords for the message.
     */
    public function keywords(): HasMany
    {
        return $this->hasMany(Keyword::class);
    }
}