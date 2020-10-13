
/**
* zoe
* 对请求参数进行格式化
* @param $requestParams - 请求的 GET 参数，可以通过下面的方式进行获取
*      $requestParams = $_GET; Yii::app()->request->stripSlashes($requestParams);
* @return array
*/
public function getSearch($requestParams)
{
    $page = $requestParams['page'] ?? 1;                    // 当前页数
    $limit = $requestParams['limit'] ?? 15;                 // 每页数量
    @foreach($searchItems as $searchItem)
    ${{ $searchItem["paramName"] }} = $requestParams["{{ $searchItem["paramName"] }}"] ?? "";   // {{ $searchItem["label"] }}
    @endforeach
    return compact("page", "limit" @foreach($searchItems as $searchItem) ,"{{ $searchItem["paramName"] }}" @endforeach);
}
