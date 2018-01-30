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
                                    <h3 class="panel-title">Crear nueva categoria</h3>
                                    <ul class="panel-controls">
                                        <li><a href="#" class="panel-remove"><span class="fa fa-times"></span></a></li>
                                    </ul>
                                </div>
                              
                                <div class="panel-body form-group-separated">
                                    {!!Form::open(array('url'=>'categoria','method'=>'POST','class'=>'form-horizontal','files'=>'true'))!!}
				                                	{{Form::token()}}
									
									
									
                                  
                                    <div class="form-group">                                        
                                        <label class="col-md-3 col-xs-12 control-label">Categoria</label>
                                        <div class="col-md-6 col-xs-12">
                                            <div class="input-group">
                                                <span class="input-group-addon"><span class="fa fa-font"></span></span>
												
                                                <input type="text" class="form-control" name="categoria" value="{{old('categoria')}}"/>
											
                                            </div>            
                                            <span class="help-block">Nueva categoria</span>
                                        </div>
                                    </div>
									
									
                                    
                                  
                                    
                                   
                                    
                                
									
                                    
                                 
                                    
                                  
                                    
                                  

                                </div>
                                <div class="panel-footer">
                                    <a href="{{URL('categoria')}}"><button type="button" class="btn btn-primary pull-left">Atras</button>                               
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