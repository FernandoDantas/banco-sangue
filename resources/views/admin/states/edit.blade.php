@extends('admin.layouts.app')

@section('title', "Edição do estado {$state->name}")

@section('content')
<!-- Begin Page Content -->
<div class="container-fluid">

     <!-- Page Heading -->
     <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-2 text-gray-800">Edição do estado {{ $state->name}}</h1>
            <a href="{{route('grantees.index')}}" class="d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-arrow-left fa-sm text-white-50"></i> Estados</a>
    </div>

    <div class="row">
        <div class="col-12">

            @include('includes.validations-form')

            <form action="{{route('states.update', $state->id)}}" method="post">
                @method('PUT')
                @include('admin.states._partials.form')
                <button type="submit" class="btn btn-primary shadow-sm">Editar</button>
            </form>
        </div>
    </div>
</div>
<!-- /.container-fluid -->

@endsection
