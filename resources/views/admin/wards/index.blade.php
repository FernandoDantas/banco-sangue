@extends('admin.layouts.app')

@section('title', 'Alas ou ramos')

@section('content')
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-2 text-gray-800"><i class="fas fa-fw fa-church"></i> Alas/Ramos</h1>
        <a href="{{route('wards.create')}}" class="d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-plus fa-sm text-white-50"></i> Nova unidade</a>
    </div>

    @include('sweetalert::alert')

    @include('includes.messages')

    <!-- DataTales Example -->
    <div class="card shadow mb-4">

        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Lista de unidades
            </h6>
        </div>
        <div class="card-body">

            <form action="{{route('wards.index')}}" method="get">
                <div class="form-row align-items-center justify-content-end">
                  <div class="col-sm-3 my-1">
                    <div class="input-group">
                        <input type="text" class="form-control" name="search" placeholder="Pesquisar Unidade">
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
                            <th>#</th>
                            <th>Nome</th>
                            <th>Ações</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>#</th>
                            <th>Nome</th>
                            <th>Ações</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        @forelse ($wards as $ward)
                            <tr>
                                <td>{{$ward->id}}</td>
                                <td>{{ $ward->name}}</td>
                                <td>
                                    <a href="{{route('wards.edit', $ward->id)}}" data-toggle="tooltip" data-placement="top" title="Editar" class="btn btn-primary btn-circle btn-sm">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <a href="{{route('wards.destroy', $ward->id)}}"
                                        data-toggle="tooltip"
                                        data-placement="top"
                                        title="Excluir"
                                        class="btn btn-danger btn-circle btn-sm">
                                        <i class="fas fa-trash"></i>
                                    </a>
                                </td>
                            </tr>

                        @empty
                            <p>Sem unidades cadastradas</p>
                        @endforelse
                    </tbody>
                </table>

                <nav aria-label="Page navigation example">
                    <ul class="pagination justify-content-center">
                        {{$wards->appends([
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
