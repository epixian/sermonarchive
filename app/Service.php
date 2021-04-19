<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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
     * Get the items associated with this service.
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function sermons()
    {
        return $this->hasMany(Sermon::class);
    }

    /**
     * Get the public URL for the service.
     * @return string
     */
    public function path()
    {
        return '/admin/services/' . $this->id;
    }
}
