<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

use Illuminate\Database\Eloquent\Attributes\Scope;
use Illuminate\Database\Eloquent\Builder;

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
        'created_date'
    ];

    public function User(): BelongsTo {
        return $this->belongsTo(User::class);
    }

    public function scopeDaily($query)
    {
        return $query->where('created_date', now()->toDateString());
    }

    public function scopeCompleted($query){
        return $query->where('completed', true)
                    ->where('created_date', now()->toDateString());
    }

    public function scopeToDo($query){
        return $query->where('completed', false)
                    ->where('created_date', now()->toDateString());
    }

}
