<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Outgoing extends Model
{
    protected $table = 'outgoing';
    protected $primaryKey = 'ctrli';
    protected $fillable = ['date', 'time', 'typeofservice', 'officeconcerned', 'subject', 'name', 'agency', 'timereceived', 'files', 'remarks'];
}
