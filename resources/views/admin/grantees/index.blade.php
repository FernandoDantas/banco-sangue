@extends('admin.layouts.app')

@section('title', 'Donatários')

@section('content')
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-2 text-gray-800">Donatários</h1>
        <a href="{{route('grantees.create')}}" class="d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-plus fa-sm text-white-50"></i> Novo donatário</a>
    </div>

    @include('sweetalert::alert')

    @include('includes.messages')

    <!-- DataTales Example -->
    <div class="card shadow mb-4">

        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Lista de donatários
            </h6>
        </div>
        <div class="card-body">

            <form action="{{route('grantees.index')}}" method="get">
                <div class="form-row align-items-center justify-content-end">
                  <div class="col-sm-3 my-1">
                    <div class="input-group">
                        <input type="text" class="form-control" name="search" placeholder="Pesquisar Donatário">
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
                            <th>WhatsApp</th>
                            <th>Prioridade</th>
                            <th>Ações</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>#</th>
                            <th>Nome</th>
                            <th>WhatsApp</th>
                            <th>Prioridade</th>
                            <th>Ações</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        @forelse ($grantees as $grantee)
                            <tr>
                                <td><img class="img-profile rounded-circle" style="height:2rem; width:2rem;" src="{{Gravatar::get($grantee->email)}}"></td>
                                <td>{{ $grantee->name}}</td>
                                <td>
                                    <a href="https://api.whatsapp.com/send?phone={{$grantee->whatsapp}}&amp;text=Olá%20{{$grantee->name}}!!%20 Posso lhe ajudar doando sangue"
                                            data-toggle="tooltip"
                                            data-placement="top"
                                            title="Whatsapp"
                                            class="btn btn-success btn-circle btn-sm"
                                            target="_blank">
                                        <i class="fab fa-whatsapp"></i>
                                    </a>
                                    {{ $grantee->whatsapp}}
                                </td>


                                    @if ($grantee->priority == 'Urgência')
                                        <td>
                                            <span class="badge badge-warning"><i class="fas fa-info-circle"></i> {{$grantee->priority}}</span>
                                        </td>
                                    @elseif ($grantee->priority == 'Emergência')
                                        <td>
                                            <span class="badge badge-danger"><i class="fas fa-info-circle"></i> {{$grantee->priority}}</span>
                                        </td>
                                    @else
                                        <td>
                                            <span class="badge badge-primary"><i class="fas fa-info-circle"></i> {{$grantee->priority}}</span>
                                        </td>
                                    @endif
                                </td>

                                <td>

                                    <button
                                        data-toggle="modal"
                                        data-target="#donatariosModal_{{$grantee->id}}"
                                        title="Ver"
                                        class="btn btn-info btn-circle btn-sm">
                                        <i class="fas fa-search"></i>
                                    </button>
                                    <a href="{{route('grantees.edit', $grantee->id)}}" data-toggle="tooltip" data-placement="top" title="Editar" class="btn btn-primary btn-circle btn-sm">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <a href="{{route('grantees.destroy', $grantee->id)}}"
                                        data-toggle="tooltip"
                                        data-placement="top"
                                        title="Excluir"
                                        class="btn btn-danger btn-circle btn-sm">
                                        <i class="fas fa-trash"></i>
                                    </a>
                                </td>
                            </tr>

                            <div class="modal fade" id="donatariosModal_{{$grantee->id}}" tabindex="-1" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Dados do donatário</h5>
                                            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">×</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            @if ($grantee->priority == 'Urgência')
                                                    <span class="badge badge-warning"><i class="fas fa-info-circle"></i> {{$grantee->priority}}</span>
                                            @elseif ($grantee->priority == 'Emergência')
                                                    <span class="badge badge-danger"><i class="fas fa-info-circle"></i> {{$grantee->priority}}</span>
                                            @else
                                                    <span class="badge badge-primary"><i class="fas fa-info-circle"></i> {{$grantee->priority}}</span>
                                            @endif
                                            <br>
                                            <span><strong>Nome:</strong> {{$grantee->name}}</span><br>
                                            <span><strong>Email:</strong> {{$grantee->email}}</span><br>
                                            <span><strong>Whatsapp:</strong>
                                            {{ $grantee->whatsapp}}
                                            <a href="https://api.whatsapp.com/send?phone={{$grantee->whatsapp}}&amp;text=Olá%20{{$grantee->name}}!!%20 Posso lhe ajudar doando sangue"
                                                data-toggle="tooltip"
                                                data-placement="top"
                                                title="Whatsapp"
                                                class="btn btn-success btn-circle btn-sm"
                                                target="_blank">
                                            <i class="fab fa-whatsapp"></i>
                                        </a>
                                            </span><br>
                                            <span><strong>Idade:</strong> {{$grantee->age}}</span><br>
                                            <span><strong>Unidade:</strong> {{$grantee->ward}}</span><br>
                                            <span><strong>Data limite a receber:</strong>{{Carbon\Carbon::parse($grantee->date)->format('d/m/Y')}}</span><br>
                                            <span><strong>Tipo de sangue:</strong> {{$grantee->blood}}</span><br>
                                            <span><strong>Qtd. Bolsas:</strong> {{$grantee->amount}}</span><br>
                                            <span><strong>Localidade:</strong> {{$grantee->location}}</span><br>
                                        </div>

                                        <div class="modal-footer">
                                            <button class="btn btn-secondary" type="button" data-dismiss="modal">Fechar</button>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        @empty
                            <p>Sem donatários de sangue cadastrado</p>
                        @endforelse
                    </tbody>
                </table>
                <p>Atualmente temos um total de <b>{{$granteesCount}}</b> pessoa(s) que precisa(m) de sangue</p>

                <nav aria-label="Page navigation example">
                    <ul class="pagination justify-content-center">
                        {{$grantees->appends([
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
