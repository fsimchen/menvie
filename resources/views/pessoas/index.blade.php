@extends('layouts.app')

@section('html-header-title')
Pessoas
@endsection

@section('styles')
  @parent
	<link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css" rel="stylesheet">
@stop

@section('main-content')
<div class="m-portlet m-portlet--tabs m-portlet--success m-portlet--head-solid-bg">
	<div class="m-portlet__head">
		<div class="m-portlet__head-caption">
			<div class="m-portlet__head-title">
				<h3 class="m-portlet__head-text">
					Pessoas
				</h3>
			</div>
		</div>
	</div>

  <div class="m-portlet__body">

    <div class="m-section">

        <span class="m-section__sub">
			<a href="{{ route('pessoas.create') }}" class="btn btn-success m-btn m-btn--icon">
				<span>
					<i class="fa flaticon-add"></i>
					<span>Adicionar Pessoa</span>
				</span>
			</a>
        </span>

        <br><br>

        <div class="m-section__content">
            <table id="usuarios" class="table table-bordered table-hover table-sm m-table" cellspacing="0" width="100%">
                <thead class="thead-default">
                    <tr>
                        <th>#</th>
                        <th>Nome</th>
                        <th>E-mail</th>
                        <th>Telefone</th>
                        <th>Ações</th>
                    </tr>
                </thead>

                <tbody>
                    @if (count($pessoas) > 0)
                        @foreach ($pessoas as $pessoa)
                            <tr>
                                <td>{{ $pessoa->id }}</td>
                                <td>{{ $pessoa->nome }}</td>
                                <td>{{ $pessoa->email }}</td>
                                <td>{{ $pessoa->telefone }}</td>
                                <td class="text-center">
                                    <a href="{{ route('pessoas.edit',[$pessoa->id]) }}" class="m-portlet__nav-link btn m-btn m-btn--hover-info m-btn--icon btn-sm m-btn--icon-only m-btn--pill">
                                        Editar
                                    </a>

                                    {!! Form::open(array(
                                        'style' => 'display: inline-block;',
                                        'method' => 'DELETE',
                                        'onsubmit' => "return confirm('Tem certeza que deseja excluir esta Pessoa?');",
                                        'route' => ['pessoas.destroy', $pessoa->id])) !!}
                                    <button type="sumbit" class="m-portlet__nav-link btn m-btn m-btn--hover-danger m-btn--icon btn-sm m-btn--icon-only m-btn--pill">
                                        Excluir
                                    </button>
                                    {!! Form::close() !!}

                                </td>
                            </tr>
                        @endforeach
                    @else
                        <tr>
                            <td colspan="6">Nenhuma Pessoa</td>
                        </tr>
                    @endif
                </tbody>
            </table>
        </div>

    </div>
  </div>
</div>
@endsection

@section('scripts')
  @parent
  @if(session('success'))
      <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
      <script type="text/javascript">
          toastr.success('{{ session('success') }}', 'Sucesso', {timeOut: 3000});
      </script>
  @endif
@stop
