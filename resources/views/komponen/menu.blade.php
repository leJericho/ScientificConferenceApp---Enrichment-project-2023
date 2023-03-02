<header class="d-flex flex-wrap justify-content-center py-3 mb-4 border-bottom">
      <a href="/home" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-dark text-decoration-none">
        <svg class="bi me-2" width="40" height="32"><use xlink:href="#bootstrap"/></svg>
        <span class="fs-4">MOCA</span>
      </a>

      <ul class="nav nav-pills">
        <!-- <li class="nav-item"><a href="/home" class="nav-link active" aria-current="page">Home</a></li> -->
        <li class="nav-item"><a href="/home" class="nav-link" aria-current="page">Home</a></li>
        <li class="nav-item"><a href="/konferensi" class="nav-link">Konferensi</a></li>
        @if (Auth::user()->isAdmin == 1)
        <li class="nav-item"><a href="/user" class="nav-link">Users</a></li>
        @endif
        <li class="nav-item"><a href="/home" class="nav-link">Profile</a></li>
        @if (Auth::user()->isAdmin == 0)
        <li class="nav-item"><a href="/mykonferensi/index" class="nav-link">Books</a></li>
        @endif
        <li class="nav-item"><a href="/faq" class="nav-link">FAQs</a></li>
        <li class="nav-item"><a href="/sesi/logout" class="nav-link">Logout</a></li>
      </ul>
</header>