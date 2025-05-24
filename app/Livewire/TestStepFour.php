<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\TestSession;

class TestStepFour extends Component
{
    public TestSession $session;
    public array $answers = [];

    public function mount(TestSession $session)
    {
        $this->session = $session;
        $this->answers = $session->test_four_answers ?? [];
    }

    public function updatedAnswers()
    {
        $this->session->update([
            'test_four_answers' => $this->answers,
        ]);
    }

    public function render()
    {
        return view('livewire.test-step-four');
    }
}

