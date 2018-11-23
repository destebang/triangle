<?php

declare(strict_types=1);

namespace Tradeshift\Triangle\Domain\Model;

use phpDocumentor\Reflection\Types\Self_;

final class TriangleType
{
    public const EQUILATERAL = 'EQUILATERAL';
    public const ISOSCELES = 'ISOSCELES';
    public const SCALENE = 'SCALENE';

    private const VALID_TYPES = [
        self::EQUILATERAL => EquilateralTriangle::class,
        self::ISOSCELES =>IsoscelesTriangle::class,
        self::SCALENE => ScaleneTriangle::class
    ];

    private $type;

    public function __construct(string $type)
    {
        $this->guardAgainstInvalidTriangleType($type);

        $this->type = $type;
    }

    /**
     * @param string $type
     */
    private function guardAgainstInvalidTriangleType(string $type): void
    {
        if (!array_key_exists($type, self::VALID_TYPES)) {
            throw new \InvalidArgumentException(
                sprintf(
                    "Invalid triangle type provided <%s>, must be one of <%s>",
                    $type,
                    implode(",", self::VALID_TYPES)
                )
            );
        }
    }

    public static function equilateral(): TriangleType
    {
        return new self(self::EQUILATERAL);
    }

    public static function isosceles(): TriangleType
    {
        return new self(self::ISOSCELES);
    }

    public static function scalene(): TriangleType
    {
        return new self(self::SCALENE);
    }

    public static function types(): array
    {
        return self::VALID_TYPES;
    }

    public function type(): string
    {
        return $this->type;
    }

    public function __toString(): string
    {
        return $this->type;
    }
}