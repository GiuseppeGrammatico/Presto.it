<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top shadow-nav">
    <div class="container-fluid">
      <a class="navbar-brand" href="{{route('homepage')}}"><img class="img-fluid img-logo" src="/media/Presto.png" alt=""></a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <div class="navbar-toggler-icon d-flex align-items-center"></div>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="{{route('homepage')}}">{{__('ui.home')}}</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{route('announcement.index')}}">{{__('ui.annunci')}}</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{route('announcement.create')}}">{{__('ui.inserisciAnnuncio')}}</a>
          </li>
            {{-- dropdown categorie --}}
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                {{__('ui.categorie')}}
              </a>
              <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                @foreach ($categories as $category)
                <li>
                  
                  <a class="dropdown-item" href="{{route('announcement.showByCategoryNav', compact('category'))}}">
                    {{__('ui.' . ($category->name))}}
                  </a>

                </li>
                @endforeach
              </ul>
            </li>
            
            
          @auth
           @if (!Auth::user()->is_revisor)
           <li class="nav-item borderNav">
            <a class="nav-link" href="{{route('workWithUs')}}">{{__('ui.lavoraConNoi')}}</a>
          </li>   
           @endif
            
          @endauth        
        </ul>
        <div class="dropp ">
          @auth
           {{-- Badge Revisione --}}
           @if(Auth::user()->is_revisor)
            <a href="{{route('revisor.home')}}">
              <li class="nav-item d-flex justify-content-center align-items-center">
                <div class="d-flex align-items-center justify-content-center">
                  <a class="nav-link ps-sm-0 d-flex align-items-center justify-content-center" href="{{route('revisor.home')}}">Revisor <span class="hoho mb-0 d-flex justify-content-center text-center align-items-center mt-1 ms-1">  {{\App\Models\Announcement::ToBeRevisionedCount()}}</span> </a>
                  
                  
                  {{-- <div class="position-absolute badge numerino d-flex justify-content-center align-items-center p-0">
                    
                    <span class="visually-hidden">{{__('ui.messaggiNonLetti')}}</span>
                  </div> --}}
                </div>
                
              </li>
            </a>   
           @endif
          {{-- End Badge --}}
          <li class="nav-item dropdown d-flex justify-content-center align-items-center pe-0">
            <a class="nav-link dropdown-toggle ps-sm-0 pe-lg-0" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              {{__('ui.linguaa')}}
            </a>
            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
              {{-- flags --}}
              <li class="nav-item d-flex w-100" >
                <x-locale lang="it" nation="it" />
                <div class="lollo"><p>Italiano</p></div>
              </li>

              <li class="nav-item d-flex w-100">
                <x-locale lang="en" nation="gb" />
                <div class="koko"><p>English</p></div>

              </li>

              <li class="nav-item d-flex w-100">
                <x-locale lang="es" nation="es"/>
                <div class="esp "><p>Espanol</p></div>

              </li>
            </ul>
          </li>
          <li class="nav-item dropdown  d-flex align-items-center justify-content-end">
  
            <a class="nav-link dropdown-toggle bb pe-0 position-relative" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              {{__('ui.benvenuto')}}: {{Auth::user()->name}}
                
            </a>
            
            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                <li><a class="dropdown-item" href="" onclick="event.preventDefault(); document.querySelector('#form-logout').submit();">Logout</a></li>
                <form id="form-logout" action="{{route('logout')}}" method="post">
                    @csrf
                </form>
            </ul>
            @else
            <li class="nav-item dropdown d-flex justify-content-center align-items-center pe-0">
              <a class="nav-link dropdown-toggle ps-sm-0 pe-lg-0" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                {{__('ui.linguaa')}}
              </a>
              <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                {{-- flags --}}
                <li class="nav-item d-flex w-100" >
                  <x-locale lang="it" nation="it" />
                  <div class="lollo"><p>Italiano</p></div>
                </li>
  
                <li class="nav-item d-flex w-100">
                  <x-locale lang="en" nation="gb" />
                  <div class="koko"><p>English</p></div>
  
                </li>
  
                <li class="nav-item d-flex w-100">
                  <x-locale lang="es" nation="es"/>
                  <div class="esp "><p>Espanol</p></div>
  
                </li>
              </ul>
            </li>
            <a class="nav-link dropdown-toggle bb me-3" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              {{__('ui.benvenutoGuest')}}
            </a>
            <ul class="dropdown-menu dropdown-menu-end me-5" aria-labelledby="navbarDropdown">
                <li><a class="dropdown-item" href="{{route('login')}}">Login</a></li>
                <li><hr class="dropdown-divider"></li>
                <li><a class="dropdown-item" href="{{route('register')}}">{{__('ui.registrati')}}</a></li>
            </ul> 
                    
          </li>
          @endauth

        </div>
      </div>
  </div>
</nav>