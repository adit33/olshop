

<!-- <header class="hero is-light">
   <div class="hero-head"> -->
      <nav class="navbar is-transparent is-fixed-top" role="navigation" aria-label="main navigation">
         <div class="navbar-brand">
            <a class="navbar-item">
            <img src="http://bulma.io/images/bulma-logo.png" alt="Bulma logo">
            </a>
            <a class="navbar-item is-tab is-hidden-mobile is-active"><span class="icon is-medium"><i class="fa fa-home"></i></span>Home</a>
            <div class="navbar-item has-dropdown is-hoverable">
               <a class="navbar-link">
                  <figure class="image is-32x32" style="margin-right:.5em;">
                  </figure>
                  Category
               </a>
               <div class="navbar-dropdown is-right">
                  @foreach(App\Models\Category::all() as $category)
                  <a class="navbar-item">
                  <span class="icon is-small">
                  <i class="fa fa-user-o"></i>
                  </span>
                  {{ $category->name }}
                  </a>
                  <hr class="navbar-divider">
                  @endforeach
               </div>
            </div>
            <div class="navbar-item has-dropdown is-hoverable is-mega">
               <div class="navbar-link">
                  Blog
               </div>
               <div id="blogDropdown" class="navbar-dropdown " data-style="width: 18rem;">
                  <div class="container is-fluid">
                     <div class="columns">
                        <div class="column">
                           <h1 class="title is-6 is-mega-menu-title">Sub Menu Title</h1>
                           <a class="navbar-item" href="/2017/08/03/list-of-tags/">
                              <div class="navbar-content">
                                 <p>
                                    <small class="has-text-info">03 Aug 2017</small>
                                 </p>
                                 <p>New feature: list of tags</p>
                              </div>
                           </a>
                           <a class="navbar-item" href="/2017/08/03/list-of-tags/">
                              <div class="navbar-content">
                                 <p>
                                    <small class="has-text-info">03 Aug 2017</small>
                                 </p>
                                 <p>New feature: list of tags</p>
                              </div>
                           </a>
                           <a class="navbar-item" href="/2017/08/03/list-of-tags/">
                              <div class="navbar-content">
                                 <p>
                                    <small class="has-text-info">03 Aug 2017</small>
                                 </p>
                                 <p>New feature: list of tags</p>
                              </div>
                           </a>
                        </div>
                        <div class="column">
                           <h1 class="title is-6 is-mega-menu-title">Sub Menu Title</h1>
                           <a class="navbar-item" href="/2017/08/03/list-of-tags/">
                              <div class="navbar-content">
                                 <p>
                                    <small class="has-text-info">03 Aug 2017</small>
                                 </p>
                                 <p>New feature: list of tags</p>
                              </div>
                           </a>
                           <a class="navbar-item " href="/documentation/overview/start/">
                           Overview
                           </a>
                           <a class="navbar-item " href="http://bulma.io/documentation/modifiers/syntax/">
                           Modifiers
                           </a>
                           <a class="navbar-item " href="http://bulma.io/documentation/columns/basics/">
                           Columns
                           </a>
                        </div>
                        <div class="column">
                           <h1 class="title is-6 is-mega-menu-title">Sub Menu Title</h1>
                           <a class="navbar-item" href="/2017/08/03/list-of-tags/">
                              <div class="navbar-content">
                                 <p>
                                    <small class="has-text-info">03 Aug 2017</small>
                                 </p>
                                 <p>New feature: list of tags</p>
                              </div>
                           </a>
                           <a class="navbar-item" href="/2017/08/03/list-of-tags/">
                              <div class="navbar-content">
                                 <p>
                                    <small class="has-text-info">03 Aug 2017</small>
                                 </p>
                                 <p>New feature: list of tags</p>
                              </div>
                           </a>
                           <a class="navbar-item" href="/2017/08/03/list-of-tags/">
                              <div class="navbar-content">
                                 <p>
                                    <small class="has-text-info">03 Aug 2017</small>
                                 </p>
                                 <p>New feature: list of tags</p>
                              </div>
                           </a>
                        </div>
                        <div class="column">
                           <h1 class="title is-6 is-mega-menu-title">Sub Menu Title</h1>
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
            <a class="navbar-item is-tab is-hidden-mobile">About</a>
            <button class="button navbar-burger" data-target="navMenu">
            <span></span>
            <span></span>
            <span></span>
            </button>
         </div>
         <div class="navbar-menu navbar-end" id="navMenu">
            <div class="navbar-item" style="width:auto;">
               <highlight-search></highlight-search>
            </div>
            <a class="navbar-item nav-tag" href="{!! URL::to('cart') !!}">
               <notif-cart></notif-cart>
            </a>
            @if(! Auth::check())
            <div class="navbar-item">
               <a  class="button is-info is-active" href="login">Login</a>
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
  <!--  </div>
</header> -->

