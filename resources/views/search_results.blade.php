<x-layout>

    @if (count($announcements) == 0)
    <div class="container">
        <div class="row shadow justify-content-center">
        <div class="col-12 messaggioCustom text-center text-rosso">
            <h1>{{__('ui.risultatiPer')}}: "{{$q}}"</h1>
        </div>    
        </div>      
    </div> 
    @else

    <div class="container py-5 my-5 que">
        <div class="row my-5 shadow p-3 py-4 stondatura justify-content-center">
            <div class="col-12 text-center d-flex justify-content-center align-items-center  text-rosso py-4 consigli d-flex flex-column">
                <img src="/media/Presto.png" class="img-fluid img-annunci1" alt="">
                <h3>{{__('ui.risultatiPer')}}: "{{$q}}"</h3>
            </div>
        </div>
        <div class="row my-5 shadow p-3 py-4 stondatura">
            @foreach ($announcements as $announcement )  

                <div class="col-12 col-md-4 my-3 d-flex justify-content-around">
                    <div class="card shadow mx-1">
                        @if (count($announcement->images)>0)
                                    
                            <img src="{{$announcement->images->first()->getUrl(376,300)}}" alt="" onerror='this.src="http://picsum.photos/376/300"'>        
                        @else
                            <img src="http://picsum.photos/376/300" alt="">
                        @endif
                        <div class="card-body">
                            <h3 class="card-title mb-3 text-rosso pb-4">{{$announcement->title}}</h3>
                            <div class="d-flex mb-0">   
                                <p class="mb-0">{{__('ui.cateogria')}}: <a href="{{route('announcement.showByCategory', ['announcement' => $announcement] )}}" class="links"><p class="fw-bold mb-2"> {{__('ui.' . ($announcement->category->name))}}</p></a></p>
                            </div>
                            <div class="d-flex">
                                <p class="d-flex justify-content-start pb-0">{{__('ui.inseritoDa')}}: <p class="fw-bold d-flex text-rosso"> {{$announcement->user->name}}</p> </p>
                            </div>
                            <div class="d-flex justify-content-end">
                                <p class="">{{__('ui.prezzo')}}: <p class="fw-bold text-rosso"> {{$announcement->price}} €</p> </p>
                            </div>
                            <div class="d-flex justify-content-end ">
                                <a  href="{{route('announcement.show', compact('announcement'))}}" class="btn bg-rosso text-white btn_card2 text-center"><strong>{{__('ui.maggioriDettagli')}}</strong> </a>
                            </div>
                        </div>
                    </div>
                </div>     

            @endforeach
        </div>
    </div>  
    @endif
</x-layout>