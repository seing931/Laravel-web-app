@extends('components.layout')

@section('content')
<div class="container-fluid">                  
    <div class="row">
        <div class="col-md-8">
            <div class="card">
                <div class="header">
                    <h4 class="mt-3">
                        {{ isset($dept) ? 'EDIT DEPARTMENT SETUP' : 'ADD DEPARTMENT SETUP' }}
                    </h4>
                </div>
                <div class="content">
                   <form class="form" method="post" action="{{ isset($dept) ? route('dept.update', $dept->id) : route('dept.store') }}">
                    @csrf
                    @if(isset($dept))
                        @method('PUT')
                    @endif

                    <div class="row">
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="deptcode" class="form-label">Dept. Code</label>
                                <input type="text" name="deptcode" placeholder="Department Code"
                                    value="{{ old('deptcode', $dept->deptcode ?? '') }}"
                                    class="form-control @error('deptcode') is-invalid @enderror">
                                @error('deptcode')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-9">
                            <div class="form-group">
                                <label for="deptdesc" class="form-label">Dept. Name</label>
                                <input type="text" name="deptdesc" placeholder="Department Name"
                                    value="{{ old('deptdesc', $dept->deptdesc ?? '') }}"
                                    class="form-control @error('deptdesc') is-invalid @enderror">
                                @error('deptdesc')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="pull-right">
                        <button type="button" class="btn btn-secondary me-2" onclick="location.href='/dept'">Back</button>
                        <button type="submit" class="btn btn-info btn-fill btn-adjust">
                            {{ isset($dept) ? 'Update' : 'Save' }}
                        </button>
                        <div class="clearfix"></div>
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
      message: "Department saved successfully"
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
        showSuccAlert('bottom', 'right');
    @endif
});
</script>

@endsection

