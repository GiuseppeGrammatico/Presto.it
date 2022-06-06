<x-layout>



    {{-- QUESTO DIV È TEMPORANEO E SERVE SOLAMENTE PER DARE SPAZIO AL FORM CHE STAVA SOTTO LA NAVBAR --}}
    <div style="height: 200px;"></div>


    @if (!Auth::user())
    {{session(['must_login'=>'must_login'])}};
    <script>window.location = "/login";</script>
    @endif

    <div class="container p-5">
        <div class="row">
            <div class="col-12 col-md-6">
                <h2 class="text-rosso text-center display-5">{{__('ui.lavoraconnoi')}}</h2>
                <img class="img-fluid" src="/media/workwithus.png" alt="">
            </div>
            <div class="col-12 col-md-6 shadow p-5 stondatura mb-5">

                <form  method="POST" action="{{route('workWithUsSubmit')}}">

                    @csrf
            
                    <div class="mb-3">
                        <label for="Surname" class="form-label">{{__('ui.cognome')}}:</label>
                        <input name="surname" type="text" class="form-control form-login3" id="Name" aria-describedby="emailHelp">
                    </div>

                    <div class="mb-3">
                        <label for="Name" class="form-label">{{__('ui.nome')}}:</label>
                        <input name="name" type="text" class="form-control form-login3" id="Name" aria-describedby="emailHelp">
                    </div>

                    <div class="mb-3">
                        <label for="Email" class="form-label">{{__('ui.email')}}:</label>
                        <input name="email" type="text" class="form-control form-login3" id="Email" aria-describedby="emailHelp">
                    </div>
            
                    <div class="mb-3 d-flex flex-column">
                        <label class="mb-2" for="AboutYou">{{__('ui.parlaciDiTe')}}:</label>
                        <textarea name="aboutYou" id="AboutYou" cols="20" rows="5" placeholder="Perché vuoi lavorare con noi?"></textarea>
                    </div>
                    <div class="d-flex justify-content-end">
                        <button class="btn bottone_annuncio2  mx-2 w-40 text-white" type="submit"><strong>{{__('ui.inviaEmail')}}</strong></button>
                    </div>
                    
            
            
                  </form>
            </div>
        </div>
    </div>


</x-layout>