<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class content extends Model
{
    use HasFactory;
    protected $table= "content";
    protected $fillable = [
                 'title',
                 'thumbnail',
                 'url',
                 'poll'
     ];
     public function polling(){
        return $this->hasOne('App\Models\polling','content_id','id');
    }
    public function ad(){
        return $this->hasOne('App\Models\ad','content_id','id');
    }
    public function text_content(){
        return $this->hasmany('App\Models\text_content','content_id','id');
    }
}
