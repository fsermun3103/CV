<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CV extends Model
{
    protected $table = 'cvs';

    protected $fillable = [
        'name',
        'surname',
        'tel',
        'email',
        'birthdate',
        'avg_grade',
        'experience',
        'education',
        'skills',
        'path',
    ];

    function getPath() {
        $url = url('assets/img/noimage.jpg');
        if($this->path != null) {
            $url = url('storage/' . $this->path);
        }
        return $url;
    }


}
