<x-layout>
    @if(Auth::user())
    <div class="container-fluid margin-form ">
    </div>
    <div class="container mt-5 mb-3 p-5 pb-0 que">
        <div class="row">
            <div class="col-12 col-lg-6 d-flex  align-items-center flex-column text-rosso">
                <div class="col-12 text-center  text-rosso py-4 consigli">
                    <h2 class="h1-shadow titleform">{{__('ui.inserisciAnnuncio')}}</h2>
                </div>
                <img src="/media/mobile.png" class="img-fluid img-create1" alt="">
                <div class="scopri-di-piu p-3 bg-rosso">
                    <h4 class="text-white">Scorri per saperne di più<i class="fas mx-2 fa-arrow-down"></i></h4>
                </div>
            </div>
           
            <div class="col-12 col-lg-6 d-flex align-items-center justify-content-center shadow py-4 px-4 form-create">
                <form method="POST" action="{{route('announcement.store')}}" enctype="multipart/form-data">    
                    @csrf           
                    <div class="col-12 col-md-6 mb-3">
                      <label for="title" class="form-label">{{__('ui.titolo')}}</label>
                      <input name="title" type="text" class="form-control @error('title') is-invalid @enderror" id="Title" aria-describedby="titleHelp" value="{{old('title')}}">
                        @error('title')
                            <div>
                                <p class="fst-italic text-danger text-center">{{$message}}</p>
                            </div>
                        @enderror
                    </div>                    
                    <div class="col-12  mb-3">
                        <label for="body" class="form-label d-block">{{__('ui.desc')}}</label>
                        <textarea name="body" id="Body" cols="100" rows="5" value="{{old('body')}}" class="form-control @error('body') is-invalid @enderror"></textarea>
                            @error('body')
                            <div>
                                <p class="fst-italic text-danger text-center">{{$message}}</p>
                            </div>
                            @enderror
                    </div>
                    <div class="container p-0">
                        <div class="row ">
                            <div class="col-5 col-md-4">
                                
                                    <label for="price" class="form-label">{{__('ui.prezzo')}}:</label>
                                    <input name="price" type="decimal" class="form-control @error('price') is-invalid @enderror form-prezzo" id="price" aria-describedby="priceHelp" value="{{old('price')}}">
                                    @error('price')
                                        <div>
                                            <p class="fst-italic text-danger text-center">{{$message}}</p>
                                        </div>
                                    @enderror                                    
                                
                            </div>
                            <div class="col-7 col-md-8">
                                <div class="mb-3 d-flex flex-column">
                                    <label class="mb-2" for="Category">{{__('ui.categorie')}}:</label>
                                        <select class=" custom-select" name="category_id" id="Category">
                
                                            @foreach ($categories as $category)
                                                <option value="{{$category->id}}">
                                                    {{__('ui.' . ($category->name))}}

                                                </option>
                                            @endforeach
                
                                        </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="ms-md-1 mx-auto form-group row">
                        <label for="images" class="col-12 col-form-label py-2  ps-0">{{__('ui.immagini')}}:</label>
                        <div id="drophere" class="dropzone col-12"></div>
                    </div>
                        <input type="hidden" name="uniqueSecret" value="{{$uniqueSecret}}">
                        @error('images')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{$message}}</strong>
                            </span>
                        @enderror
                        <div class="d-flex justify-content-end">
                        <button type="submit" class="btn mt-2 text-white bottone_annuncioCreate"><strong>{{__('ui.inserisci')}}</strong> </button>

                        </div>
                </form>
            </div>
        </div>
        <div class="row shadow consigli-create justify-content-center">
            <div class="col-12 col-md-6 d-flex flex-column text-center align-items-center">
                <div class="d-flex text-center justify-content-center align-items-center pb-3">
                    <img src="/media/Presto.png" class="img-fluid img-create1" alt="">
                </div>
                <h3 class="text-rosso">{{__('ui.comeVendereSuPresto')}}</h3>
                <p class="mb-0">{{__('ui.passaggiVisibilita')}}</p>
                <img src="/media/money.png" class="img-fluid img-create" alt="">
            </div>
            <div class="col-12 col-md-6 d-flex flex-column create">
                <h4 class="text-rosso">{{__('ui.scattaFoto')}}</h4>
                <p>{{__('ui.istruzioniFoto')}}</p>
                <h4 class="text-rosso">{{__('ui.scegliPrezzo')}}</h4>
                <p>{{__('ui.indecisionePrezzi')}}</p>
                <h4 class="text-rosso">{{__('ui.annuncioChiaro')}}</h4>
                <p>{{__('ui.piuInformazioni')}}</p>
                <h4 class="text-rosso">{{__('ui.piuFoto')}}</h4>
                <p>{{__('ui.inserirePiuFoto')}}</p>
                <h4 class="text-rosso">{{__('ui.controllaOfferte')}}</h4>
                <p>{{__('ui.nonTiScordare')}}</p>
            </div>
        </div>
    </div>
    @else
    <div class="container">
        <div class="row  ">
            <div class="col-12 d-flex flex-column justify-content-center align-items-center shadow stondatura errorr text-center">
                <h2 class="mb-4 text-rosso">{{__('ui.noAccessoNoAnnunci')}}</h2>
                <div>
                    <button type="submit" class="btn bottone_Login text-white mt-2 px-3 me-0 me-md-3">{{__('ui.accedi')}}</button>
                    <button type="submit" class="btn bottone_Login text-white mt-2 px-3">{{__('ui.registrati')}}</button>
                </div>
            </div>
        </div>
    </div>
    @endif

</x-layout>