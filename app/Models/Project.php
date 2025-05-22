<?php

namespace App\Models;

use App\Traits\DateTrait;
use Carbon\Carbon;
use DateTime;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use PhpParser\Node\Expr\Cast\Bool_;
use Ramsey\Uuid\Type\Integer;
use SebastianBergmann\Diff\Diff;

class Project extends Model
{
    use HasFactory;     
    use DateTrait;

    protected $fillable = [
        'user_id',
        'title',
        'description',
        'start',
        'deadline',
        'status',
        'play_at',
        'accrued_time'
    ];

    private $status_code = [
        0 => 'in progressing',
        1 => 'on pause',
        2 => 'done',
        3 => 'abandoned'
    ];

    public function User(): BelongsTo {
        return $this->belongsTo(User::class);
    }

    public function Tasks(): HasMany {
        return $this->hasMany(Task::class);
    }

    public function getStatus(): String {
        return $this->status_code[$this->status];
    }

    /**
     * Duration since start date
     */
    public function durationStart(): String {
        $date_curr = new DateTime();
        $duration = $date_curr->diff(new DateTime($this->start));
        
        return $duration->days;
    }

    /**
     * Duration betwen play and pause
     */
    public function duration(): String {
        $date_curr = new DateTime();
        $duration = $date_curr->diff(new DateTime($this->play_at));

        if ($duration->days === 0) {
            $time = Carbon::parse($this->play_at)->diffInHours(Carbon::now());

            return (($time > 0) ? explode('.', $time)[0] : 0) . " hours" ;
        } else 
            return $duration->days. " days";
    }

    /**
     * time duration betwen play and pause
     */
    public function accruedTime(): int {
        $time = Carbon::parse($this->play_at)->diffInSeconds(Carbon::now());

        return (($time > 0) ? explode('.', $time)[0] : 0);
    }

    public function getAccruedTime(): string {
        return $this->getDateOfSeconds($this->accrued_time);
    }

    public function deadline(): Array | null{
        if ($this->deadline !== null) {
            $date_curr = new DateTime();
            $deadline = $date_curr->diff(new DateTime($this->deadline));
            
            // return true if deadline is expired
            return [
                'expired' => $deadline->invert === 1,
                'days' =>$deadline->days
            ];
        }

        return null;
    }

    public function isDone() : Bool {
        return $this->status === 2;
    }

    public function isAbondoned() : Bool {
        return $this->status === 3;
    }

    public function scopeFilterByStatus(Builder $query, int $status, int $user_id): void {
        $query->where('status', '=', $status)
                ->where('user_id', '=', $user_id);
    }
}
