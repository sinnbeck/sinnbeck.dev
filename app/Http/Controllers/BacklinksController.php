<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BacklinksController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        $backlinks = [
            [
                'name' => 'Ploi',
                'url' => 'https://ploi.io',
            ],
            [
                'name' => 'Laravel',
                'url' => 'https://laravel.com',
            ],
            [
                'name' => 'Laravel Orbit',
                'url' => 'https://github.com/ryangjchandler/orbit',
            ],
            [
                'name' => 'Torchlight',
                'url' => 'https://torchlight.dev/',
            ],
            [
                'name' => 'Tailwindcss',
                'url' => 'https://tailwindcss.com',
            ],
        ];
        return view('backlinks', compact('backlinks'));
    }
}
