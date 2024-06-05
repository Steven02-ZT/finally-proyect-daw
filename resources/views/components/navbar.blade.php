<nav class="navbar bg-dark-base shadow-lg sticky-top">
  <div class="container-fluid d-flex align-items-center">
    <div class="d-flex">
        <button type="button" id="activateNav" class="bg-dark-base text-light-base btn fs-2"><i class="fa-solid fa-bars"></i></button>
        <a href="/" class="d-flex align-items-center navbar-brand fs-4">
            <img src="/images/logo.png" width="60pt" height="60pt">
            <span class="text-blue-base">ZonaMovie</span>
        </a>
    </div>
    <form class="d-flex" role="search">
      <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
      <button class="btn btn-outline-light" type="submit">Search</button>
    </form>
  </div>
</nav>

<div style="width: 100vw; height: 50vh; z-index:99; display: none; background-image: url(/images/camera-nav.png); 
        background-repeat: no-repeat;
        background-position: right;
        background-size: contain;
        z-index:9999;" class="position-fixed top-0 bg-light-base" id="navbar">
    <div class="position-relative text-blue-base fs-2 d-flex justify-content-center align-items-center" style="width: 50pt; height: 50pt;"><button type="button" class="btn fs-2" id="deactivateNav"><i class="fa-solid fa-xmark"></i></button></div>
    <div class="d-flex flex-column gap-5 w-100 p-5 pt-0">
        <h1 class="align-self-start text-dark-darker">Menu</h1>
        <div class="d-flex" style="gap: 50pt;">
            <div>
                <h3 class="border-bottom text-blue-base"><i class="fa-solid fa-list"></i>&nbsp;Categorías</h3>
                <div class="navbar-nav p-3 pb-0 pt-0">
                    <div class="nav-item">Categoria name</div>
                    <div class="nav-item">Categoria name</div>
                    <div class="nav-item">Categoria name</div>
                </div>
            </div>
            <div>
                <h3 class="border-bottom text-blue-base"><i class="fa-solid fa-user"></i>&nbsp;Cuenta</h3>
                <div class="navbar-nav p-3 pb-0 pt-0">
                    <div class="nav-item">Registrarse</div>
                    <div class="nav-item">Logear</div>
                </div>
            </div>
            <div>
                <h4 class="border-bottom text-blue-base"><i class="fa-solid fa-money-bill"></i>&nbsp;Planes</h4>
            </div>
            <div>
                <h4 class="border-bottom text-blue-base"><i class="fa-solid fa-address-book"></i>&nbsp;Contactanos</h4>
            </div>
        </div>
    </div>
</div>