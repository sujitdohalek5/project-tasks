<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    public $timestamps = false;
    protected $fillable = ['task_name', 'task_hours', 'project_code'];

    public function project()
    {
        return $this->belongsTo(Project::class, 'project_code', 'project_code');
    }
}
