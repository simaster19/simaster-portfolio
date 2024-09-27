<?php
namespace App\Http\View\Composer;

use Illuminate\View\View;
use App\Models\Message; // Make sure to import your Message model

class MessageComposer
{
  public function compose(View $view) {
    // Fetch unread messages (customize this query as needed)
    $messages = Message::where('status', 0)->get();

    // Share the messages with the view
    $view->with('dataMessage', $messages);
  }
}