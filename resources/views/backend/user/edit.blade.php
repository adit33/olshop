@extends('backend.layout.master')

@section('content')
 <main class="column">

        <div class="columns is-multiline">
          <div class="column is-12">
          	<div class="panel">
    <div class="panel-heading">
        {{$title}}
    </div>
    <div class="panel-block">
        {!! Form::model($user,['url'=>route('user.update',$user->id),'class'=>'control',"id"=>"form-create",'method'=>'PUT']) !!}
            @include('backend.user._form')
        {!! Form::close() !!}
    </div>
</div>

          </div>
        </div>

</main>

@push('scripts')

<script type="text/javascript">
  
</script>

@endpush

@endsection