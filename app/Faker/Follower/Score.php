<?php

namespace App\Faker\Follower;

use Illuminate\Support\Collection;

class Score
{
    private $answers;

    public function __construct(Collection $answers)
    {
        $this->answers = $answers;
    }

    public function getGoodScore(): float
    {
        $answers = $this->filterAnswers('good');

        $scoreAndTotal = $this->getScoreAndTotal($answers);

        return $this->getScore($scoreAndTotal);
    }

    public function getInactiveScore(): float
    {
        $answers = $this->filterAnswers('inactive');

        $scoreAndTotal = $this->getScoreAndTotal($answers);

        return $this->getScore($scoreAndTotal);
    }

    public function getFakeScore(): float
    {
        $answers = $this->filterAnswers('fake');

        $scoreAndTotal = $this->getScoreAndTotal($answers);

        return $this->getScore($scoreAndTotal);
    }

    private function filterAnswers(string $filter)
    {
        return $this->answers->filter(function ($answer) use ($filter) {
            return $answer->getType() === $filter;
        });
    }

    private function getScoreAndTotal(Collection $filteredAnswers): array
    {
        $result['score'] = 0;
        $result['total'] = 0;

        foreach ($filteredAnswers as $answer) {
            $result['score'] += $answer->getActualScore();
            $result['total'] += $answer->getPossibleScore();
        }

        return $result;
    }

    private function getScore(array $scoreAndTotal): float
    {
        return round(($scoreAndTotal['score'] / $scoreAndTotal['total']) * 100, 2);
    }
}
