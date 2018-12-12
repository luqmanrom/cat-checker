<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CatController extends Controller
{

	public function postCatSearch() {

		$request = request()->all();

		preg_match_all('/\b[a-zA-Z\-]+cat\b/', $request['input'], $matches);

		return response()->json([
			'result' => $matches[0]
		]);
	}
}
