<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'first_name',
        'username',
        'name',
        'middle_name',
        'last_name',
        'address',
        'phonenumber',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];


    public function incoming(){
        return $this->hasMany(Incoming::class);
    }

    public function outgoing(){
        return $this->hasMany(Outgoing::class);
    }

    public function getPendingIncomingAttribute(){
        return $this->incoming()->where('remarks', 'Pending')->count();
    }

    public function getDoneIncomingAttribute(){
        return $this->incoming()->where('remarks', 'Done')->count();
    }

    public function getPendingOutgoingAttribute(){
        return $this->outgoing()->where('remarks', 'Pending')->count();
    }

    public function getDoneOutgoingAttribute(){
        return $this->outgoing()->where('remarks', 'Done')->count();
    }
}
