@extends('admin.layouts.app')

@section('title', 'Doadores')

@section('content')
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-2 text-gray-800">Doadores</h1>
        <a href="{{route('donors.create')}}" class="d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-plus fa-sm text-white-50"></i> Novo doador</a>
    </div>

    @include('sweetalert::alert')

    @include('includes.messages')

    <!-- DataTales Example -->
    <div class="card shadow mb-4">

        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Lista de doadores
                <a href="#" class="btn btn-info btn-icon-split btn-sm"
                data-toggle="tooltip" data-placement="top" title="Exportar">
                    <span class="icon text-white-50">
                        <i class="fas fa-file-excel"></i>
                    </span>
                    <span class="text">Exportar doadores</span>
                </a>
            </h6>
        </div>
        <div class="card-body">

            <form action="{{route('donors.index')}}" method="get">
                <div class="form-row align-items-center justify-content-end">
                  <div class="col-sm-3 my-1">
                    <div class="input-group">
                        <input type="text" class="form-control" name="search" placeholder="Pesquisar Doador">
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
                            <th>Email</th>
                            <th>WhatsApp</th>
                            <th>Idade</th>
                            <th>Ala/Ramo</th>
                            <th>Data da última doação</th>
                            <th>Tipo de sangue</th>
                            <th>Ações</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>#</th>
                            <th>Nome</th>
                            <th>Email</th>
                            <th>WhatsApp</th>
                            <th>Idade</th>
                            <th>Ala/Ramo</th>
                            <th>Data da última doação</th>
                            <th>Tipo de sangue</th>
                            <th>Ações</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        @forelse ($donors as $donor)
                            <tr>
                                <td><img class="img-profile rounded-circle" style="height:2rem; width:2rem;" src="{{Gravatar::get($donor->email)}}"></td>
                                <td>{{ $donor->name}}</td>
                                <td>{{ $donor->email}}</td>
                                <td>
                                    <a href="https://api.whatsapp.com/send?phone={{$donor->whatsapp}}&amp;text=Olá%20{{$donor->name}}!!%20 Gostaria de saber sua disponibilidade para doar sangue"
                                            data-toggle="tooltip"
                                            data-placement="top"
                                            title="Whatsapp"
                                            class="btn btn-success btn-circle btn-sm"
                                            target="_blank">
                                        <i class="fab fa-whatsapp"></i>
                                    </a>
                                    {{ $donor->whatsapp}}
                                </td>
                                <td>{{ $donor->age}}</td>
                                <td>{{ $donor->ward}}</td>
                                <td>{{Carbon\Carbon::parse($donor->date)->format('d/m/Y')}}</td>
                                <td>{{ $donor->blood}}</td>
                                <td>
                                    <a href="{{route('donors.edit', $donor->id)}}" data-toggle="tooltip" data-placement="top" title="Editar" class="btn btn-primary btn-circle btn-sm">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <a href="{{route('donors.destroy', $donor->id)}}"
                                        data-toggle="tooltip"
                                        data-placement="top"
                                        title="Excluir"
                                        class="btn btn-danger btn-circle btn-sm">
                                        <i class="fas fa-trash"></i>
                                    </a>
                                </td>
                            </tr>

                        @empty
                            <p>Sem doadores de sangue cadastrado</p>
                        @endforelse
                    </tbody>
                </table>
                <p>Atualmente temos um total de <b>{{$donorsCount}}</b> pessoa(s) que doa(m) sangue</p>

                <nav aria-label="Page navigation example">
                    <ul class="pagination justify-content-center">
                        {{$donors->appends([
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
