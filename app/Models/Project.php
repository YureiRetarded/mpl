<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Laravel\Scout\Searchable;

class Project extends Model
{
    use HasFactory;
    use SoftDeletes;
    use Searchable;

    protected $table = 'projects';
    protected $fillable = ['title', 'text', 'status_id', 'public_access_level_id','description', 'github_link', 'url','link','user_id'];

    public static function getTagsString($tags): string
    {
        $string = '';
        foreach ($tags as $tag) {
            $string = $string. $tag->name . ' ';
        }
        return mb_strimwidth($string, 0, 90, '...');
    }

    public function status()
    {
        return $this->belongsTo(Status::class);
    }

    public function publicAccessLevel()
    {
        return $this->belongsTo(PublicAccessLevel::class);
    }

    public function news()
    {
        return $this->hasMany(News::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class);
    }
}
