<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Files extends Model
{
    use HasFactory;

    protected $table = 'files';

    protected $fillable = [
        'admin_id',
        'folder_id',
        'status',
        'status_sp',
        'ordinance_title',
        'author',
        'co_author',
        'first',
        'second',
        'third',
        'ordinance_number',
        'final_title',
        'enactment_date',
        'lce_approval',
        'transmittal',
        'sp_sl',
        'posted',
        'published',
        'status_implementation',
        'filename',
        'extension',
        'archive'
    ];

    public function Author() {
        return $this->hasOne(Members::class, 'id', 'author');
    }
    public function CoAuthor() {
        return $this->hasOne(Members::class, 'id', 'co_author');
    }
    public function Category() {
        return $this->hasOne(Category::class, 'id', 'folder_id');
    }
}
