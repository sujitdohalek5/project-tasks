<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    protected $primaryKey = 'project_code';
    public $incrementing = false;
    public $timestamps = false;

    protected $fillable = ['project_code', 'project_name'];

    public function tasks()
    {
        return $this->hasMany(Task::class, 'project_code', 'project_code');
    }
}
