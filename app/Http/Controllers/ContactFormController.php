<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;

class ContactFormController extends Controller
{
    public function send(Request $request)
    {
        try {
            Log::info('Начало обработки формы контакта');

            $validated = $request->validate([
                'name' => 'required|string|max:255',
                'phone' => 'required|string|max:20',
                'messenger' => 'required|string|in:telegram,whatsapp,viber,instagram',
                'messengerContact' => 'required|string|max:255',
                'privacy_agreement' => 'required|accepted',
            ]);

            $data = [
                'name' => $validated['name'],
                'phone' => $validated['phone'],
                'messenger' => $validated['messenger'],
                'messengerContact' => $validated['messengerContact'],
            ];

            Mail::send('emails.contact-form', $data, function ($message) {
                $message->to('mail@dr-chenkova.com')
                    ->subject('Новая заявка на обучение');
            });

            Log::info('Письмо успешно отправлено');

            return response()->json(['message' => 'Success']);
        } catch (\Exception $e) {
            Log::error('Ошибка при отправке формы', [
                'error' => $e->getMessage(),
            ]);

            return response()->json([
                'message' => 'Ошибка при отправке: '.$e->getMessage(),
            ], 500);
        }
    }
}
