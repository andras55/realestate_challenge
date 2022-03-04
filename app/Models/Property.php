<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class Property extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'properties';
    protected $fillable = ['name', 'real_estate_type', 'street', 'external_number', 'internal_number', 'neighborhood', 'city', 'country', 'rooms', 'bathrooms', 'comments'];
}
