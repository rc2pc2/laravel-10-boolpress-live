<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class SocialNetwork extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'name', 'home', 'logo'
    ];

    public function posts(){
        return $this->belongsToMany(Post::class);
    }
}
