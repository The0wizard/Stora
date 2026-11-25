<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Str;
use Illuminate\Validation\Rules;
use Illuminate\View\View;

class NewPasswordController extends Controller
{
    /**
     * Affiche le formulaire de réinitialisation (avec token).
     */
    public function create(Request $request): View
    {
        return view('auth.reset-password', ['request' => $request]);
    }

    /**
     * Traite le nouveau mot de passe.
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'token'    => ['required'],
            'email'    => ['required', 'email'],
            'password' => ['required', 'confirmed', 'min:8', Rules\Password::defaults()],
        ], [
            'token.required'    => 'Le jeton de sécurité est manquant.',
            'email.required'    => 'Veuillez entrer votre adresse email.',
            'email.email'       => 'Adresse email invalide.',
            'password.required' => 'Veuillez entrer un nouveau mot de passe.',
            'password.confirmed'=> 'Les deux mots de passe ne correspondent pas.',
            'password.min'      => 'Le mot de passe doit contenir au moins 8 caractères.',
        ]);

        $status = Password::reset(
            $request->only('email', 'password', 'password_confirmation', 'token'),
            function (User $user) use ($request) {
                $user->forceFill([
                    'password'       => Hash::make($request->password),
                    'remember_token' => Str::random(60),
                ])->save();

                event(new PasswordReset($user));
            }
        );

        if ($status === Password::PASSWORD_RESET) {
            return redirect()->route('login')->with('status', 'Votre mot de passe a été réinitialisé avec succès. Vous pouvez maintenant vous connecter.');
        }

        // Message d'erreur en français selon la raison
        $message = match ($status) {
            Password::INVALID_TOKEN => 'Le lien de réinitialisation est invalide ou a expiré.',
            Password::INVALID_USER  => 'Aucun compte n\'est associé à cette adresse email.',
            default                 => 'Impossible de réinitialiser votre mot de passe. Veuillez réessayer.',
        };

        return back()
            ->withInput($request->only('email'))
            ->withErrors(['email' => $message]);
    }
}
