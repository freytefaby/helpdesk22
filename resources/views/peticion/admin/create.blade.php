@extends('layouts.template')

@section('content')
@if (count($errors)>0)
<div class="modal" id="modal" tabindex="-1" role="dialog" aria-labelledby="smallModalHead" aria-hidden="true">
            <div class="modal-dialog modal-sm">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                        <h4 class="modal-title" id="smallModalHead">Notificación</h4>
                    </div>
                    <div class="modal-body">
                      <ul>
								@foreach ($errors->all() as $error)
								<li >{{$error}}</li>
								@endforeach
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>                        
                    </div>
                </div>
            </div>
        </div>        
	@endif
	
	@if(Session::has('mensaje'))
<div class="modal" id="modal" tabindex="-1" role="dialog" aria-labelledby="smallModalHead" aria-hidden="true">
            <div class="modal-dialog modal-sm">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                        <h4 class="modal-title" id="smallModalHead">Notificación</h4>
                    </div>
                    <div class="modal-body">
                       Almenos debe haber un video o un manual para guardar esta herramienta.
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>                        
                    </div>
                </div>
            </div>
        </div>        
	@endif
<div class="page-content-wrap">
                
                    <div class="row">
                        <div class="col-md-12">
                            
                          
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h3 class="panel-title">Crear nuevo manual</h3>
                                    <ul class="panel-controls">
                                        <li><a href="#" class="panel-remove"><span class="fa fa-times"></span></a></li>
                                    </ul>
                                </div>
                              
                                <div class="panel-body form-group-separated">
                                    {!!Form::open(array('url'=>'admin/dashboard','method'=>'POST','class'=>'form-horizontal','files'=>'true'))!!}
				                                	{{Form::token()}}
									<div class="form-group">
                                        <label class="col-md-3 col-xs-12 control-label">Categoria</label>
                                        <div class="col-md-6 col-xs-12">                                                                                            
                                            <select class="form-control select" name="categoria">
                                              <option value="">Seleccione  </option>
																@foreach($categoria as $c)
																@if(Session::get('categoria')==$c->idcategoria)
																	<option value="{{$c->idcategoria}}" selected>{{$c->categoriadesc}}</option>
																@else
																	
																@if(old('categoria')==$c->idcategoria)
																<option value="{{$c->idcategoria}}" selected>{{$c->categoriadesc}}</option>
															   @else
																<option value="{{$c->idcategoria}}">{{$c->categoriadesc}}</option>
															   @endif
															   @endif
																@endforeach
                                            </select>
                                            <span class="help-block">Seleccionar categoria</span>
                                        </div>
                                    </div>
									
									
                                   	<div class="form-group">
                                        <label class="col-md-3 col-xs-12 control-label">Video / manual</label>
                                        <div class="col-md-6 col-xs-12">                                                                                            
                                            <select class="form-control select" name="tipo" id="archivo">
											    <option value="" selected>Seleccione</option>
                                                <option value="0">Video</option>
                                                <option value="1">Pdf</option>
                                               
                                            </select>
                                           <br>
										   <div id="pdf" style="display:none">
											 <div class="col-md-6 col-xs-12">                                                                                                                                        
                                            <input type="file" class="fileinput btn-primary" name="pdf"  title="Buscar archivo pdf"/>
                                            <span class="help-block">Solo documentos en PDF</span>
                                        </div>
											 
											</div>
											  <div id="video" style="display:none">
											<div class="input-group">
                                                <span class="input-group-addon"><span class="fa fa-youtube"></span></span>
                                                <input type="text" class="form-control" name="video"/>
												
                                            </div> 
											
											   <span class="help-block">Solo link de youtube, ejemplo: "https://www.youtube.com/embed/d6GJ5W3DF9c"</span>
											   
											   </div>
                                        </div>
                                    </div>
                                    
                                    <div class="form-group">                                        
                                        <label class="col-md-3 col-xs-12 control-label">Titulo</label>
                                        <div class="col-md-6 col-xs-12">
                                            <div class="input-group">
                                                <span class="input-group-addon"><span class="fa fa-font"></span></span>
												 @if(Session::get('titulo')=="")
                                                <input type="text" class="form-control" name="titulo" value="{{old('titulo')}}"/>
											@else
												 <input type="text" class="form-control" name="titulo" value="{{session::get('titulo')}}"/>
											 @endif
                                            </div>            
                                            <span class="help-block">Titulo de video / manual</span>
                                        </div>
                                    </div>
									
									<div class="form-group">                                        
                                        <label class="col-md-3 col-xs-12 control-label">Autor</label>
                                        <div class="col-md-6 col-xs-12">
                                            <div class="input-group">
                                                <span class="input-group-addon"><span class="fa fa-font"></span></span>
												 @if(Session::get('autor')=="")
                                                <input type="text" class="form-control" name="autor" value="{{old('autor')}}"/>
											@else
												 <input type="text" class="form-control" name="autor" value="{{session::get('autor')}}"/>
											 @endif
                                            </div>            
                                            <span class="help-block">Creador</span>
                                        </div>
                                    </div>
                                    
                                  
                                    
                                    <div class="form-group">
                                        <label class="col-md-3 col-xs-12 control-label">Descripción</label>
                                        <div class="col-md-6 col-xs-12">   
										 @if(Session::get('descripcion')=="")
                                            <textarea class="form-control" rows="5" name="descripcion">{{old('descripcion')}}</textarea>
										@else
											 <textarea class="form-control" rows="5" name="descripcion">{{session::get('descripcion')}}</textarea>
										 @endif
                                            <span class="help-block">Breve descripcion del manual</span>
                                        </div>
                                    </div>
                                    
                                  <div class="form-group">
                                        <label class="col-md-3 col-xs-12 control-label">Acceso</label>
                                        <div class="col-md-6 col-xs-12">                                                                                            
                                            <select class="form-control select" name="acceso">
											   <option value="">Seleccione  </option>
                                                <option value="0">Todos los usuarios</option>
                                                <option value="1">Solo sistemas</option>
                                                
                                            </select>
                                            <span class="help-block">Tipo de acceso que se maneja</span>
                                        </div>
                                    </div>
									
                                    
                                 
                                    
                                  
                                    
                                  

                                </div>
                                <div class="panel-footer">
                                    <a href="{{URL('admin/dashboard')}}"><button type="button" class="btn btn-primary pull-left">Atras</button>                               
                                    <button type="submit" class="btn btn-primary pull-right">Guardar</button>
									</form>
                                </div>
                            </div>
                          
                            
                        </div>
                    </div>                    
                    
                </div>





@endsection



@section('scripts')


	<script type="text/javascript">
    $(window).load(function(){
        $('#modal').modal('show');
    });
    </script>


<script>

$('select#archivo').on('change',function(){
    var valor = $(this).val();
	if(valor==0)
	{
		$("#pdf").css("display", "none");
		$("#video").css("display", "block");
		
		
	}
	else
		
		{
			$("#pdf").css("display", "block");
			$("#video").css("display", "none");
		}
	
});



</script>


@endsection