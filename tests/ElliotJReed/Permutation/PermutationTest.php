<?php

declare(strict_types=1);

namespace Tests\ElliotJReed\Permutation;

use PHPUnit\Framework\TestCase;
use ElliotJReed\Permutation\Permutation;

final class PermutationTest extends TestCase
{
    public function testItReturnsOnePermutationForOneCharacter(): void
    {
        $this->assertSame(['a'], (new Permutation())->find('a'));
    }

    public function testItFindAllPermutationsOfCharactersInString(): void
    {
        $expected = [
            'bar',
            'bra',
            'abr',
            'arb',
            'rab',
            'rba',
        ];

        $this->assertSame($expected, (new Permutation())->find('bar'));
    }

    public function testItFindAllPermutationsOfCharactersInStringContainingDuplicatedCharacters(): void
    {
        $expected = [
            'foo',
            'ofo',
            'oof'
        ];

        $this->assertSame($expected, (new Permutation())->find('foo'));
    }
}
