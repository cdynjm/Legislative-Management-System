<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Members extends Model
{
    use HasFactory;

    protected $table = 'members';

    protected $fillable = [
        'admin_id',
        'name',
        'birthdate',
        'address',
        'civil_status',
        'position',
        'gender',
        'status',
        'from_year',
        'to_year',
        'photo'
    ];

    public function User() {
        return $this->hasOne(User::class, 'userid', 'id');
    }
}
