<?php

namespace App\DataTransformer;

use App\Dto\EntrepriseDto;

interface TransformerInterface
{
    public function transform(array $data): EntrepriseDto;
}