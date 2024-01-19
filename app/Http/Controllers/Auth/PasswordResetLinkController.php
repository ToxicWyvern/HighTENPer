<?php
/* De klasse PasswordResetLinkController is verantwoordelijk voor het verzenden van een link voor het
opnieuw instellen van het wachtwoord naar het e-mailadres van een gebruiker. */
namespace App\Http\Controllers;
use App\Http\Controllers\ForgotPasswordController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Password;

class PasswordResetLinkController extends Controller
{
    public function sendResetLink(Request $request)
    {
        $request->validate(['email' => 'required|email']);
 
        $status = Password::sendResetLink(
            $request->only('email')
        );
 
        return $status === Password::RESET_LINK_SENT
                    ? back()->with(['status' => __($status)])
                    : back()->withErrors(['email' => __($status)]);
    }
}
