<?php
/* De klasse "ForgotPasswordController" is een controller die de logica afhandelt voor het verzenden
van e-mails voor het opnieuw instellen van wachtwoorden in een Laravel-applicatie. */
namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\SendsPasswordResetEmails;
use Illuminate\Http\Request; 
use Illuminate\Support\Facades\Password; 

class ForgotPasswordController extends Controller
{
    
    

    
    use SendsPasswordResetEmails;
   
}
