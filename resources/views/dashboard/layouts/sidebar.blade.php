<ul class="nav flex-column">
  <li class="">
    <a class="text-decoration-none {{ Request::is('dashboard') ? 'text-info-emphasis' : '' }}" href="/dashboard">Dashboard</a>
  </li>
  <li class=" mb-3">
    <a class="text-decoration-none {{ Request::is('dashboard/posts*') ? 'text-info-emphasis' : '' }}" href="/dashboard/posts">My posts</a>
  </li>
  @can('admin')
  <h6 class="text-muted">Administrator</h6>
  <li class="">
    <a class="text-decoration-none {{ Request::is('dashboard/categories*') ? 'text-info-emphasis' : '' }}" href="/dashboard/categories">Post Categories</a>
  </li>
  @endcan
</ul>

{{-- <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted">
  <span>Administrator</span>
</h6> --}}
{{-- <ul class="nav flex-column">
  <li class="nav-item">
    <a class="nav-link {{ Request::is('dashboard/categories*') ? 'text-white bg-dark' : '' }}" href="/dashboard/categories">
      Post Categories
    </a>
  </li>
</ul> --}}