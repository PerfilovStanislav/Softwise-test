<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class ShortUrl
 * @package App\Models
 *
 * @property-read  integer $id
 * @property string $url Урл страницы
 * @property string $short_url Короткий урл
 */
class ShortUrl extends Model
{
    protected $table = 'short_url';

    public $timestamps = false;

    protected $fillable = [
        'url',
        'short_url',
    ];

}
