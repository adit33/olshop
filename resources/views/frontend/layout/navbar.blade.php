

<!-- <header class="hero is-light">
   <div class="hero-head"> -->
      <nav class="navbar" role="navigation" aria-label="main navigation">
         <div class="navbar-brand">
            <a class="navbar-item">
            <!-- <img src="http://bulma.io/images/bulma-logo.png" alt="Bulma logo"> -->
            </a>
            <!-- <a class="navbar-item is-tab is-hidden-mobile is-active"><span class="icon is-medium"><i class="fa fa-home"></i></span>Bike</a> -->
            <!-- <div class="navbar-item has-dropdown is-hoverable">
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
            </div> -->
           <div class="navbar-item has-dropdown is-hoverable is-mega">
               <a class="navbar-item">
                  Bike
               </a>
               <div id="blogDropdown" class="navbar-dropdown " data-style="width: 18rem;">
                  <!-- <div class="container is-fluid"> -->
                  <div class="columns is-gapless">
                 <div class="column is-2">
                     <aside class="menu" >
                        <ul class="menu-list">
                            @foreach(App\Models\Category::all() as $category)
                              <li><a>{{ $category->name }}</a></li>
                            @endforeach
                        </ul>
                     </aside>
                 </div>
                 <div class="column is-10">
                    <div class="columns">
                       <div class="column is-4">
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
                       <div class="column is-4">
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
                       <div class="column is-4">
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
                    </div>
                 </div>
                 </div>
                  <!-- </div> -->
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
               <a class="navbar-link" href="login">Login</a>
            
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

