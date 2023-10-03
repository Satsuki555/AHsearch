<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pet extends Model
{
    use HasFactory;

    //テーブル名
    protected $table = 'pets';

    /**
     * モデルにタイムスタンプを付けるか
     *
     * @var bool
     */
    public $timestamps = false;


    //可変項目
    protected $fillable = [
        'pet_img',
        'name',
        'animal',
        'breed',
        'birth',
        'sex',
        'rv_day',
        'vac_day',
        'user_id'
    ];
}
