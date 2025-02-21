<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <title>Jets I Dashboard</title>
    <meta name="description" content="A responsive bootstrap 4 admin dashboard template by hencework" />

    <!-- Favicon -->
    <script type="text/javascript" src="jquery-1.3.2.min.js"></script>

    <link rel="shortcut icon" href="favicon.ico">
    <link rel="icon" href="favicon.ico" type="image/x-icon">

    <!-- select2 CSS -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <!-- Data Table CSS -->
    <link href="../plantilla/vendors/datatables.net-dt/css/jquery.dataTables.min.css" rel="stylesheet" type="text/css" />
    <link href="../plantilla/vendors/datatables.net-responsive-dt/css/responsive.dataTables.min.css" rel="stylesheet" type="text/css" />

    <!-- Toggles CSS -->
    <link href="../plantilla/vendors/jquery-toggles/css/toggles.css" rel="stylesheet" type="text/css">
    <link href="../plantilla/vendors/jquery-toggles/css/themes/toggles-light.css" rel="stylesheet" type="text/css">

    <!-- Custom CSS -->
    <link href="../plantilla/dist/css/style.css" rel="stylesheet" type="text/css">
    <link href="../plantilla/vendors/select2/dist/css/select2.min.css" rel="stylesheet" type="text/css" />
</head>

<body>
    <!-- Preloader -->
    <div class="preloader-it">
        <div class="loader-pendulums"></div>
    </div>
    <!-- /Preloader -->

    <!-- HK Wrapper -->
    <div class="hk-wrapper hk-alt-nav">

        <!-- Top Navbar -->
        <nav class="navbar navbar-expand-xl navbar-light fixed-top hk-navbar hk-navbar-alt">
            <a class="navbar-toggle-btn nav-link-hover navbar-toggler" href="javascript:void(0);" data-toggle="collapse" data-target="#navbarCollapseAlt" aria-controls="navbarCollapseAlt" aria-expanded="false" aria-label="Toggle navigation"><span class="feather-icon"><i data-feather="menu"></i></span></a>
            <a class="navbar-brand" href="{{route ('dashboard')}}">
                <img class="brand-img d-inline-block align-top" style="width: 100px;" src="images\logo.png" alt="JETS" />
            </a>
            <div class="collapse navbar-collapse" id="navbarCollapseAlt">
                <div class="navbar-collapse collapse show" id="navbarCollapseAlt">
                    <ul class="navbar-nav">
                        <li class="nav-item dropdown show-on-hover">
                            <a class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Ordenes de trabajo
                            </a>
                            <div class="dropdown-menu" data-dropdown-in="fadeIn" data-dropdown-out="fadeOut">
                                <a class="dropdown-item" href="{{route ('dashboard_ordenes')}}">Módulo OT</a>
                                <a class="dropdown-item" href="{{route ('buscador_ordenes')}}">Buscador OT</a>
                            </div>
                        </li>
                        <li class="nav-item dropdown show-on-hover">
                            <a class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Ingenieria
                            </a>
                            <div class="dropdown-menu" data-dropdown-in="fadeIn" data-dropdown-out="fadeOut">
                                <a class="dropdown-item" href="{{route ('dashboard_ingenieria')}}">Módulo Ingenieria</a>
                                <a class="dropdown-item" href="{{route ('buscador_ingenieria')}}">Buscador Ingenieria</a>
                            </div>
                        </li>
                        <li class="nav-item dropdown show-on-hover">
                            <a class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Almacen
                            </a>
                            <div class="dropdown-menu" data-dropdown-in="fadeIn" data-dropdown-out="fadeOut">
                                <a class="dropdown-item" href="{{route ('dashboard_almacen')}}">Módulo Almacen</a>
                                <a class="dropdown-item" href="{{route ('buscador_almacen')}}">Buscador Almacen</a>
                            </div>
                        </li>
                        <li class="nav-item dropdown show-on-hover">
                            <a class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Compras
                            </a>
                            <div class="dropdown-menu" data-dropdown-in="fadeIn" data-dropdown-out="fadeOut">
                                <a class="dropdown-item" href="{{route ('dashboard_compras')}}">Módulo Compras</a>
                                <a class="dropdown-item" href="{{route ('dashboard_administrador_compras')}}">Administracion Compras</a>
                                <a class="dropdown-item" href="{{route ('buscador_compras')}}">Buscador Compras</a>

                            </div>
                        </li>
                        <li class="nav-item dropdown show-on-hover">
                            <a class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Producción
                            </a>
                            <div class="dropdown-menu" data-dropdown-in="fadeIn" data-dropdown-out="fadeOut">
                                <a class="dropdown-item" href="{{route ('dashboard_produccion')}}">Módulo Produccion</a>
                                <a class="dropdown-item" href="{{route ('dashboard_programador')}}">Módulo Técnico</a>
                            </div>
                        </li>


                        <li class="nav-item dropdown show-on-hover">
                            <a class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Calidad
                            </a>
                            <div class="dropdown-menu" data-dropdown-in="fadeIn" data-dropdown-out="fadeOut">
                                <a class="dropdown-item" href="{{route ('dashboard_calidad')}}">Módulo Calidad</a>
                                <a class="dropdown-item" href="{{route ('buscador_calidad')}}">Buscador Calidad</a>
                            </div>
                        </li>

                        <li class="nav-item dropdown show-on-hover">
                            <a class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Embarques
                            </a>
                            <div class="dropdown-menu" data-dropdown-in="fadeIn" data-dropdown-out="fadeOut">
                                <a class="dropdown-item" href="{{route ('dashboard_embarques')}}">Módulo Embarques</a>
                                <a class="dropdown-item" href="{{route ('buscador_embarques')}}">Buscador Embarques</a>
                            </div>
                        </li>

                        <li class="nav-item dropdown show-on-hover">
                            <a class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Facturación
                            </a>
                            <div class="dropdown-menu" data-dropdown-in="fadeIn" data-dropdown-out="fadeOut">
                                <a class="dropdown-item" href="{{route ('dashboard_facturacion')}}">Módulo Facturación</a>
                                <a class="dropdown-item" href="{{route ('buscador_facturacion')}}">Buscador Facturación</a>
                            </div>
                        </li>

                        <li class="nav-item dropdown show-on-hover">
                            <a class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Administrador
                            </a>
                            <div class="dropdown-menu" data-dropdown-in="fadeIn" data-dropdown-out="fadeOut">
                                <a class="dropdown-item" href="{{route ('dashboard_administrador')}}">Módulo Administrador</a>
                            </div>
                        </li>



                    </ul>

                </div>
                <form class="navbar-search-alt">
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><span class="feather-icon"><i data-feather="search"></i></span></span>
                        </div>
                        <input class="form-control" type="search" placeholder="Search" aria-label="Search">
                    </div>
                </form>
            </div>
            <ul class="navbar-nav hk-navbar-content">
                <li class="nav-item">
                    <a id="settings_toggle_btn" class="nav-link nav-link-hover" href="javascript:void(0);"><span class="feather-icon"><i data-feather="settings"></i></span></a>
                </li>
                <li class="nav-item dropdown dropdown-notifications">
                    <a class="nav-link dropdown-toggle no-caret" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><span class="feather-icon"><i data-feather="bell"></i></span><span class="badge-wrap"><span class="badge badge-success badge-indicator badge-indicator-sm badge-pill pulse"></span></span></a>
                    <div class="dropdown-menu dropdown-menu-right" data-dropdown-in="fadeIn" data-dropdown-out="fadeOut">
                        <h6 class="dropdown-header">Notifications <a href="javascript:void(0);" class="">Ver todas</a></h6>
                        <div class="notifications-nicescroll-bar">
                            @foreach($notificaciones as $notificacion)
                            <a href="javascript:void(0);" class="dropdown-item">
                                <div class="media">
                                    <div class="media-img-wrap">
                                        <div class="avatar avatar-sm">
                                            <img src="../images/iconos/urgencia.avif" alt="user" class="avatar-img rounded-circle">
                                        </div>
                                    </div>
                                    <div class="media-body">
                                        <div>
                                            <div class="notifications-text"><span class="text-dark text-capitalize">OT: {{$notificacion->ot}} <br> Cliente: {{$notificacion->cliente}}</span> fue registrada como urgencia.</div>
                                            <div class="notifications-time">{{$notificacion->created_at}}</div>
                                        </div>
                                    </div>
                                </div>
                            </a>
                            <div class="dropdown-divider"></div>
                            @endforeach

                        </div>
                    </div>
                </li>
                <li class="nav-item dropdown dropdown-authentication">
                    <a class="nav-link dropdown-toggle no-caret" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <div class="media">
                            <div class="media-img-wrap">
                                <div class="avatar">
                                    <img src="../images/empleados/{{ Auth::user()->id }}.jpg" alt="" class="avatar-img rounded-circle">
                                </div>
                                <span class="badge badge-success badge-indicator"></span>
                            </div>
                            <div class="media-body">
                                <span>{{ Auth::user()->name }}<i class="zmdi zmdi-chevron-down"></i></span>
                            </div>
                        </div>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right" data-dropdown-in="flipInX" data-dropdown-out="flipOutX">
                        <a class="dropdown-item" href="{{route ('logout')}}"><i class="dropdown-icon zmdi zmdi-power"></i><span>Log out</span></a>
                    </div>
                </li>
            </ul>
        </nav>
        <!-- /Top Navbar -->


        <!-- Main Content -->
        <div class="hk-pg-wrapper">

            <!-- Breadcrumb -->
            <nav class="hk-breadcrumb" aria-label="breadcrumb">
                <ol class="breadcrumb breadcrumb-light bg-transparent">
                    <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Compras</li>
                </ol>
            </nav>
            <!-- /Breadcrumb -->

            <!-- Container -->
            <div class="container-fluid">

                @if (session('mensaje-error'))
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    {{session('mensaje-error')}}
                    <script type="text/javascript">
                        $('.alert').alert()
                    </script>
                </div>
                @elseif (session('mensaje-success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{session('mensaje-success')}}
                    <script type="text/javascript">
                        $('.alert').alert()
                    </script>
                </div>
                @endif

                <!-- Title -->
                <div class="hk-pg-header">
                    <h4 class="hk-pg-title"><span class="pg-title-icon"><span class="feather-icon"></span></span>Módulo Compras </h4>
                </div>
                <div class="d-sm-flex align-items-center justify-content-between mb-4">
                    <h1 class="h3 mb-0 text-gray-800"> </h1>
                    <a href="{{route('exportar_compras')}}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">
                        <i class="glyphicon glyphicon-file"></i>
                        Generar reporte</a>
                </div>
                <!-- /Title -->


            </div>
            <div class="row">
                <div class="col-xl-8">
                    <section class="hk-sec-wrapper">
                        <div class="table-wrap">
                            <table id="datable_1" class="table table-hover w-100 display pb-30">
                                <thead class="thead-primary">
                                    <tr>
                                        <th></th>
                                        <th>OT</th>
                                        <th>TIPO</th>
                                        <th>UM</th>
                                        <th>MATERIAL</th>
                                        <th>DESCRIPCION</th>
                                        <th>OC</th>
                                        <th>PROVEEDOR</th>
                                        <th>FECHA PRODUCCION</th>
                                        <th>CANTIDAD</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($materiales as $material)
                                    <tr>
                                        <td>
                                            <button type="button" class="btn btn-primary" data-toggle="modal"
                                                data-target="#edicion_material" data-id="{{$material->id}}"
                                                data-descripcion="{{$material->descripcion}}"
                                                data-cantidad="{{$material->cantidad_solicitada}}">
                                                <i class="icon-pencil"></i>
                                            </button>
                                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#asignarOC"
                                                data-id="{{$material->id}}" data-descripcion="{{$material->descripcion}}" data-cantidad="{{$material->cantidad_solicitada}}">
                                                <i class="icon-basket"></i>
                                            </button>

                                        </td>
                                        <td>{{$material->ot}}</td>
                                        <td>{{$material->tipo}}</td>
                                        <td>{{$material->um}}</td>
                                        <td>{{$material->material}}</td>
                                        <td>{{$material->descripcion}}</td>
                                        <td>{{$material->oc}}</td>
                                        <td>{{$material->proveedor}}</td>
                                        <td>{{$material->salida_produccion}}</td>
                                        <td>
                                            {{$material->tipo === "TRATAMIENTO EXTERNO" ? $material->cantidad_solicitada : $material->cantidad_almacen}}
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </section>
                </div>

                <div class="col-xl-4">
                    <div class="table-wrap">
                        <div class="d-flex justify-content-between align-items-center mb-3">
                            <h5>Órdenes de Compra</h5>
                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#agregarOC">
                                <i class="icon-plus"></i> Agregar
                            </button>
                        </div>
                        <table id="datable_2" class="table table-hover w-100 display pb-30">
                            <thead class="thead-primary">
                                <tr>
                                    <th>Acciones</th>
                                    <th>OC</th>
                                    <th>PROVEEDOR</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($ordenes_compras as $oc)
                                <tr>
                                    <td>
                                        <!-- Botón para ver materiales asignados en un modal -->
                                        <button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#verMaterialesModal" data-oc="{{$oc->id}}">
                                            <i class="icon-list"></i>
                                        </button>

                                        <!-- Botón para descargar PDF -->
                                        <a href="{{route('oc_pdf', $oc->id)}}" class="btn btn-info btn-sm">
                                            <i class="icon-doc"></i>
                                        </a>

                                        <a href="{{route('oc_pdf', $oc->id)}}" class="btn btn-success btn-sm">
                                            <i class="icon-check"></i>
                                        </a>

                                    </td>
                                    <td>{{$oc->id}}</td>
                                    <td>{{$oc->proveedor}}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>


            <div class="modal fade" id="edicion_material" tabindex="-1" role="dialog" aria-labelledby="exampleModalForms" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Material: Asignación de proveedor.</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">×</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form action="{{route('material_proveedor')}}" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <div class="col-md-0 form-group">
                                        <input class="form-control" id="id" name="id" placeholder="" value="" type="text" hidden>
                                    </div>
                                    <div class="col-md-8 form-group">
                                        <label for="dibujo">Descripcion</label>
                                        <input class="form-control" id="descripcion" name="descripcion" placeholder="" value="" type="text" readonly>
                                    </div>
                                    <div class="col-md-4 form-group">
                                        <label for="dibujo">Cantidad</label>
                                        <input class="form-control" id="cantidad_solicitada" name="cantidad_solicitada" placeholder="" value="" type="text">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12 form-group">
                                        <label for="dibujo">Proveedores</label>
                                        <label for="proveedor">Proveedor</label>
                                        <select name="proveedor" class="form-control custom-select d-block w-100" id="vendedor">
                                            @foreach ($proveedores as $proveedor)
                                            <option value="{{$proveedor->nombre}}"> {{$proveedor->nombre}} </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <br>
                                <button type="submit" class="btn btn-block btn-primary">Registrar</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>


            <div class="modal fade" id="carga_certificado" tabindex="-1" role="dialog" aria-labelledby="exampleModalForms" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Nueva: Carga de dibujo.</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">×</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form action="{{route('carga_certificado')}}" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <div class="col-md-6 form-group">
                                        <label for="Orden de compra">OC</label>
                                        <input class="form-control" id="oc" name="oc" placeholder="" value="" type="text" onlyread>
                                    </div>
                                    <div class="col-md-6 form-group">
                                        <label for="certificado">Certificado</label>
                                        <input class="form-control" id="certificado" name="certificado" placeholder="" value="" type="file">
                                    </div>
                                </div>
                                <br>
                                <button type="submit" class="btn btn-block btn-primary">Registrar</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>


            <div class="modal fade" id="alta_oc" tabindex="-1" role="dialog" aria-labelledby="exampleModalForms" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Nueva: Carga de dibujo.</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">×</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form action="{{route('alta_oc')}}" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <div class="col-md-6 form-group">
                                        <label for="proveedor">Proveedor</label>
                                        <select name="proveedor" class="form-control custom-select d-block w-100" id="vendedor">
                                            @foreach ($proveedores as $proveedor)
                                            <option value="{{$proveedor->nombre}}"> {{$proveedor->nombre}} </option>
                                            @endforeach
                                        </select>

                                    </div>
                                    <div class="col-md-6 form-group">
                                        <label for="">Tipo OC</label>
                                        <select style="width:210px;" class="input-small form-control" id="tipo_oc" name="tipo_oc">
                                            <option value="MATERIAL">MATERIAL</option>
                                            <option value="TRATAMIENTO">TRATAMIENTO</option>
                                        </select>
                                    </div>
                                </div>
                                <br>
                                <button type="submit" class="btn btn-block btn-primary">Registrar</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>


            <div class="modal fade" id="agregarOC" tabindex="-1" role="dialog" aria-labelledby="agregarOCTitle" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="agregarOCTitle">Nueva Orden de Compra</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form action="" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">
                                    <label for="oc">Orden de compra:</label>
                                    <input class="form-control" id="oc" name="oc" value="{{$ultima+1}}" type="text" readonly>
                                </div>
                                <div class="form-group">
                                    <label for="proveedor">Proveedor</label>
                                    <select name="proveedor" class="form-control custom-select d-block w-100" id="vendedor">
                                        @foreach ($proveedores as $proveedor)
                                        <option value="{{$proveedor->nombre}}"> {{$proveedor->nombre}} </option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="razon">Razon Social</label>
                                    <select name="razon" class="form-control custom-select d-block w-100" id="vendedor">
                                        <option value="LUIS">LUIS </option>
                                        <option value="JETS">JETS </option>

                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="forma_pago">Forma de Pago:</label>
                                    <input class="form-control" id="forma_pago" name="forma_pago" value="" type="text">
                                </div>
                                <div class="form-group">
                                    <label for="condiciones">Condiciones:</label>
                                    <input class="form-control" id="condiciones" name="condiciones" value="" type="text">
                                </div>
                                <div class="form-group text-right">
                                    <button class="btn btn-primary" type="submit">Agregar</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>


            <div class="modal fade" id="asignarOC" tabindex="-1" role="dialog" aria-labelledby="asignarOCTitle" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="asignarOCTitle">Asignar Orden de Compra</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form action="{{route('asignaroc_materials')}}" method="post">
                                @csrf
                                <input type="hidden" id="material_id" name="material_id">
                                <div class="form-group">
                                    <label for="pu">PU</label>
                                    <input type="number" class="form-control" id="pu" name="pu">
                                </div>
                                <div class="form-group">
                                    <label for="oc_asignada">Orden de Compra</label>
                                    <select name="oc_asignada" class="form-control custom-select d-block w-100" id="oc_asignada">
                                        @foreach ($ordenes_compras as $orden)
                                        <option value="{{$orden->id}}"> {{$orden->id}} - {{$orden->proveedor}} </option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group text-right">
                                    <button class="btn btn-primary" type="submit">Asignar</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>


            <div class="modal fade" id="verMaterialesModal" tabindex="-1" role="dialog" aria-labelledby="verMaterialesLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="verMaterialesLabel">Materiales Asignados a OC #<span id="oc-id"></span></h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <!-- Tabla para mostrar los materiales -->
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>Descripción</th>
                                        <th>Cantidad Solicitada</th>
                                        <th>Proveedor</th>
                                    </tr>
                                </thead>
                                <tbody id="tabla-materiales">
                                    <!-- Los materiales se agregarán aquí con JavaScript -->
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>



        </div>



        <!-- /Container -->

        <!-- Footer -->
        <div class="hk-footer-wrap container-fluid">
            <footer class="footer">
                <div class="row">
                    <div class="col-md-6 col-sm-12">
                    </div>
                    <div class="col-md-6 col-sm-12">
                        <p class="d-inline-block">Siguenos</p>
                        <a href="#" class="d-inline-block btn btn-icon btn-icon-only btn-indigo btn-icon-style-4"><span class="btn-icon-wrap"><i class="fa fa-facebook"></i></span></a>
                        <a href="#" class="d-inline-block btn btn-icon btn-icon-only btn-indigo btn-icon-style-4"><span class="btn-icon-wrap"><i class="fa fa-twitter"></i></span></a>
                        <a href="#" class="d-inline-block btn btn-icon btn-icon-only btn-indigo btn-icon-style-4"><span class="btn-icon-wrap"><i class="fa fa-google-plus"></i></span></a>
                    </div>
                </div>
            </footer>
        </div>
        <!-- /Footer -->

    </div>
    <!-- /Main Content -->

    </div>


    <script>
        $(document).ready(function() {
            $('#edicion_material').on('show.bs.modal', function(event) {
                var button = $(event.relatedTarget) // Button that triggered the modal
                var id = button.data('id')
                var descripcion = button.data('descripcion')
                var cantidad = button.data('cantidad')



                var modal = $(this)
                modal.find('.modal-title').text('Edicion de material:')
                modal.find('#id').val(id)
                modal.find('#descripcion').val(descripcion)
                modal.find('#cantidad').val(cantidad)



            })
        });
    </script>

    <!-- /HK Wrapper -->
    <script>
        $(document).ready(function() {
            $('#carga_certificado').on('show.bs.modal', function(event) {
                var button = $(event.relatedTarget) // Button that triggered the modal
                var oc = button.data('oc')


                var modal = $(this)
                modal.find('.modal-title').text('Carga de certificado')
                modal.find('#oc').val(oc)

            })
        });
    </script>

    <script>
        $(document).ready(function() {
            $('#alta_oc').on('show.bs.modal', function(event) {
                var button = $(event.relatedTarget) // Button that triggered the modal
                var ot = button.data('ot')
                var modal = $(this)
                modal.find('.modal-title').text('Nueva: Orden de compra')
                modal.find('#ot').val(ot)

            })
        });
    </script>

    <script>
        $(document).ready(function() {
            $('#verMaterialesModal').on('show.bs.modal', function(event) {
                var button = $(event.relatedTarget); // Captura el botón que abrió el modal
                var ocId = button.data('oc'); // Obtiene el ID de la OC desde el atributo data-oc
                $('#oc-id').text(ocId); // Muestra el ID de la OC en el título del modal

                // Realiza la solicitud AJAX para obtener los materiales
                $.ajax({
                    url: '/get-materiales/' + ocId, // Asegúrate de que la URL esté bien configurada
                    method: 'GET',
                    success: function(data) {
                        var tabla = $('#tabla-materiales'); // El cuerpo de la tabla donde mostrarás los materiales
                        tabla.empty(); // Limpia la tabla antes de agregar nuevos elementos

                        if (data.length > 0) {
                            data.forEach(function(material) {
                                // Agrega una fila por cada material
                                tabla.append(
                                    '<tr>' +
                                    '<td>' + material.descripcion + '</td>' +
                                    '<td>' + material.cantidad_solicitada + '</td>' +
                                    '<td>' + material.proveedor + '</td>' +
                                    '</tr>'
                                );
                            });
                        } else {
                            // Si no hay materiales, muestra un mensaje en la tabla
                            tabla.append('<tr><td colspan="3">No hay materiales asignados</td></tr>');
                        }
                    },
                    error: function(xhr, status, error) {
                        console.log('Error:', error); // En caso de error en la solicitud
                    }
                });
            });
        });
    </script>

    <script>
        $(document).ready(function() {
            // Captura el clic en el botón
            $('button[data-toggle="modal"]').on('click', function() {
                var materialId = $(this).data('id'); // Captura el ID del material
                $('#material_id').val(materialId); // Asigna el ID al campo oculto
            });
        });
    </script>


    <!-- Select2 JavaScript -->
    <script src="../plantilla/vendors/select2/dist/js/select2.full.min.js"></script>
    <script src="../plantilla/dist/js/select2-data.js"></script>

    <!-- jQuery -->
    <script src="../plantilla/vendors/jquery/dist/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="../plantilla/vendors/popper.js/dist/umd/popper.min.js"></script>
    <script src="../plantilla/vendors/bootstrap/dist/js/bootstrap.min.js"></script>

    <!-- Slimscroll JavaScript -->
    <script src="../plantilla/dist/js/jquery.slimscroll.js"></script>

    <!-- Data Table JavaScript -->
    <script src="../plantilla/vendors/datatables.net/js/jquery.dataTables.min.js"></script>
    <script src="../plantilla/vendors/datatables.net-bs4/js/dataTables.bootstrap4.min.js"></script>
    <script src="../plantilla/vendors/datatables.net-dt/js/dataTables.dataTables.min.js"></script>
    <script src="../plantilla/vendors/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
    <script src="../plantilla/vendors/datatables.net-buttons-bs4/js/buttons.bootstrap4.min.js"></script>
    <script src="../plantilla/vendors/datatables.net-buttons/js/buttons.flash.min.js"></script>
    <script src="../plantilla/vendors/jszip/dist/jszip.min.js"></script>
    <script src="../plantilla/vendors/pdfmake/build/pdfmake.min.js"></script>
    <script src="../plantilla/vendors/pdfmake/build/vfs_fonts.js"></script>
    <script src="../plantilla/vendors/datatables.net-buttons/js/buttons.html5.min.js"></script>
    <script src="../plantilla/vendors/datatables.net-buttons/js/buttons.print.min.js"></script>
    <script src="../plantilla/vendors/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
    <script src="../plantilla/dist/js/dataTables-data.js"></script>

    <!-- FeatherIcons JavaScript -->
    <script src="../plantilla/dist/js/feather.min.js"></script>

    <!-- Fancy Dropdown JS -->
    <script src="../plantilla/dist/js/dropdown-bootstrap-extended.js"></script>
    <script src="../plantilla/vendors/select2/dist/js/select2.full.min.js"></script>
    <script src="../plantilla/dist/js/select2-data.js"></script>
    <!-- Toggles JavaScript -->
    <script src="../plantilla/vendors/jquery-toggles/toggles.min.js"></script>
    <script src="../plantilla/dist/js/toggle-data.js"></script>

    <!-- Init JavaScript -->
    <script src="../plantilla/dist/js/init.js"></script>

</body>

</html>