@extends('layouts.template')

@section('content')

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
								
								
                                        <div class="col-md-12">
                                            
                                            <div class="post-item">
                                                <div class="post-title">
                                                    <a href="{{URL('post/single/'.$post->idpost)}}">{{$post->titulo}}</a>
                                                </div>
                                                <div class="post-date"><span class="fa fa-calendar"></span> {{fecha($post->fecha_creacion)}} / <a href="#">{{$post->autor}}</a></div>
                                                <div class="post-text">
												 <div class="post-video">
												  @if($post->tipo==0)
                                                       <iframe src="{{$post->pdf_source}}"  frameborder="0" allowfullscreen></iframe>
												   @else
                                                       <iframe src="{{asset('public/archivos/manuales').'/'.$post->pdf_source}}"  frameborder="0" allowfullscreen></iframe>
												   @endif
													   <!--   <iframe src="{{asset('public/img/Manual Carga Inicial_manual.pdf')}}"  frameborder="0" allowfullscreen></iframe>-->
													  </div>
                                                    <p>{{$post->descripcion}}</p>                                            
                                                </div>
                                                <div class="post-row">
                                                     
                                                   <a href="{{URL('/')}}" ><button class="btn btn-default btn-rounded pull-right">  Volver atras &RightArrow;</button>  </a>
                                                </div>
                                            </div>                                            
                                            
                                        </div>
										
										
                                       
                                    </div>
                                                                                                                         

                                                                                
                                    
                                </div>
                            </div>
                            
                                            
                            
                        </div>   
                        <div class="col-md-3">
                            
                            <div class="panel panel-default">
                                <div class="panel-body">
                                    <h3>Categorias</h3>
                                    <div class="links">
									@foreach($categorias as $cat)
                                        <a href="{{URL('category/'.$cat->idcategoria)}}">{{$cat->categoriadesc}} <span class="label label-default">{{$cat->num}}</span></a>
										
										@endforeach
                                       
                                    </div>
                                </div>
                            </div>
                            
                            <div class="panel panel-default">
                                <div class="panel-body">
                                    <h3>Recientes</h3>
                                    <div class="links small">
									@foreach($recientes as $rec)
                                        <a href="{{URL('post/single/'.$rec->idpost)}}">{{$rec->titulo}}</a>
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
                      {!! Form::open(array('url'=>'/','method'=>'GET', 'autocomplete'=>'off', 'role'=>'search'))!!}
                            <input type="text" name="search" placeholder="Search..."/>
                        {{Form::close()}}
                    </li>  
@endsection
