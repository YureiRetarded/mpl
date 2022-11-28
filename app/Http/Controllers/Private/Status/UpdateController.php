<?php

namespace App\Http\Controllers\Private\Status;

use App\Http\Controllers\Controller;
use App\Models\Status;

class UpdateController extends Controller
{
    public function __invoke(Status $status)
    {
        $data = request()->validate([
            'name' => 'string|required|max:1000|min:2',
        ]);
        $status->update($data);
        return redirect('/adminpanel/statuses');
    }
}
