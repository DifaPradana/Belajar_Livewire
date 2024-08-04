<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RefRole extends Model
{
    use HasFactory;

    protected $table = 'ref_roles';
    protected $primaryKey = 'id_role';
    protected $fillable = ['role_name'];

    public function users()
    {
        return $this->hasOne(User::class, 'id_role', 'id_role');
    }
}
