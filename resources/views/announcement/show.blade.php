<x-layout>

    
    <div class="container marginShow">
        <div class="row   my-5 ">
            {{-- Swiper --}}           
            <div class="col-12 col-lg-6  d-flex justify-content-center align-items-center flex-column mb-md-3">
                <div class="  mb-5 custom d-flex justify-content-center flex-column">
                    <h2 class="h1-shadow titleform text-rosso text-center">{{__('ui.dettaglioAnnuncio')}}</h2>
                    <img src="/media/show.png" class="img-fluid sho" alt="">
                    <div class="">
                        <h4 class="d-flex align-items-center text-rosso"><div  class="icone_tips shadow d-flex justify-content-center align-items-center"><i class="fas fa-user-shield  "></i></div> {{__('ui.1.1')}}</h4>
                        <p>{{__('ui.1.2')}}</p>
                    </div>
                    <div>
                        <h4 class="d-flex align-items-center text-rosso"><div  class="icone_tips shadow d-flex justify-content-center align-items-center"><i class="fas fa-file-invoice-dollar  "></i></div> {{__('ui.1.3')}}</h4>
                    <p> {{__('ui.1.4')}}</p>
                    </div>    
                </div>                
            </div>
            {{-- Dettaglio --}}
            <div class="col-12 col-lg-6 d-flex px-lg-5 px-md-5 px-sm-1 justify-content-center flex-column shadow stondatura  dettaglioo py-5">
                <div>
                    <h3 class="text-rosso">{{$announcement->title}}</h3>
                </div>
                <hr>
                <div class="d-flex justify-content-center">
                    <div class="swiper1 mySwiper  mx-2   stondatura d-flex justify-content-center align-items-center">
                        <div class="swiper-wrapper">
                            @foreach ($announcement->images as $image)
                            <div class="swiper-slide"><img src="{{$image->getUrl(376,300)}}" class="img-fluid" alt="" onerror='this.src="http://picsum.photos/376/300" this.onerror="";'></div>
                            @endforeach
    
                        </div>
                        <div class="swiper-pagination"></div>
                        <div class="swiper-button-next"></div>
                        <div class="swiper-button-prev"></div>
                    </div>
                </div>
               
                <hr>
                <div>
                    <p class="">{{__('ui.desc')}}:</p><p>{{$announcement->body}}</p>
                </div>
                <hr>
                <div class="d-flex justify-content-between flex-wrap">
                    <div class="d-flex justify-content-between ">
                    <p>{{__('ui.cateogria')}}: <a href="{{route('announcement.showByCategory', ['announcement' => $announcement] )}}" class="links"><p class="fw-bold"> {{__('ui.' . ($announcement->category->name))}}</p></a></p>

                    </div>
                    <div class="d-flex justify-content-between ">
                    <p class="">{{__('ui.prezzo')}}: <p class="fw-bold text-rosso"> {{$announcement->price}} €</p> </p>

                    </div>
                </div>
                <hr>
                <div class="d-flex justify-content-between mb-3 flex-wrap">
                     
                    <div> {{__('ui.utente')}}: <strong class="text-rosso"> {{$announcement->user->name}}</strong></div>
                    <div> {{__('ui.pubblicatoIl')}}:  <strong class="text-rosso"> {{$announcement->created_at->format("d/m/Y")}}</strong></div>

                </div>
                <div class="d-flex justify-content-end mt-5">
                    <a  href="{{route('announcement.index', compact('announcement'))}}" class="btn bg-rosso text-white btn_card2 text-center">{{__('ui.tornaIndietro')}}</a>
                </div>
            </div>
        </div>
    </div>
</x-layout>