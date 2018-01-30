@extends('layouts.template')

@section('content')

<div class="page-content-wrap">    
<div class="row">
<div class="col-md-12">
<div class="panel panel-default">
                                <div class="panel-heading">                                
                                    <h3 class="panel-title">Categorias <br>  
								
													
									<a href="categoria/create"><button type="button"  class="btn btn-primary">Crear Nueva categoria</button></a>
									
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
                                                <th>Categorias</th>
												<th>Acciones</th>
                                                

                                            </tr>
                                        </thead>
                                        <tbody>
										
										<?php $cont=0; ?>
										@foreach($category as $cat)
										
										<?php $cont=$cont + 1; ?>
										<tr>
                                            <td>{{$cont}}</td>
											<td>{{$cat->categoriadesc}}</td>
											
													   
													   <td>  
													  <a href="{{URL::action('CategoriaController@edit',$cat->idcategoria)}}">  <button class="btn btn-default btn-rounded btn-sm"><span class="fa fa-pencil"></span></button></a>
                                                      
														</td>
											</tr>
											
										@endforeach
										
                                        </tbody>
                                    </table>
                                </div>
                            </div>



</div>



</div>




</div>

@endsection