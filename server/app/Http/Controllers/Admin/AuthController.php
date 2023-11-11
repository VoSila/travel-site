<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Redirector;

class AuthController extends Controller
{
    /**
     * @return View
     */
    public function index(): View
    {
        return view("admin.auth.login");
    }

    /**
     * @param Request $request
     *
     * @return Application|RedirectResponse|Redirector|null
     */
    public function login(Request $request): Redirector|Application|RedirectResponse|null
    {
        $data = $request->validate([
            "email" => ["required", "email", "string"],
            "password" => ["required"]
        ]);

        if (auth("admin")->attempt($data)) {
            return redirect(route("admin.tour.create"));
        }

        return redirect(route("admin.login"))->withErrors(["email" => "Пользователь не найден, либо данные введены не правильно"]);
    }

    /**
     * @return Application|RedirectResponse|Redirector|null
     */
    public function logout(): Redirector|Application|RedirectResponse|null
    {
        auth("admin")->logout();

        return redirect(route('index'));
    }
}
