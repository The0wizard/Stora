<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Password;
use Illuminate\View\View;

class PasswordResetLinkController extends Controller
{
    /**
     * Affiche le formulaire "mot de passe oublié".
     */
    public function create(): View
    {
        return view('auth.forgot-password');
    }

    /**
     * Envoie le lien de réinitialisation.
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'email' => ['required', 'email'],
        ], [
            'email.required' => 'Veuillez entrer votre adresse email.',
            'email.email'    => 'Veuillez entrer une adresse email valide.',
        ]);

        $status = Password::sendResetLink(
            $request->only('email')
        );

        if ($status === Password::RESET_LINK_SENT) {
            return back()->with('status', 'Un lien de réinitialisation a été envoyé à votre adresse email.');
        }

        // Message personnalisé en français si échec (ex: email inconnu)
        return back()
            ->withInput($request->only('email'))
            ->withErrors(['email' => 'Aucun compte n\'est associé à cette adresse email.']);
    }
}
