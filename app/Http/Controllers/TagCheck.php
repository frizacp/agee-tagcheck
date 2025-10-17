<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\TagResult;
use Illuminate\Http\Request;

class TagCheck extends Controller
{
    public function index(Request $request, $type = null, $event = null)
    {
        // API MODE: jika request dari AJAX / API
        if ($request->key === 'show') {
            $data = TagResult::where('chipcode', 'LIKE', "%" . $request->code)->first();

            if (!$data) {
                return response()->json([
                    'status' => 400,
                    'msg' => 'No data found'
                ]);
            }

            $payload = [
                'bib' => $data->bib,
                'firstName' => $data->firstName,
                'lastName' => $data->lastName,
                'time' => $data->finishtime,
                'contest' => $data->contest . $data->category,
                'category' => strtoupper($data->contest . ' ' . $data->gender . ' ' . $data->category),
                'pace' => 'PACE ' . $data->pace,
            ];

            return response()->json([
                'status' => 200,
                'msg' => 'Data found',
                'data' => $payload
            ]);
        }

        // BROWSER MODE: menampilkan view sesuai route
        if (!$type || !$event) {
            return view('index');
        }

        // Pastikan path-nya valid (resultcheck atau tagcheck)
        if (in_array($type, ['resultcheck', 'tagcheck'])) {
            $viewName = "{$type}_{$event}";

            if (view()->exists($viewName)) {
                return view($viewName);
            }

            abort(404, "View for {$type} {$event} not found.");
        }

        return view('index');
    }

    public function findall()
    {
        $data = TagResult::all();

        if ($data->isEmpty()) {
            return response()->json([
                'status' => 400,
                'msg' => 'No data found'
            ]);
        }

        return response()->json([
            'status' => 200,
            'msg' => 'Data found',
            'data' => $data
        ]);
    }

    public function update(Request $request)
    {
        $data = $request->data ?? [];
        $success = false;

        foreach ($data as $value) {
            $success = TagResult::where('chipcode', $value['chipcode'])->update([
                'finishtime' => $value['finishtime'],
                'chiptime' => $value['chiptime'],
                'pace' => $value['pace'],
            ]);
        }

        return response()->json([
            'status' => $success ? 200 : 400,
            'msg' => $success ? 'Data updated' : 'Failed to update data',
            'data' => $data
        ]);
    }

    public function store(Request $request)
    {
        $data = $request->data ?? [];
        $inserted = false;

        foreach ($data as $value) {
            $inserted = TagResult::create([
                'bib' => $value['bib'],
                'firstName' => $value['firstName'],
                'lastName' => $value['lastName'],
                'gender' => $value['gender'],
                'type' => $value['type'],
                'dob' => $value['dob'],
                'age' => $value['age'],
                'contest' => $value['contest'],
                'race' => $value['race'],
                'chipcode' => $value['chipcode'],
            ]);
        }

        return response()->json([
            'status' => $inserted ? 200 : 400,
            'msg' => $inserted ? 'Data inserted' : 'Failed to insert data',
            'data' => $data
        ]);
    }
}
