<?php

namespace hhfarm\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use hhfarm\Http\Requests;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\input;
use hhfarm\Http\Requests\CreateFormRequest;
use hhfarm\Http\Requests\EditFormRequest;
use hhfarm\Post;


use DB;

use Carbon\Carbon;
use Response;
use Illuminate\Support\Collection;
class AdminController extends Controller
{
    public function __construct()
	{
   	
	}
	
	public function index(Request $request)
	{
		
	if($request->session()->get('sesion')==="Byr57a2055")
	{
			$post=DB::table('post as p')
		  ->join('categoria as c','c.idcategoria','=','p.idcategoria')
		  ->get();
		return view('peticion.admin.index',["post"=>$post]);	
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
		
		$categoria=DB::table('categoria')->get();
		return view('peticion.admin.create',["categoria"=>$categoria]);	
	}
	else
	{
		return Redirect::to('/')->with('mensaje','Ruta protegida debes ingresar con la contraseña');
		
	}
	}
	
	public function store(CreateFormRequest $request)
	{
		if($request->session()->get('sesion')==="Byr57a2055")
		{
			if(empty(Input::file('pdf')) and  empty($request->get('video'))  or Input::file('pdf')<>"" and  $request->get('video')<>""  )
			{
			 return Redirect::to('admin/dashboard/create')  ->with('mensaje','mensaje')
			                                                ->with('titulo',$request->get('titulo'))
		                                                    ->with('categoria',$request->get('categoria'))
		                                                    ->with('descripcion',$request->get('descripcion'))
															->with('autor',$request->get('autor'));
															
				
			}
			else
			{
	   $post=new Post;
	   $post->idcategoria=$request->get('categoria');
	   $mytime= Carbon::now('America/Bogota');
	   $post->fecha_creacion=$mytime->toDateTimeString();
	   $post->fecha_modificacion=$mytime->toDateTimeString();
	   $post->titulo=$request->get('titulo');
	   $post->autor=$request->get('autor');
	   $post->descripcion=$request->get('descripcion');
	   $post->personal=$request->get('acceso');
	   $post->tipo=$request->get('tipo');
	   $post->permisos='0';
	   if(empty(Input::file('pdf')))
	   {
		   $post->pdf_source=$request->get('video');
		   
	   }
	   else
	   {
		   if(Input::hasfile('pdf'))
	   {
		   $file=Input::file('pdf');
		   $file->move(public_path().'/archivos/manuales',$file->getClientOriginalName() );
		    $post->pdf_source= $file->getClientOriginalName();
	   } 
		   
	   }
	  
	  
	  
	   $post->save();
	   return Redirect::to('admin/dashboard');
				
				
			}
			
			
			
			
			
			
			
			
		}
		else{
			
			
			return Redirect::to('/')->with('mensaje','Ruta protegida debes ingresar con la contraseña');
			
		}
	
		
		
	}
	
	public function edit (Request $request, $id)
	{
		$post=DB::table('post as p')
		  ->where('p.idpost','=',$id)
		  ->join('categoria as c','c.idcategoria','=','p.idcategoria')
		  ->first();
		$categoria=DB::table('categoria')->get();
		return view('peticion.admin.edit',["post"=>$post,"categoria"=>$categoria]);	
	}
	
	public function update (EditFormRequest $request, $id)
	{
		
		//dd($_POST); EXIT;
		if($request->session()->get('sesion')==="Byr57a2055")
		{
			if(Input::file('pdf')<>"" and  $request->get('video')<>""  )
			{
			 return Redirect::to('admin/dashboard/'.$id.'/edit')  ->with('mensaje','mensaje')
			                                                ->with('titulo',$request->get('titulo'))
		                                                    ->with('categoria',$request->get('categoria'))
		                                                    ->with('descripcion',$request->get('descripcion'))
															->with('autor',$request->get('autor'));
															
				
			}
			else
			{
	   $post=Post::findOrFail($id);
	   $post->idcategoria=$request->get('categoria');
	   $mytime= Carbon::now('America/Bogota');
	   $post->fecha_modificacion=$mytime->toDateTimeString();
	   $post->titulo=$request->get('titulo');
	   $post->autor=$request->get('autor');
	   $post->descripcion=$request->get('descripcion');
	   $post->personal=$request->get('acceso');
	   if($request->get('tipo')=="")
	   {
		 $post->pdf_source=$request->get('video_source');
		   }
		   else{
			   if(empty(Input::file('pdf')))
			   {
				   
				    $post->pdf_source=$request->get('video');
					$post->tipo=$request->get('tipo');
				   
			   }
			   else
			   {
				    if(Input::hasfile('pdf'))
	   {
		   $file=Input::file('pdf');
		   $file->move(public_path().'/archivos/manuales',$file->getClientOriginalName() );
		    $post->pdf_source= $file->getClientOriginalName();
	   } 
				 $post->tipo=$request->get('tipo');  
				   
			   }
			   
			   
			   
			   
			   
			   
			   
		   }
		      
	 
	  
	  
	  
	  
	   $post->update();
	   return Redirect::to('admin/dashboard');
				
				
			}
			
			
			
			
			
			
			
			
		}
		else{
			
			
			return Redirect::to('/')->with('mensaje','Ruta protegida debes ingresar con la contraseña');
			
		}
		
	}
	
	
	 public function destroy(Request $request,$id)
	 {
		
		if($request->session()->get('sesion')==="Byr57a2055")
		{
			
			
	 $post=Post::findOrFail($id);
	 $post->delete();
	 return Redirect::to('admin/dashboard');
			
			
			}
			
			
			
			
			
			
		else{
			
			
			return Redirect::to('/')->with('mensaje','Ruta protegida debes ingresar con la contraseña');
			
		}
		 
		 
		 
		 
		 
	 
	   
	}
	
	public function blogsystem(Request $request)
	{
		
		if($request->session()->get('sesion')==="Byr57a2055")
		{
			
		$query=trim($request->get('search'));
		$recientes=DB::table('post as p')
		             ->where('p.personal','=',1)
		             ->orderby('fecha_creacion','desc')
					 ->limit(10)
					 ->get();
					 
					 
		$categorias=DB::table('categoria as c')
		             ->where('p.personal','=',1)
		             ->join('post as p','c.idcategoria','=','p.idcategoria')
		             ->select(DB::raw('count(p.idcategoria) as num'), 'c.categoriadesc','c.idcategoria')
		             ->groupBy('c.idcategoria')
					 ->get();
		                
		
		$post=DB::table('post as p')
		  ->where('p.personal','=',1)
		  ->where('p.titulo','Like','%'.$query.'%')
		  ->join('categoria as c','c.idcategoria','=','p.idcategoria')
		  ->paginate(6);
		
		return view('peticion.admin.blog',["post"=>$post,"categorias"=>$categorias,"recientes"=>$recientes]);	
		
		
			
			
		}
		else
		{
			return Redirect::to('/')->with('mensaje','Ruta protegida debes ingresar con la contraseña');
			
		}
		
		
	}
	
	public function systempost(Request $request, $id)
	{
		
		if($request->session()->get('sesion')==="Byr57a2055")
		{
		$recientes=DB::table('post as p')
		             ->where('p.personal','=',1)
		             ->orderby('fecha_creacion','desc')
					 ->limit(10)
					 ->get();
					 
					 
		$categorias=DB::table('categoria as c')
		             ->where('p.personal','=',1)
		             ->join('post as p','c.idcategoria','=','p.idcategoria')
		             ->select(DB::raw('count(p.idcategoria) as num'), 'c.categoriadesc','c.idcategoria')
		             ->groupBy('c.idcategoria')
					 ->get();
		                
			
			$post=DB::table('post as p')
		  ->where('p.personal','=',1)
		  ->where('p.idpost','=',$id)
		  ->join('categoria as c','c.idcategoria','=','p.idcategoria')
		  ->first();
			
			return view('peticion.admin.single',["post"=>$post,"categorias"=>$categorias,"recientes"=>$recientes]);	
			
			
				
				
				
			}
			else
			{
					return Redirect::to('/')->with('mensaje','Ruta protegida debes ingresar con la contraseña');
				
				
			}
		
		
		
		
		
	}
	
	public function categoriasblogsystem(Request $request, $id)
	{
		
		if($request->session()->get('sesion')==="Byr57a2055")
		{
		
		$recientes=DB::table('post as p')
		             ->where('p.personal','=',1)
		             ->orderby('fecha_creacion','desc')
					 ->limit(10)
					 ->get();
					 
					 
		$categorias=DB::table('categoria as c')
		             ->where('p.personal','=',1)
		             ->join('post as p','c.idcategoria','=','p.idcategoria')
		             ->select(DB::raw('count(p.idcategoria) as num'), 'c.categoriadesc','c.idcategoria')
		             ->groupBy('c.idcategoria')
					 ->get();
		                
			
			$post=DB::table('post as p')
		  ->where('p.personal','=',1)
		  ->where('p.idcategoria','=',$id)
		  ->join('categoria as c','c.idcategoria','=','p.idcategoria')
		  ->paginate(6);
			
			return view('peticion.admin.categorysystem',["post"=>$post,"categorias"=>$categorias,"recientes"=>$recientes]);	
			
			
			
				
				
			}
			else
			{
				
				return Redirect::to('/')->with('mensaje','Ruta protegida debes ingresar con la contraseña');
				
				
			}
		
		
		
	}
	public function salir (Request $request)
	{
		
		 $request->session()->flush();
	  return Redirect::to('/');
	}
	}
	

