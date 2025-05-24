<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\TestSession;

class TestStepOne extends Component
{
    public TestSession $session;
    public array $answers = [];

    public function mount(TestSession $session)
    {
        $this->session = $session;
        $this->answers = $session->test_one_answers ?? [];
    }

    public function updatedAnswers($value, $key)
    {
        \Log::info('TestStepOne updatedAnswers', [
            'key' => $key,
            'value' => $value,
            'all_answers' => $this->answers
        ]);

        $this->session->update([
            'test_one_answers' => $this->answers,
        ]);

        \Log::info('Session after update', [
            'test_one_answers' => $this->session->fresh()->test_one_answers
        ]);
    }

    public function render()
    {
        return view('livewire.test-step-one');
    }
}
