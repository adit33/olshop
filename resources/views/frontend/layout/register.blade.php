<html><head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Login - Free Bulma template</title>
   <link rel="stylesheet" type="text/css" href="{{ asset('css/app.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('css/vendor.css') }}">
</head>
<body class="layout-default">
<div id="root">
  <section class="hero is-fullheight is-medium is-primary is-bold">
        <div class="hero-body">
          <div class="container">
            <div class="columns is-centered">
              <article class="card is-rounded">
                {!! Form::open(['url'=>route('user.store')]) !!}
                <div class="card-content">
                
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

 <a class="button is-info" href="{!! URL::to('social-media/register/facebook') !!}">
    <span class="icon">
      <i class="fa fa-facebook"></i>
    </span>
  </a>

  <a class="button" href="{!! URL::to('social-media/register/github') !!}">
    <span class="icon is-small">
      <i class="fa fa-github"></i>
    </span>
  </a>

                </div>
                {!! Form::close() !!}
              </article>
            </div>
          </div>
    </div>
  </section>
  </div>
</body>
<script type="text/javascript" src="{{ asset('js/app.js') }}"></script>
<script type="text/javascript">
  new Vue({
    el:"#root",
  })
</script>
</html>