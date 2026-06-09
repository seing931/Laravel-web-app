@extends('components.layout')

@section('content')
<div class="container-fluid">
<div class="row">
    <div class="col-md-8">
        <div class="card">
            <div class="header">
                <h4 class="title">EDIT PROFILE</h4>
            </div>
            <div class="content">
               <form class="form" method="post" action="{{ route('profile') }}">
                        @csrf
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Email address (disabled)</label>
                                    <input type="text" name="email" value="{{ $user->email }}"class="form-control" readonly>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Username</label>
                                    <input type="text" name="username" value="{{ old('username', $user->username) }}" placeholder="Username" class="form-control @error('username') is-invalid @enderror">
                                    @error('username')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    <button type="submit" class="btn btn-info btn-fill pull-right">Update</button>
                    <div class="clearfix"></div>
                </form>
            </div>
        </div>
    </div>
</div>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-notify/3.1.3/bootstrap-notify.min.js"></script>

<script>
function showUpdSuccAlert(from, align) {
    $.notify({
      icon: "tim-icons icon-check-2",
      message: "Profile updated successfully"
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
    @if(session('success'))
        showUpdSuccAlert('bottom', 'right');
    @endif
});
</script>
@endsection