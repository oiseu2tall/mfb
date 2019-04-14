<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Group extends Model
{

	protected $fillable=['name', 'venue', 'meeting_day'];
    public function customers()
    {
    	return $this->hasMany(Customer::class);
    }
}
