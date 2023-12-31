# 苹果CMS的竖屏短视频以及随机图片解决方案

### 这一个基于苹果CMS系统制作的PHP非规范的仿抖音\快手等竖屏短视频布局\竖屏刷视频的播放器，并且额外增加了随机图片的插件，使用的是DP播放器
## 功能介绍
### 1.进入页面之后，自动随机出一个视频，然后按照竖屏短视频的逻辑向下滑动，程序会从数据库中再随机出一个视频链接放到DP播放器中，如果此时向上滑动就会回到上一个看的视频。
![进入页面](https://yh-1303099773.cos.accelerate.myqcloud.com/SP/README/2023n12y31r4.png)
![刷视频](https://yh-1303099773.cos.accelerate.myqcloud.com/SP/README/2023n12y31r5.png)
### 2.在页面的右上角会一直存在一个“完整内容”的按钮，单击后就会跳转到当前播放视频的详情页
![展示](https://yh-1303099773.cos.accelerate.myqcloud.com/SP/README/2023n12y31r6.png)
### 3.在页面中的左下角会有一个当前视频的视频标题，也是类似抖音的样式，在宽度小的时候就会跑到上面
![适配](https://yh-1303099773.cos.accelerate.myqcloud.com/SP/README/2023n12y31r7.png)
### 4.在页面中向右滑动就可以进入随机图片模式，会在数据库中随机图片展示，继续向右滑动会换图片，然后
![图片](https://yh-1303099773.cos.accelerate.myqcloud.com/SP/README/2023n12y31r8.png)
## 安装教程
### 1.将本项目整个克隆下来然后将出来的文件夹放到苹果CMS v10的根目录下，文件夹名字叫啥无所谓
![根目录展示](https://yh-1303099773.cos.accelerate.myqcloud.com/SP/README/2023n12y31r.png)
### 2.进入文件夹编辑config.php数据库文件（\maccms_shortVideo\config.php）
```php
<?php
define('DB_HOST', 'localhost');
define('DB_NAME', '数据库名');                     //输入你苹果CMS10的数据库名
define('DB_USER', '数据库用户名');                     //输入你苹果CMS10的数据库用户名
define('DB_PASSWORD', '数据库密码');      //输入你苹果CMS10的数据库密码

define('SITE_URL', '网站域名');      //输入你苹果CMS10的网站主域名，不能加/，例如：https://nitsol.xyz
```
### 3.此时已经算是安装完成了，直接去浏览（网站域名/maccms_shortVideo）即可进入该项目前端页面
### 拓展：可以将页面加入到MXoneX手机移动主题的底栏，进入苹果CMS v10的管理员后台（网站域名/admin.php），打开MXoneX主题的管理页面，点击导航菜单→手机端底部导航，这样写
![手机底部导航设置](https://yh-1303099773.cos.accelerate.myqcloud.com/SP/README/2023n12y31r2.png)
成果：
![手机底部导航](https://yh-1303099773.cos.accelerate.myqcloud.com/SP/README/2023n12y31r3.png)

完工
