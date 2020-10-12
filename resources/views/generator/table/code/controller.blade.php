/**
* zoe
* 列表
* @return mixed
*/
public function actionIndex()
{
    if (!Yii::app()->request->isAjaxRequest) {
        return $this->render(
            '/viewPath/sample'
        );
    }
    $requestParams = $_GET;
    Yii::app()->request->stripSlashes($requestParams);
    $model = new Model();
    $search = $model->getSearch($requestParams);
    // 这里实例化的 service 视情况而定
    $service = new Service();
    $records = $service->getRecordsOrCount($search);
    $count = $service->getRecordsOrCount($search, 1);
    $records = $service->indexDecorator($records);
    $result = [
        'code' => 0,
        'msg' => 'success',
        'data' => $records,
        'count' => $count,
    ];
    echo json_encode($result);
    Yii::app()->end();
}
