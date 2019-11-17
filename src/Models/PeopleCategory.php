<?php

namespace jmpagella\PeopleManagement\Models;

use Illuminate\Database\Eloquent\Model;

class PeopleCategory extends Model
{
    public $timestamps = false;
    protected $guarded = ['id'];

    public function people()
    {
        return $this->belongsToMany(People::class, 'people_people_categories')->withTimestamps();
    }
}
