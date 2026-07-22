@section("navbar-class","navbar-bg")
<x-layout>
    <div class="container my-5">
        <div class="row justify-content-center">
            <div class="col-12 col-md-8 col-lg-6">

                <form class="form-box " action="{{ route('login.store') }}" method="POST" >
                    <div class="mt-4 mb-4">
                        <h2 class="text-center fw-semibold h1 ">Accedi</h2>
                        <p class="text-secondary text-center">Bentornato!</p>
                    </div>
                    @csrf
                    <div class="mb-4">
                        <label for="loginMail" class="form-label">Email</label>
                        <input type="email" name="email" placeholder="Inserisci la e-mail" class="form-control " id="loginMail">
                        @error('email')
                            <div class="text-danger mb-3">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-4">
                        <label for="loginPassword" class="form-label">Password</label>
                        <input type="password" name="password" placeholder="Inserisci la password" class="form-control " id="loginPassword">
                        @error('password')
                            <div class="text-danger mb-3">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="d-flex justify-content-center mt-5">
                        <button class=" btn-submit mb-3 shadow-sm" type="submit">Accedi</button>
                    </div>
                    <div class="mt-3">
                        <p class="d-inline ">Non hai ancora un account?</p>
                        <a href="{{ route('register') }}">Registrati subito!</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-layout>




