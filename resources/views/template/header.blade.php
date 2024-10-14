<div class="container">
    <header class="d-flex flex-wrap align-items-center justify-content-center justify-content-md-between py-3 mb-4 border-bottom">
      <div class="col-md-3 mb-2 mb-md-0">
        <a href="/" class="d-inline-flex link-body-emphasis text-decoration-none">
          <h2 class="text-black">
            Dzakwan Blog
          </h2>
        </a>
      </div>

      <ul class="nav col-12 col-md-auto mb-2 justify-content-center mb-md-0">
        <li><a href="/" class="nav-link px-2 {{ $active==='home' ? 'link-secondary' : '' }}">Home</a></li>
        <li><a href="/about" class="nav-link px-2 {{ $active==='about' ? 'link-secondary' : '' }}">About Me</a></li>
        <li><a href="/blog" class="nav-link px-2 {{ $active==='blog' ? 'link-secondary' : '' }}">Blog</a></li>
      </ul>

      @auth
        <div class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            <i class="bi bi-person"></i> {{ auth()->user()->name }}
          </a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="/dashboard">My Dashboard</a></li>
            <li><hr class="dropdown-divider"></li>
            <li>
              <form action="/logout" method="post">
                @csrf
                <button type="submit" class="dropdown-item"><i class="bi bi-box-arrow-right"></i> Logout</button>
              </form>
            </li>
          </ul>
        </div>
      @else
        <div class="col-md-3 text-end">
          <a href="/login" class="btn btn-outline-primary me-2">Login</a>
          <a href="/login" class="btn btn-primary">Sign-up</a>
        </div>
      @endauth
    </header>
</div>