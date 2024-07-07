<?php
namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function customers()
    {
        if (Auth::user()->role == 'admin') {
            $customers = User::where('role', 'customer')->paginate(10);
            return view('users.customers', compact('customers'));
        } else {
            return redirect()->route('index')->with('error', 'Access denied');
        }
    }

    public function hosts()
    {
        if (Auth::user()->role == 'admin') {
            $hosts = User::where('role', 'host')->paginate(10);
            return view('users.hosts', compact('hosts'));
        } else {
            return redirect()->route('index')->with('error', 'Access denied');
        }
    }

    public function createCustomer()
    {
        if (Auth::user()->role == 'admin') {
            $roles = ['customer' => 'Customer', 'host' => 'Host'];
            return view('users.create', ['action' => route('customers.store'), 'roles' => $roles, 'defaultRole' => 'customer']);
        } else {
            return redirect()->route('index')->with('error', 'Access denied');
        }
    }

    public function createHost()
    {
        if (Auth::user()->role == 'admin') {
            $roles = ['customer' => 'Customer', 'host' => 'Host'];
            return view('users.create', ['action' => route('hosts.store'), 'roles' => $roles, 'defaultRole' => 'host']);
        } else {
            return redirect()->route('index')->with('error', 'Access denied');
        }
    }

    public function store(Request $request)
    {
        if (Auth::user()->role == 'admin') {
            $request->validate([
                'name' => 'required',
                'email' => 'required|email|unique:users',
                'password' => 'required|min:6',
                'role' => 'nullable|in:customer,host',
            ]);

            // Debugging statement
            // dd($request->all());

            User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => bcrypt($request->password),
                'role' => $request->role,
            ]);

            $redirectRoute = $request->role == 'customer' ? 'customers.index' : 'hosts.index';

            return redirect()->route($redirectRoute)->with('success', 'User created successfully.');
        } else {
            return redirect()->route('index')->with('error', 'Access denied');
        }
    }

    public function edit(User $user)
    {
        if (Auth::user()->role == 'admin') {
            $roles = ['customer' => 'Customer', 'host' => 'Host'];
            $action = $user->role == 'customer' ? route('customers.update', $user->id) : route('hosts.update', $user->id);
            return view('users.edit', compact('user', 'roles', 'action'));
        } else {
            return redirect()->route('index')->with('error', 'Access denied');
        }
    }

    public function update(Request $request, User $user)
    {
        if (Auth::user()->role == 'admin') {
            $request->validate([
                'name' => 'required',
                'email' => 'required|email|unique:users,email,' . $user->id,
                'role' => 'nullable|in:customer,host', // validate role
            ]);

            $user->update($request->all());

            $redirectRoute = $user->role == 'customer' ? 'customers.index' : 'hosts.index';

            return redirect()->route($redirectRoute)->with('success', 'User updated successfully.');
        } else {
            return redirect()->route('index')->with('error', 'Access denied');
        }
    }

    public function destroy(User $user)
    {
        if (Auth::user()->role == 'admin') {
            $role = $user->role;
            $user->delete();

            $redirectRoute = $role == 'customer' ? 'customers.index' : 'hosts.index';

            return redirect()->route($redirectRoute)->with('success', 'User deleted successfully.');
        } else {
            return redirect()->route('index')->with('error', 'Access denied');
        }
    }
}
