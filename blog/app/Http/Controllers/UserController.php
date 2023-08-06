<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Role;

class UserController extends Controller
{
    public function createAdminUser()
    {
        // Create a new user
        $user = new User();
        $user->name = 'Admin User';
        $user->email = 'admin@example.com';
        $user->password = bcrypt('adminpassword');
        $user->save();

        // Attach the "admin" role
        $adminRole = Role::where('name', 'admin')->first();
        $user->roles()->attach($adminRole);

        return response()->json(['message' => 'Admin user created successfully']);
    }
}
