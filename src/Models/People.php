<?php

namespace jmpagella\PeopleManagement\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Config;

class People extends Model
{
    use SoftDeletes;

    protected $guarded = ['id'];
    protected $table;

    public function categories()
    {
        return $this->belongsToMany(PeopleCategory::class, Config::get('people.tables.people_categories'))->withTimestamps();
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

    public function __construct( array $attributes = [ ] )
    {
        parent::__construct( $attributes );
        $this->table = Config::get('people.tables.people');
    }
}
