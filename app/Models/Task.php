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

    public function scopeDaily(Builder $query)
    {
        return $query->where('created_date', now()->toDateString());
    }

    public function scopeDailyCompleted(Builder $query){
        return $query->where('completed', true)
                    ->where('created_date', now()->toDateString());
    }

    public function scopeDailyLate(Builder $query){
        return $query->where('completed', true)
                    ->where('created_date', now()->toDateString());
    }

    public function scopeCompleted(Builder $query){
        return $query->where('completed', true);
    }

    public function scopeLate(Builder $query){
        return $query->where('completed', false);
    }

    public function scopeDailyToDo(Builder $query){
        return $query->where('completed', false)
                    ->where('created_date', now()->toDateString());
    }

    public function scopeCompletedAtDayOfThisWeek(Builder $query, int $day){

        return $query->where('completed', true)->whereBetween('created_at', [
        now()->startOfWeek()->addDays($day)->startOfDay(),
        now()->startOfWeek()->addDays($day)->endOfDay(),
    ]);
    }
    public function scopeIncompletedAtDayOfThisWeek(Builder $query, int $day){

        return $query->where('completed', false)->whereBetween('created_at', [
        now()->startOfWeek()->addDays($day)->startOfDay(),
        now()->startOfWeek()->addDays($day)->endOfDay(),
    ]);
    }
}
