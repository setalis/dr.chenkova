<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\TestSession;

class TestResult extends Component
{
    public TestSession $session;
    public string $resultCode = '';
    public string $email = '';

    public function mount(TestSession $session)
    {
        \Log::info('TestResult component mounted', [
            'session_id' => $session->id,
            'skin_type_code' => $session->skin_type_code
        ]);
        
        $this->session = $session;
        $this->calculateResult();
        
        \Log::info('TestResult calculation completed', [
            'result_code' => $this->resultCode
        ]);
    }

    public function calculateResult()
    {
        $code = '';
        $code .= $this->axisResult($this->session->test_one_answers, 'D');
        $code .= $this->axisResult($this->session->test_two_answers, 'S');
        $code .= $this->axisResult($this->session->test_three_answers, 'N');
        $code .= $this->axisResult($this->session->test_four_answers, 'T');
        $this->resultCode = $code;
        $this->session->update(['skin_type_code' => $code]);
    }

    private function axisResult($answers, $axis)
    {
        $sum = collect($answers)->map(fn($v) => floatval($v))->sum();

        return match ($axis) {
            'D' => $sum <= 30 ? 'D' : 'O',
            'S' => $sum <= 35 ? 'S' : 'R',
            'N' => $sum <= 35 ? 'N' : 'P', // P как "Pigmented"
            'T' => $sum <= 40 ? 'T' : 'W',
            default => '?',
        };
    }

    public function sendEmail()
    {
        try {
            \Log::info('Starting to send results', [
                'email' => $this->email,
                'result_code' => $this->resultCode
            ]);

            // Отправка на email
            \Mail::send('emails.test-result', [
                'resultCode' => $this->resultCode,
                'session' => $this->session
            ], function ($message) {
                $message->to($this->email)
                        ->subject('Ваш результат теста по типу кожи');
            });

            \Log::info('Email sent successfully');
            session()->flash('message', 'Результат отправлен на email!');
        } catch (\Exception $e) {
            \Log::error('Error sending results', [
                'error' => $e->getMessage(),
                'trace' => $e->getTraceAsString()
            ]);
            
            session()->flash('error', 'Произошла ошибка при отправке результатов. Пожалуйста, попробуйте позже.');
        }
    }

    public function render()
    {
        return view('livewire.test-result')->layout('components.layouts.front-livewire');
    }
}
