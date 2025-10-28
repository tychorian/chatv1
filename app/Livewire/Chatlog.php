<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\Attributes\On;
use Illuminate\Support\Facades\Http;

class Chatlog extends Component
{

    public $prompt;
    public $messages =
    [
        [
            'sender' => 'user',
            'message' => "Can you generate some random, creative, and engaging placeholder text for me?",
        ],
        [
            'sender' => 'bot',
            'message' => "Integer iaculis eu tellus vel tincidunt. Sed sed dictum orci"
        ],
    ];

    public function submit()
    {

        //validate prompt
        $this->validate([
            'prompt' => 'required',
        ]);

        //add prompt to messages        
        $this->messages = array_merge($this->messages, [['sender' => 'user', 'message' => $this->prompt]]);

        $response = Http::withHeaders([
            "Content-Type" => "application/json",
        ])->post("https://generativelanguage.googleapis.com/v1beta/models/gemini-2.5-flash:generateContent?key=" . env('GEMINI_API_KEY'), [
            'contents' => [
                'parts' => [
                    "text" => $this->prompt . ". keep response to less than 30 words."
                ]
            ]
        ]);

        if ($response->successful()) {
            $text = $response->json()['candidates'][0]['content']['parts'][0]['text'];
        } else {
            $text = "Something is wrong";
        }

        //add prompt to messages        
        $this->messages = array_merge($this->messages, [['sender' => 'bot', 'message' => $text]]);

        $this->prompt = "";


    }

    public function render()
    {
        return view('livewire.chatlog', ['messages' => $this->messages]);
    }
}
