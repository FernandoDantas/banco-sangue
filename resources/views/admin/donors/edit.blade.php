@extends('admin.layouts.app')

@section('title', "Edição do doador {$donor->name}")

@section('content')
<!-- Begin Page Content -->
<div class="container-fluid">

     <!-- Page Heading -->
     <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-2 text-gray-800">Edição do doador {{ $donor->name}}</h1>
            <a href="{{route('donors.index')}}" class="d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-arrow-left fa-sm text-white-50"></i> Doadores</a>
    </div>

    <div class="row">
        <div class="col-8">

            @include('includes.validations-form')

            <form action="{{route('donors.update', $donor->id)}}" method="post">
                @method('PUT')
                @include('admin.donors._partials.form')
                <button type="submit" class="btn btn-primary shadow-sm">Editar</button>
            </form>
        </div>
    </div>
</div>
<!-- /.container-fluid -->

@endsection
