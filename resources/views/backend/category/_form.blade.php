<div class="field">
  <label class="label">Name</label>
  <div class="control">
    {!! Form::text('name',null,['class'=> $errors->first('name') ? "input is-danger" : "input" ]) !!} 
    <p class="help is-danger">
        {!! $errors->first('name') !!}
      </p>
  </div>
</div>

<div class="field">
  <label class="label">Email</label>
  <div class="control">
    {!! Form::email('email',null,['class'=> $errors->first('email') ? "input is-danger" : "input" ]) !!} 
    <p class="help is-danger">
        {!! $errors->first('email') !!}
      </p>
  </div>
</div>

 <div class="field">
 <div class="field">
  <label class="label">Password</label>
  <p class="control has-icons-left">
    {!! Form::password('password',['class'=> $errors->first('password') ? "input is-danger" : "input" ]) !!}
    <span class="icon is-small is-left">
      <i class="fa fa-lock"></i>
    </span>
  </p>
   <p class="help is-danger">
        {!! $errors->first('password') !!}
      </p>
</div>

<div class="field">
  <label class="label">Password Confirmation</label>
  <div class="control">
    {!! Form::password('password_confirmation',['class'=> $errors->first('password') ? "input is-danger" : "input" ]) !!} 
    <p class="help is-danger">
        {!! $errors->first('password') !!}
      </p>
  </div>
</div>


<div class="field is-grouped">
  <div class="control">
    {{ Form::submit('Save',['class'=>'button is-primary','id'=>'btnSave'])}}
  </div>
  <div class="control">
    <button class="button is-link">Cancel</button>
  </div>
</div>