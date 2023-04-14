<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InsuranceMembers extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function replacement()
    {
        return $this->hasOne(Replacement::class, 'member_id');
    }
}
