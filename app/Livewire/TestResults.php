<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\TestSession;

class TestResults extends Component
{
    public TestSession $session;

    public function mount(TestSession $session)
    {
        $this->session = $session;
    }

    public function render()
    {
        return view('livewire.test-results');
    }
} 