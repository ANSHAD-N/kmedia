<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class text_content extends Model
{
    use HasFactory;
    protected $table= "text_content";
    protected $fillable = [
                 'title',
                 'content',
                 'content_id'
     ];
     public function content(){
        return $this->belongsTo(content::class);
    }
}
