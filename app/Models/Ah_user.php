<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Illuminate\Foundation\Auth\User as Authenticatable;

class Ah_user extends Authenticatable
{
    use HasFactory;

    //テーブル名
    protected $table = 'ah_users';

    /**
     * モデルにタイムスタンプを付けるか
     *
     * @var bool
     */
    public $timestamps = false;


    //可変項目
    protected $fillable = [
        'name',
        'kana',
        'tel',
        'email',
        'password',
        'role'
    ];
}
