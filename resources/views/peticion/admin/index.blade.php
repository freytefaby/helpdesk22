@extends('layouts.template')

@section('content')

<div class="page-content-wrap">    
<div class="row">
<div class="col-md-12">
<div class="panel panel-default">
                                <div class="panel-heading">                                
                                    <h3 class="panel-title">Datos <br>  
								
													
									<a href="dashboard/create"><button type="button"  class="btn btn-primary">Crear nuevo tema</button></a>
									
									</h3>
                                    <ul class="panel-controls">
                                        <li><a href="#" class="panel-collapse"><span class="fa fa-angle-down"></span></a></li>
                                        <li><a href="#" class="panel-refresh"><span class="fa fa-refresh"></span></a></li>
                                        <li><a href="#" class="panel-remove"><span class="fa fa-times"></span></a></li>
                                    </ul>                                
                                </div>
                                <div class="panel-body">
                                    <table class="table datatable">
                                        <thead>
                                            <tr>
											    <th>#</th>
                                                <th>Titulo</th>
                                                <th>Autor</th>
                                                <th>Fecha creacion</th>
                                                <th>doc</th>
                                                <th>Categoria</th>
												<th>Nivel de acceso</th>
												<th>Acciones</th>

                                            </tr>
                                        </thead>
                                        <tbody>
										
										<?php $cont=0; ?>
										@foreach($post as $posts)
										
										<?php $cont=$cont + 1; ?>
										<tr>
                                            <td>{{$cont}}</td>
											<td>{{$posts->titulo}}</td>
											<td>{{$posts->autor}}</td>
											<td>{{fecha($posts->fecha_creacion)}}</td>
											<td> <div class="post-video">
												  @if($posts->tipo==0)
                                                       <iframe src="{{$posts->pdf_source}}"  frameborder="0" allowfullscreen></iframe>
												   @else
													   
                                                       <iframe src="{{asset('public/archivos/manuales').'/'.$posts->pdf_source}}"  frameborder="0" allowfullscreen></iframe>
												   
												   @endif
													   <!--   <iframe src="{{asset('public/img/Manual Carga Inicial_manual.pdf')}}"  frameborder="0" allowfullscreen></iframe>-->
													  </div></td>
													  
													  <td>{{$posts->categoriadesc}}</td>
													   <td>@if($posts->personal==1)
														Solo administradores
                                                             @else
                                                         Para todos
														@endif
													   </td>
													   
													   <td>  
													  <a href="{{URL::action('AdminController@edit',$posts->idpost)}}">  <button class="btn btn-default btn-rounded btn-sm"><span class="fa fa-pencil"></span></button></a>
                                                      <a href="" data-target="#modal-delete-{{$posts->idpost}}" data-toggle="modal">  <button class="btn btn-danger btn-rounded btn-sm" onClick="delete_row('trow_3');"><span class="fa fa-times"></span></button></a>
														</td>
											</tr>
											@include('peticion.admin.delete')
										@endforeach
										
                                        </tbody>
                                    </table>
                                </div>
                            </div>



</div>



</div>




</div>

@endsection