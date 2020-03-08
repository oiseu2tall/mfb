<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
	protected $fillable=['first_name', 'middle_name', 'surname', 'aka', 'dateOfBirth', 'address', 'group_id', 'phone', 'email', 'guarantor_name', 'guarantor_address', 'guarantor_phone','image_name','group_leader','card_number', 'group_id'];
    public function group()
	{
    return $this->belongsTo(Group::class);
	}

	public function credits()
    {
    	return $this->hasMany(Credit::class);
    }

    public function repayments()
    {
    	return $this->hasMany(Repayment::class);
    }
    
}
