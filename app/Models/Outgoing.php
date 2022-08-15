<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Outgoing extends Model
{
    protected $table = 'outgoing';
    protected $primaryKey = 'ctrli';
    protected $fillable = ['date', 'time', 'typeofservice', 'officeconcerned', 'subject', 'name', 'agency', 'timereceived', 'files', 'remarks', 'remarks_type', 'progresschek', 'user_id'];

    public function remarksList()
    {
        return $this->morphMany(Remark::class, 'remarkable');
    }

    public function uploader(){
        return $this->belongsTo(User::class);
    }
}
