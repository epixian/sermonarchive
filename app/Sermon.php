<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sermon extends Model
{

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
}
