<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Remark extends Model
{
    use HasFactory;

    protected $fillable = [
        'header',
        'body',
        'user_id',
        'remarkable_id'
    ];
    public function remarkable()
    {
        return $this->morphTo();
    }
}
