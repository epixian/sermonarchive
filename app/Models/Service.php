<?php

namespace App\Models;

use DateTime;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Query\Builder as QueryBuilder;
use Illuminate\Support\Carbon;

/**
 * Class Service
 * @package App\Models
 *
 * @property string $service_datetime
 * @property string $service_time
 * @property Carbon $service_datetime
 *
 * @property Sermon $sermon
 * @property Collection|Message[] $message
 *
 * @property static Builder|QueryBuilder withSermonInProgress()
 * @see Service::scopeWithSermonInProgress(Builder $query)
 *
 * @property static Builder|QueryBuilder withSermonUpcoming()
 * @see Service::scopeWithSermonUpcoming(Builder $query)
 *
 * @property static Builder|QueryBuilder withSermonRecent()
 * @see Service::scopeWithSermonRecent(Builder $query)
 *
 * @property static Builder|QueryBuilder upcoming()
 * @see Service::scopeupcoming(Builder $query)
 */
class Service extends Model
{
    use HasFactory;

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'service_datetime' => 'datetime',
    ];

    /**
     * Attributes to guard against mass assignment.
     *
     * @var array
     */
    protected $guarded = [];

    /**
     * Get chat messages related to the service.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function messages()
    {
        return $this->hasMany(Message::class);
    }

    /**
     * Get the sermon associated with this service.
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function sermon()
    {
        return $this->hasOne(Sermon::class);
    }

    /**
     * Get the public URL for the service.
     * @return string
     */
    public function path()
    {
        return '/services/' . $this->id;
    }

    /**
     * @param  Builder  $query
     * @return Builder
     */
    public function scopeWithSermon(Builder $query)
    {
        return $query->has('sermon');
    }

    /**
     * @param  Builder  $query
     * @return Builder
     */
    public function scopeWithSermonInProgress(Builder $query)
    {
        return $query->withSermon()
            ->whereHas('sermon', function ($sermon) {
                return $sermon->inProgress();
            });
    }

    /**
     * @param  Builder  $query
     * @return Builder
     */
    public function scopeUpcoming(Builder $query)
    {
        return $query
            ->where('service_date', '>=', Carbon::now()->subHours(2))
            ->where('service_date', '<=', Carbon::now()->addDays(2))
            ->oldest('service_datetime');
    }

    /**
     * @param  Builder  $query
     * @return Builder
     */
    public function scopeRecent(Builder $query)
    {
        return $query
            ->where('service_date', '>=', Carbon::now()->subDays(8))
            ->where('service_date', '<=', Carbon::now()->addHours(6))
            ->latest('service_datetime');
    }

    /**
     * Get the live service.
     *
     * @return Service
     */
    public static function getLiveService()
    {
        if ($service = Service::withSermonInProgress()->recent()->limit(1)->first()) {
            return $service;
        }

        if ($service = Service::withSermon()->upcoming()->limit(1)->first()) {
            return $service;
        }

        if ($service = Service::withSermon()->recent()->limit(1)->first()) {
            return $service;
        }

        return Service::upcoming()
            ->limit(1)
            ->orderBy('service_date', 'asc')
            ->orderBy('created_at', 'asc')
            ->first();
    }
}
