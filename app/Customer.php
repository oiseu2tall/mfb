<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
	protected $fillable=['first_name', 'surname', 'dateOfBirth', 'address', 'group_id', 'phone', 'email', 'group_id'];
    public function group()
	{
    return $this->belongsTo(Group::class);
	}

}
