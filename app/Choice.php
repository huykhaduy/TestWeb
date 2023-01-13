<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
class Choice extends Model
{
    protected $table = 'choice';
    protected $primaryKey = 'choiceId';
    public $timestamps = false;
}
