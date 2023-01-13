<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    //
    protected $table = 'question';
    protected $primaryKey = 'questionId';
    public $incrementing = false;
    protected $keyType = 'string';
    public $timestamps = false;

    public function choices()
    {
        return $this->hasMany(Choice::class,'questionId', 'questionId');
    }
}
