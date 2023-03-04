<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;

    protected $table = 'projects';

    protected $fillable = [
        'title',
        'description',
        'waqatime_id'
    ];

    public function tasks(): HasMany
    {
        return $this->hasMany(Task::class);
    }
}
