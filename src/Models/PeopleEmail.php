<?php

namespace jmpagella\PeopleManagement\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Config;

class PeopleEmail extends Model
{
    protected $guarded = ['id'];
    protected $table;

    public function people()
    {
        return $this->belongsTo(People::class);
    }
    public function attributeType()
    {
        return $this->belongsTo(PeopleAttributeType::class);
    }

    public function __construct( array $attributes = [ ] )
    {
        parent::__construct( $attributes );
        $this->table = Config::get( 'people.tables.emails' );
    }
}
