@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>General Form</h1>
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
                <!-- left column -->
                <div class="col-md-6 mx-auto">
                    <!-- general form elements -->
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">AGREGAR DATOS</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->

                        <div class="card-body">
                            <form action="{{ url('/admin/configuracion/create') }}" method="POST"
                                enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">
                                    <label for="">NOMBRE</label>
                                    <input type="text" class="form-control"
                                        value="{{ old('nombre', $configuracion->nombre ?? '') }}" name="nombre"
                                        placeholder="Escribe aquí..." required>
                                </div>
                                @error('nombre')
                                    <small style="color: red">{{ $message }}</small>
                                @enderror
                                <div class="form-group">
                                    <label for="">DESCRIPCIÓN</label>
                                    <textarea class="form-control" rows="3" name="descripcion" placeholder="Escribe aquí..." required>{{ old('descripcion', $configuracion->descripcion ?? '') }}</textarea>

                                </div>
                                @error('descripcion')
                                    <small style="color: red">{{ $message }}</small>
                                @enderror
                                <div class="form-group">
                                    <label for="">DIRECCIÓN</label>
                                    <input type="text" class="form-control"
                                        value="{{ old('direccion', $configuracion->direccion ?? '') }}" name="direccion"
                                        placeholder="Escribe aquí..." required>
                                </div>
                                @error('direccion')
                                    <small style="color: red">{{ $message }}</small>
                                @enderror
                                <div class="form-group">
                                    <label for="">TELÉFONO</label>
                                    <input type="text" class="form-control"
                                        value="{{ old('telefono', $configuracion->telefono ?? '') }}" name="telefono"
                                        placeholder="Escribe aquí..." required>
                                </div>
                                @error('telefono')
                                    <small style="color: red">{{ $message }}</small>
                                @enderror
                                <div class="form-group">
                                    <label>DIVISA</label>
                                    <select name="divisa" id="" class="form-control" required>
                                        <option value="">seleccione una opción</option>
                                        @foreach ($divisas as $divisa)
                                            <option value="{{ $divisa['symbol'] }}"
                                                {{ old('divisa', $configuracion->divisa ?? '') == $divisa['symbol'] ? 'selected' : '' }}>
                                                {{ $divisa['name'] }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                @error('divisa')
                                    <small style="color: red">{{ $message }}</small>
                                @enderror
                                <div class="form-group">
                                    <label for="">CORREO ELECTRONICO</label>
                                    <input type="email" class="form-control"
                                        value="{{ old('correo_electronico', $configuracion->correo_electronico ?? '') }}"
                                        name="correo_electronico" placeholder="Escribe aquí..." required>
                                </div>
                                @error('correo_electronico')
                                    <small style="color: red">{{ $message }}</small>
                                @enderror
                                <div class="form-group">
                                    <label for="">SITIO WEB</label>
                                    <input type="text" class="form-control"
                                        value="{{ old('web', $configuracion->web ?? '') }}" name="web"
                                        placeholder="Escribe aquí...">
                                </div>
                                @error('web')
                                    <small style="color: red">{{ $message }}</small>
                                @enderror
                                <div class="form-group">
                                    <!-- <label for="customFile">Custom File</label> -->
                                    <label for="">LOGO DE INSTITUCIÓN</label>
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input"
                                            value="{{ old('logo', $configuracion->logo ?? '') }}" name="logo"
                                            placeholder="Escribe aquí..." onchange="mostrarImagen(event)" accept="image/*">
                                        <label class="custom-file-label" for="customFile">Choose file</label>

                                    </div>
                                    <br>
                                    <center>
                                        <img id="preview" src="{{url($configuracion->logo)}}" style="max-width: 300px; margin-top: 10px; margin-bot: 10px;">
                                    </center>
                                    @error('logo')
                                        <small style="color: red">{{ $message }}</small>
                                    @enderror
                                </div>
                                <script>
                                    const mostrarImagen = e =>
                                        document.getElementById('preview').src = URL.createObjectURL(e.target.files[0]);
                                </script>
                                <!-- /.card-body -->
                        </div>
                        <div class="card-footer">
                            <a href="{{ url('/admin') }}" class="btn btn-dark">Regresar</a>
                            <!-- <button type="submit" class="btn btn-dark">Regresar</button>-->
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                        </form>
                    </div>
                    <!-- /.card -->
                </div>
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
