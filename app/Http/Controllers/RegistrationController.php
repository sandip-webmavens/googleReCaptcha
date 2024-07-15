<?php
// app/Http/Controllers/RegistrationController.php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Salahhusa9\GeetestCaptcha\Rules\GeetestCaptchaValidate;

class RegistrationController extends Controller
{
    public function form()
    {
        return view('form.registration');
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
            'geetest_captcha' => ['required', new GeetestCaptchaValidate]
        ]);

        // Assuming the CAPTCHA validation passes and you get a response
        $response = $this->validateCaptcha($request);

        if (isset($response['result'])) {
            $result = $response['result'];
        } else {
            // Handle the case where 'result' is not set
            return redirect()->route('registration')->withErrors(['captcha' => 'Geetest CAPTCHA validation failed.']);
        }

        // Your login logic here

        return redirect()->route('registration')->with('success', 'Geetest CAPTCHA validated successfully!');
    }

    private function validateCaptcha($request)
    {
        // Dummy function to simulate captcha validation
        // Replace with actual implementation
        return ['result' => 'success']; // Example response
    }
}
