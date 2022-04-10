<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class polling extends Model
{
    use HasFactory;
    public $table="polling";
    protected $fillable = [
        'question', 'content_id',
        'is_active'
    ];
    public function content(){
        return $this->belongsTo(content::class);
    }
    
    public function polling_options(){
        return $this->hasMany(polling_options::class);
    }
}
