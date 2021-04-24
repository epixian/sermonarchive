<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

/**
 * Sermon class
 * @package App\Models
 *
 * @property Service $service
 * @property Speaker $speaker
 *
 * @property-read bool $is_live
 * @see Sermon::getIsLiveAttribute()
 *
 * @property-read array $scheduled_for
 * @see Sermon::getScheduledForAttribute()
 *
 * @method static Builder|Sermon[] inProgress()
 * @see Sermon::scopeInProgress()
 */
class Sermon extends Model
{
    use HasFactory;

    /**
     * Append these additional attributes to the model.
     *
     * @var array
     */
    protected $appends = ['scheduled_for'];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'stream_started' => 'boolean',
        'stream_ended' => 'boolean',
        'recording_done' => 'boolean',
        'is_live' => 'boolean',
    ];

    /**
     * Attributes to guard against mass assignment.
     *
     * @var array
     */
    protected $guarded = [];

    /**
     * Get the service this sermon belongs to.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function service()
    {
        return $this->belongsTo(Service::class);
    }

    /**
     * Get the speaker who gave this sermon.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function speaker()
    {
        return $this->belongsTo(Speaker::class);
    }

    /**
     * Get the public URL for the sermon.
     *
     * @return string
     */
    public function path()
    {
        return '/sermons/' . $this->id;
    }

    /**
     * Returns the stream status.
     *
     * @return string
     */
    public function getStatus()
    {
        if ($this->recording_done) {
            return 'recorded';
        }

        if ($this->stream_ended) {
            return 'processing';
        }

        if ($this->stream_started) {
            return 'streaming';
        }

        return 'waiting';
    }

    /**
     * Returns a combined datetime attribute in Carbon format.
     *
     * @return string
     */
    public function getScheduledForAttribute()
    {
        return Carbon::parse($this->publish_date, config('sermonarchive.event_timezone'))
            ->setTimeFromTimeString($this->scheduled_time);
    }

    /**
     * Whether the sermon is currently live.
     *
     * @return bool
     */
    public function getIsLiveAttribute()
    {
        return $this->stream_started && !$this->stream_ended;
    }

    /**
     * @param  Builder  $query
     * @return Builder
     */
    public function scopeInProgress(Builder $query)
    {
        return $query->where('stream_started', true)
            ->where('stream_ended', false);
    }
}
