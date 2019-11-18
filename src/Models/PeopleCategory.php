<?php

namespace jmpagella\PeopleManagement\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Config;

class PeopleCategory extends Model
{
    public $timestamps = false;
    protected $guarded = ['id'];
    protected $table;

    public function people()
    {
        return $this->belongsToMany(People::class, Config::get('people.tables.people_categories'))->withTimestamps();
    }

    public function __construct( array $attributes = [ ] )
    {
        parent::__construct( $attributes );
        $this->table = Config::get( 'people.tables.categories' );
    }
}
