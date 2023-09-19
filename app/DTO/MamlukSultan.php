<?php

namespace App\DTO;

use App\DTO\NumberBetween;
use OpenApi\Attributes as OA;
use Spatie\DataTransferObject\DataTransferObject;


#[OA\Schema()]
class MamlukSultan extends DataTransferObject
{
    #[OA\Property(property: 'yearFrom', type: 'integer')]
    #[NumberBetween(1250, 1500)]
    public int $yearFrom;

    #[OA\Property(property: 'yearTo', type: 'integer')]
    #[NumberBetween(1250, 1500)]
    public int $yearTo;

    #[OA\Property(property: 'name', type: 'string')]
    public string $name;
}