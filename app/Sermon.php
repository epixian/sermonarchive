<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

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
     * Attributes to guard against mass assignment.
     *
     * @var array
     */
    protected $guarded = [];

    /**
     * Get the service this sermon belongs to.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function service()
    {
        return $this->belongsTo(Service::class);
    }

    /**
     * Get the speaker who gave this sermon.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
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
        return [
            'stream_started' => $this->stream_started,
            'stream_ended' => $this->stream_ended,
            'recording_done' => $this->recording_done,
        ];
    }

    /**
     * Returns a combined datetime attribute in Carbon format.
     *
     * @return string
     */
    public function getScheduledForAttribute()
    {
        return Carbon::parse($this->publish_date, env('TIMEZONE', 'America/New_York'))->setTimeFromTimeString($this->scheduled_time);
    }
}
