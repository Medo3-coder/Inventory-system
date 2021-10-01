<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'email',
        'phone',
        'address',
        'sallery',
        'photo',
        'nid',
        'joining_date',
    ];


    //return all employee

    public function getEmployee()
    {
        return Employee::all();
    }
}
