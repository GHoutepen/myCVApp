<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Laravel\Fortify\Features;
use Inertia\Inertia;

class HomeController extends Controller
{
    function index(): \Inertia\Response
    {
        return Inertia::render('cv/Main', []);
//        return Inertia::render('Welcome', [
//            'canRegister' => Features::enabled(Features::registration()),
//        ]);
    }

    function dashboard(): \Inertia\Response
    {
        return Inertia::render('cv/Main', []);
    }

    function gem(): \Inertia\Response
    {
        return Inertia::render('Gem');
    }
    function cv(): \Inertia\Response
    {
        return Inertia::render('cv/Main', []);
    }

    function hobby(): \Inertia\Response
    {
        return Inertia::render('cv/Hobby', []);
    }
}
