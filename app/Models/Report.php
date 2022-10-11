<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Report extends Model
{
    use HasFactory;

    public function complainant() {
        return $this->belongsTo(User::class);
    }

    public function post() {
        return $this->belongsTo(Post::class);
    }

    public function report_reason() {
        return $this->belongsTo(ReportReason::class);
    }
    protected $fillable = [
        'post_id',
        'report_reason_id',
        'complainant_id'
    ];
}
