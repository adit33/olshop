

<nav class="navbar ">
  <div class="navbar-brand">
    <a class="navbar-item" href="http://bulma.io">
      <img src="http://bulma.io/images/bulma-logo.png" alt="Bulma: a modern CSS framework based on Flexbox" width="112" height="28">
    </a>

    <a class="navbar-item is-hidden-desktop" href="https://twitter.com/jgthms" target="_blank">
      <span class="icon" style="color: #55acee;">
        <i class="fa fa-twitter"></i>
      </span>
    </a>

            <a class="navbar-item is-hidden-desktop" href="login">
              <span class="icon">
                <i class="fa fa-download"></i>
              </span>
              <span>Login</span>
            </a>


    <div class="navbar-burger burger" data-target="navMenubd-example">
      <span></span>
      <span></span>
      <span></span>
    </div>
  </div>

  <div id="navMenubd-example" class="navbar-menu">
    <div class="navbar-start">
      <div class="navbar-item has-dropdown is-hoverable">
        <a class="navbar-link  is-active" href="/documentation/overview/start/">
          Docs
        </a>
        <div class="navbar-dropdown ">
          <a class="navbar-item " href="/documentation/overview/start/">
            Overview
          </a>
          <a class="navbar-item " href="http://bulma.io/documentation/modifiers/syntax/">
            Modifiers
          </a>
          <a class="navbar-item " href="http://bulma.io/documentation/columns/basics/">
            Columns
          </a>
          <a class="navbar-item " href="http://bulma.io/documentation/layout/container/">
            Layout
          </a>
          <a class="navbar-item " href="http://bulma.io/documentation/form/general/">
            Form
          </a>
          <a class="navbar-item " href="http://bulma.io/documentation/elements/box/">
            Elements
          </a>

          <a class="navbar-item is-active" href="http://bulma.io/documentation/components/breadcrumb/">
              Components
            </a>

          <hr class="navbar-divider">
          <div class="navbar-item">
            <div>
              <p class="is-size-6-desktop">
                <strong class="has-text-info">0.5.1</strong>
              </p>

              <small>
                  <a class="bd-view-all-versions" href="/versions">View all versions</a>
                </small>

            </div>
          </div>
        </div>
      </div>
      <div class="navbar-item has-dropdown is-hoverable is-mega">
        <div class="navbar-link">
          Blog
        </div>
        <div id="blogDropdown" class="navbar-dropdown " data-style="width: 18rem;">
          <div class="container is-fluid">
            <div class="columns">
              <div class="column is-3">
                <h1 class="title is-6 is-mega-menu-title">Sub Menu Title</h1>
                @foreach(App\Models\Category::all() as $category)
                              
                              <a class="navbar-item" href="/2017/08/03/list-of-tags/">
                  <div class="navbar-content">

                    <p>
                     
                    </p>
                    <p>{{ $category->name }}</p>

                  </div>
                </a>
                            @endforeach
                
                
              </div>
              <div class="column">
                <div class="card">
  <div class="card-image">
    <figure class="image is-4by3">
      <img src="https://bulma.io/images/placeholders/1280x960.png" alt="Placeholder image">
    </figure>
  </div>
  <div class="card-content">
    <div class="media">
      <div class="media-left">
        <figure class="image is-48x48">
          <img src="https://bulma.io/images/placeholders/96x96.png" alt="Placeholder image">
        </figure>
      </div>
      <div class="media-content">
        <p class="title is-4">John Smith</p>
        <p class="subtitle is-6">@johnsmith</p>
      </div>
    </div>

    <div class="content">
      Lorem ipsum dolor sit amet, consectetur adipiscing elit.
      Phasellus nec iaculis mauris. <a>@bulmaio</a>.
      <a href="#">#css</a> <a href="#">#responsive</a>
      <br>
      <time datetime="2016-1-1">11:09 PM - 1 Jan 2016</time>
    </div>
  </div>
</div>
              </div>

               <div class="column">
                <div class="card">
  <div class="card-image">
    <figure class="image is-4by3">
      <img src="img/rQ6KaHtRCM.jpg" alt="Placeholder image">
    </figure>
  </div>
  <div class="card-content">
    <div class="media">
      <div class="media-content">
        <p class="title is-4" style="text-align: center;">30.000.000</p>
      </div>
    </div>
  </div>
</div>
              </div>

              <div class="column">
                <figure class="image is-4by3">
                  <img src="img/rQ6KaHtRCM.jpg" alt="Placeholder image">
                </figure>
              </div>

              <div class="column">
                <figure class="image is-4by3">
                  <img src="img/rQ6KaHtRCM.jpg" alt="Placeholder image">
                </figure>
              </div>
           
            </div>
          </div>

          <hr class="navbar-divider">
          <div class="navbar-item">
            <div class="navbar-content">
              <div class="level is-mobile">
                <div class="level-left">
                  <div class="level-item">
                    <strong>Stay up to date!</strong>
                  </div>
                </div>
                <div class="level-right">
                  <div class="level-item">
                    <a class="button bd-is-rss is-small" href="http://bulma.io/atom.xml">
                      <span class="icon is-small">
                        <i class="fa fa-rss"></i>
                      </span>
                      <span>Subscribe</span>
                    </a>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="navbar-item has-dropdown is-hoverable">
        <div class="navbar-link">
          More
        </div>
        <div id="moreDropdown" class="navbar-dropdown ">
          <a class="navbar-item " href="http://bulma.io/extensions/">
            <div class="level is-mobile">
              <div class="level-left">
                <div class="level-item">
                  <p>
                    <strong>Extensions</strong>
                    <br>
                    <small>Side projects to enhance Bulma</small>
                  </p>
                </div>
              </div>
              <div class="level-right">
                <div class="level-item">
                  <span class="icon has-text-info">
                    <i class="fa fa-plug"></i>
                  </span>
                </div>
              </div>
            </div>
          </a>
        </div>
      </div>
      <a class="navbar-item " href="http://bulma.io/expo/">
        <span class="bd-emoji">🎨</span> &nbsp;Expo
      </a>
      <a class="navbar-item " href="http://bulma.io/love/">
        <span class="bd-emoji">❤️</span> &nbsp;Love
      </a>
    </div>

  </div>
  <div class="navbar-menu navbar-end" id="navMenu">
            <div class="navbar-item" style="width:auto;">
                <!-- <h1 style="text-align: center;">Search -->
              

                  
                  
               <highlight-search></highlight-search>
            </div>
            <a class="navbar-item nav-tag" href="{!! URL::to('cart') !!}">
               <notif-cart></notif-cart>
            </a>
            @if(! Auth::check())
               <div class="navbar-item">
        <div class="field is-grouped">
          <p class="control">
            <a class="button is-primary" href="login">
              <span class="icon">
                <i class="fa fa-download"></i>
              </span>
              <span>Login</span>
            </a>
          </p>
        </div>
      </div>
            
            @else
            <div class="navbar-item has-dropdown is-hoverable">
               <a class="navbar-link">
                  <figure class="image is-32x32" style="margin-right:.5em;">
                <img src="{{ asset(Auth::user()->avatar) }}">
              </figure
                  {{ Auth::user()->name }}
               </a>
               <div class="navbar-dropdown is-right">
                  <a class="navbar-item">
                  <span class="icon is-small">
                  <i class="fa fa-user-o"></i>
                  </span>
                  Profile
                  </a>
                  <hr class="navbar-divider">
                  <a class="navbar-item" href="logout">
                  <span class="icon is-small">
                  <i class="fa fa-power-off"></i>
                  </span>
                  Logout
                  </a>
               </div>
            </div>
            @endif
         </div>
</nav>