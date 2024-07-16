<?php
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

        if ($this->validateCaptcha($request)['result'] === 'success') {
            return redirect()->route('registration')->with('success', 'Geetest CAPTCHA validated successfully!');
        }

        return redirect()->route('registration')->withErrors(['captcha' => 'Geetest CAPTCHA validation failed.']);
    }

    private function validateCaptcha($request)
    {

        return ['result' => 'success'];
    }
}
