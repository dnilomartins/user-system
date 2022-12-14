<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;

    protected $fillable = [
        'task_name',
        'user_id',
        'completed',
        'priority'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
