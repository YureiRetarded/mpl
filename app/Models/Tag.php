<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    use HasFactory;

    protected $table = 'tags';
    protected $fillable = ['name'];

    public function news()
    {
        return $this->belongsToMany(News::class);
    }

    public function projects()
    {
        return $this->belongsToMany(Project::class);
    }
}
