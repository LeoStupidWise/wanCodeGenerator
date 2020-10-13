/**
* 列表的格式化
* @param $records - 从数据库获取的数据
* @return array
*/
public function indexDecorator($records)
{
    // 一系列的数据库表初始化
    $ar = new ArTable();
    $result = [];
    foreach($records as $record) {
    $tableModel = [
        // 建立返回格式，并赋默认值
        'primaryId' => $record['id'],   # 主键
    <?php foreach ($tableLists as $tableList){
        $tableParam = $tableList['paramName'];
        $tableColumnName = $tableList['columnName'];
        echo "            '$tableParam' => '',    # $tableColumnName".PHP_EOL;
    } ?>
    ];

// 给每一个项赋具体的值
<?php foreach ($tableLists as $tableList){
    $tableParam = $tableList['paramName'];
    $tableColumnName = $tableList['columnName'];
    echo "        \$tableModel['$tableParam'] = '';".PHP_EOL;
} ?>
    array_push($result, $tableModel);
    }
return $result;
}