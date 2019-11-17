<?php

namespace jmpagella\PeopleManagement\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class People extends Model
{
    use SoftDeletes;
    protected $guarded = ['id'];

    public function categories()
    {
        return $this->belongsToMany(PeopleCategory::class, 'people_people_categories')->withTimestamps();
    }
    public function telephones()
    {
        return $this->hasMany(PeopleTelephone::class);
    }
    public function emails()
    {
        return $this->hasMany(PeopleEmail::class);
    }
    public function addresses()
    {
        return $this->hasMany(PeopleAddress::class);
    }
    public function notes()
    {
        return $this->hasMany(PeopleNote::class);
    }
}
