<?php


namespace CampaigningSoftware\CambuildrValidation\Http\Controllers;


use CampaigningSoftware\CambuildrValidation\Rules\EmailCambuildr;

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