<?php

namespace hhfarm\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use hhfarm\Http\Requests;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\input;
use hhfarm\Http\Requests\CreateCategoryFormRequest;
use hhfarm\Http\Requests\EditCategoryFormRequest;
use hhfarm\Categoria;


use DB;

use Carbon\Carbon;
use Response;
use Illuminate\Support\Collection;
class CategoriaController extends Controller
{
    public function __construct()
	{
   	
	}
	
	public function index(Request $request)
	{
		
	if($request->session()->get('sesion')==="Byr57a2055")
	{
			$category=DB::table('categoria')->get();
		return view('peticion.admin.category',["category"=>$category]);	
	}
	else
	{
		
		return Redirect::to('/')->with('mensaje','Ruta protegida debes ingresar con la contraseña');
	}
	
	}
	
	public function create (Request $request)
	{
		if($request->session()->get('sesion')==="Byr57a2055")
	{
		
		
		return view('peticion.admin.createcategory');	
	}
	else
	{
		return Redirect::to('/')->with('mensaje','Ruta protegida debes ingresar con la contraseña');
		
	}
	}
	
	public function store(CreateCategoryFormRequest $request)
	{
		if($request->session()->get('sesion')==="Byr57a2055")
		{
			
			
	   $category=new Categoria;
	   $category->categoriadesc=$request->get('categoria');
	   $category->save();
	   return Redirect::to('categoria');
				
				
			
			
			
			
			
			
			
			
			
		}
		else{
			
			
			return Redirect::to('/')->with('mensaje','Ruta protegida debes ingresar con la contraseña');
			
		}
	
		
		
	}
	
	public function edit (Request $request, $id)
	{
		$category=DB::table('categoria as c')
		  ->where('c.idcategoria','=',$id)
		  ->first();
		return view('peticion.admin.editcategoria',["category"=>$category]);	
	}
	
	public function update (EditCategoryFormRequest $request, $id)
	{
		
		//dd($_POST); EXIT;
		if($request->session()->get('sesion')==="Byr57a2055")
		{
			
			
	   $category=Categoria::findOrFail($id);
	   $category->categoriadesc=$request->get('categoria');
	   $category->update();
	   return Redirect::to('categoria');
				
				
			
			
			
			
			
			
			
			
			
		}
		else{
			
			
			return Redirect::to('/')->with('mensaje','Ruta protegida debes ingresar con la contraseña');
			
		}
		
	}
	
	
	
	}
	

