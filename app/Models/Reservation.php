<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    use HasFactory;
    protected $fillable=[
        'name',
        'phone',
        'email',
        'person_count',
        'date',
        'table_id',
        'first_hour',
        'last_hour',
    ];
    public function table(){
        return $this->belongsTo(Table::class);
    }
}
