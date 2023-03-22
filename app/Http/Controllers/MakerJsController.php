<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Maker;

class MakerJsController extends Controller
{
    const RESULTS_IN_PAGE = 5;

    public function index()
    {
        return view('maker_js.index');
    }

    public function list()
    {
        $makers = Maker::orderBy('created_at', 'desc')->paginate(self::RESULTS_IN_PAGE)->withQueryString();

        $html = view('maker_js.list', compact('makers'))->render();

        return response()->json([
            'html' => $html
        ]);
    }

    public function create()
    {
        $html = view('maker_js.create')->render();

        return response()->json([
            'html' => $html
        ]);
    }

public function store(Request $request)
    {
        $maker = new Maker;
        $maker->name = $request->maker_name;
        $maker->save();
        
        $msgHtml = view('maker_js.messages', ['successMsg' => 'Valio, naujas gamintojas sėkmingai atvyko!'])->render(); 

        return response()->json([
            'hash' => 'list',
            'msg' => $msgHtml
        ]); 
    }

    public function edit(Maker $maker)
    {
        $html = view('maker_js.edit', compact('maker'))->render();

        return response()->json(compact('html'));
    }

    public function update(Request $request, Maker $maker)
    {
        $maker->name = $request->maker_name;
        $maker->save();

        $msgHtml = view('maker_js.messages', ['successMsg' => 'Gamintojas sėkmingai atnaujintas!'])->render(); 

        return response()->json([
            'hash' => 'list',
            'msg' => $msgHtml
        ]);
    }

    public function destroy(Maker $maker)
    {
        if($maker->getCars->count()){
            $msgHtml = view('maker_js.messages', ['infoMsg' => 'Nope! Šio gamintojo ištrinti negalima, nes jis turi užsakymų.'])->render();

            return response()->json([
                'msg' => $msgHtml
            ]);
        }
        $maker->delete();

        $msgHtml = view('maker_js.messages', ['successMsg' => 'Gamintojas sėkmingai ištrintas.'])->render();

        return response()->json([
            'hash' => 'list',
            'msg' => $msgHtml
        ]);
    }

}
