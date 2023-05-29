@extends('admin.layouts.app')

@section('title', 'Usuários')

@section('content')
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-2 text-gray-800">Usuários</h1>
        <a href="{{route('users.create')}}" class="d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-plus fa-sm text-white-50"></i> Novo usuário</a>
    </div>

    @include('includes.messages')

    <!-- DataTales Example -->
    <div class="card shadow mb-4">

        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Lista de usuários</h6>
        </div>
        <div class="card-body">

            <form action="{{route('users.index')}}" method="get">
                <div class="form-row align-items-center justify-content-end">
                  <div class="col-sm-3 my-1">
                    <div class="input-group">
                        <input type="text" class="form-control" name="search" placeholder="Pesquisar usuário">
                        <div class="input-group-append">
                          <button class="btn btn-secondary" type="submit">
                            <i class="fa fa-search"></i>
                          </button>
                        </div>
                      </div>
                  </div>
                </div>
              </form>
              <br>

            <div class="table-responsive">
                <table class="table table-bordered" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Nome</th>
                            <th>Email</th>
                            <th>Ações</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>#</th>
                            <th>Nome</th>
                            <th>Email</th>
                            <th>Ações</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        @foreach ($users as $user)
                            <tr>
                                <td><img class="img-profile rounded-circle" style="height:2rem; width:2rem;" src="{{Gravatar::get($user->email)}}"></td>
                                <td>{{ $user->name}}</td>
                                <td>{{ $user->email}}</td>
                                <td>
                                    <a href="{{route('users.edit', $user->id)}}" data-toggle="tooltip" data-placement="top" title="Editar" class="btn btn-primary btn-circle btn-sm">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <a href="{{route('users.destroy', $user->id)}}"
                                        data-toggle="tooltip"
                                        data-placement="top"
                                        title="Excluir"
                                        class="btn btn-danger btn-circle btn-sm">
                                        <i class="fas fa-trash"></i>
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>

                <nav aria-label="Page navigation example">
                    <ul class="pagination justify-content-center">
                        {{$users->appends([
                            'search' => request()->get('search', '')
                        ])->links()}}
                    </ul>
                  </nav>

            </div>
        </div>
    </div>

</div>
<!-- /.container-fluid -->


@endsection
