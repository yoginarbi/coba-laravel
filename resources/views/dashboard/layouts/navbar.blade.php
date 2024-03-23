<a class="navbar-brand ms-2" href="#">My WEB</a>
  <!-- Search Form -->
<form class="d-flex form-inline mx-auto search-form">
    <input class="form-control" type="search" placeholder="Search" aria-label="Search">
</form>

  <!-- Logout Button -->
<form action="/logout" method="post">
    @csrf
    <button type="submit" class="dropdown-item logout-btn"><i class="bi bi-box-arrow-right"></i> Logout</button>
</form>