<?php

namespace App\Http\Livewire;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;

class UserdataGet extends Component
{
    public function render()
    {
        return view('livewire.userdata-get');
    }
    public function userdataGet()
    {
        $user= Auth::user();
        $user2=$user->toJson();
        Log::debug($user2);
        Storage::put($user->id .'.json', $user2);
        $download = Storage::download($user->id .'.json','userdata.json');
        
        return $download;
        
        


    }

    public function userdataDelFile()
    {
        
        $user= Auth::user();

        Storage::delete($user->id . '.json');
    }
}
