<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Reactions extends Model
{
    protected $fillable = [
        'name', 'type', 'image'
    ];

    public static function rules($update = false, $id = null)
    {
        $commun = [
            'name'    => "required",
            'type' => "required",
        ];
        return $commun;

    }
}
