<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;
use Illuminate\Foundation\Auth\SendsPasswordResetEmails;

class ForgotPasswordController extends Controller
{
    use SendsPasswordResetEmails;

    public function forgot_password()
    {
        return view('auth.passwords.forgot');
    }

    public function forgot_password_request(Request $request)
    {
        $this->validate($request, ['email' => 'required|email']);

        $response = $this->broker()->sendResetLink(
            $request->only('email')
        );

        return $response == Password::RESET_LINK_SENT
            ? back()->with('status', 'Un lien de réinitialisation de mot de passe a été envoyé à votre adresse e-mail !')
            : back()->withErrors(
                ['email' => 'Aucun utilisateur n\'a été trouvé avec cette adresse e-mail !']
            );
    
    }

    public function reset_password($token)
    {
        return view('auth.passwords.reset')->with(
            ['token' => $token, 'email' => request('email')]
        );
    }

    public function reset_password_request(Request $request)
{
    $request->validate([
        'token' => 'required',
        'email' => 'required|email',
        'password' => 'required|confirmed|min:8',
    ]);

    $status = Password::reset(
        $request->only('email', 'password', 'password_confirmation', 'token'),
        function ($user, $password) {
            $user->forceFill([
                'password' => Hash::make($password)
            ])->save();
        }
    );

    return $status === Password::PASSWORD_RESET
                ? redirect()->route('login')->with('status', 'Votre mot de passe a été réinitialisé avec succès !')
                : back()->withErrors(['email' => [__($status)]]);
}

}
