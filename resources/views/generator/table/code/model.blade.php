/**
* 获取指定条件下的记录
* @param $search
* @param $isCount - 是否是数量查询
* @return mixed
*/
public function getRecordsOrCount($search, $isCount=false)
{
    $page = $search["page"] ?? 1;
    $limit = $search['limit'] ?? 15;
    $offset = ($page - 1) * $limit;

    // 一系列的 Model 初始化
    $ar = new ArTable();
    $table = $ar->tableName();

    $sqlSelect = "SELECT *";
    if ($isCount) {
        $sqlSelect = "SELECT COUNT(*) AS theCount";
    }
    $sqlFrom = " FROM $table";
    // 有些搜索会涉及到关联查询，在这里就要关联好
    $sqlJoin = "";
    $sqlWhere = $this->getWhere($search);
    // 排序规则写到 addition 里面
    $sqlAddition = "";
    if (!$isCount) {
        $sqlAddition .= " LIMIT $limit".
        " OFFSET $offset";
    }
    $sql = $sqlSelect . $sqlFrom . $sqlJoin . $sqlWhere . $sqlAddition;
    $records = $ar->getDbConnection()->createCommand($sql)->queryAll();
    if ($isCount) {
        return $records[0]['theCount'];
    } else {
        return $records;
    }
}

/**
* 获取指定条件下的查询语句
* @param $search
* @return mixed
*/
public function getWhere($search)
{
<?php foreach ($searchItems as $searchItem){
    $paramName = $searchItem['paramName'];
    $label = $searchItem['label'];
    $isSelect = $searchItem['isSelect'];
    $itemDefault = '';
    if ($isSelect) {
        $itemDefault = 'all';
    }
    echo "    \$$paramName = \$search['$paramName'] ?? '$itemDefault';    # $label".PHP_EOL;
} ?>
    $where = " WHERE 1=1";
<?php foreach ($searchItems as $searchItem){
    $paramName = $searchItem['paramName'];
    $label = $searchItem['label'];
    $isSelect = $searchItem['isSelect'];
    if ($isSelect) {
        echo "    if(\$$paramName != 'all') {".PHP_EOL;
        echo "        // $label 没有选择全部".PHP_EOL;
        echo "    }".PHP_EOL;
    } else {
        echo "    if(!empty(\$$paramName)) {".PHP_EOL;
        echo "        // 填写了 $label".PHP_EOL;
        echo "    }".PHP_EOL;
    }
} ?>
    return $where;
}
