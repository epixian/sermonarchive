<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Query\Builder as QueryBuilder;
use Illuminate\Support\Carbon;

/**
 * Class Service
 * @package App\Models
 *
 * @property Carbon $scheduled_datetime
 *
 * @property Sermon $sermon
 * @property Collection|Message[] $message
 *
 * @property static Builder|QueryBuilder withSermonsInProgress()
 * @see Service::scopeWithSermonsInProgress(Builder $query)
 *
 * @property static Builder|QueryBuilder withUpcomingSermons()
 * @see Service::scopeWithUpcomingSermons(Builder $query)
 *
 * @property static Builder|QueryBuilder upcoming()
 * @see Service::scopeupcoming(Builder $query)
 */
class Service extends Model
{
    use HasFactory;

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
    public function scopeWithSermonsInProgress(Builder $query)
    {
        return $query->whereHas('sermon', function ($sermon) {
                return $sermon->inProgress();
            });
    }

    /**
     * @param  Builder  $query
     * @return Builder
     */
    public function scopeWithUpcomingSermons(Builder $query)
    {
        return $query->whereHas('sermon', function ($sermon) {
                return $sermon->upcoming();
            });
    }

    /**
     * @param  Builder  $query
     * @return Builder
     */
    public function scopeWithRecentSermons(Builder $query)
    {
        return $query->whereHas('sermon', function ($sermon) {
                return $sermon->recent();
            });
    }

    /**
     * @param  Builder  $query
     * @return Builder
     */
    public function scopeUpcoming(Builder $query)
    {
        return $query->whereBetween('service_date', [
                Carbon::now()->setTimezone(config('sermonarchive.event_timezone')),
                Carbon::now()->addDays(2)->setTimezone(config('sermonarchive.event_timezone')),
            ]);
    }

    /**
     * Get the live service.
     *
     * @return Service
     */
    public static function getLiveService()
    {
        if ($service = Service::withSermonsInProgress()->limit(1)->first()) {
            return $service;
        }

        if ($service = Service::withUpcomingSermons()->limit(1)->first()) {
            return $service;
        }

        if ($service = Service::withRecentSermons()->limit(1)->first()) {
            return $service;
        }

        return Service::upcoming()
            ->limit(1)
            ->orderBy('service_date', 'asc')
            ->orderBy('created_at', 'asc')
            ->first();
    }
}
