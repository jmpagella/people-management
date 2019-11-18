<?php

namespace jmpagella\PeopleManagement\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Config;

class PeopleAttributeType extends Model
{
    public $timestamps = false;
    protected $guarded = ['id'];
    protected $table;

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

    public function __construct( array $attributes = [ ] )
    {
        parent::__construct( $attributes );
        $this->table = Config::get( 'people.tables.attribute_types' );
    }
}
