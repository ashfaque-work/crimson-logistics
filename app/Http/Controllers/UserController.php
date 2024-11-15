<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Client;
use App\Models\Conductor;
use App\Models\Freight;
use App\Models\Refiner;
use App\Models\Shipper;
use App\Models\Order;

class UserController extends Controller
{
    // Display all user list
    public function index()
    {
        if ( auth()->user()->hasRole('conductor')){
            $users = User::get();
            $client = Client::get();
            $freight =  Freight::get();
            $refiner = Refiner::get();
            $shipper = Shipper::get();
            return view('conductor.users.index', compact('users', 'client', 'freight', 'refiner', 'shipper'));
        }
        elseif ( auth()->user()->hasRole('refiner')){
            $orders = Order::all();
            dd($orders);
        }

    }

    //Display new User Form
    public function create()
    {
        $roles = ['refiner', 'freight', 'shipper', 'client'];
        return view('conductor.users.create', compact('roles'));
    }

    //Create new User 
    public function store(Request $request)
    {
        $validator = $request->validate([
            'name' => 'required|string|max:50',
            'email' => 'required|string|email|max:80|unique:users',
            'password' => 'required|string|min:8|confirmed',
            'phone' => 'nullable|string',
            'address' => 'nullable|string',
            'city' => 'nullable|string',
            'state' => 'nullable|string',
            'country' => 'nullable|string',
            'zip' => 'nullable|string',
            'role' => 'required|string|max:50',
            'status' => 'nullable|string',
        ], [
            'name.required' => 'The name is required.',
            'email.required' => 'The email address is required.',
            'email.email' => 'Please enter a valid email address.',
            'email.max' => 'The email address must not exceed :max characters.',
            'email.unique' => 'The email address is already in use.',
            'password.required' => 'The password is required.',
            'password.min' => 'The password must be at least :min characters.',
            'password.confirmed' => 'The password confirmation does not match.',
            'role.required' => 'The role is required.',
        ]);
        try {
            $name = $validator['name'];
            $email = $validator['email'];
            $password = $validator['password'];
            $phone = $validator['phone'] ?? null;
            $address = $validator['address'] ?? null;
            $city = $validator['city'] ?? null;
            $state = $validator['state'] ?? null;
            $country = $validator['country'] ?? null;
            $zip = $validator['zip'] ?? null;
            $role = $validator['role'];
            $status = $validator['status'] ?? "1";

            // store staff
            $user = User::create([
                'name' => $name,
                'email' => $email,
                'password' => Hash::make($password),
                'status' => $status
            ]);

            // sending data to different table based on roles
            if (in_array($role, ['refiner', 'freight', 'shipper', 'client'])) {
                $modelClass = 'App\Models\\' . ucfirst($role);
                $modelClass::create([
                    'user_id' => $user->id,
                    'name' => $name,
                    'email' => $email,
                    'status' => $status,
                    'phone' => $phone,
                    'address' => $address,
                    'city' => $city,
                    'state' => $state,
                    'country' => $country,
                    'zip' => $zip,
                ]);
            } else {
                return redirect()->route('conductor.users.index')->withError('Invalid Role!');
            }
            $user->assignRole($role);
            return redirect()->route('conductor.users.index')->withSuccess(ucfirst($role) . ' added successfully!');
        } catch (\Exception $e) {
            // Log the error or dd($e->getMessage()) for debugging
            return redirect()->route('conductor.users.index')->withError('An error occurred during the create.');
        }
    }
    // Edit a specific user
    public function edit(Request $request)
    {
        try {
            $user = User::findOrFail($request->id);

            // Get the user's current role
            $userRole = $user->getRoleNames()->first();
            // Map the roles to their corresponding model classes
            $roleModels = [
                'conductor' => Conductor::class,
                'refiner' => Refiner::class,
                'freight' => Freight::class,
                'shipper' => Shipper::class,
                'client' => Client::class,
            ];

            // Get role-specific data based on the user's role
            $roleData = null;
            if (array_key_exists($userRole, $roleModels)) {
                $roleData = $roleModels[$userRole]::where('user_id', $user->id)->first();
            }

            return view('conductor.users.edit', compact('user', 'roleData'));
        } catch (\Exception $e) {
            // Log the error or dd($e->getMessage()) for debugging
            return redirect()->route('conductor.users.index')->withError('An error occurred during the update.');
        }
    }

    // Update a user
    public function update(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'nullable|string|max:255',
            'address' => 'nullable|string|max:255',
            'city' => 'nullable|string|max:255',
            'state' => 'nullable|string|max:255',
            'country' => 'nullable|string|max:255',
            'zip' => 'nullable|numeric',
            'role' => 'required|string',
            'status' => 'required|boolean',
        ], [
            'name.required' => 'The name is required.',
            'email.required' => 'The email address is required.',
            'email.email' => 'Please enter a valid email address.',
            'email.max' => 'The email address must not exceed :max characters.',
            'role.required' => 'The role is required.',
        ]);
        try {
            $userId = $request->id;
            // Update user data
            $user = User::findOrFail($userId);
            $user->update([
                'name' => $request->input('name'),
                'email' => $request->input('email'),
                'status' => $request->input('status'),
            ]);

            // Update role-specific data based on the user's role
            $role = $request->input('role');

            // sending data to different table based on roles
            if (in_array($role, ['conductor', 'refiner', 'freight', 'shipper', 'client'])) {
                $modelClass = 'App\Models\\' . ucfirst($role);
                // Retrieve an instance of the model
                $modelInstance = $modelClass::where('user_id', $user->id)->first();

                // If the instance exists, update its attributes
                if ($modelInstance) {
                    $modelInstance->update([
                        'name' => $request->input('name'),
                        'email' => $request->input('email'),
                        'status' => $request->input('status'),
                        'phone' => $request->input('phone'),
                        'address' => $request->input('address'),
                        'city' => $request->input('city'),
                        'state' => $request->input('state'),
                        'country' => $request->input('country'),
                        'zip' => $request->input('zip'),
                    ]);
                    return redirect()->route('conductor.users.index')->with('success', 'User updated successfully.');
                } else {
                    return redirect()->route('conductor.users.index')->withError('Model instance not found.');
                }
            } else {
                return redirect()->route('conductor.users.index')->withError('Role does not exist.');
            }
        } catch (\Exception $e) {
            dd($e->getMessage());
            return redirect()->route('conductor.users.index')->withError('An error occurred during the update.');
        }
    }

    // Delete a user
    public function delete(Request $request)
    {
        $userId = $request->input('user_id');
        $user = User::findOrFail($userId);

        // Check if the user is not deleting themselves
        if ($user->id != auth()->user()->id) {
            $user->delete();
            return redirect()->route('conductor.users.index')->with('success', 'User deleted successfully.');
        } else {
            return redirect()->route('conductor.users.index')->withError('You cannot delete your own account.');
        }
    }

    //Change User status
    public function changeUserStatus($id, $status)
    {
        $user = User::findOrFail($id);
        $user->update([
            'status' => $status,
        ]);

        return redirect()->route('conductor.users.index')->withSuccess('User status changed successfully!');
    }
}
