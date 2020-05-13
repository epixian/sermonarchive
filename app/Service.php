<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    /**
     * Attributes to guard against mass assignment.
     *
     * @var array
     */
    protected $guarded = [];

    /**
     * Get the items associated with this service.
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function sermons()
    {
        return $this->hasMany(Sermon::class);
    }
}
