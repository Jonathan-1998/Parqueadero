<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Vehiculo extends Model
{
    use SoftDeletes;
    protected $fillable = [ 'placa_vehiculo', 'numero_lugar', 'precio', 'idParqueadero'];
}
