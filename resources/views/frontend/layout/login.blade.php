<html><head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Login - Free Bulma template</title>
  <link rel="stylesheet" type="text/css" href="{{ asset('css/bulma.css') }}">
</head>
<body class="layout-default">
<div id="root">
  <section class="hero is-fullheight is-medium is-primary is-bold">
        <div class="hero-body">
          <div class="container">
           @if(Session::has('errors'))
           <message message="{!! session('errors') !!}"></message>
           @endif

            <div class="columns is-centered">
              <article class="card is-rounded">
                {!! Form::open(['url'=>route('auth')]) !!}
                <div class="card-content">
                  <h1 class="title">
                                   
                    <img src="https://placeholdit.imgix.net/~text?txtsize=13&txt=150%C3%9750&w=150&h=50" alt="logo" width="200">
                  </h1>
                  <label>E-mail</label>
                  <p class="control has-icon">
                    <input class="input" type="email" placeholder="Email" name="email">
                    <i class="fa fa-envelope"></i>
                  </p>
                  <label>Password</label>
                  <p class="control has-icon">
                    <input class="input" type="password" placeholder="Password" name="password">
                    <i class="fa fa-lock"></i>
                  </p>
                  <p class="control">
                    <button class="button is-primary is-medium is-fullwidth">
                      <i class="fa fa-user"></i>
                      Login
                    </button>
                  </p>
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