<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Court extends Model
{
    use HasFactory;

    protected $fillable = [
       'judge_id',
       'registrar_id',
        'type',
        'address',
        'town',
        'state',
    ];


    public function judges()
    {
        return $this->belongsToMany(User::class, 'court_users', 'court_id', 'user_id');
    }

    public function judge()
    {
        return $this->belongsTo(User::class, 'judge_id', 'id');
    }

    public function registrar()
    {
        return $this->belongsTo(User::class, 'registrar_id', 'id');
    }
}
