<?php

namespace App\Exports;

use App\Session;
use App\user;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromView;

class UsersExportView implements FromView
{
    public $id;
    public function __construct($id)
    {
        $this->id = $id;
    }
        public function view(): View
         {
             $id = (int)$this->id;
             $session= Session::findOrFail($id);

            return view('admin.sessions.users_session', [
                'users' => $session->users
            ])->with('message','Fichier Execl Downloaded avec success');;
        }
}
