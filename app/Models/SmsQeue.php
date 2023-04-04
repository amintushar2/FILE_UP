<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SmsQeue extends Model
{
    use HasFactory;
    protected $table='SMS_QUEUE';

    public $timestamps = false;
    protected $fillable = [
    'ID', 'IN_DATE', 'OUT_DATE', 'MOBILE_NO', 'SMS_TEXT', 'STATUS', 'RESPONSE', 'MODULE', 'CODE', 'TRACKING_NO'];
}
