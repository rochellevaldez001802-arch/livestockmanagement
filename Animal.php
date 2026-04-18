<?php
namespace App\Models;
use Carbon\Carbon;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Animal extends Model
{

protected $fillable = [

'user_id',
'animal_type',
'breed',
'last_vaccination',
'next_vaccination',
'last_deworming',
'next_deworming',
'status',
'image'

];

protected $casts = [
    'last_vaccination' => 'date',
    'next_vaccination' => 'date',
    'last_deworming' => 'date',
    'next_deworming' => 'date',
];

public function user()
{
return $this->belongsTo(User::class);
}

public function setLastVaccinationAttribute($value)
{
    $this->attributes['last_vaccination'] = $value;

    $this->attributes['next_vaccination'] = $value
        ? Carbon::parse($value)->addMonths(3)
        : null;
}

public function setLastDewormingAttribute($value)
{
    $this->attributes['last_deworming'] = $value;

    $this->attributes['next_deworming'] = $value
        ? Carbon::parse($value)->addMonths(3)
        : null;
}

}