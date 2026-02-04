<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Task extends Model
{
    use HasFactory;

    protected $table = 'tasks';

    protected $fillable = [
        'user_id',
        'project_id',
        'title',
        'description',
        'completed',
    ];

    public function User(): BelongsTo {
        return $this->belongsTo(User::class);
    }
}
