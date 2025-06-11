<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;
use Inertia\Inertia;

class LanguageController extends Controller
{
    /**
     * Available languages
     */
    private array $availableLanguages = ['en', 'pl'];

    /**
     * Switch the application language
     */
    public function switch(Request $request)
    {
        $request->validate([
            'locale' => ['required', 'string', 'in:' . implode(',', $this->availableLanguages)]
        ]);

        $locale = $request->input('locale');
        
        // Set the locale for the current request
        App::setLocale($locale);
        
        // Store the locale in session for future requests
        Session::put('locale', $locale);

        return back()->with('message', __('Language switched successfully'));
    }

    /**
     * Get available languages
     */
    public function getAvailableLanguages()
    {
        return response()->json([
            'current' => App::getLocale(),
            'available' => $this->availableLanguages,
            'languages' => [
                'en' => ['name' => 'English', 'native' => 'English'],
                'pl' => ['name' => 'Polish', 'native' => 'Polski'],
            ]
        ]);
    }
} 