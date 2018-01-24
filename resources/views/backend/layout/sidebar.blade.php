<aside class="column is-2">
        <nav class="menu">
          <p class="menu-label">
            General
          </p>
          <ul class="menu-list">
            <li><a class="is-active"><span class="icon is-small"><i class="fa fa-tachometer"></i></span> Dashboard</a></li>
          </ul>
          <p class="menu-label">
            Administration
          </p>
          <ul class="menu-list">
            <li><a href="{{ route('product.index') }}"><span class="icon is-small"><i class="fa fa-pencil-square-o"></i></span> Products</a></li>
            <li><a><span class="icon is-small"><i class="fa fa-desktop"></i></span> UI Elements</a></li>
            <li><a><span class="icon is-small"><i class="fa fa-table"></i></span> Tables</a></li>            
            <li><a href="{{ route('report') }}"><span class="icon is-small"><i class="fa fa-bar-chart"></i></span> Report</a></li>
            <li><a href="{{ route('transaction.index') }}"><span class="icon is-small"><i class="fa fa-bar-chart"></i></span>Transaction</a></li>

            <li>
              <a class=""><i class="fa fa-cog"></i></span> Settings</a>
              <ul>
                <li><a href="{{ route('user.index') }}">Users</a></li>
                <li><a href="{{ route('role.index') }}">Roles</a></li>
                <li><a href="{{ route('permission.index') }}">Permissions</a></li>
              </ul>
            </li>
          </ul>
          <p class="menu-label">
            Live On
          </p>
          <ul class="menu-list">
            <li><a><span class="icon is-small"><i class="fa fa-bug"></i></span> Additional Pages</a></li>
            <li><a><span class="icon is-small"><i class="fa fa-windows"></i></span> Extras</a></li>
            <li><a><span class="icon is-small"><i class="fa fa-laptop"></i></span> Landing Page</a></li>
          </ul>
        </nav>
      </aside>

      