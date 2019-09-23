### Hyperf Whoops

`wilbur-oo/hyperf-whoops` 是对 `flip/whoops` 的简单封装,用于渲染并显示更加清晰且利于阅读的异常及错误

#### 安装
`wilbur-oo/hyperf-whoops` 是一个扩展组件,需要手动安装:

- composer
> composer require wilbur-oo/hyperf-whoops --dev

- composer.json
```json
{
  "require-dev":{
    "wilbur-oo/hyperf-whoops": "dev-master"
  }
}

```


#### 使用
将 `WilburOo\HyperFWhoops\WhoopeMiddleware` 作为一个全局的Http中间件(`config/autoload/middlewares.php`)
```php
    'http' => [
		\WilburOo\HyperFWhoops\WhoopeMiddleware::class
    ],
```
> *注意*:因为`Hyperf`框架中间件执行顺序是按照数组的顺序,所以需要将`\WilburOo\HyperFWhoops\WhoopeMiddleware::class`放到第一位

