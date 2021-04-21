<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Speaker extends Model
{
    use HasFactory;

    /**
     * Attributes to add to JSON results.
     *
     * @var array
     */
    protected $appends = ['full_name'];

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

    /**
     * Accessor for name
     * @return string
     */
    public function getFullNameAttribute()
    {
        return $this->first_name . ' ' . $this->last_name;
    }

    /**
     * Get the public URL for the sermon.
     *
     * @return string
     */
    public function path()
    {
        return '/speakers/' . $this->id;
    }
}
