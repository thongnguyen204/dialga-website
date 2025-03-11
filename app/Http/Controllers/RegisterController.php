<?php
namespace App\Http\Controllers;

use App\Http\Requests\UserPostRequest;
use App\Models\User;
use App\Repositories\UserRepository;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class RegisterController extends Controller
{
    /**
     * @var UserRepository
     */
    private $userRepository;

    /**
     * UserController constructor
     * @package App\Http\Controllers
     * @param \App\Repositories\UserRepository $userRepository
     */
    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    /**
     * Show the form for signing up the user.
     *
     * @return \Illuminate\View\View
     */
    public function showForm(): View
    {
        return view('auth.register');
    }

    /**
     * Signing up the user.
     *
     * @param  \App\Http\Requests\UserPostRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function register(UserPostRequest $request): RedirectResponse
    {
        $this->userRepository->create($request->getParams());

        return redirect('/login')->with('success', 'Registration successful! Please log in.');
    }
}
