<?php

namespace App\Models;
use App\Models\Collectinalfacility;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Inimate extends Model
{
    use HasFactory;
  protected $fillable=[
    'name',
    'collectinalfacility_id'
  ];

    public function collectinalfacility()
    {
        return $this->belongsTo(Collectinalfacility::class);
    }

}
