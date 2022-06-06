<x-layout>
    @if($announcement)
    <div class="container">
        <div class="row que margin-revisor shadow consigli">
            <div class="col-12 ">
                <p class=""><strong class="text-rosso">{{__('ui.annunciDaRevisionare')}}: </strong><strong> {{\App\Models\Announcement::ToBeRevisionedCount()}}</strong>   </p>
            </div>
            <hr>
            <div class="col-12">
                @if ($announcement)
                    <div class="head"> <strong>{{__('ui.idAnnuncio')}}:</strong> {{$announcement->id}}</div>
                    <div><strong> {{__('ui.pubblicatoIl')}}: </strong> {{$announcement->created_at}}</div>
                    <hr>
                    <div><strong> {{__('ui.utente')}}: </strong>{{$announcement->user->name}}</div>
                    <div><strong> {{__('ui.email')}}: </strong> {{$announcement->user->email}}</div>
                @endif
            </div>
            <hr class="mt-2">
            <div class="col-12 col-lg-6">
                
                
                <div class="row">
                @if ($announcement)   
                        <div class="col-12">
                            <p><strong>{{__('ui.immagini')}}:</strong></p>
                        </div>


                        <div class="col-12">
                            @foreach($announcement->images as $image)                          
                            @if($image->adult == "POSSIBLE"
                            || $image->spoof == "POSSIBLE"
                            || $image->medical == "POSSIBLE"
                            || $image->violence == "POSSIBLE"
                            || $image->racy == "POSSIBLE") 
                                <div>
                                    <p class="text-warning fw-bold">
                                        Questa immagine potrebbe essere non adatta alla pubblicazione
                                    </p>
                                </div>
                            @endif                                   
                            @if(($image->adult == "LIKELY" || $image->adult == "VERY_LIKELY" )
                            ||( $image->spoof == "LIKELY" || $image->adult == "VERY_LIKELY" )
                            || ($image->medical == "LIKELY" || $image->adult == "VERY_LIKELY" )
                            || ($image->violence == "LIKELY" || $image->adult == "VERY_LIKELY" )
                            || ($image->racy == "LIKELY" || $image->adult == "VERY_LIKELY") ) 
                                <div>
                                    <p class="text-danger fw-bold">
                                        Questa immagine ha dei contenuti non adatti alla pubblicazione
                                    </p>
                                </div>
                            @endif<div class="col-12 my-2 d-flex justify-content-center align-items-center ">
                                <img src="{{$image->getUrl(376,300)}}" alt="">
                            </div>
                            <hr>
                            @endforeach
                        </div>

                       


                    </div>      
                  @endif
            </div>
            <div class="col-12 col-lg-6">
                @if ($announcement)
                <div class="card-body">
                    <p class="card-title"><strong>{{__('ui.titoloAnnuncio')}}:</strong> {{$announcement->title}}</p>
                    <hr>
                    <p class="card-text"><strong>{{__('ui.desc')}}:</strong> <p>{{$announcement->body}}</p> </p>
                  </div>
                 @endif
            </div>
                <div class="row pe-0 mt-md-5 pb-md-4">
                    <div class="col-12 col-md-6 d-flex justify-content-start order-3 my-md-0 my-4 order-md-1">
                        <form action="{{route('revisor.undo' , $announcement->id)}}" method="POST">
                        @csrf
                        <button class=" btn text-white bottone_Annulla"> <strong>{{__('ui.undo')}}</strong> </button>
                        </form>
                    </div>
                    <div class="col-12 col-md-6 d-flex justify-content-end order-1 order-md-2">
                        <div class="me-4 me-md-2">
                            <form action="{{route('revisor.reject' , $announcement->id)}}" method="POST">
                                @csrf
                                <button class=" btn text-white bottone_Rifiuta"><strong>{{__('ui.rifiuta')}}</strong>  </button>
                            </form>
                        </div>
                        <div class=" d-flex justify-content-end order-2 order-md-3">
                            <form action="{{route('revisor.accept' , $announcement->id)}}" method="POST">
                             @csrf
                            <button class=" btn text-white bottone_Accetta"> <strong>{{__('ui.accetta')}}</strong> </button>
                            </form>
                        </div>
                    </div>
                </div>
        </div>
    </div>
    @else
    <div class="container">
        <div class="row vh-100">
            <div class="col-12 d-flex flex-column justify-content-center align-items-center shadow text-rosso">
                <h2>{{__('ui.noAnnunciDaRevisionare')}}</h2>
            </div>
        </div>
    </div>
    @endif
</x-layout>