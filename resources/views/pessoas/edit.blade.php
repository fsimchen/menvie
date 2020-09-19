@extends('layouts.app')

@section('html-header-title')
Editar Pessoa
@endsection

@section('main-content')
<div class="row">
	<div class="col-xl-9 col-xxl-7">
		<div class="m-portlet m-portlet--tabs m-portlet--success m-portlet--head-solid-bg">
			<div class="m-portlet__head">
				<div class="m-portlet__head-caption">
					<div class="m-portlet__head-title">
						<h3 class="m-portlet__head-text">
							Editar Pessoa
						</h3>
					</div>
				</div>
			</div>
			<!--begin::Form-->
            <form method="POST" action="{{ route('pessoas.update', $pessoa->id) }}" id="m_form" class="m-form m-form--state m-form--fit m-form--label-align-right" autocomplete="off">
                {{ method_field('PUT') }}
				{{ csrf_field() }}

				<div class="m-portlet__body">
					@if (count($errors) > 0)
					<div class="form-group m-form__group row">
		                <div class="col-lg-2 col-form-label"></div>
		                <div class="col-lg-6">
							<div class="m-alert m-alert--icon m-alert--square alert alert-danger" role="alert" id="m_form_msg_laravel">
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
		                </div>
		            </div>
					@endif

                    <div class="form-group m-form__group row">
                        <div class="form-group col-lg-7">
                            <label>Nome *</label>
                            <input value="{{ old('nome', $pessoa->nome) }}" name="nome" type="text" class="form-control m-input m-input--square">
                        </div>
                        <div class="form-group col-lg-7">
                            <label>Email</label>
                            <input value="{{ old('email', $pessoa->email) }}" name="email" type="text" class="form-control m-input m-input--square">
                        </div>
                        <div class="form-group col-lg-7">
                            <label>Telefone</label>
                            <input value="{{ old('telefone', $pessoa->telefone) }}" name="telefone" type="text" class="form-control m-input m-input--square telefone">
                        </div>
                    </div>

					<div class="form-group m-form__group row">
						<div class="form-group col-lg-4">
		                    <button id="submit-form-editar-cliente" type="submit" class="btn btn-success">Salvar</button>
						</div>
		            </div>

		        </div>
			</form>
			<!--end::Form-->
		</div>
	</div>
</div>
@endsection

@section('scripts')
  @parent
	<!-- Laravel Javascript Validation -->
	<script type="text/javascript" src="{{ asset('vendor/jsvalidation/js/jsvalidation.js')}}"></script>
	{!! JsValidator::formRequest('App\Http\Requests\PessoaUpdateRequest', '#m_form'); !!}
@stop