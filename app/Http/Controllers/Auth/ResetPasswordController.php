<?php
/* De klasse ResetPasswordController verzorgt de logica voor het opnieuw instellen van het wachtwoord
van een gebruiker in een PHP Laravel-applicatie. */

namespace App\Http\Controllers\Auth;

use App\Models\User;
use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Str;
use App\Http\Controllers\Controller;

class ResetPasswordController extends Controller
{
   
    /* De functie `resetPassword` is verantwoordelijk voor het afhandelen van de logica van het opnieuw
   instellen van het wachtwoord van een gebruiker in een PHP Laravel-applicatie. */
    public function resetPassword(Request $request)
    {
        $request->validate([
            'token' => 'required',
            'email' => 'required|email',
            'password' => 'required|min:8|confirmed',
        ]);

        $status = Password::reset(
            $request->only('email', 'password', 'password_confirmation', 'token'),
            function (User $user, string $password) {
                $user->forceFill([
                    'password' => Hash::make($password)
                ])->setRememberToken(Str::random(60));

                $user->save();

                event(new PasswordReset($user));
            }
        );

        return $status === Password::PASSWORD_RESET
                    ? $this->sendResetResponse($status)
                    : $this->sendResetFailedResponse($status);
    }

  /**
   * De bovenstaande code definieert twee functies in PHP voor het verzenden van reset-reacties en
   * mislukte reset-reacties.
   * 
   * param status De parameter "status" is een tekenreeks die het bericht of de status van het reset-
   * of foutantwoord vertegenwoordigt. Het wordt gebruikt om feedback te geven aan de gebruiker over de
   * uitkomst van de wachtwoordresetbewerking.
   * 
   * return Bij de `sendResetResponse`-methode wordt een omleidingsantwoord geretourneerd. Het leidt
   * de gebruiker door naar de 'inlog'-route en bevat een flashbericht met de status.
   */
    protected function sendResetResponse($status)
    {
        return redirect()->route('login')->with('status', __($status));
    }

    protected function sendResetFailedResponse($status)
    {
        return back()->withErrors(['email' => [__($status)]]);
    }
}
