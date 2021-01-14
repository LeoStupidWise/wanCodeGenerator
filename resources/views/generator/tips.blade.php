<div>
    <pre class="layui-code">
1. 弹出框想要滚动条的话，就对 layer.open 使用固定长度和宽度。
2. 导出可以参考 ocs-master\protected\controllers\capacity\OrderDistributeController.php::actionListExport
3. 图片编辑使用包 intervention/image，安装 GD 库即可
        $imageMaxHeight = 700;
        $theLocalImage = $localFilePath.$fileName;
        $watermarkImage = ROOT_PATH.'/public/images/text_watermark.png';
        $manager = new ImageManager(['driver' => 'gd']);
        $image = $manager->make($theLocalImage);
        $height = $image->height();
        if ($height > $imageMaxHeight) {
            $image->resize(null, $imageMaxHeight, function ($constraint) {
                $constraint->aspectRatio();
            });
        }
        $image->fill($watermarkImage);
        $image->save();
    </pre>
</div>