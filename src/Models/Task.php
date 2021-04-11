<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    protected $fillable = ['name', 'email', 'description', 'status'];

    public static function getIndex($page = 1, $orderBy = [])
    {
        $tasks = self::limit((int)env('PAGINATOR_IEMTS_PER_PAGE'))
            ->skip(((int)env('PAGINATOR_IEMTS_PER_PAGE')) * --$page);
        foreach ($orderBy as $key => $value) {
            if ($value !== null)
                $tasks->orderBy($key, $value);
        }
        return $tasks->get();
    }
}