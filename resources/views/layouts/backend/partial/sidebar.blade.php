<div class="sidebar" data-color="rose" data-background-color="black" data-image="{{ asset('assets/backend') }}/img/sidebar-1.jpg">
  <!--
      Tip 1: You can change the color of the sidebar using: data-color="purple | azure | green | orange | danger"

      Tip 2: you can also add an image using data-image tag
  -->
  <div class="logo">
    <a href="http://www.creative-tim.com" class="simple-text logo-mini">
      CT
    </a>
    <a href="http://www.creative-tim.com" class="simple-text logo-normal">
      Creative Tim
    </a>
  </div>
  <div class="sidebar-wrapper">
    <div class="user">
      <div class="photo">
        <img src="{{ asset('assets/backend') }}/img/faces/avatar.jpg" />
      </div>
      <div class="user-info">
        <a data-toggle="collapse" href="#collapseExample" class="username">
          <span>
            {{ Auth::user()->name }}
            <b class="caret"></b>
          </span>
        </a>
        <div class="collapse" id="collapseExample">
          <ul class="nav">
            <li class="nav-item">
              <a class="nav-link" href="{{ route('admin.settings') }}">
                <span class="sidebar-mini">  <i class="material-icons">settings</i> </span>
                <span class="sidebar-normal"> Settings </span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" onclick="event.preventDefault();
                               document.getElementById('logout-form').submit();">
                <span class="sidebar-mini"> <i class="material-icons">input</i> </span>
                <span class="sidebar-normal"> Sign Out </span>
              </a>
              <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                  @csrf
              </form>
            </li>
           
          </ul>
        </div>
      </div>
    </div>
    <ul class="nav">
      <li class="nav-item {{ Request::is('admin/dashboard')? 'active' : '' }} ">
        <a class="nav-link" href="{{ route('admin.dashboard') }}">
          <i class="material-icons">dashboard</i>
          <p> Dashboard </p>
        </a>
      </li>
      <li class="nav-item {{ Request::is('admin/tag*')? 'active' : '' }} ">
        <a class="nav-link" href="{{ route('admin.tag.index') }}">
          <i class="material-icons">label</i>
          <p> Tag </p>
        </a>
      </li>
      <li class="nav-item {{ Request::is('admin/category*')? 'active' : '' }} ">
        <a class="nav-link" href="{{ route('admin.category.index') }}">
          <i class="material-icons">apps</i>
          <p> Category </p>
        </a>
      </li>
      <li class="nav-item {{ Request::is('admin/post*')? 'active' : '' }} ">
        <a class="nav-link" href="{{ route('admin.post.index') }}">
          <i class="material-icons">library_books</i>
          <p> Posts </p>
        </a>
      </li>
      <li class="nav-item {{ Request::is('admin/pending*')? 'active' : '' }} ">
        <a class="nav-link" href="{{ route('admin.post.pending') }}">
          <i class="material-icons">library_books</i>
          <p> Pending Posts </p>
        </a>
      </li>
      <li class="nav-item {{ Request::is('admin/favorite*')? 'active' : '' }} ">
        <a class="nav-link" href="{{ route('admin.favorite.index') }}">
          <i class="material-icons">favorite</i>
          <p> Favorite Post </p>
        </a>
      </li>
      <li class="nav-item {{ Request::is('admin/comment*')? 'active' : '' }} ">
        <a class="nav-link" href="{{ route('admin.comment.index') }}">
          <i class="material-icons">comment</i>
          <p> Comment </p>
        </a>
      </li>
      <li class="nav-item {{ Request::is('admin/authors*')? 'active' : '' }} ">
        <a class="nav-link" href="{{ route('admin.author.index') }}">
          <i class="material-icons">account_circle</i>
          <p> Authors </p>
        </a>
      </li>
      <li class="nav-item {{ Request::is('admin/subscriber*')? 'active' : '' }} ">
        <a class="nav-link" href="{{ route('admin.subscriber.index') }}">
          <i class="material-icons">subscriptions</i>
          <p> Subcribers </p>
        </a>
      </li>
     
    </ul>
  </div>
</div>