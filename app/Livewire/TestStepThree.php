<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\TestSession;

class TestStepThree extends Component
{
    public TestSession $session;
    public array $answers = [];

    public function mount(TestSession $session)
    {
        $this->session = $session;
        $this->answers = $session->test_three_answers ?? [];
    }

    public function updatedAnswers()
    {
        $this->session->update([
            'test_three_answers' => $this->answers,
        ]);
    }

    public function render()
    {
        return view('livewire.test-step-three');
    }
}

