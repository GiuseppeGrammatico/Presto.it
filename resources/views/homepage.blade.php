<x-layout>
    <div class="container-fluid ">
        <div class="row">
            <div class="col-12 d-flex justify-content-center allert">
                {{-- Allert --}}
                @if (session('flash'))
                    <div class="alert alert-success w-75 d-flex justify-content-center">
                        {{ session('flash') }}
                    </div>
                @endif

                @if (session('flashMiddleware'))
                    <div class="alert alert-success w-75 d-flex justify-content-center">
                        {{ session('flashMiddleware') }}
                    </div>
                @endif
            </div>
        </div>
    </div>
    {{-- Header --}}
    <div class="container-fluid header">

        {{-- Ricerca --}}
        <div class="row lll "> 
                    
            <div class="col-12 col-md-6 col-custom d-flex align-items-center p-5 justify-content-center">
                <div class="d-flex flex-column justify-content-center align-items-center">
                    <h1 class="display-1 text-uppercase h1-shadow titleHeader mt-5 mb-2">presto</h1>
                    <p class="subtitleHeader">Fai presto presto!</p>
                    <div class="col-6 justify-content-center d-flex align-items-center">
                        @auth
                        <a class="btn bottone_annuncio text-white " href="{{route('announcement.create')}}"><strong>{{__('ui.inserisciAnnuncio')}}</strong> </a>
                        @else
                        <a class="btn bottone_annuncio text-white " href="{{route('register')}}"><strong>{{__('ui.inserisciAnnuncio')}}</strong> </a>
                        @endauth
                    </div>
                    <div class="barraRicerca flex-column  shadow d-flex">
                        <h3 class="d-flex text-center mb-3 titleRicerca">{{__('ui.trovaAnnunci')}}:</h3>
                        <form action="{{route('search')}}" method="GET" class="d-flex llll justify-content-center align-items-center">
                            <input name="q" class="form-control me-2 form-ricerca" type="text" placeholder="Cosa stai cercando?" aria-label="Search">
                            <button class="btn bottone_annuncio2  mx-2 w-50 text-white" type="submit"><strong>{{__('ui.cerca')}}</strong></button>
                        </form>
                    </div> 
                </div>                    
            </div>
            <div class="col-12 col-lg-6 im d-flex align-items-center">
                <img src="/media/header1.png"class="img-fluid im" alt="">
            </div>
        </div>


    </div>
    {{-- Sezione Icone --}}
    <div class="container-fluid g ">
        <div class="row position-relative justify-content-center align-items-center ">
            <div class="col-11 col-md-6 titoloConsigli position-absolute text-center text-white align-items-center d-flex justify-content-center">
                <h3>{{__('ui.vendiInQuattro')}}</h3>
            </div>
        </div>
        <div class="row section1  align-items-center justify-content-between stondatura">
            <div class="d-flex col-12 col-md-6 col-lg-3 text-center div_icone justify-content-center">
                <div class="d-flex justify-content-center align-items-center flex-column  ">
                {{-- <i class="fas fa-user-check fa-3x icon_border"></i>  --}}
                <i class="fas  fa-user fa-3x icon_border"></i>
                <a href="{{route('register')}}" class="text-decoration-none pe-auto text-white"><h4>{{__('ui.registratiSuPresto')}}</h4></a>
                </div>
            </div>
            <div class="d-flex col-12 col-md-6 col-lg-3 text-center div_icone justify-content-center">
                <div class="d-flex justify-content-center align-items-center flex-column  ">
                <i class="fas fa-upload fa-3x icon_border"></i>                 
                <a href="{{route('announcement.create')}}" class="text-decoration-none pe-auto text-white"><h4>{{__('ui.carica')}}</h4></a> 
            </div>      
            </div>
            <div class="d-flex col-12 col-md-6 col-lg-3 text-center div_icone justify-content-center">
                <div class="d-flex justify-content-center align-items-center flex-column  ">
                <i class="fas fa-box-open fa-3x icon_border"></i>             
                <a href="{{route('homepage')}}" class="text-decoration-none pe-auto text-white"><h4>{{__('ui.spedisci')}}</h4></a>  
            </div>  
                         
            </div>
            <div class="d-flex col-12 col-md-6 col-lg-3 text-center div_icone justify-content-center">
                <div class="d-flex justify-content-center align-items-center flex-column  ">
                <i class="fas fa-hand-holding-usd fa-3x icon_border"></i>       
                <a href="{{route('homepage')}}" class="text-decoration-none  pe-auto text-white"><h4>{{__('ui.concludi')}}</h4></a>  
            </div>     
            </div>
        </div>
    </div>
 
  
    {{-- Carosello annunci --}}
    <div class="container">
        <div class="row justify-content-center align-items-center my-5 swiperCard">
            <div class="col-12 col-md-6 col-lg-7 text-center text-white">
                <img src="/media/Presto_3.png" class="img-fluid img-annunci" alt="">
                <h2 class="pb-4">{{__('ui.annunciRecenti')}}</h2>
                <p>{{__('ui.prestoAnnunci')}}</p>
                <a class="btn bottone_swiper" href="{{route('announcement.index')}}"><strong>{{__('ui.annunci')}}</strong> </a>
                <a class="btn bottone_swiper2" href="{{route('announcement.create')}}"><strong>{{__('ui.inserisciAnnuncio')}}</strong> </a>
            </div>
            <div class="col-12 col-md-6 col-lg-5 pt-5 d-flex justify-content-center align-items-center">
                <div class="swiper">
                    <!-- Additional required wrapper -->
                    <div class="swiper-wrapper">
                      <!-- Slides -->
                        @foreach ($announcements as $announcement)
                            <div class="swiper-slide">
                                <div class="w-100">
                                    <div class="card mx-1">
                                        @if (count($announcement->images)>0)
                                    
                                            <img src="{{$announcement->images->first()->getUrl(376,300)}}" alt="" onerror='this.src="http://picsum.photos/376/300"'>        
                                        @else
                                            <img src="http://picsum.photos/376/300" alt="">
                                        @endif
                                     
                                        <div class="card-body">
                                            <h3 class="card-title mb-3 text-rosso pb-4">{{$announcement->title}}</h3>
                                                <div class="d-flex mb-0">   
                                                    <p class="mb-0">{{__('ui.categoria')}}: <a href="{{route('announcement.showByCategory', ['announcement' => $announcement] )}} " class="links"><p class="fw-bold mb-2 text-rosso">{{__('ui.' . ($announcement->category->name))}}</p></a></p>
                                                </div>

                                                <div class="d-flex">
                                                    <p class="d-flex justify-content-start pb-0">{{__('ui.inseritoDa')}}: <p class="fw-bold d-flex text-rosso"> {{$announcement->user->name}}</p> </p>
                                                </div>

                                                <div class="d-flex justify-content-end">
                                                    <p class="">{{__('ui.prezzo')}}: <p class="fw-bold text-rosso">{{$announcement->price}} €</p> </p>
                                                </div>
                                                
                                                <div class="d-flex justify-content-end ">
                                                    <a  href="{{route('announcement.show', compact('announcement'))}}" class="btn bg-rosso text-white btn_card2 text-center"><strong>{{__('ui.maggioriDettagli')}}</strong> </a>
                                                </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach     
                    </div>
                    <!-- If we need pagination -->
                    <div class="swiper-pagination"></div>
                    <!-- If we need scrollbar -->
                    <div class="swiper-scrollbar1"></div>
                </div>
            </div>       
        </div>
    </div>
    {{-- Sezione 2--}}
    <div class="container-fluid bg-white p-5">
        <div class="row justify-content-center align-items-center">
            <div class="col-12 col-md-4 cardSection2 shadow">
                <img src="/media/Enterprise.png" class="img-fluid img-Section2" alt="">
                <p class="lead mb-1">{{__('ui.consigliVerificati')}}</p>
                <a class="text-rosso decoration fw-bold" href="{{route('advice.tips')}}">{{__('ui.scopriDiPiu')}}</a>
                
            </div>
            <div class="col-12 col-md-4 cardSection2 mx-5 shadow">
                <img src="/media/Sign In.png" class="img-fluid img-Section2" alt="">
                <p class="lead mb-1">{{__('ui.consigliProfiloAut')}}</p>
                <a class="text-rosso decoration fw-bold" href="{{route('advice.tips')}}">{{__('ui.scopriDiPiu')}}</a>
               

            </div>
            <div class="col-12 col-md-4 cardSection2 shadow">
                <img src="/media/Password reset.png" class="img-fluid img-Section2" alt="">
                <p class="lead mb-1">{{__('ui.consigliAffari')}}</p>
                <a class="text-rosso decoration fw-bold" href="{{route('advice.tips')}}">{{__('ui.scopriDiPiu')}}</a>
                

            </div>
        </div>
    </div>
    {{-- Section 3 --}}
    <div class="container">
        <div class="row section3  stondatura p-3 pb-4  bg-white  swiperCard">
          <div class="col-12 text-center mt-5 mb-3 text-white">
            <h1 class="mb-3">{{__('ui.INostriRisultati')}}</h1>
          </div>
          <div
            class="col-12 col-md-4 d-flex flex-column justify-content-center align-items-center text-center text-white">
            <h1 id="activeUsersNumber" class="sect2Numbers">+0</h1>
            <h5 class="sect1P">{{__('ui.UtentiAttivi')}}</h5>
          </div>
          <div
            class="col-12 col-md-4 d-flex flex-column justify-content-center align-items-center text-center text-white">
            <h1 id="announcePostedNumber" class="sect2Numbers">+0</h1>
            <h5 class="sect1P">{{__('ui.AnnunciPostati')}}</h5>
          </div>
          <div
            class="col-12 col-md-4 d-flex flex-column justify-content-center align-items-center text-center text-white">
            <h1 id="positiveUsersNumber" class="sect2Numbers">+0</h1>
            <h5 class="sect1P">{{__('ui.UtentiSoddisfatti')}}</h5>
          </div>
        </div>
        <div class="row pb-5  ultimate">
            <div class="col-12">
                <div class="swiper2">
                    <div id="swiperWrapper" class="swiper-wrapper d-flex align-items-center">
                    </div>
                </div>
            </div>
            </div>
      </div>
                 
    
</x-layout>
