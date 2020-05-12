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
     * Get the user this sermon belongs to.
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Get the services this sermon belongs to.
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function service()
    {
        return $this->belongsTo(Service::class);
    }

    /**
     * Get the public URL for the sermon.
     * @return string
     */
    public function path()
    {
        return '/sermons/' . $this->id;
    }
}
