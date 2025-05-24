<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\TestSession;

class TestStepTwo extends Component
{
    public TestSession $session;
    public array $answers = [];

    public function mount(TestSession $session)
    {
        $this->session = $session;
        $this->answers = $session->test_two_answers ?? [];
    }

    public function updatedAnswers()
    {
        $this->session->update([
            'test_two_answers' => $this->answers,
        ]);
    }

    public function render()
    {
        return view('livewire.test-step-two');
    }
}

