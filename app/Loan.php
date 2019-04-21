<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Loan extends Model
{
    protected $fillable=['name', 'description', 'duration', 'principal', 'interest', 'total_savings', 'weekly_remittance', 'weekly_savings', 'interest_rate'];
}
