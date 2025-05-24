<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Log;

class ContactFormController extends Controller
{
    public function send(Request $request)
    {
        try {
            Log::info('Начало обработки формы', $request->all());

            $validated = $request->validate([
                'name' => 'required|string|max:255',
                'phone' => 'required|string|max:20',
                'messenger' => 'required|string|in:telegram,whatsapp,viber,instagram',
                'messengerContact' => 'required|string|max:255',
            ]);

            Log::info('Данные валидированы успешно', $validated);

            $data = [
                'name' => $validated['name'],
                'phone' => $validated['phone'],
                'messenger' => $validated['messenger'],
                'messengerContact' => $validated['messengerContact'],
            ];

            Log::info('Попытка отправки письма', [
                'to' => 'dr.chencova@gmail.com',
                'data' => $data
            ]);

            Mail::send('emails.contact-form', $data, function($message) {
                $message->to('dr.chencova@gmail.com')
                        ->subject('Новая заявка на обучение');
            });

            Log::info('Письмо успешно отправлено');

            return response()->json(['message' => 'Success']);
        } catch (\Exception $e) {
            Log::error('Ошибка при отправке формы', [
                'error' => $e->getMessage(),
                'trace' => $e->getTraceAsString(),
                'request_data' => $request->all()
            ]);

            return response()->json([
                'message' => 'Ошибка при отправке: ' . $e->getMessage()
            ], 500);
        }
    }
} 