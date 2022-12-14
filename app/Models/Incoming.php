<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Incoming extends Model
{
    use HasFactory;

    protected $table = 'incoming';
    protected $primaryKey = 'ctrli';
    protected $fillable = ['ctrle', 'date', 'time','reciever','typeofservice','subject','officeconcerned','endorsedto','files','remarks', 'user_id'];

    public function remarksList()
    {
        return $this->morphMany(Remark::class, 'remarkable');
    }

    public function uploader(){
        return $this->belongsTo(User::class);
    }
}
