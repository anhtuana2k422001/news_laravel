<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\User;
use App\Models\Category;
use App\Models\Tag;

class Post extends Model
{
    use HasFactory;
    
    protected $fillable = ['title','slug', 'excerpt', 'body', 'user_id','category_id'];
    
    public function author() {
        return $this->belongsTo(User::class, 'user_id');
    } 

    public function category() {
        return $this->belongsTo(Category::class);
    } 

    public function tags() {
        return $this->belongsToMany(Tag::class);
    } 
}
