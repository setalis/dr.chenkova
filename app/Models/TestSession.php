<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TestSession extends Model
{
    protected $fillable = [
        'test_one_answers',
        'test_two_answers',
        'test_three_answers',
        'test_four_answers',
        'result_code',
        'email',
        'test_one_result'
    ];

    protected $casts = [
        'test_one_answers' => 'array',
        'test_two_answers' => 'array',
        'test_three_answers' => 'array',
        'test_four_answers' => 'array',
    ];

    public function calculateResult()
    {
        $code = '';
        
        // Тест 1: D/O (Dry/Oily)
        $sum1 = collect($this->test_one_answers)->sum();
        $code .= $sum1 <= 30 ? 'D' : 'O';
        
        // Тест 2: S/R (Sensitive/Resistant)
        $sum2 = collect($this->test_two_answers)->sum();
        $code .= $sum2 <= 35 ? 'S' : 'R';
        
        // Тест 3: N/P (Non-pigmented/Pigmented)
        $sum3 = collect($this->test_three_answers)->sum();
        $code .= $sum3 <= 35 ? 'N' : 'P';
        
        // Тест 4: T/W (Tight/Wrinkled)
        $sum4 = collect($this->test_four_answers)->sum();
        $code .= $sum4 <= 40 ? 'T' : 'W';

        $this->update(['result_code' => $code]);
        return $code;
    }
}
