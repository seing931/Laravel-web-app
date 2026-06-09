@extends('components.layout')
@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-8">
            <div class="card">
                <div class="header">
                    <h4 class="title">RESET PASSWORD</h4>
                </div>
                <div class="content">
                    <form class="form" method="post" action="{{ route('resetpassword') }}">
                        @csrf
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>New Password</label>
                                    <input type="password" name="newpassword" placeholder="New Password" value="{{ old('newpassword') }}" class="form-control @error('newpassword') is-invalid @enderror">
                                    @error('newpassword')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="text" class="form-label">Confirm Password</label>
                                    <input type="password" name="confirmpassword" placeholder="Confirm Password" value="{{ old('confirmpassword') }}" class="form-control @error('confirmpassword') is-invalid @enderror">
                                    @error('confirmpassword')
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
      message: "Password updated successfully"
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
