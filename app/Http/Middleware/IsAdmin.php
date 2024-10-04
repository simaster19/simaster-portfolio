<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Helpers\ToastrMessage;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class IsAdmin
{
  /**
  * Handle an incoming request.
  *
  * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
  */
  public function handle(Request $request, Closure $next): Response
  {
    if (Auth::check()) {
      if (auth()->user()->role !== 1) {
        return back()->with("message", ToastrMessage::message("warning", "Warning", "Anda Tidak dapat Akses Halaman ini!"));
      }

    } else {
      return redirect()->route("login");
    }

    return $next($request);
  }


}