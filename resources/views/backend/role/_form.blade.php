<div class="field">
  <label class="label">Name</label>
  <div class="control">
    {!! Form::text('name',null,['class'=> $errors->first('name') ? "input is-danger" : "input" ]) !!} 
    <p class="help is-danger">
        {!! $errors->first('name') !!}
      </p>
  </div>
</div>

Permission :

@foreach($permissions as $permission)
<?php $checked = in_array($permission->id, $role->permissions->pluck('id')->toArray()); ?>
  <div class="field">
    <input class="is-checkradio" id="{{ $permission->id }}" type="checkbox" value="{{ $permission->id }}" name="permission_id[]" {{ $checked ? "checked" : '' }}>
    <label for="{{ $permission->id }}">{{ $permission->name }}</label>
  </div>
@endforeach




<div class="field is-grouped">
  <div class="control">
    {{ Form::submit('Save',['class'=>'button is-primary','id'=>'btnSave'])}}
  </div>
  <div class="control">
    <button class="button is-link">Cancel</button>
  </div>
</div>