<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use App\Image;
class Bike extends Model
{
    protected $fillable = ['codigoAX','descAX','nombre','precio','modelo','submodelo','talla','rodado','color','year','aplicacion','recorrido','categoria','slug', 'imagenPrincipal_id'];

    public function imagenPrincipal()
    {
    	return $this->belongsTo('App\Image', 'imagenPrincipal_id');
    }
    public function imagesSlider()
    {
    	return $this->belongsToMany('App\Image')->wherePivot('tipo', 'slider')->orderBy('orden');
    }
    public function imagesGaleria()
    {
    	return $this->belongsToMany('App\Image')->wherePivot('tipo', 'galeria')->orderBy('orden');
    }
}
