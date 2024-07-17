<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CoAuthors extends Model
{
    use HasFactory;

    protected $table = "coauthor";

    protected $fillable = [
        'fileid',
        'author'
    ];

    public function Author() {
        return $this->hasOne(Members::class, 'id', 'author');
    }
}
