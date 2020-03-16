<?php

declare(strict_types=1);

namespace ElliotJReed\Permutation;

class Permutation
{
    private array $permutations = [];

    public function find(string $letters): array
    {
        $this->permute($letters, 0, \strlen($letters));

        return \array_values(\array_unique($this->permutations));
    }

    private function permute(string $letters, int $firstIndex, int $stringLength): void
    {
        if ($firstIndex === $stringLength) {
            $this->permutations[] = $letters;
        } else {
            for ($secondIndex = $firstIndex; $secondIndex < $stringLength; $secondIndex++) {
                $this->swap($letters, $firstIndex, $secondIndex);
                $this->permute($letters, $firstIndex + 1, $stringLength);
                $this->swap($letters, $firstIndex, $secondIndex);
            }
        }
    }

    private function swap(string &$letters, int $firstIndex, int $secondIndex): void
    {
        $temp = $letters[$firstIndex];
        $letters[$firstIndex] = $letters[$secondIndex];
        $letters[$secondIndex] = $temp;
    }
}
