<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CommunityController extends Controller
{
    public function blog()
    {
        return view('client.sub.blog');

    }

    public function blog_detail()
    {
        return view('client.sub.blog_detail');
    }

    public function help_center()
    {
        return view('client.sub.help_center');
    }
}
