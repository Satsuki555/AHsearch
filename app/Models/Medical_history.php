<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Medical_history extends Model
{
    use HasFactory;

    //テーブル名
    protected $table = 'medical_history';

    //可変項目
    protected $fillable = [
        'disease',
        'treatment',
        'pet_id'
    ];
}
