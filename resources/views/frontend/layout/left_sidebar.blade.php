<nav class="panel">
  <p class="panel-heading">
    Kategori
  </p>
<div class="panel-block">
  <aside class="menu">
  <p class="menu-label">
    General
  </p>
  <ul class="menu-list">
    <li><a>Dashboard</a></li>
    <li><a>Customers</a></li>
  </ul>
  <p class="menu-label">
    Administration
  </p>
  <ul class="menu-list">
    <li><a>Team Settings</a></li>
    <li>
      <a class="is-active">Manage Your Team</a>
      <ul>
        <li><a>Members</a></li>
        <li><a>Plugins</a></li>
        <li><a>Add a member</a></li>
      </ul>
    </li>
    <li><a>Invitations</a></li>
    <li><a>Cloud Storage Environment Settings</a></li>
    <li><a>Authentication</a></li>
  </ul>
  <p class="menu-label">
    Category
  </p>
  <!-- <list-category :categories="{{ App\Models\Category::all()->toJson() }}"></list-category> -->

  <ul class="menu-list">
    @foreach(App\Models\Category::all() as $category)
      <li><input type="checkbox" @click="filterProducts" v-model="categories" name="category_id[]" value="{!! $category->id !!}">{!! $category->name !!}</li>
    @endforeach
  </ul>

  </aside>
  </div>
  </nav>