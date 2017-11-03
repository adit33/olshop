@extends('backend.layout.master')

@section('content')
<main class="column">
   <div class="columns is-multiline">
          <div class="column is-12">
          	<div class="panel">
    <div class="panel-heading">
        List User
    </div>
    <div class="panel-block column is-12">
	{!! $dataTable->table() !!}
    </div>
</div>

          </div>
        </div>
        </main>
@endsection

@push('scripts')
	{!! $dataTable->scripts() !!}
@endpush