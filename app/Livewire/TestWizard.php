<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\TestSession;

class TestWizard extends Component
{
    public $step = 1;
    public $currentQuestion = 1;
    public $totalQuestions = 11;
    public $currentAnswers = [];
    public $stepOneResult;
    public $stepTwoResult;
    public $stepThreeResult;
    public $stepFourResult;
    public $showResultModal = false;
    public $session;

    public function mount()
    {
        $this->session = TestSession::create();
        $this->initializeAnswers();
    }

    private function initializeAnswers()
    {
        \Log::info('Initializing answers', [
            'step' => $this->step,
            'current_question' => $this->currentQuestion
        ]);

        if ($this->step === 1) {
            $this->totalQuestions = 11;
            $this->currentAnswers = array_fill(1, $this->totalQuestions, null);
        } elseif ($this->step === 2) {
            $this->totalQuestions = 19;
            $this->currentAnswers = array_fill(1, $this->totalQuestions, null);
        } elseif ($this->step === 3) {
            $this->totalQuestions = 13;
            $this->currentAnswers = array_fill(1, $this->totalQuestions, null);
        } elseif ($this->step === 4) {
            $this->totalQuestions = 20;
            $this->currentAnswers = array_fill(1, $this->totalQuestions, null);
        }

        \Log::info('Answers initialized', [
            'total_questions' => $this->totalQuestions,
            'current_answers' => $this->currentAnswers
        ]);
    }

    public function nextQuestion()
    {
        // Проверяем, что текущий вопрос отвечен
        if (!isset($this->currentAnswers[$this->currentQuestion]) || $this->currentAnswers[$this->currentQuestion] === null) {
            session()->flash('error', 'Пожалуйста, выберите ответ на текущий вопрос');
            return;
        }

        if ($this->currentQuestion < $this->totalQuestions) {
            $this->currentQuestion++;
            $this->resetCurrentAnswer();
        } else {
            \Log::info('Last question reached', [
                'step' => $this->step,
                'current_question' => $this->currentQuestion,
                'total_questions' => $this->totalQuestions
            ]);

            if ($this->step === 1) {
                $this->calculateStepOneResult();
                $this->showResultModal = true;
                \Log::info('Step 1 completed, showing modal', [
                    'showResultModal' => $this->showResultModal,
                    'stepOneResult' => $this->stepOneResult
                ]);
            } elseif ($this->step === 2) {
                $this->calculateStepTwoResult();
                $this->showResultModal = true;
                \Log::info('Step 2 completed, showing modal', [
                    'showResultModal' => $this->showResultModal,
                    'stepTwoResult' => $this->stepTwoResult
                ]);
            } elseif ($this->step === 3) {
                $this->stepThreeResult = $this->calculateStepThreeResult();
                $this->showResultModal = true;
                \Log::info('Step 3 completed, showing modal', [
                    'showResultModal' => $this->showResultModal,
                    'stepThreeResult' => $this->stepThreeResult
                ]);
            } elseif ($this->step === 4) {
                $this->calculateStepFourResult();
                $this->showResultModal = true;
                \Log::info('Step 4 completed, showing modal', [
                    'showResultModal' => $this->showResultModal,
                    'stepFourResult' => $this->stepFourResult
                ]);
            }
        }
    }

    public function previousQuestion()
    {
        if ($this->currentQuestion > 1) {
            $this->currentQuestion--;
        }
    }

    private function resetCurrentAnswer()
    {
        if (isset($this->currentAnswers[$this->currentQuestion])) {
            $this->currentAnswers[$this->currentQuestion] = null;
        }
    }

    public function updatedCurrentAnswers($value, $key)
    {
        \Log::info('Answer updated', [
            'key' => $key,
            'value' => $value,
            'currentQuestion' => $this->currentQuestion,
            'allAnswers' => $this->currentAnswers
        ]);
    }

    public function calculateStepOneResult()
    {
        \Log::info('Starting step one result calculation', [
            'answers' => $this->currentAnswers
        ]);

        $sum = 0;
        foreach ($this->currentAnswers as $answer) {
            if ($answer !== null) {
                $sum += (float)$answer;
            }
        }
        
        \Log::info('Sum calculated', [
            'sum' => $sum
        ]);
        
        // Определяем тип кожи по сумме баллов
        if ($sum >= 34 && $sum <= 44) {
            $this->stepOneResult = 'O'; // очень жирная кожа
        } elseif ($sum >= 27 && $sum <= 33) {
            $this->stepOneResult = 'O'; // немного жирная кожа
        } elseif ($sum >= 17 && $sum <= 26) {
            $this->stepOneResult = 'D'; // немного сухая кожа
        } elseif ($sum >= 11 && $sum <= 16) {
            $this->stepOneResult = 'D'; // очень сухая кожа
        }
        
        \Log::info('Result determined', [
            'result' => $this->stepOneResult
        ]);
        
        session([
            'step_one_type' => $this->stepOneResult,
            'step_one_score' => $sum
        ]);

        $this->session->update([
            'test_one_answers' => $this->currentAnswers,
            'test_one_score' => $sum
        ]);

        \Log::info('Test results saved', [
            'session_data' => $this->session->fresh()->toArray()
        ]);
    }

    public function calculateStepTwoResult()
    {
        $sum = 0;
        foreach ($this->currentAnswers as $answer) {
            if ($answer !== null) {
                $sum += (float)$answer;
            }
        }

        // Проверяем наличие диагнозов
        $hasDermatologistDiagnosis = in_array('В', $this->currentAnswers) || in_array('Г', $this->currentAnswers);
        $hasGeneralPractitionerDiagnosis = in_array('Б', $this->currentAnswers);

        if ($hasDermatologistDiagnosis) {
            $sum += 5;
        } elseif ($hasGeneralPractitionerDiagnosis) {
            $sum += 2;
        }

        $this->stepTwoResult = match(true) {
            $sum >= 34 => 'S', // очень чувствительная
            $sum >= 20 => 'S', // частично чувствительная
            $sum >= 25 => 'R', // более-менее резистентная
            default => 'R'     // очень резистентная
        };

        session([
            'step_two_type' => $this->stepTwoResult,
            'step_two_score' => $sum
        ]);

        $this->session->update([
            'test_two_answers' => $this->currentAnswers,
            'test_two_score' => $sum
        ]);
    }

    private function calculateStepThreeResult()
    {
        $totalScore = 0;
        
        // Суммируем все ответы
        foreach ($this->currentAnswers as $answer) {
            $totalScore += (float)$answer;
        }
        
        // Определяем тип кожи
        $skinType = $totalScore <= 30 ? 'N' : 'P';
        
        // Сохраняем результаты в сессии
        session([
            'step_three_type' => $skinType,
            'step_three_score' => $totalScore
        ]);

        $this->session->update([
            'test_three_answers' => $this->currentAnswers,
            'test_three_score' => $totalScore
        ]);
        
        return [
            'score' => $totalScore,
            'type' => $skinType
        ];
    }

    public function calculateStepFourResult()
    {
        $sum = 0;
        foreach ($this->currentAnswers as $answer) {
            if ($answer !== null) {
                $sum += (float)$answer;
            }
        }
        
        // Если возраст 65 лет или больше, добавляем 5 баллов
        // TODO: Добавить проверку возраста, когда будет доступна эта информация
        
        // Определяем тип кожи по сумме баллов
        if ($sum >= 20 && $sum <= 40) {
            $this->stepFourResult = 'T'; // упругая кожа
        } elseif ($sum >= 41 && $sum <= 85) {
            $this->stepFourResult = 'W'; // морщинистая кожа
        }
        
        session([
            'step_four_type' => $this->stepFourResult,
            'step_four_score' => $sum
        ]);

        $this->session->update([
            'test_four_answers' => $this->currentAnswers,
            'test_four_score' => $sum
        ]);

        \Log::info('Test four results calculated', [
            'sum' => $sum,
            'result' => $this->stepFourResult,
            'answers' => $this->currentAnswers
        ]);
    }

    public function calculateFinalResult()
    {
        \Log::info('Starting final result calculation', [
            'step_one_result' => $this->stepOneResult,
            'step_two_result' => $this->stepTwoResult,
            'step_three_result' => $this->stepThreeResult,
            'step_four_result' => $this->stepFourResult
        ]);

        $result = '';
        
        // Первый тест: D/O (Dry/Oily)
        $result .= $this->stepOneResult;
        
        // Второй тест: S/R (Sensitive/Resistant)
        $result .= $this->stepTwoResult;
        
        // Третий тест: N/P (Non-pigmented/Pigmented)
        $result .= $this->stepThreeResult['type'];
        
        // Четвертый тест: T/W (Tight/Wrinkled)
        $result .= $this->stepFourResult;
        
        \Log::info('Final result calculated', [
            'result' => $result
        ]);
        
        // Сохраняем результат в сессии
        session(['final_result' => $result]);
        
        // Сохраняем в базе данных
        $this->session->update([
            'skin_type_code' => $result
        ]);
        
        \Log::info('Final result saved', [
            'session_data' => $this->session->fresh()->toArray()
        ]);
        
        return $result;
    }

    public function closeResultModal()
    {
        \Log::info('Closing result modal', [
            'current_step' => $this->step,
            'step_one_result' => $this->stepOneResult,
            'step_two_result' => $this->stepTwoResult,
            'step_three_result' => $this->stepThreeResult,
            'step_four_result' => $this->stepFourResult,
            'showResultModal_before' => $this->showResultModal,
            'session_id' => $this->session->id
        ]);

        $this->showResultModal = false;
        
        if ($this->step === 1) {
            $this->step = 2;
            $this->currentQuestion = 1;
            $this->initializeAnswers();
            \Log::info('Moving to step 2', [
                'showResultModal_after' => $this->showResultModal,
                'new_step' => $this->step,
                'new_question' => $this->currentQuestion
            ]);
        } elseif ($this->step === 2) {
            $this->step = 3;
            $this->currentQuestion = 1;
            $this->initializeAnswers();
            \Log::info('Moving to step 3', [
                'showResultModal_after' => $this->showResultModal,
                'new_step' => $this->step,
                'new_question' => $this->currentQuestion
            ]);
        } elseif ($this->step === 3) {
            $this->step = 4;
            $this->currentQuestion = 1;
            $this->initializeAnswers();
            \Log::info('Moving to step 4', [
                'showResultModal_after' => $this->showResultModal,
                'new_step' => $this->step,
                'new_question' => $this->currentQuestion
            ]);
        } elseif ($this->step === 4) {
            \Log::info('Starting final result calculation and redirect', [
                'session_id' => $this->session->id,
                'current_answers' => $this->currentAnswers
            ]);
            
            $this->calculateFinalResult();
            
            \Log::info('Final result calculated, redirecting to results page', [
                'session_id' => $this->session->id,
                'skin_type_code' => $this->session->skin_type_code
            ]);
            
            return redirect()->route('test.result', ['session' => $this->session->id]);
        }
    }

    public function render()
    {
        return view('livewire.test-wizard')
            ->layout('components.layouts.main');
    }

    public function restartTest()
    {
        $this->step = 1;
        $this->currentQuestion = 1;
        $this->stepOneResult = null;
        $this->stepTwoResult = null;
        $this->stepThreeResult = null;
        $this->stepFourResult = null;
        $this->showResultModal = false;
        $this->initializeAnswers();
        
        session()->forget([
            'step_one_type',
            'step_one_score',
            'step_two_type',
            'step_two_score',
            'step_three_type',
            'step_three_score',
            'step_four_type',
            'step_four_score'
        ]);
    }
}
