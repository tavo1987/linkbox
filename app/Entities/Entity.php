<?php
/**
 * Created by PhpStorm.
 * User: USER
 * Date: 03/02/2016
 * Time: 22:27
 */

namespace App\Entities;


use Illuminate\Database\Eloquent\Model;

class Entity extends Model
{

    public static function getClass()
    {
        return get_class(new static);
    }

}