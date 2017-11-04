 <header class="hero is-light">
    <div class="hero-head">
      <nav class="navbar has-shadow" role="navigation" aria-label="main navigation">
        <div class="navbar-brand">

          <a class="navbar-item">
            <img src="#" alt="Bulma logo">
          </a>
          <a class="navbar-item is-tab is-hidden-mobile is-active"><span class="icon is-medium"><i class="fa fa-home"></i></span>Home</a>
          <a class="navbar-item is-tab is-hidden-mobile">Features</a>
          <a class="navbar-item is-tab is-hidden-mobile">Pricing</a>
          <a class="navbar-item is-tab is-hidden-mobile">About</a>
          
          <button class="button navbar-burger" data-target="navMenu">
            <span></span>
            <span></span>
            <span></span>
          </button>

        </div>

        <div class="navbar-item">
          <div class="field has-addons">
  <div class="control">
    <input class="input" @blur="searchProducts" type="text" v-model="inputSearch" placeholder="Find a product">
  </div>
  <div class="control">
    <a @click="searchProducts" class="button is-info">
      Search
    </a>
  </div>
</div>
      <!-- <autocomplete>
</autocomplete> -->
        </div>

        <div class="navbar-menu navbar-end" id="navMenu">
          <a class="navbar-item is-tab is-hidden-tablet is-active">Home</a>
          <a class="navbar-item is-tab is-hidden-tablet">Features</a>
          <a class="navbar-item is-tab is-hidden-tablet">Pricing</a>
          <a class="navbar-item is-tab is-hidden-tablet">About</a>
          <a class="navbar-item nav-tag">              
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
                <!-- <img src="https://avatars1.githubusercontent.com/u/7221389?v=4&s=32"> -->
              </figure>
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
    </div>
  </header>
