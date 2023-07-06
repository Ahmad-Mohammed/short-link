<?php

namespace App\Http\Controllers;

use App\Models\Link;
use Illuminate\Http\Request;

class ShortController extends Controller
{

    public function index()
    {
        $shortlinks = Link::paginate(8);
        return view('short_links', compact('shortlinks'));
    }


    public function store(Request $request)
    {
        request()->validate([
            'link' => 'required | url | unique:links,link'
        ]);

        link::create([
            'link' => $request->link,
            'code' => \Illuminate\Support\Str::random(6),
        ]);

        return redirect('/')->with('success', 'your link has been created');
    }

    public function show($code)
    {
        $row = link::where('code', $code)->firstOrFail();
        $row->visits_count += 1;
        $row->save();


        return redirect($row->link);
    }
}
