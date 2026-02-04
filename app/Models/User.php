<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasFactory, Notifiable, HasApiTokens;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'google_id',
        'provider',
        'avatar'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    public function projects(): HasMany{
        return $this->hasMany(Project::class)
                    ->orderByRaw("CASE WHEN status = 2 THEN 1 ELSE 0 END, deadline IS NULL, deadline ASC")
                    ->orderBy('deadline', 'ASC')
                    ->orderByRaw("CASE 
                        WHEN status = 0 THEN 1
                        WHEN status = 1 THEN 2
                        WHEN status = 2 THEN 3
                        WHEN status = 3 THEN 4
                        ELSE 5
                    END");
    }

    public function tasks(): HasMany {
        return $this->hasMany(Task::class);
    }
}
