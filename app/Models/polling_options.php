<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class polling_options extends Model
{
    use HasFactory;
    public $table="polling_options";
    public $timestamps = false;
    protected $fillable = [
        'optiontext', 'polling_id',
    ];
    public function polling(){
        return $this->belongsTo(polling::class);
    }
}
