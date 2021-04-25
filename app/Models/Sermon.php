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
 * @method static Builder|Sermon[] inProgress()
 * @see Sermon::scopeInProgress()
 */
class Sermon extends Model
{
    use HasFactory;

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
     * Whether the sermon is currently live.
     *
     * @return bool
     */
    public function getIsLiveAttribute()
    {
        return $this->getStatus() === 'streaming';
    }

    /**
     * @param  Builder  $query
     * @return Builder
     */
    public function scopeInProgress(Builder $query)
    {
        return $query->where([
                'stream_started' => true,
                'stream_ended' => false,
                'recording_done' => false,
            ]);
    }
}
