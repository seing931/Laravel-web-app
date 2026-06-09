@extends('components.layout')
@section('content')
<div class="container-fluid">                  
    <div class="row">
        <div class="col-md-8">
            <div class="card">
                <div class="header">
                    <h4 class="mt-3">
                        {{ isset($user) ? 'EDIT MANAGE USER' : 'ADD MANAGE USER' }}
                    </h4>
                </div>
                <div class="content">
                   <form class="form" method="post" action="{{ isset($user) ? route('user.update', $user->id) : route('user.store') }}">
                    @csrf
                    @if(isset($user))
                        @method('PUT')
                    @endif

                    <div class="row">
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="username" class="form-label">Username</label>
                                <input type="text" name="username" placeholder="Username" value="{{ old('username', $user->username ?? '') }}"class="form-control @error('username') is-invalid @enderror">
                                @error('username')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-9">
                            <div class="form-group">
                                <label for="email" class="form-label">Email address</label>
                                @if(isset($user))  
                                    <!-- Show span in Edit Mode -->
                                    <span class="form-control-plaintext">{{ $user->email }}</span>
                                    <input type="hidden" name="email" value="{{ $user->email }}">
                                @else  
                                    <!-- Show input in Create Mode -->
                                    <input type="text" name="email" placeholder="Email" 
                                        value="{{ old('email') }}" 
                                        class="form-control @error('email') is-invalid @enderror">
                                 @error('email')
                                    <span class="text-danger">{{ $message }}</span>
                                 @enderror
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                           <div class="form-group">
                            <label for="text" class="form-label">Department</label>
                                <select class="form-control" id="dept" name="dept">
                                <option value="">-- Please Select --</option>
                                    @foreach ($departments as $dept)
                                        <option value="{{ $dept->deptcode }}" 
                                             @if(!isset($user)) 
                                                {{ (old('dept', isset($user) ? $user->dept : '') == $dept->deptcode) ? 'selected' : '' }}>
                                             @endif
                                            {{ (isset($user) && $user->deptcode == $dept->deptcode) ? 'selected' : '' }}>
                                            {{ $dept->deptcode }} - {{ $dept->deptdesc }}
                                        </option>
                                   @endforeach
                              </select>
                            @error('dept')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                         </div>
                    </div>
                   <div class="row" style="padding-left:17px;">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="role" class="form-label">Role</label>
                                <select class="form-control" id="role" name="role" style="width:585pt">
                                    <option value="">-- Please Select --</option>
                                    @foreach ($roles as $role)
                                        <option value="{{ $role->rolecode }}" 
                                             @if(!isset($user)) 
                                                {{ (old('role', isset($user) ? $user-> role : '') == $role-> rolecode) ? 'selected' : '' }}>
                                             @endif
                                             {{ (isset($user) && $user->rolecode == $role->rolecode) ? 'selected' : '' }}>
                                             {{ $role->rolecode }} - {{ $role->roledesc }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('role')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="row" style="padding-left:17px;">
                         <div class="col-md-4">
                            <div class="form-check">
                                <label class="form-check-label">
                                <input class="form-check-input" type="checkbox" name="active" value="1" 
                                    {{ old('active', $user->active ?? false) ? 'checked' : '' }}>
                                <span class="form-check-sign">
                                    <span class="check"> Active </span>
                                </span>
                            </label>
                            </div>
                        </div>
                        @if(!isset($user)) 
                            <div class="col-md-8">
                                <div class="form-check">
                                   <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" id="rbDefault" name="PasswordType" value="default" {{ old('PasswordType', 'default') == 'default' ? 'checked' : '' }}>
                                        <label class="form-check-label">Default Password : </label><label class="form-check-label"> @Dmin123</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                      <input class="form-check-input" type="radio" id="rbManual" name="PasswordType" value="manual" {{ old('PasswordType') == 'manual' ? 'checked' : '' }}>
                                        <label class="form-check-label" style="width:100%">Manual Enter Password : </label>
                                        <input type="text" class="form-control" id="passwordInput" name="Password" placeholder="Enter password" value="{{ old('Password') }}" {{ old('PasswordType') == 'manual' ? '' : 'disabled' }}>
                                    </div>
                                    @error('Password')
                                        <span class="text-danger">{{ $message }}</span>
                                     @enderror
                                </div>
                            </div>
                        @endif
                    </div>
                    <div class="col d-flex justify-content-end">
                        <button type="button" class="btn btn-secondary me-2" onclick="location.href='/mguser'">Back</button>
                        <button type="submit" class="btn btn-info">
                            {{ isset($user) ? 'Update' : 'Save' }}
                        </button>
                    </div>
                </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-notify/3.1.3/bootstrap-notify.min.js"></script>

<script>
function showSuccAlert(from, align) {
    $.notify({
      icon: "tim-icons icon-check-2",
      message: "User saved successfully"
    }, {
      type: "success",
      timer: 8000,
      placement: {
        from: from,
        align: align
      }
    });
}
$(document).ready(function () {
    if ($('#rbDefault').is(':checked')) {
        $('#passwordInput').prop('disabled', true).val('');
    }

    $('input[name="PasswordType"]').change(function() {
        if ($('#rbManual').is(':checked')) {
            $('#passwordInput').prop('disabled', false);
        } else {
            $('#passwordInput').prop('disabled', true).val('');
        }
        
         $('input[name="PasswordType"]').change(togglePasswordField);
         togglePasswordField(); // Ensure initial state is set correctly
    });

    @if(session('success'))
        showSuccAlert('bottom', 'right');
    @endif
});
</script>

@endsection

