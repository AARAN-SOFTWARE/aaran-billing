<?php

namespace Aaran\Common\Models;

use Aaran\Common\Database\Factories\CommonFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Label extends Model
{
    use HasFactory;

    protected $guarded = [];

    public $timestamps = false;

    protected static function newFactory(): CommonFactory
    {
        return new CommonFactory();
    }
}
