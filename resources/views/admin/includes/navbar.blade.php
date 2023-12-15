<nav class="navbar navbar-expand-lg sticky-top">
    <div class="container">
        <i class="fa-brands fa-angrycreative imm"></i>
              {{-- <span class="im">Mama</span> --}}
        <button class="navbar-toggler"
          type="button"
          data-bs-toggle="collapse" 
          data-bs-target="#navbarSupportedContent"
          aria-controls="navbarSupportedContent"
          aria-expanded="false"
          aria-label="Toggle navigation">
          <i class="fa-solid fa-bars"></i>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav  mb-2 ms-auto mb-lg-0">
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="{{route('index.admin')}}">Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{route('index.catgerie.admin')}}">Catgerie</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{route('index.vendore.admin')}}">Vendores</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{route('index.item.admin')}}">Items</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{route('admin.slider.create')}}">Slider</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{route('lang.admin')}}">Languages</a>
            </li>
          </ul>
            
        </div>  
    </div>      
</nav>
    
