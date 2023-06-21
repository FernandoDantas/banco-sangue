@extends('admin.layouts.app')

@section('title', "Detalhes do perfil {$profile->name}")

@section('content')
<!-- Begin Page Content -->
<div class="container-fluid">

    <div class="card">
        <div class="card-body">
            <ul>
                <li>
                    <strong> Nome: </strong> {{ $profile->name }}
                </li>

                <li>
                    <strong> Descrição: </strong> {{ $profile->description }}
                </li>
            </ul>

            <form action="{{  route('profiles.destroy', $profile->id) }}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger"><i class="fas fa-trash"></i> Deletar o Perfil</button>
            </form>
        </div>
    </div>


</div>
<!-- /.container-fluid -->

@endsection
