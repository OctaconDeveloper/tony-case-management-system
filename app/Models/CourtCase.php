<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CourtCase extends Model
{
    use HasFactory;
    protected $fillable = [
        "court_file_no",
        "court",
        "judge_id",
        "registrar_id",
       "case_file_no",
       "date_of_appearance",
        "plaintiffs",
        "plaintiffs_counsel",
        "plaintiffs_counsel_chanber",
        "defendants",
       "title_of_notice",
        "description",
        "case_type",
        "defendants_counsel",
        "defendants_counsel_chanber"
    ];

     
    public function court_name()
    {
        return $this->belongsTo(Court::class, 'court', 'id');
    }

    public function judge()
    {
        return $this->belongsTo(User::class, 'judge_id', 'id');
    }

    public function registrar()
    {
        return $this->belongsTo(User::class, 'registrar_id', 'id');
    }

    public function summary()
    {
        return $this->hasMany(CourtMemo::class);
    }
}
