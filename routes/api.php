<?php
use Illuminate\Support\Facades\Route;

Route::get('/validations/email', [\CampaigningBureau\CambuildrValidation\Http\Controllers\ValidationController::class, 'validateEmail'])->name('validations.email');