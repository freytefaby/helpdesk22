@extends('layouts.template')

@section('content')
 @if(Session::has('mensaje'))
<div class="modal" id="modal" tabindex="-1" role="dialog" aria-labelledby="smallModalHead" aria-hidden="true">
            <div class="modal-dialog modal-sm">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                        <h4 class="modal-title" id="smallModalHead">Notificación</h4>
                    </div>
                    <div class="modal-body">
                        Contraseñas Incorrectas
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>                        
                    </div>
                </div>
            </div>
        </div>        
	@endif
<!-- PAGE TITLE -->
                <div class="page-title">                    
                    <h2><span class="fa fa-arrow-circle-o-left"></span> Posts</h2>
                </div>
                <!-- END PAGE TITLE -->                
                
                <!-- PAGE CONTENT WRAPPER -->
                <div class="page-content-wrap">
                    
                    <div class="row">
                        <div class="col-md-9">
                            
                            <div class="panel panel-default">
                                <div class="panel-body posts">
                                    
                                    <div class="row">
									@foreach ($post as $posts )
								
                                        <div class="col-md-6">
                                            
                                            <div class="post-item">
                                                <div class="post-title">
                                                    <a href="{{URL('system/post/'.$posts->idpost)}}">{{$posts->titulo}}</a>
                                                </div>
                                                <div class="post-date"><span class="fa fa-calendar"></span> {{fecha($posts->fecha_creacion)}} / <a href="#">{{$posts->autor}}</a></div>
                                                <div class="post-text">
												 <div class="post-video">
												 @if($posts->tipo==0)
                                                       <iframe src="{{$posts->pdf_source}}"  frameborder="0" allowfullscreen></iframe>
												   @else
													   <iframe src="{{asset('public/archivos/manuales').'/'.$posts->pdf_source}}"  frameborder="0" allowfullscreen></iframe>
													@endif
													   <!--   <iframe src="{{asset('public/img/Manual Carga Inicial_manual.pdf')}}"  frameborder="0" allowfullscreen></iframe>-->
													  </div>
                                                    <p></p>                                            
                                                </div>
                                                <div class="post-row">
                                                    <div class="post-info">
                                                       <a href="{{URL('system/post/'.$posts->idpost)}}"> <span class="fa fa-eye"></span> Ver mas  </a>
                                                    </div>  
                                                    <button class="btn btn-default btn-rounded pull-right">  {{$posts->categoriadesc}} &RightArrow;</button>
                                                </div>
                                            </div>                                            
                                            
                                        </div>
										@endforeach
										
                                       
                                    </div>
                                                                                                                         

                                                                                
                                    
                                </div>
                            </div>
                            
                         
									{{$post->appends(Request::only(['searchText']))->render()}}                     
                            
                        </div>   
                        <div class="col-md-3">
                            
                            <div class="panel panel-default">
                                <div class="panel-body">
                                    <h3>Categorias</h3>
                                    <div class="links">
									@foreach($categorias as $cat)
                                        <a href="{{URL('catsys/'.$cat->idcategoria)}}">{{$cat->categoriadesc}} <span class="label label-default">{{$cat->num}}</span></a>
										
										@endforeach
                                       
                                    </div>
                                </div>
                            </div>
                            
                            <div class="panel panel-default">
                                <div class="panel-body">
                                    <h3>Recientes</h3>
                                    <div class="links small">
									@foreach($recientes as $rec)
                                        <a href="{{URL('system/post/'.$rec->idpost)}}">{{$rec->titulo}}</a>
										@endforeach
                                       
                                    </div>
                                </div>
                            </div>
                            
                           
                            
                        </div>
                    </div>
                                                            
                </div>
                <!-- END PAGE CONTENT WRAPPER -->             



@endsection

@section('rolesearch')
  <li class="xn-search">
                      {!! Form::open(array('url'=>'blogsystem','method'=>'GET', 'autocomplete'=>'off', 'role'=>'search'))!!}
                            <input type="text" name="search" placeholder="Search..."/>
                        {{Form::close()}}
                    </li>  
@endsection


@section('scripts')
	<script type="text/javascript">
    $(window).load(function(){
        $('#modal').modal('show');
    });
    </script>

@endsection
