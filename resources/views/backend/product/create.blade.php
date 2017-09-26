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
        <form class="control">
            <div class="field">
  <label class="label">Product Name</label>
  <div class="control">
    {!! Form::text('name',null,['class'=>'input']) !!}
  </div>
</div>

 <div class="field">
  <label class="label">Price</label>
  <div class="field is-expanded">
      <div class="field has-addons">
        <p class="control">
          <a class="button is-static">
            Rp
          </a>
        </p>
        <p class="control is-expanded">
          <input class="input" type="number" name="price" placeholder="Price">
        </p>
      </div>
      <p class="help">Do not enter the first zero</p>
    </div>
</div>

<div class="field">
  <label class="label">Kategori</label>
  <div class="control">
    <div class="select">
      <select>
        <option>Select dropdown</option>
        <option>With options</option>
      </select>
    </div>
  </div>
</div>

<div class="field">
  <label class="label">Deskripsi</label>
  <div class="control">
    <textarea class="textarea" placeholder="Textarea"></textarea>
  </div>
</div>

<div class="field is-grouped">
  <div class="control">
    <button class="button is-primary">Submit</button>
  </div>
  <div class="control">
    <button class="button is-link">Cancel</button>
  </div>
</div>
        </form>
    </div>
</div>

          </div>
        </div>

</main>
@endsection