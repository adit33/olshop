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
        {!! Form::model($role,['url'=>route('role.update',[$role->id]),'class'=>'control',"id"=>"form-create","method"=>"PATCH"]) !!}
            @include('backend.role._form')
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