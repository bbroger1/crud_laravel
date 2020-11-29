<?php

namespace LaraDev;

use Illuminate\Database\Eloquent\Model;

class Property extends Model
{
    protected $table = 'properties';
    //para fazer cadastro em massa utilize o $fillable
    protected $fillable = ['title', 'description', 'rental_price', 'sale_price', 'uri'];

    //desabilitar timestamps
    public $timestamps = false;
}
