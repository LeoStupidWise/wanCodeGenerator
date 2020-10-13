该项目用于记录在万师傅开发中遇到的常用模板，收集在这里，方便以后开发时快速实现。

### 目录说明

模板代码全部放在 `view/templates` 下面，`alter` 中保存的是需要弹出（使用`layer.open`）的模板。

### 安装

`获取源代码：git clone https://github.com/LeoStupidWise/wanCodeGenerator.git`

`cd wanCodeGenerator`

`安装依赖：composer install`

`生成配置文件：cp .env.example .env`

`生成项目秘钥：php artisan key:generate`

执行完上述步骤后，给该项目配置好本地虚拟站点后即可访问。

### 使用说明

**项目中有功能未实现属于正常情况...**

#### 首页 tab

![首页tab](https://qncdn.wanshifu.com/27e61ad63b829e9837580cb99e983651)
1. 选择模板：改 tab 下会给出一些常用的排版和弹窗供选择，选择后会有预览和对应的代码。比如：
![弹出框-单选](https://qncdn.wanshifu.com/ed842b3adc15d8c6498ac120461aff17)
2. 通用：记录一些 layui 经常用到的方法。
3. 小贴士：顾名思义，记录一些小技巧。
4. 数据列表：用来生成实现列表页的代码，详情参见下面的介绍。

#### 数据列表

**url 中加入 `?isTest=1` 可查看示例数据**

这部分可通过示例数据获得使用方法，下面主要说明一下代码的组织结构。代码由这几个部分组成：

![代码结构](https://qncdn.wanshifu.com/e158de55eb07bdc21997952f0c6fd32d)

1. CSS：样式
2. View：视图
3. Controller：控制器
4. Service：服务层
5. Model：数据模型层

它们的主要功能和关系如下

![代码结构时序图](https://qncdn.wanshifu.com/a3cc9a457f62ee9a76fba0e59e24c1cd)

### 开发计划
