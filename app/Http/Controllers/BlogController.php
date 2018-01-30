<?php

namespace hhfarm\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use hhfarm\Http\Requests;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\input;
use hhfarm\Http\Requests\VentaForRequest;


use DB;

use Carbon\Carbon;
use Response;
use Illuminate\Support\Collection;
class BlogController extends Controller
{
    public function __construct()
	{
   	
	}
	public function getIndex(Request $request)
	{
		$query=trim($request->get('search'));
		$recientes=DB::table('post as p')
		             ->where('p.personal','=',0)
		             ->orderby('fecha_creacion','desc')
					 ->limit(10)
					 ->get();
					 
					 
		$categorias=DB::table('categoria as c')
		             ->where('p.personal','=',0)
		             ->join('post as p','c.idcategoria','=','p.idcategoria')
		             ->select(DB::raw('count(p.idcategoria) as num'), 'c.categoriadesc','c.idcategoria')
		             ->groupBy('c.idcategoria')
					 ->get();
		                
		
		$post=DB::table('post as p')
		  ->where('p.personal','=',0)
		  ->where('p.titulo','Like','%'.$query.'%')
		  ->join('categoria as c','c.idcategoria','=','p.idcategoria')
		  ->paginate(6);
		
		return view('peticion.blog.index',["post"=>$post,"categorias"=>$categorias,"recientes"=>$recientes]);	
		
		}
		
		
		public function single(Request $request, $id)
		{
		$recientes=DB::table('post as p')
		             ->where('p.personal','=',0)
		             ->orderby('fecha_creacion','desc')
					 ->limit(10)
					 ->get();
					 
					 
		$categorias=DB::table('categoria as c')
		             ->where('p.personal','=',0)
		             ->join('post as p','c.idcategoria','=','p.idcategoria')
		             ->select(DB::raw('count(p.idcategoria) as num'), 'c.categoriadesc','c.idcategoria')
		             ->groupBy('c.idcategoria')
					 ->get();
		                
			
			$post=DB::table('post as p')
		  ->where('p.personal','=',0)
		  ->where('p.idpost','=',$id)
		  ->join('categoria as c','c.idcategoria','=','p.idcategoria')
		  ->first();
			
			return view('peticion.blog.single',["post"=>$post,"categorias"=>$categorias,"recientes"=>$recientes]);	
		}
		
		public function category (Request $request, $id)
		{
			
			$recientes=DB::table('post as p')
		             ->where('p.personal','=',0)
		             ->orderby('fecha_creacion','desc')
					 ->limit(10)
					 ->get();
					 
					 
		$categorias=DB::table('categoria as c')
		             ->where('p.personal','=',0)
		             ->join('post as p','c.idcategoria','=','p.idcategoria')
		             ->select(DB::raw('count(p.idcategoria) as num'), 'c.categoriadesc','c.idcategoria')
		             ->groupBy('c.idcategoria')
					 ->get();
		                
			
			$post=DB::table('post as p')
		  ->where('p.personal','=',0)
		  ->where('p.idcategoria','=',$id)
		  ->join('categoria as c','c.idcategoria','=','p.idcategoria')
		  ->paginate(6);
			
			return view('peticion.blog.category',["post"=>$post,"categorias"=>$categorias,"recientes"=>$recientes]);	
		}
		
		public function autenticar(Request $request)
		{
			 $id=$request->get('pass');
			 
			 if($id==="Byr57a2055")
			 {
				  $request->session()->put('sesion',$id);
				  return Redirect::to('admin/dashboard')->with('mensaje','No tiene permisos necesarios para acceder a este contenido, ingresa como administrador');
			 }
			 else
				 
				 {
					return Redirect::to('/')->with('mensaje','Contraseña incorrecta');
				 }
		}
   
	}
	

