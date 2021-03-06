# Linux常用命令

- ls
	- -h : 人性化的显示文件大小
	- -r : 倒序输出
	- -l : 列出长数据串，包含文件的属性与权限数据等
	- -a : 列出全部的文件，连同隐藏文件
	- -d : 仅列出目录本身，而不是列出目录的文件数据
	- -S : 按文件大小排列
- mv : 移动文件
	- -f : 如果目标文件已经存在，不会询问而直接覆盖
	- -i : 若目标文件已经存在，就会询问是否覆盖
	- -u : 若目标文件已经存在，且比目标文件新，才会更新
- cp
	- -a : 将文件的特性一起复制
	- -p : 连同文件的属性一起复制，而非使用默认方式
	- -i : 若目标文件已经存在时，在覆盖时会先询问操作的进行
	- -r : 递归持续复制，用于目录的复制行为
	- -u : 目标文件与源文件有差异时才会复制
- rm
	- -f : -f ：就是force的意思，
	- -r : 递归删除，最常用于目录删除
	- -i : 在删除前会询问用户是否操作
- ln
	- -s : 对源文件建立符号连接，而非硬连接
	- -f : 强行建立文件或目录的连接，不论文件或目录是否存在
	- -T : 将链接名称当作普通文件
- grep : 强大的文本搜索工具(全面搜索正则表达式并把行打印出来)
	- -i : 不区分大小写
	- -r : 递归查询
	- -C 5 显示文件中匹配字串那行以及上下5行
    - -B 5 显示文件中匹配字串那行及前5行
    - -A 5 显示文件中匹配字串那行及后5行
- cd : 切换到目录
- pwd : 显示当前路径
- cat : 查看文本文件的内容
- find : 查找的文件
- echo : 打印输出
- less : 查看文本文件的内容
- more : 查看文本文件的内容
- head : 看具体文件的前面几行的内容
- tail : 看具体文件的后面几行的内容
- touch : 新建文件
- pgrep : 以名称为依据从运行进程队列中查找进程，并显示查找到的进程id
- xargs : 给其他命令传递参数的一个过滤器

# 系统管理命令
- ssh : 用于远程登录

- stat : 查看文件的详细信息
- who : 查看当前登录的用户
- hostname : 查看主机名
- uname : 用来获取电脑和操作系统的相关信息
	- -a : 可显示unix主机的操作系统版本、硬件名称等基本信息
	- -m : 可显示unix主机CPU架构
	- -r : 显示内核版本号
	- -s : 显示内核名称
	- -p : 显示处理器类型
- top : 用于监控系统状况

- htop : 更强大的系统监控
- ps : 给出当前系统中进程的快照
	- -a : 显示所有当前进程
	- -u : 根据用户过滤进程
	- -aux : 通过cpu和内存使用来过滤进程
	- -axjf : 树状显示进程，也可使用pstree命令
- du : 查看使用空间的
	- -a : 显示目录中个别文件的大小
	- -c : 除了显示个别目录或文件大小外，同时页显示所有的目录或文件总和
	- -m : 以MB为单位输出大小 
	- -s : 仅显示最后加总的值
- df : 查看linux服务器的文件系统磁盘空间占用情况
    - -a : 全部文件系统列表
    - -h : 方便阅读的方式
    - -i : 显示inode信息
    - -l : 只显示本地文件系统
    - -T : 文件系统类型
    - -sync : 在获取磁盘信息前先将缓存同步到磁盘
- ifconfig : 查看和配置网络设备
    - up : 启动指定网络设备
    - down : 关闭指定网络设备
    - arp : 设置指定网卡是否支持ARP协议
    - -a : 显示全部接口信息
    - -s : 显示摘要信息
- ping : 用来测试与目标主机的连通性
- netstat : 用于显示各种网络相关信息
    - -a : 显示所有选项，默认不现实listen相关
    - -t : 仅显示tcp相关选项
    - -u : 仅显示udp相关选项
    - -n : 拒绝显示别名，能显示数字的全部转化为数字
    - -l : 仅列出有在listen的服务状态
    - -p : 显示建立相关链接的程序名
- man : 用于查看命令的帮助信息
- kill : 杀死进程
    - -l : 列出所有信号名称
    - -1(HUB) : 终端断线，重启
    - -2(INT) : 中断
    - -3(QUIT) : 终止
    - -15(TERM) : 发送信号给父进程，终止进程
    - -19(STOP) : 暂停
    - -18(CONT) : 继续
    - -9(KILL) : 绝杀，资源无法回收

# 权限
- chgrp : 改变文件所属用户组
- chown : 改变文件所用户
- chmod : 改变文件操作权限

# 打包压缩相关命令
- gzip : 解压*.gz文件
    - -a : 使用ascii文字模式
    - -d : 解开压缩文件
    - -f : 强行压缩文件
    - -n : 压缩文件时，不保存原来的文件名称及时间戳
    - -N : 与n相反
    - -r : 递归处理，包括文件夹下的文件
- bzip2 : 解压*.bz2文件
    - -c : 标准输出解压或压缩的结果
    - -d : 执行解压缩
    - -f : 会否覆盖同名文件
    - -k : 保留源文件
    - -z : 强制执行压缩
- tar
    - -c : 建立新的备份文件
    - -d : 记录文件的差别
    - -v : 显示操作过程
    - -x : 从备份文件中还原文件
    - -r : 添加文件到已压缩的文件
    - -f : 指定备份文件
    - -z : 通过gzip指令处理备份文件
    - -j : 支持bzip2解压文件
    - -p : 用原来的文件权限还原文件
- unzip : 解压*.zip文件

# 关机/开机/重启
- runlevel : 查看系统当前运行的级别
- init
    - 0 : 关机
    - 1 : 单用户模式
    - 2 : 多用户
    - 3 : 完全多用户模式
    - 4 : 没用到
    - 5 : x11
    - 6 : 重启
- shutdown [选项] [时间] [消息]
    - -k : 不执行任何关机操作，只发出经过信息给所有樱花
    - -r : 重启计算机
    - -h : 关机并彻底断电
    - -f : 快速关机切重启时跳过fsck
    - -n : 快速关机不经过init
    - -c : 取消之前的定时关机

- halt : 立刻关机
- reboot
    - -f : 强制重启，不调用shutdown
    - -i : 重启前关闭所有网络界面
    - -n : 重启前不检查是否有未结束进程
    - -w : 模拟并记录，并不关机

# VIM
- 命令模式
    - i : 切换到输入模式
    - x : 删除当前光标所在处的字符
    - : : 切换到底线命令模式
- 输入模式
    - ESC : 退出输入模式，切换回命令模式
- 底线命令模式
    - : : 在命令模式下按下:（英文冒号）就进入了底线命令模式
