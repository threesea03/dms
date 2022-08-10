<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Log extends Model
{
    use HasFactory;

    protected $fillable =[
        'user_id',
        'action',
        'module',
    ];

    protected $appends = [
        'ph_time',
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function getPhTimeAttribute(){
        return $this->created_at->timezone('Asia/Manila')->format('M, d Y h:i:s A');
    }
}
