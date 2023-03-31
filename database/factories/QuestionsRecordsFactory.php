<?php

namespace Database\Factories;

use App\Models\QuestionsRecords;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\QuestionsRecords>
 */
class QuestionsRecordsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */

    protected $model = QuestionsRecords::class;
    

    public function definition(): array
    {






        return [
            'added_by' => 18,
            'subject' => 1,
            'question' => 'What is PHP ?',
            'option1' => 'Framework',
            'option2' => 'Lang',
            'option3' => 'Concept',
            'option4' => 'Program',
            'correct_answer' => 'option2',
            'score' => 1,
            ];
    




    }
}
