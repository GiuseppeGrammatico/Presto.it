<x-layout>


<div class="container my-5 p-md-5 d-flex justify-content-center">
    <div class="row justify-content-center widthLogin align-items-center">
        <div class="col-12 col-md-6 form-login shadow pt-4">
            <div class="d-flex text-center justify-content-center align-items-center pb-3">
                <img src="/media/Presto.png" class="img-fluid img-login" alt="">
            </div>
            <form method="POST" action="{{route('register')}}">
                @csrf
                <div class="mb-3 d-flex justify-content-center flex-column">
                    <label for="name" class="form-label">{{__('ui.nome')}}</label>
                    <input name="name" type="text" class="form-control form-login3  @error('name') is-invalid @enderror" id="Name" value="{{old('name')}}">
                    @error('name')
                    <div>
                        <p class="fst-italic text-danger text-center">{{$message}}</p>
                    </div>
                    @enderror
                </div>        
                <div class="mb-3 d-flex justify-content-center flex-column">
                  <label for="email" class="form-label">{{__('ui.email')}}</label>
                  <input name="email" type="email" class="form-control form-login3  @error('email') is-invalid @enderror" id="Email" aria-describedby="emailHelp" value="{{old('email')}}">                                
                  @error('email')
                  <div>
                      <p class="fst-italic text-danger text-center">{{$message}}</p>
                  </div>
                  @enderror                        
                </div>       
                <div class="mb-3 d-flex justify-content-center flex-column">
                  <label for="password" class="form-label">{{__('ui.password')}}</label>
                  <input name="password" type="password" class="form-control form-login3  @error('password') is-invalid @enderror" id="Password">
                  @error('password')
                  <div>
                      <p class="fst-italic text-danger text-center">{{$message}}</p>
                  </div>
                  @enderror
                </div>
        
                <div class="mb-3 d-flex justify-content-center flex-column">
                    <label for="password_confirmation" class="form-label">{{__('ui.confermaPw')}}</label>
                    <input name="password_confirmation" type="password" class="form-control form-login3  @error('password_confirmation') is-invalid @enderror" id="Password_confirmation">
                    @error('password_confirmation')
                    <div>
                        <p class="fst-italic text-danger text-center">{{$message}}</p>
                    </div>
                    @enderror     
                </div>
        
                {{-- <div class="mb-3 form-check">
                  <input type="checkbox" class="form-check-input" id="exampleCheck1">
                  <label class="form-check-label" for="exampleCheck1">Policy</label>
                </div> --}}
                <div class="d-flex justify-content-end">
                    <a href="{{route('announcement.create')}}">
                        <button type="submit" class="btn bottone_Login text-white mt-2 px-3">{{__('ui.registrati')}}</button>
                    </a>
                </div>
               
                
              </form>
              <div  class="d-flex my-3 justify-content-end ">
                <p>{{__('ui.haiUnAccount')}}</p>
                <a class="text-rosso decoration" href="{{route('login')}}">{{__('ui.accedi')}}</a>

            </div>
        </div>
    </div>
</div>



</x-layout>