@extends('admin.layouts.app')

@section('title', 'Cadastrar novo tipo')

@section('content')
<!-- Begin Page Content -->
<div class="container-fluid">

     <!-- Page Heading -->
     <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-2 text-gray-800">Cadastro de tipos sanguíneo</h1>
            <a href="{{route('types.index')}}" class="d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-arrow-left fa-sm text-white-50"></i> Tipos sanguíneos</a>
    </div>

    <div class="row">
        <div class="col-12">

            @include('includes.validations-form')

            <form action="{{route('types.store')}}" method="post">
                @include('admin.bloodTypes._partials.form')
                <button type="submit" class="btn btn-primary shadow-sm">Cadastrar</button>
            </form>
        </div>
    </div>
</div>
<!-- /.container-fluid -->
<br>

@endsection
