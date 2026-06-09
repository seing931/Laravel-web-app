@extends('components.layout')

@section('content')
<div class="container-fluid">                  
    <div class="row">
        <div class="col-md-8">
            <div class="card">
                <div class="header">
                    <h4 class="mt-3">
                        {{ isset($role) ? 'EDIT ROLE ACCESS SETUP' : 'ADD ROLE ACCESS SETUP' }}
                    </h4>
                </div>
                <div class="content">
                   <form class="form" method="post" action="{{ isset($role) ? route('role.update', $role->id) : route('role.store') }}">
                    @csrf
                    @if(isset($role))
                        @method('PUT')
                    @endif

                    <div class="row">
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="rolecode" class="form-label">Role Code</label>
                                <input type="text" name="rolecode" placeholder="Role Code"
                                    value="{{ old('rolecode', $role->rolecode ?? '') }}"
                                    class="form-control @error('rolecode') is-invalid @enderror">
                                @error('rolecode')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-9">
                            <div class="form-group">
                                <label for="roledesc" class="form-label">Role Name</label>
                                <input type="text" name="roledesc" placeholder="Role Name"
                                    value="{{ old('roledesc', $role->roledesc ?? '') }}"
                                    class="form-control @error('roledesc') is-invalid @enderror">
                                @error('roledesc')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                    </div>

                    {{-- Role Access Table --}}
                    <div class="table-responsive ps">
                        <table class="table tablesorter">
                            <thead class="text-primary">
                                <tr>
                                    <th>Module</th>
                                    <th>No Access</th>
                                    <th>Add</th>
                                    <th>Edit</th>
                                    <th>Read Only</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $modules = ['config','dept','role','mguser','log'];
                                    $names = ['Configuration Setup', 'Department Setup', 'Role Access Setup', 'Manages Users', 'Manages Log'];
                                    $moduleNames = array_combine($modules, $names);
                                @endphp

                                @foreach($moduleNames as $module => $moduleName)
                                <tr>
                                    <td>{{ $moduleName }}</td>
                                    <td><input type="radio" name="{{ $module }}" value="0" {{ old($module, $role->$module ?? 0) == 0 ? 'checked' : '' }}> </td>
                                    <td><input type="radio" name="{{ $module }}" value="1" {{ old($module, $role->$module ?? 0) == 1 ? 'checked' : '' }}> </td>
                                    <td><input type="radio" name="{{ $module }}" value="2" {{ old($module, $role->$module ?? 0) == 2 ? 'checked' : '' }}> </td>
                                    <td><input type="radio" name="{{ $module }}" value="3" {{ old($module, $role->$module ?? 0) == 3 ? 'checked' : '' }}> </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                    <div class="pull-right">
                        <button type="button" class="btn btn-secondary me-2" onclick="location.href='/role'">Back</button>
                        <button type="submit" class="btn btn-info btn-fill btn-adjust">
                            {{ isset($role) ? 'Update' : 'Save' }}
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
      message: "Role access saved successfully"
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
