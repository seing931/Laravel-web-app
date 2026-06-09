<x-layout Class="def-page">
    @section('content')
    <div class="col-lg-4 col-md-6 ml-auto mr-auto">
        <form id="loginForm" class="form" method="post" action="{{ route('login') }}">
            @csrf
            <div class="card card-login card-white">
                <div class="card-header">
                    <img src="{{ Vite::asset('resources/img/logo_strato.png') }}" alt="">
                    <h1 class="card-title"></h1>
                    <br/>
                </div>
                <div class="card-body">
                    {{-- Display login error message --}}
                    @if ($errors->has('login'))
                        <div class="alert alert-danger">{{ $errors->first('login') }}</div>
                    @endif

                    {{-- Email Field --}}
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <div class="input-group-text">
                                <i class="tim-icons icon-email-85"></i>
                            </div>
                        </div>
                        <input type="text" name="email" value="{{ old('email') }}" 
                            placeholder="Email" 
                            class="form-control @error('email') is-invalid @enderror">
                    </div>
                    {{-- Email Error Message --}}
                    @error('email')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror

                    {{-- Password Field --}}
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <div class="input-group-text">
                                <i class="tim-icons icon-lock-circle"></i>
                            </div>
                        </div>
                        <input type="password" name="password" 
                            class="form-control @error('password') is-invalid @enderror" 
                            placeholder="Password">
                    </div>
                    {{-- Password Error Message --}}
                    @error('password')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="card-footer">
                    <div class="col-12 mx-auto">
                        <img id="loadingSpinner" src="{{ Vite::asset('resources/img/Spinner.svg') }}" alt="Loading..." style="display: none; width: 40px;">
                    </div>
                    <button type="submit" id="loginBtn" class="btn btn-primary btn-lg btn-block mb-3">Login</button>
                    <div class="pull-left">
                        <h6>
                            <a href="{{ route('register') }}" class="link footer-link">Create Account</a>
                        </h6>
                    </div>
                    <div class="pull-right">
                        <h6>
                            <a href="#" class="link footer-link">Forgot password?</a>
                        </h6>
                    </div>
                </div>
            </div>
        </form>
    </div>
    {{-- jQuery Script --}}
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function () {
            $("#loginForm").on("submit", function () {
                $("#loginBtn").prop("disabled", true).text("Processing...");
                $("#loadingSpinner").show();
            });
        });
    </script>
@endsection   
</x-layout>
