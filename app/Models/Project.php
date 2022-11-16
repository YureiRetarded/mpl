<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Project extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'projects';
    protected $fillable = ['title', 'text', 'status_id', 'public_access_level_id', 'github_link', 'url'];

    public function status()
    {
        return $this->belongsTo(Status::class);
    }

    public function publicAccessLevel()
    {
        return $this->belongsTo(PublicAccessLevel::class);
    }

    public function technologies()
    {
        return $this->belongsToMany(Technology::class);
    }

    public function languages()
    {
        return $this->belongsToMany(Language::class);
    }

    public function news()
    {
        return $this->hasMany(News::class);
    }
}
