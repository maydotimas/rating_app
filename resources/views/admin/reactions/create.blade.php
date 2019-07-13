@extends('admin.default')

@section('page-header')
	Reactions <small>{{ trans('app.add_new_item') }}</small>
@stop

@section('content')
	{!! Form::open([
			'action' => [$controller.'@store'],
			'files' => true
		])
	!!}

		@include('admin.'.$module.'.form')

		<button type="submit" class="btn btn-primary">{{ trans('app.add_button') }}</button>
		
	{!! Form::close() !!}
	
@stop
