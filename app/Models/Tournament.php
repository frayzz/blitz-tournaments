<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tournament extends Model
{
    use HasFactory;

    public function creator()
    {
        return $this->belongsTo(User::class, 'creator_id');
    }

    /**
     * Получить оппонента в турнире.
     */
    public function opponent()
    {
        return $this->belongsTo(User::class, 'opponent_id');
    }
}
