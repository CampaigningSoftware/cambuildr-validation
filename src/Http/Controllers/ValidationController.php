<?php


namespace CampaigningBureau\CambuildrValidation\Http\Controllers;


use CampaigningBureau\CambuildrValidation\Rules\EmailCambuildr;

class ValidationController extends Controller
{
    public function validateEmail()
    {
        request()->validate([
            'email' => ['required', new EmailCambuildr()],
        ]);

        return response(['message' => 'ok']);
    }
}