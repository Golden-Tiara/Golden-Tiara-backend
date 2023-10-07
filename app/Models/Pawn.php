<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Pawn extends Model
{
    use HasFactory;

    public function user(): BelongsTo {
        return $this->belongsTo(User::class);
    }

    public function examination(): BelongsTo {
        return $this->belongsTo(Examination::class);
    }

    public function golds(): HasMany {
        return $this->hasMany(Comment::class);
    }

    public function transactions(): HasMany {
        return $this->hasMany(Transaction::class);
    }
}
