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
        {!! Form::open(['url'=>route('brand.store'),'class'=>'control',"id"=>"form-create","method"=>"POST"]) !!}
            @include('backend.brand._form')
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