<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CodeController extends Controller
{
    public function table(Request $request)
    {
        if ($request->ajax()) {
            $columns = $request->get("columns");
            $columns = json_decode($columns, true);
            $records = [];
            for($i=0; $i<15; $i++) {
                $temp = [];
                foreach ($columns as $column) {
                    $temp[$column["paramName"]] = rand(1, 10)."-".rand(10, 100);
                }
                array_push($records, $temp);
            }

            return response()->json([
                'code' => 0,
                'msg' => 'success',
                'data' => $records,
                'count' => rand(18, 200),
            ]);
        } else {
            return view('generator/table/index');
        }
    }

    public function tableCode(Request $request)
    {
        $searchItems = $request["searchItems"];
        $pageActions = $request["pageActions"];
        $tableLists = $request["tableLists"];
        $tableRenderData = [];
        foreach ($tableLists as $tableList) {
            $temp = [
                "field" => $tableList["paramName"],
                "align" => "center",
                "title" => $tableList["columnName"],
                "templet" => "#tpl-table-column-".$tableList["paramName"],
            ];
            array_push($tableRenderData, $temp);
        }
        $view = view(
            "generator/table/controller/view",
            compact("searchItems", "pageActions", "tableLists", "tableRenderData")
        );
        return html_entity_decode(response($view)->getContent());
    }
}