<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ah extends Model
{
    use HasFactory;

    //テーブル名
    protected $table = 'ah';

    /**
     * モデルにタイムスタンプを付けるか
     *
     * @var bool
     */
    public $timestamps = false;

    //可変項目
    protected $fillable = [
        'ah_img',
        'name',
        'explanation',
        'time',
        'animal',
        'emergency',
        'trimming',
        'hotel',
        'reservation',
        'address',
        'tel',
        'parking',
        'insurance',
        'hp',
        'user_id'
    ];
}
