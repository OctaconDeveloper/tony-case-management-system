<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CourtMemo extends Model
{
    use HasFactory;
    protected $fillable = [
        'court_case_id',
        'description'
    ];
}
