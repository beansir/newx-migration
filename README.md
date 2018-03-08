<h2 align="center">NewX Migration</h2>

## 安装说明
使用composer一键安装
```
composer require beansir/newx-migration
```

## 搭建结构
* migration
    * config
        * config.php
    * tasks
* migrate // 脚本执行文件

#### 创建脚本执行文件migrate
```php
#!/usr/bin/env php
<?php
defined('PROJECT_PATH') or define('PROJECT_PATH', __DIR__);
 
require PROJECT_PATH . '/vendor/beansir/newx-migration/migrate';
```

#### 数据库配置文件
migration/config/database.php
```php
<?php
return [
    // 初始化以default数据库配置执行，初始化前请先配置此项
    'default' => [
        'host' => '127.0.0.1',
        'user' => 'root',
        'password' => 'root',
        'db' => 'chat',
        'type' => 'mysqli'
    ]
];
```

#### 初始化
```
migrate init
```

#### 新建迁移
```
migrate create table_user
```

#### 迁移方式1：全部迁移
```
migrate
```

#### 迁移方式2：指定迁移个数N
```
migrate N
```

#### 迁移方式3： 指定第N个迁移
```
migrate -N
```

#### Demo
```
migrate // 所有未执行的迁移
migrate 3 // 从最近新建迁移的前3个迁移
migrate -2 // 从最近新建迁移的第2个迁移
```