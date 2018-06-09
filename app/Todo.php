<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Todo
 * @package App
 * @property string $description
 * @property int $done
 * @property int $user_id
 */
class Todo extends Model
{
    /**
     * @var string
     */
    protected $table = 'todo';

    /**
     * @var array
     */
    protected $fillable = ['description'];
}
