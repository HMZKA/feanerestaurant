<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Table extends Model
{
    use HasFactory;
    protected $fillable=[
        'title',
        'count'
    ];
    public function user(){
        return $this->belongsTo(User::class);
    }
    public function resrvations(){
        return $this->hasMany(Reservation::class);
    }
}
