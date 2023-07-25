  <nav class="navbar navbar-expand-lg ">
      <div class="container">

          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
              aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarNav">
              <ul class="navbar-nav ml-auto">
                  <li class="nav-item">
                      <a class="nav-link mr-4" href="/">HOME</a>
                  </li>
                  <li class="dropdown">
                      <button class="dropbtn" href="/menu_pembeli.php">PRODUCT</button>
                      <div class="dropdown-content">
                          @foreach (kategori() as $item)
                              <a
                                  href="/daftarproduk/{{ strtolower(preg_replace('/\s+/', '', $item->nama)) }}">{{ $item->nama }}</a>
                          @endforeach
                      </div>
                  </li>
                  <li class="nav-item">
                      <a class="nav-link mr-4" href="/about">ABOUT</a>
                  </li>
                  <li class="nav-item">
                      <a class="nav-link mr-4" href="/nota">KERANJANG</a>
                  </li>
                  <li class="nav-item">
                      <a class="nav-link mr-4" href="/by_order">BY ORDER</a>
                  </li>
                  <li class="nav-item">
                      <a class="nav-link mr-4" href="/login">LOGIN</a>
                  </li>
                  @if (Route::has('login'))
                      @auth
                          <li class="nav-item">
                              <a class="nav-link mr-4" href="{{ route('ad_user') }}">{{ Auth::user()->username }}</a>
                          </li>
                          <li class="nav-item"><a class="nav-link mr-4" href="#"
                                  onclick="event.preventDefault(); document.getElementById('logout-form-top-bar').submit();">LOGOUT</a>
                          </li>
                          <form id="logout-form-top-bar" action="{{ route('logout') }}" method="POST" class="d-none">
                              @csrf
                          </form>
                      @endauth
                  @endif
              </ul>
          </div>
      </div>
  </nav>
