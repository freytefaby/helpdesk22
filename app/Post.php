<?php

namespace hhfarm;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $table='post';
	
	protected $primaryKey='idpost';
	
	public $timestamps=false;
	
	protected $fillable=[
	'idcategoria',
	'pdf_source',
	'fecha_creacion',
	'fecha_modificacion',
	'titulo',
	'autor',
	'descripcion',
	'personal',
	'tipo',
	'permisos'
	];
	protected $guarded=[
	
	];
}
