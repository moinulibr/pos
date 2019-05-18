<?php

namespace App\Model\Employee;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{

    protected $fillable = [
        'name', 'email', 'phone','address','experience','photo','salary','vacation','city','status','user_roll',
    ];

}
