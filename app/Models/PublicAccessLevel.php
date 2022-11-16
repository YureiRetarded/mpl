<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PublicAccessLevel extends Model
{
    use HasFactory;

    protected $table = 'public_access_levels';
    protected $fillable = ['name'];

    public function projects()
    {
        return $this->hasMany(Project::class);
    }
}
