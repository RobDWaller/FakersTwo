<?php

namespace App\Transformer;

use App\Helper\Url;
use App\Transformer\AbstractTransformer;

class Token extends AbstractTransformer
{
    use Url;

    public function single(array $data): array
    {
        return [
            'type' => 'token',
            'id' => $data['token'],
            'links' => $data['links']
        ];
    }

    public function passwordResponse(string $token): array
    {
        return $this->single([
            'token' => $token,
            'links' => [
                'self' => $this->makeUrl('/api/token/'),
                'related' => $this->makeUrl('/api/token/update/')
            ]
        ]);
    }

    public function tokenResponse(string $token): array
    {
        return $this->single([
            'token' => $token,
            'links' => [
                'self' => $this->makeUrl('/api/token/update/')
            ]
        ]);
    }
}
