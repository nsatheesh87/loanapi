<?php

namespace App;

use Illuminate\Auth\Authenticatable;
use Laravel\Lumen\Auth\Authorizable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\Access\Authorizable as AuthorizableContract;

class Loan extends Model
{

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'loan';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'customerId','title','amount', 'duration','repayment_frequency','interest_rate', 'arrangement_fee','install_amount','status'
    ];
}
