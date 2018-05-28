<?php

namespace App\Http\Controllers;

use App\ConfirmationToken;
use App\Http\Requests\AuthRequest;
use App\Mail\Confirmation;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class AuthController extends Controller {

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index () {
        return view('web.auth');
    }

    /**
     * @param Request $request
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function submit (Request $request) {
        $this->validate($request, [
            "email"    => "required|email",
            "password" => "required|min:5",
        ]);

        $input             = $request->only(['email', 'password']);

        if (User::where('email', $request->get('email'))->exists()) {
            // Email exists, this is login request.
            if (Auth::attempt($input)) {
                return redirect('dashboard')->with('success', "Welcome back, we've missed you!");
            } else {
                return redirect()->back()->with('warning', "Invalid Email address or password.");
            }
        } else {
            // Email doesn't exist, this is registration request.
            $input['password'] = bcrypt($input['password']);
            $user = User::create($input);

            // Generate and send confirmation token for this user.
            ConfirmationToken::create([
                'user_id' => $user->id,
                'token'   => str_random(40),
            ]);
            Mail::to($user->email)->send(new Confirmation($user));

            // Automatically authenticate the user.
            Auth::login($user);

            return redirect('dashboard')->with('success', "Welcome to our awesome app!");
        }
    }

    public function logout () {
        Auth::logout();
        return redirect('/')->with('success', "You've been logged out, please come back soon!");
    }

    public function confirm ($token) {
        $confirmationToken = ConfirmationToken::where('token', $token)->first();
        if ($confirmationToken) {
            if ($confirmationToken->user->isActive()) {
                return redirect('dashboard')->with('success', 'You are already active!');
            }

            $confirmationToken->user->status = 'active';
            $confirmationToken->user->save();
            return redirect('dashboard')->with('success', 'Thanks for confirming the email address, you are now active!');
        } else {
            Auth::logout();
            return redirect('/')->with('error', 'Sorry, your email cannot be confirmed');
        }
    }
}
