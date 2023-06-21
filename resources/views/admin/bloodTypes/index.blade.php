@extends('admin.layouts.app')

@section('title', 'Tipos de sangue')

@section('content')
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-2 text-gray-800"><i class="fas fa-fw fa-heart"></i> Tipos sanguíneos</h1>
        <a href="{{route('types.create')}}" class="d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-plus fa-sm text-white-50"></i> Novo tipo</a>
    </div>

    @include('sweetalert::alert')

    @include('includes.messages')

    <!-- DataTales Example -->
    <div class="card shadow mb-4">

        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Lista de tipos de sangue
            </h6>
        </div>
        <div class="card-body">

            <form action="{{route('types.index')}}" method="get">
                <div class="form-row align-items-center justify-content-end">
                  <div class="col-sm-3 my-1">
                    <div class="input-group">
                        <input type="text" class="form-control" name="search" placeholder="Pesquisar tipos sanguíneos">
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
                <table class="table table-bordered" width="100%" cellspacing="0" id="myTable">
                    <thead>
                        <tr>
                            <th>Nome</th>
                            <th>Ações</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>Nome</th>
                            <th>Ações</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        @forelse ($bloodTypes as $type)
                            <tr>
                                <td>{{ $type->name}}</td>
                                <td>
                                    <a href="{{route('types.edit', $type->id)}}" data-toggle="tooltip" data-placement="top" title="Editar" class="btn btn-primary btn-circle btn-sm">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <a href="{{route('types.destroy', $type->id)}}"
                                        data-toggle="tooltip"
                                        data-placement="top"
                                        title="Excluir"
                                        class="btn btn-danger btn-circle btn-sm">
                                        <i class="fas fa-trash"></i>
                                    </a>
                                </td>
                            </tr>

                        @empty
                            <p>Sem tipos de sangue cadastrado</p>
                        @endforelse
                    </tbody>
                </table>

                <nav aria-label="Page navigation example">
                    <ul class="pagination justify-content-center">
                        {{$bloodTypes->appends([
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
