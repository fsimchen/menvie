@extends('layouts.app')

@section('html-header-title')
Cadastro de Pessoa
@endsection

@section('main-content')
<div class="m-portlet m-portlet--tabs m-portlet--success m-portlet--head-solid-bg">
    <div class="m-portlet__head">
        <div class="m-portlet__head-caption">
            <div class="m-portlet__head-title">
                <h3 class="m-portlet__head-text">
                    Cadastro de Pessoa
                </h3>
            </div>
        </div>
    </div>
    {!! Form::open(['novalidate' => 'novalidate', 'method' => 'POST', 'id' => 'm_form', 'class' => 'm-form m-form--state m-form--fit m-form--label-align-right', 'route' => ['pessoas.store']]) !!}
        <div class="m-portlet__body">
            <div class="m-form__content">

				@if (count($errors) > 0)
				<div class="m-alert m-alert--icon alert alert-danger" role="alert" id="m_form_msg_laravel">
					<div class="m-alert__icon">
						<i class="la la-warning"></i>
					</div>
					<div class="m-alert__text">
							@foreach ($errors->all() as $error)
									<li>{{ $error }}</li>
							@endforeach
					</div>
					<div class="m-alert__close">
						<button type="button" class="close" data-close="alert" aria-label="Close"></button>
					</div>
				</div>
				@endif

				<div class="form-group m-form__group row">
					{!! Form::label('nome', 'Nome *', ['class' => 'col-lg-2 col-form-label']) !!}
					<div class="col-lg-6">
						{!! Form::text('nome', old('nome'), ['class' => 'form-control m-input m-input--square', 'placeholder' => '', 'required' => '']) !!}
					</div>
				</div>

				<div class="form-group m-form__group row">
					{!! Form::label('email', 'E-mail *', ['class' => 'col-lg-2 col-form-label']) !!}
					<div class="col-lg-6">
						{!! Form::text('email', old('email'), ['class' => 'form-control m-input m-input--square', 'placeholder' => '', 'required' => '']) !!}
					</div>
				</div>

				<div class="form-group m-form__group row">
					{!! Form::label('telefone', 'Telefone *', ['class' => 'col-lg-2 col-form-label']) !!}
					<div class="col-lg-6">
						{!! Form::text('telefone', old('telefone'), ['class' => 'form-control m-input m-input--square', 'placeholder' => '', 'required' => '']) !!}
					</div>
				</div>

                <div class="form-group m-form__group row">
                    <div class="col-lg-3 col-form-label"></div>
                    <div class="col-lg-6">
                        <button type="submit" class="btn btn-success">Cadastrar</button>
                    </div>
                </div>

			</div>
		</div>
	{!! Form::close() !!}
</div>
@endsection

@section('scripts')
  @parent
	<!-- Laravel Javascript Validation -->
	<script type="text/javascript" src="{{ asset('vendor/jsvalidation/js/jsvalidation.js')}}"></script>
	{!! JsValidator::formRequest('App\Http\Requests\PessoaStoreRequest', '#m_form'); !!}
@stop
