<div class="row mB-40">
	<div class="col-sm-8">
		<div class="bgc-white p-20 bd">
			{!! Form::myInput('text', 'name', 'Reaction Name') !!}

			{!! Form::myFile('avatar', 'Image') !!}
	
			{!! Form::mySelect('type', 'Type', config('variables.reaction_type'), null, ['class' => 'form-control select2']) !!}


		</div>  
	</div>
</div>