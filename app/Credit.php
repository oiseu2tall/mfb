<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Credit extends Model
{		
	protected $fillable=['start_date', 'end_date', 'customer_id', 'loan_id'];

    public function customer()
	{
    return $this->belongsTo(Customer::class);
	}

	public function loan()
	{
    return $this->belongsTo(Loan::class);
	}
}
