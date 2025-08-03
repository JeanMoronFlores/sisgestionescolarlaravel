@extends('adminlte::page')

@section('content_header')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Listado de gestiones educativas</h1>
                    <hr>
                    <a href="{{ url('admin/gestiones/create') }}" class="btn btn-primary">+ nueva gestion</a>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">General Form</li>
                    </ol>
                </div>

            </div>
        </div><!-- /.container-fluid -->
    </section>
@stop

@section('content')
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                @foreach ($gestiones as $gestion)
                    <div class="col-md-3 ol-sm-6 col-12">
                        <div class="info-box zoomp">
                            <img src="{{ url('/img/calendario.gif') }}" width="70px" alt="">
                            <div class="info-box-content">
                                <span class="info-box-text"><b>Gestion educativa</b></span>
                                <span class="info-box-number" style="color:teal">{{ $gestion->nombre }}</span>
                                <div class="row justify-content-end">
                                    <div class="btn-group">
                                        <a href="{{ url('admin/gestiones/' . $gestion->id . '/edit') }}" class="btn btn-warning me-6">Editar</a>
                                        <form action="{{ url('admin/gestiones/' . $gestion->id) }}" method="post" id="miFormulario{{ $gestion->id }}">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger" onclick="preguntar{{ $gestion->id }}(event)">
                                                <i class="bi bi-trash"></i> Eliminar
                                            </button>
                                        </form>
                                        <script>
                                            function preguntar{{ $gestion->id }}(event) {
                                                event.preventDefault();

                                                Swal.fire({
                                                    title: '¿Desea eliminar este registro?',
                                                    text: '',
                                                    icon: 'question',
                                                    showDenyButton: true,
                                                    confirmButtonText: 'Eliminar',
                                                    confirmButtonColor: '#a5161d',
                                                    denyButtonColor: '#270a0a',
                                                    denyButtonText: 'Cancelar',
                                                }).then((result) => {
                                                    if (result.isConfirmed) {
                                                        // JavaScript puro para enviar el formulario
                                                        document.getElementById('miFormulario{{ $gestion->id }}').submit();
                                                    }
                                                });
                                            }
                                        </script>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                @endforeach

            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </section>

@stop

@section('css')
    {{-- Add here extra stylesheets --}}
    {{-- <link rel="stylesheet" href="/css/admin_custom.css"> --}}
@stop

@section('js')
    <script>
        console.log("Hi, I'm using the Laravel-AdminLTE package!");
    </script>
@stop
