<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Speaker extends Model
{
    /**
     * Attributes to guard against mass assignment.
     *
     * @var array
     */
    protected $guarded = [];

    /**
     * Get the sermons this speaker has given.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function sermons()
    {
        return $this->hasMany(Sermon::class);
    }
}
