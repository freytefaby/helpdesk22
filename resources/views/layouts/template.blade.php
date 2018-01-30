<!DOCTYPE html>
<html lang="en">
    <head>        
        <!-- META SECTION -->
        <title>UNIDROGAS S.A HELPDESK</title>            
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        
        <link rel="icon" href="favicon.ico" type="image/x-icon" />
        <!-- END META SECTION -->
        
        <!-- CSS INCLUDE -->        
        <link rel="stylesheet" type="text/css" id="theme" href="{{asset('public/css/theme-default.css')}}"/>
		
        <!-- EOF CSS INCLUDE -->                                     
    </head>
    <body>
	 
        <!-- START PAGE CONTAINER -->
        <div class="page-container">
            
            <!-- START PAGE SIDEBAR -->
         <div class="page-sidebar">
                <!-- START X-NAVIGATION -->
                <ul class="x-navigation">
                    <li class="xn-logo">
                        <a href="{{URL('admin/dashboard')}}">Sistemas B/Q</a>
                        <a href="#" class="x-navigation-control"></a>
                    </li>
                    <li class="xn-profile">
                        <a href="#" class="profile-mini">
                           <img src="{{asset('public/img/escudo.png')}}" alt="Unidrogas S.a"/>
                        </a>
                        <div class="profile">
                            <div class="profile-image">
                                <img src="{{asset('public/img/escudo.png')}}" alt="Unidrogas S.a"/>
                            </div>
                            <div class="profile-data">
                                <div class="profile-data-name">Helpdesk</div>
                                <div class="profile-data-title">Sistemas Barranquilla</div>
                            </div>
                            
                        </div>                                                                        
                    </li>
					@if(Session::get('sesion')=='Byr57a2055')
					  <li class="xn-openable">
                        <a href="#"><span class="fa fa-files-o"></span> <span class="xn-text">Funciones</span></a>
                        <ul>
                            <li><a href="{{URL('categoria')}}"><span class="fa fa-image"></span>Agregar categorias</a></li>
							<li><a href="{{URL('blogsystem')}}"><span class="fa fa-image"></span>Archivos de sistemas</a></li>
							<li><a href="{{URL('/')}}"><span class="fa fa-image"></span>Acceso a todos</a></li>
							
							</li> </ul>
					 
					 @endif
					 
               
                  
                   
                    
                </ul>
                <!-- END X-NAVIGATION -->
            </div>
            <!-- END PAGE SIDEBAR -->
            
            <!-- PAGE CONTENT -->

<!--INICIO SECCION DE CONSTRUCCION-->
            <div class="page-content">
			<!-- START X-NAVIGATION VERTICAL -->
                <ul class="x-navigation x-navigation-horizontal x-navigation-panel">
                    <!-- TOGGLE NAVIGATION -->
                    <li class="xn-icon-button">
                        <a href="#" class="x-navigation-minimize"><span class="fa fa-dedent"></span></a>
                    </li>
                    <!-- END TOGGLE NAVIGATION -->
                    <!-- SEARCH -->
                   
                      @yield('rolesearch')
				  
                    <!-- END SEARCH -->
                    <!-- SIGN OUT -->
					@if(Session::get('sesion')=='Byr57a2055')
                    <li class="xn-icon-button pull-right">
                        <a  href="{{URL('salir')}}"  ><span class="fa fa-sign-out"></span></a>                        
                    </li> 
					@else
						 <li class="xn-icon-button pull-right">
                        <a href="#" class="mb-control" data-box="#mb-signout"><span class="fa fa-sign-out"></span></a>                        
                    </li> 
					@endif
                    <!-- END SIGN OUT -->
                    <!-- MESSAGES -->
                   
                    
                    <!-- END TASKS -->
                </ul>
                <!-- END X-NAVIGATION VERTICAL -->                    
                
                
			@yield('content')
			</div>
<!--FINAL CONSTRUCCION-->


 </div>
        <!-- END PAGE CONTAINER -->
        
        <!-- MESSAGE BOX-->
        <div class="message-box animated fadeIn" data-sound="alert" id="mb-signout">
            <div class="mb-container">
                <div class="mb-middle">
                    <div class="mb-title"><span class="fa fa-sign-out"></span> Acceder como administrador ?</div>
                    <div class="mb-content">
                        <p>Quieres realmente acceder como administrador para montar contenido a la pagina</p>    
 {!! Form::open(array('url'=>'/admin','method'=>'POST', 'autocomplete'=>'off', 'role'=>'search'))!!}						
                        <p>Escribe tu contraseña </p> <font color="black">
						<input type="password" name="pass"></font>
						<button type="submit" class="btn btn-success btn-lg">Entrar</a>
						  <button class="btn btn-default btn-lg mb-control-close">No</button>
                    </div>
					{{Form::close()}}
                </div>
            </div>
        </div>
        <!-- END MESSAGE BOX-->

        <!-- START PRELOADS -->
        <audio id="audio-alert" src="audio/alert.mp3" preload="auto"></audio>
        <audio id="audio-fail" src="audio/fail.mp3" preload="auto"></audio>
        <!-- END PRELOADS -->          
        
    <!-- START SCRIPTS -->
        <!-- START PLUGINS -->
		    
        <script type="text/javascript" src="{{asset('public/js/plugins/jquery/jquery.min.js')}}"></script>
		
		
		@yield('scripts')
        <script type="text/javascript" src="{{asset('public/js/plugins/jquery/jquery-ui.min.js')}}"></script>
        <script type="text/javascript" src="{{asset('public/js/plugins/bootstrap/bootstrap.min.js')}}"></script>        
        <!-- END PLUGINS -->

        <!-- START THIS PAGE PLUGINS-->        
        <script type="text/javascript" src="{{asset('public/js/plugins/icheck/icheck.min.js')}}"></script>
        <script type="text/javascript" src="{{asset('public/js/plugins/mcustomscrollbar/jquery.mCustomScrollbar.min.js')}}"></script>    
        <script type="text/javascript" src="{{asset('public/js/plugins/datatables/jquery.dataTables.min.js')}}"></script> 
       
        <!-- END THIS PAGE PLUGINS-->        

        <!-- START TEMPLATE -->
        <script type="text/javascript" src="{{asset('public/js/settings.js')}}"></script>
        
        <script type="text/javascript" src="{{asset('public/js/plugins.js')}}"></script>        
        <script type="text/javascript" src="{{asset('public/js/actions.js')}}"></script>
        <!-- END TEMPLATE -->

    <!-- END SCRIPTS -->   
  
		
    </body>
</html>







			

