<?php

namespace jmpagella\PeopleManagement\Models;

use Illuminate\Database\Eloquent\Model;

class PeopleAttributeType extends Model
{
    public $timestamps = false;
    protected $guarded = ['id'];

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
}
