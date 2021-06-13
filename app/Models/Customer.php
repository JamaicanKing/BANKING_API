<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;

      /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = 

    [
        'firstname',
        'lastname',
        'email',
        'address',
        'trn_number',
        'id_type',
        'id_number',
        'password',
        'created_at',
        'created_by',
        'updated_by',
    ];



        
}
