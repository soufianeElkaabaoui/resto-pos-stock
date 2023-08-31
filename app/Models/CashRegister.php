<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class cashRegister extends Model
{
    use HasFactory, softDeletes;

    protected $fillable = [
        'register_type',
    ];

    public function orders(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
