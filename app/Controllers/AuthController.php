<?php
// app/Controllers/AuthController.php
namespace App\Controllers;

use CodeIgniter\Controller;
use CodeIgniter\Shield\Authentication\LoginHandler;

class AuthController extends Controller
{
    protected $loginHandler;

    // Constructor to load LoginHandler
    public function __construct()
    {
        $this->loginHandler = new LoginHandler();
    }

    // Show the login form for the admin
    public function login()
    {
        // Check if the admin is already logged in
        if (logged_in() && user()->hasRole('admin')) {
            return redirect()->to('admin/dashboard'); // Redirect to admin dashboard if logged in
        }

        // Handle login submission
        if ($this->request->getMethod() == 'post') {
            // Get the form input data
            $email = $this->request->getPost('email');
            $password = $this->request->getPost('password');

            // Attempt to log in as admin
            if ($this->loginHandler->attempt($email, $password)) {
                // Check if the logged-in user has the 'admin' role
                if (user()->hasRole('admin')) {
                    return redirect()->to('admin/dashboard'); // Redirect to admin dashboard
                } else {
                    // If the user is not an admin, log them out
                    $this->logout();
                    session()->setFlashdata('error', 'You do not have admin access');
                    return redirect()->to('login');
                }
            } else {
                // Invalid login, show error message
                session()->setFlashdata('error', 'Invalid email or password');
            }
        }

        // Render the login view for admin
        return view('auth/login');
    }

    // Show the admin dashboard
    public function dashboard()
    {
        // Check if the user is logged in and has the admin role
        if (!logged_in() || !user()->hasRole('admin')) {
            return redirect()->to('login');
        }

        // Render the admin dashboard view
        return view('admin/dashboard');
    }

    // Handle admin logout
    public function logout()
    {
        // Log out the admin
        session()->destroy();
        return redirect()->to('login');
    }
}
