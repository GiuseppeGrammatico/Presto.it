<x-layout>
    <div class="container-fluid margin-form1  ">
        <div class="row shadow stondatura mt-md-3 ">
            <div class="col-12 text-center  text-rosso py-4">
                <h2 class="h1-shadow titleform ">{{__('ui.consigliPerSicurezza')}}</h2>
            </div>
        </div>
    </div>



    <div class="container my-5 shadow p-5 consigli">
        <div class="row">
            <div class="col-12 col-md-6 d-flex justify-content-center flex-column">

                <h2 class="text-rosso">{{__('ui.riconoscereTruffa')}}</h2>
                <p>{{__('ui.guidaAffareTruffa')}}</p>

            </div>
            
            <div class="col-12 col-md-6 my-2">
                    <h4 class="d-flex align-items-center text-rosso"><div  class="icone_tips shadow d-flex justify-content-center align-items-center"><i class="fas fa-coins  "></i></div> {{__('ui.costaPoco')}}</h4>
                    <p>{{__('ui.prodottoPrezzo')}}</p>

                    <h4 class="d-flex align-items-center text-rosso"><div  class="icone_tips shadow d-flex justify-content-center align-items-center"><i class="far fa-credit-card  "></i></div> {{__('ui.truffaBancomat')}}</h4>
                    <p>{{__('ui.nessunMotivo')}}</p>

                    <h4 class="d-flex align-items-center text-rosso"><div  class="icone_tips shadow d-flex justify-content-center align-items-center"><i class="fas fa-home  "></i></div> {{__('ui.casaSogni')}}</h4>
                    <p>{{__('ui.analizzaSempr')}}</p>
            </div>
        </div>
            <hr class="hr-">
        <div class="row">
            <div class="col-12 col-md-6 d-flex justify-content-center flex-column">

                <h2 class="text-rosso">{{__('ui.fattiConoscere')}}</h2>
                <p>{{__('ui.riconoscibile')}}</p>

            </div>
            
            <div class="col-12 col-md-6 my-2">
                    <h4 class="d-flex align-items-center text-rosso"><div class="icone_tips shadow d-flex justify-content-center align-items-center"><i class="fas fa-file-signature   "></i></div>{{__('ui.ilTuoNome')}}</h4>
                    <p>{{__('ui.segliNome')}}</p>


                    



                    <h4 class="d-flex align-items-center text-rosso"><div class="icone_tips shadow d-flex justify-content-center align-items-center"><i class="fas fa-comments  "></i></div> {{__('ui.tempoMedioRisposta')}}</h4>
                    <p>{{__('ui.chatPresto')}}</p>

                    <h4 class="d-flex align-items-center text-rosso"><div class="icone_tips shadow d-flex justify-content-center align-items-center"><i class="fas fa-bell    "></i></div> {{__('ui.mostraQuandoSeiOnline')}}</h4>
                    <p>{{__('ui.utentiCommunity')}}</p>
            </div>
        </div>
            <hr  class="hr-">
        <div class="row ">
            <div class="col-12 col-md-6 d-flex justify-content-center flex-column">

                <h2 class="text-rosso">{{__('ui.cosaFare')}}</h2>
                <p>{{__('ui.suggerimentiSuccesso')}}</p>

            </div>
            
            <div class="col-12 col-md-6 my-2">
                    <h4 class="d-flex align-items-center text-rosso"><div class="icone_tips shadow d-flex justify-content-center align-items-center"><i class="fas fa-truck  "></i></div> {{__('ui.spedizioniTracciate')}}</h4>
                    <p>{{__('ui.spedizioneTracciateGarantiscono')}}</p>

                    <h4 class="d-flex align-items-center text-rosso"><div class="icone_tips shadow d-flex justify-content-center align-items-center"><i class="fas fa-eye-slash  "></i></div> {{__('ui.nonMostraNumero')}}</h4>
                    <p>{{__('ui.tutelaPrivacy')}}</p>

                    <h4 class="d-flex align-items-center text-rosso"><div class="icone_tips shadow d-flex justify-content-center align-items-center"><i class="fas fa-star    "></i></div>{{__('ui.usaRecensioni')}}</h4>
                    <p>{{__('ui.cerchiOggetto')}}</p>
            </div>
        </div>
    </div>

</x-layout>