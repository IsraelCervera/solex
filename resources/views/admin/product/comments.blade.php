<hr>
<h4>Comentarios</h4>
<hr>

<link rel="stylesheet" href="{{ asset('estilos/style.css')}}">

@if (session('message'))
    <div class="alert alert-success">
    	{{ session('message')}}
	</div>
@endif

@if(Auth::check())
<form class="col-md-4" method="POST" action="{{ route('comentarios.store')}}">
	{{ csrf_field() }}
	@if ($errors->any())
    <div class="alert alert-danger">
     	<ul>
	        @foreach ($errors->all() as $error)
	        <li>{{ $error }}</li>
	        @endforeach
	    </ul>
	</div>
@endif
	<input type="hidden" name="product_id" value="{{$product->id}}" required>
	<p>
		<textarea class="form-control" name="body">{{ old('body')}}</textarea>
		<input type="submit" name="Comentar" value="Comentar" class="btn btn-primary">
	</p>
</form>
@endif
@if(isset($product->comments))
<br>
   <div id="comments-list">
   	@foreach($product->comments as $comment)
   	<div class="comment-item col-md-6 pull-left">
   		<div class="panel panel-default comment-data">
			<div class="panel-heading">
				<div class="panel-title">
					{{$comment->user->name.' '.$comment->user->lastname.' '.\FormatTime::LongTimeFilter($comment->created_at)}}
				</div>
				
			</div>
			<div class="panel-body">
				{{$comment->body}}
				<br>

				@if(Auth::check() && Auth::user()->id == $comment->user_id)
				<a href="{{ route('comentarios.edit', $comment->id) }}" role="button" class="btn btn-sm btn-warning">Editar</a>

				@if(Auth::check() && (Auth::user()->id == $comment->user_id || Auth::user()->id == $product->provider_id))

		<!-- Botón en HTML (lanza el modal en Bootstrap) -->
<a href="#victorModal{{ $comment->id }}" role="button" class="btn btn-sm btn-warning" data-toggle="modal">Eliminar</a>
  
<!-- Modal / Ventana / Overlay en HTML -->
<div id="victorModal{{ $comment->id }}" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">¿Estás seguro?</h4>
            </div>
            <div class="modal-body">
                <p>¿Seguro que quieres borrar el comentario?</p>
                <p class="text-warning"><small>{{ $comment->body }}</small></p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                <form style="display:inline" method="POST" action="{{ 
				route('comentarios.destroy', $comment->id) }}">

                {{ csrf_field() }}
                {!! method_field('DELETE') !!}
					<button class="btn btn-default" type="submit">Eliminar</button>
				</form>
            </div>
        </div>
    </div>
</div>
		@endif
		@endif

		<hr><hr>
			</div>
		</div>
	</div>
		@endforeach
   </div>
   @endif