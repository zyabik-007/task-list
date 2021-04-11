<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    protected $fillable = ['name', 'email', 'description','status'];

    public static function getIndex($page = 1)
    {
        return self::limit((int)env('PAGINATOR_IEMTS_PER_PAGE'))->skip(((int)env('PAGINATOR_IEMTS_PER_PAGE')) * --$page)->get();
    }
}