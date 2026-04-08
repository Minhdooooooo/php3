<?php

use App\Http\Controllers\HsController;
use App\Http\Controllers\SvController;
use App\Mail\GuiEmail;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Route;

Route::redirect('/', '/hs');

Route::get('/hs', [HsController::class, 'hs'])->name('hs.form');
Route::post('/hs', [HsController::class, 'hs_store'])->name('hs_store');

Route::get('/sv', [SvController::class, 'sv'])->name('sv.form');
Route::post('/sv', [SvController::class, 'sv_store'])->name('sv_store');

Route::get('/guimail', function () {
    $from = env('MAILGUN_FROM');
    $to = env('MAIL_TO');
    $subject = env('MAIL_SUBJECT', 'Tieu de thu');
    $attachment = public_path('hinh1.jpg');

    if (blank(env('MAILGUN_DOMAIN')) || blank(env('MAILGUN_SECRET'))) {
        return response('Chua cau hinh MAILGUN_DOMAIN va MAILGUN_SECRET trong file .env', 500);
    }

    if (blank($from) || blank($to)) {
        return response('Chua cau hinh MAILGUN_FROM hoac MAIL_TO trong file .env', 500);
    }

    Mail::mailer('mailgun')->send(
        new GuiEmail(
            fromAddress: $from,
            toAddress: $to,
            subjectLine: $subject,
            attachmentPath: is_file($attachment) ? $attachment : null
        )
    );

    return response('Da gui mail thanh cong');
});