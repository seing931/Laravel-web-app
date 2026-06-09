<x-layout Class="def-page">
@section('content')
    <div class="row">
        <div class="col-lg-4 col-md-6 ml-auto mr-auto">
            <div class="card card-register card-white">
                <div class="card-header">
                    <img class="card-img" src="{{ Vite::asset('resources/img/logo_strato.png') }}" alt="Card image">
                </div>
                <form id="registerForm" class="form" method="post" action="{{ route('register') }}">
                    @csrf

                    <div class="card-body">
                        {{-- Username Field --}}
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <div class="input-group-text">
                                    <i class="tim-icons icon-single-02"></i>
                                </div>
                            </div>
                            <input type="text" name="username" value="{{ old('username') }}" placeholder="Username" class="form-control @error('username') is-invalid @enderror">
                        </div>
                        @error('username')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror

                        {{-- Email Field --}}
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <div class="input-group-text">
                                    <i class="tim-icons icon-email-85"></i>
                                </div>
                            </div>
                            <input type="text" name="email" value="{{ old('email') }}" placeholder="Email" class="form-control @error('email') is-invalid @enderror">
                        </div>
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
                            <input type="password" name="password" placeholder="Password" class="form-control @error('password') is-invalid @enderror">
                        </div>
                        @error('password')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror

                        {{-- Confirm Password Field --}}
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <div class="input-group-text">
                                    <i class="tim-icons icon-lock-circle"></i>
                                </div>
                            </div>
                            <input type="password" name="password_confirmation" placeholder="Confirm Password" class="form-control @error('password') is-invalid @enderror">
                        </div>
                    </div>
                    <div class="col-12 mx-auto">
                        <img id="loadingSpinner" src="{{ Vite::asset('resources/img/Spinner.svg') }}" alt="Loading..." style="display: none; width: 40px;">
                    </div>
                    <div class="card-register-footer">
                        <button type="submit" id="registerBtn" class="btn btn-primary btn-round btn-lg">Register</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    {{-- jQuery Script --}}
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function () {
            $("#registerForm").on("submit", function () {
                $("#registerBtn").prop("disabled", true).text("Processing...");
                $("#loadingSpinner").show();
            });
        });
    </script>
@endsection
</x-layout>
