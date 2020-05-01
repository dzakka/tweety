<nav class="navbar bg-light">

  <!-- Links -->
  <ul class="navbar-nav">
  <li class="nav-item">
      <a class="nav-link" href="/home">Home</a>
    </li>
     <li class="nav-item">
      <a class="nav-link" href="/notifications">Notifications</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="/profiles">Explore</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="/profiles/{{auth()->user()->username}}/edit">My profile</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="#">Link 3</a>
    </li>
  </ul>

</nav>
