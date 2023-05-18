<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Inimate extends Model
{
    use HasFactory;
   protected $fillable =[
    '',
    ''

   ]

    public function collectinalfacility()
    protected $fillable = ['name', 'collectinalfacility_id'];
    {
        return $this->belongsTo(Collectinalfacility::class);
    }
}
