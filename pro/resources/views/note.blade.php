@extends('layouts.app', ['activePage' => 'notes', 'titlePage' => __('Notas')])

@section('content')
  <div class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">
            <div class="card">
              <div class="card-header card-header-primary">
                <h4 class="card-title ">{{ __('Users') }}</h4>
                <p class="card-category"> {{ __('Here you can manage users') }}</p>
              </div>
              <div class="card-body">
                @if (session('status'))
                  <div class="row">
                    <div class="col-sm-12">
                      <div class="alert alert-success">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                          <i class="material-icons">close</i>
                        </button>
                        <span>{{ session('status') }}</span>
                      </div>
                    </div>
                  </div>
                @endif
                <div class="row">
                  <div class="col-12 text-right">
                    @can('Crear Notas')
                      <a href="{{ route('notes.create') }}" class="btn btn-sm btn-primary">{{ __('Add user') }}</a>
                    @endcan
                  </div>
                </div>
                <div class="table-responsive">
                  <table class="table">
                    <thead class=" text-primary">
                      <th>
                          {{ __('Titulo') }}
                      </th>
                      <th>
                        {{ __('Descripcion') }}
                      </th>
                      <th class="text-right">
                        {{ __('Actions') }}
                      </th>
                    </thead>
                    <tbody>
                      @foreach($notes as $note)
                        <tr>
                          <td>
                            {{ $note->title }}
                          </td>
                          <td>
                            {{ $note->description }}
                          </td>
                          <td class="td-actions text-right">
                            @can('Editar Notas')
                              <a rel="tooltip" class="btn btn-success btn-link" href="{{ route('notes.edit', $note) }}" data-original-title="" title="">
                                <i class="material-icons">edit</i>
                                <div class="ripple-container"></div>
                              </a>
                            @endcan
                            @can('Ver Notas')
                              <a rel="tooltip" class="btn btn-small btn-info" href="{{ route('notes.show', $note) }}" data-original-title="" title="">Editar</a>
                            @endcan                            
                            @can('Eliminar Notas')
                              <form action="{{ route('notes.destroy', $note) }}" method="post">
                                  @csrf
                                  @method('delete')
                                  <button type="button" class="btn btn-danger btn-link" data-original-title="" title="" onclick="confirm('{{ __("Are you sure you want to delete this user?") }}') ? this.parentElement.submit() : ''">
                                      <i class="material-icons">close</i>
                                      <div class="ripple-container"></div>
                                  </button>
                              </form>
                            @endcan
                          </td>
                        </tr>
                      @endforeach
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
        </div>
      </div>
    </div>
  </div>
@endsection