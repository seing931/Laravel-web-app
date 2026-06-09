<?php

namespace App\Http\Controllers;

use App\Models\Dept;
use App\Models\User;
use App\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Auth\Events\Registered;

class MaintenanceController extends Controller
{
    public function dept(){
        $departments = Dept::all();
        return view('maintenance.dept', compact('departments'));
    }

    public function deptdetail(){
        return view('maintenance.deptdetail');
    }

    public function editdept($id = null)
    {
        $dept = $id ? Dept::findOrFail($id) : null; 
        return view('maintenance.deptdetail', compact('dept'));
    }

    public function savedept(Request $request, $id = null)
    {
        $request->validate([
            'deptcode' => [
                'required', 
                'max:250', 
                Rule::unique('sysdept', 'deptcode')->ignore($id)
            ],
            'deptdesc' => ['required', 'max:500']
        ], [
            'deptcode.required' => 'Please enter Dept. Code.',
            'deptdesc.required' => 'Please enter Dept. Name.',
            'deptcode.unique' => 'This Dept. Code already exists. Please use a different one.'
        ]);
    
        if ($id) {
            $dept = Dept::findOrFail($id);
            $dept->update([
                'deptcode' => $request->deptcode,
                'deptdesc' => $request->deptdesc
            ]);
        } else {
            Dept::create([
                'deptcode' => $request->deptcode,
                'deptdesc' => $request->deptdesc
            ]);
        }

        return redirect()->back()->withInput()->with('success', 'Department saved successfully.');
    }
      
    public function deldept($id)
    {
        $dept = Dept::findOrFail($id);
        $dept->delete();
        return response()->json(['message' => 'Department deleted successfully']);
    }

    public function user(){
        $users = User::leftJoin('sysdept', 'sysdept.deptcode', '=', 'users.deptcode')
                     ->select('users.*', 'sysdept.deptdesc')
                     ->get();

        return view('maintenance.mguser', compact('users'));
    }
    
    public function edituser($id = null)
    {
        $departments = Dept::all(); 
        $roles = Role::all(); // Fetch roles from roleacc table
    
        $user = $id ? User::leftJoin('sysdept', 'users.deptcode', '=', 'sysdept.deptcode')
                    ->select('users.*', 'sysdept.deptdesc') 
                    ->where('users.id', $id)
                    ->first() : null;
    
        return view('maintenance.mguserdetail', compact('departments', 'roles', 'user'));
    }
    

    public function deluser($id){
        $user = User::findOrFail($id);
        $user->delete();
        return response()->json(['message' => 'Department deleted successfully']);
    }

    public function mguserdetail() {
        $departments = Dept::all(); 
        $roles = Role::all(); 
    
        return view('maintenance.mguserdetail', compact('roles'));
    }
    

    public function saveuser(Request $request, $id = null)
    {
        $request ->validate([
            'username' =>['required','min:3', 'max:255'],
            'dept' => 'required',
            'role'=> 'required',
        ], [
            'username.required' => 'Please enter your username.',
            'username.min' => 'Username must be at least 3 characters.',
            'dept.required' => 'Please select department.',
            'role.required' => 'Please select role.',
        ]);
     
        if ($id) {
            $user = User::findOrFail($id);
            $user->username = $request->username;
            $user->DeptCode = $request->dept;
            $user->RoleCode = $request->role;
            $user->active = $request->has('active') ? 1 : 0;
            $user->save();
        } else {
            $request->validate([
                'email' => ['required', 'max:255', 'email', 'unique:users'],
            ], [
                'email.required' => 'Please enter your email.',
                'email.email' => 'Please enter a valid email address.',
                'email.unique' => 'This email is already registered.',
            ]);
    
            if ($request->PasswordType === 'manual') {
                $request->validate([
                    'Password' => ['required', 'min:3'],
                ], [
                    'Password.required' => 'Please enter a password.',
                    'Password.min' => 'Password must be at least 3 characters.'
                ]);
                $password = bcrypt($request->Password);
            } else {
                $password = bcrypt('@Dmin123');
            }
    
            $user = new User();
            $user->username = $request->username;
            $user->email = $request->email;
            $user->DeptCode = $request->dept;
            $user->RoleCode = $request->role;
            $user->active = $request->has('active') ? 1 : 0;
            $user->password = $password;
            $user->save();
        
            event(new Registered($user));
        }
           
        return redirect()->back()->withInput()->with('success', 'User saved successfully.');
    }

    public function role(){
        $roles = Role::all();
        return view('maintenance.role', compact('roles'));
    }

    public function roledetail(){
        return view('maintenance.roledetail');
    }

    public function editrole($id = null)
    {
        $role = $id ? Role::findOrFail($id) : null; 
        return view('maintenance.roledetail', compact('role'));
    }

    public function saverole(Request $request, $id = null)
    {
        $request->validate([
            'rolecode' => [
                'required', 
                'max:250', 
                Rule::unique('roleacc', 'rolecode')->ignore($id)
            ],
            'roledesc' => ['required', 'max:500']
        ], [
            'rolecode.required' => 'Please enter Role Code.',
            'roledesc.required' => 'Please enter Role Name.',
            'rolecode.unique' => 'This Role Code already exists. Please use a different one.'
        ]);
    
        // Define the modules that need to be saved
        $modules = ['config', 'dept', 'role', 'mguser', 'log'];
    
        $roleData = [
            'rolecode' => $request->rolecode,
            'roledesc' => $request->roledesc,
        ];
    
        foreach ($modules as $module) {
            $roleData[$module] = $request->$module ?? 0; // Default to 'No Access' if not set
        }
    
        if ($id) {
            $role = Role::findOrFail($id);
            $role->update($roleData);
        } else {
            Role::create($roleData);
        }
    
        return redirect()->back()->withInput()->with('success', 'Role access saved successfully.');
    }    
      
    public function delrole($id)
    {
        $role = Role::findOrFail($id);
        $role->delete();
        return response()->json(['message' => 'Role deleted successfully']);
    }
}
