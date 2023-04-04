<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FileDoc extends Model
{
    use HasFactory;

    protected $table='file_doc';

    public $timestamps = false;

    protected $fillable = [
        'id',
        'file_title',
        'file_location',
        'file_size',
        'file_extension'
    ];

}
