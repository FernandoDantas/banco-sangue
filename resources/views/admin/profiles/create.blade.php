@extends('admin.layouts.app')

@section('title', 'Cadastrar novo perfil')

@section('content')
<!-- Begin Page Content -->
<div class="container-fluid">

     <!-- Page Heading -->
     <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-2 text-gray-800">Cadastro de perfil</h1>
            <a href="{{route('profiles.index')}}" class="d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-arrow-left fa-sm text-white-50"></i> Perfis</a>
    </div>

    <div class="row">
        <div class="col-12">

            @include('includes.validations-form')

            <form action="{{route('profiles.store')}}" method="post">
                @include('admin.profiles._partials.form')
                <button type="submit" class="btn btn-primary shadow-sm">Cadastrar</button>
            </form>
        </div>
    </div>
</div>
<!-- /.container-fluid -->
<br>

@endsection
