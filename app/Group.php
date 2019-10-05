<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Group extends Model
{

	protected $fillable=['name', 'venue', 'meeting_day', 'user_id'];
    public function customers()
    {
    	return $this->hasMany(Customer::class);
    }

    public function user()
	{
    return $this->belongsTo(User::class);
	}
}
