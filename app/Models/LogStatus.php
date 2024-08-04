<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LogStatus extends Model
{
    use HasFactory;

    protected $table = 'log_statuses';
    protected $primaryKey = 'id_log_status';

    protected $fillable = [
        'aktivitas',
        'id_entitas',
        'status',
        'id_admin',
        'keterangan',
    ];

    protected $hidden = [
        'created_at',
        'updated_at',
    ];

    public function admin()
    {
        return $this->belongsTo(User::class, 'id_admin', 'id_user');
    }
}
