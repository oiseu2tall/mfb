<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Repayment extends Model
{
    protected $fillable=['installment', 'payment_date', 'savings', 'extra_savings', 'customer_id', 'loan_id', 'credit_id'];
    
 public function customer()
	{
    return $this->belongsTo(Customer::class);
	}

	public function loan()
	{
    return $this->belongsTo(Loan::class);
	}

	public function credit()
	{
    return $this->belongsTo(Credit::class);
	}


}
