<?php

namespace jmpagella\PeopleManagement\Models;

use Illuminate\Database\Eloquent\Model;

class PeopleTelephone extends Model
{
    protected $guarded = ['id'];

    public function people()
    {
        return $this->belongsTo(People::class);
    }
    public function attributeType()
    {
        return $this->belongsTo(PeopleAttributeType::class);
    }
}
