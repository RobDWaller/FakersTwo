<?php

namespace App\Transformer;

use App\Helper\Log;

abstract class AbstractTransformer
{
    use Log;

    abstract public function single(array $data): array;

    public function error(string $id, int $code, string $message): array
    {
        $this->logError($id, $message);

        return [
            'errors' => [
                [
                    'id' => $id,
                    'code' => $code,
                    'title' => $message
                ]
            ]
        ];
    }
}
