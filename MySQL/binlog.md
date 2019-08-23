# Binlog
MySQL Server 有四种类型的日志
- Error Log, 错误日志，记录 mysqld 的一些错误
- General Query Log, 一般查询日志，记录 mysqld 正在做的事情，比如客户端的连接和断开、来自客户端每条 Sql Statement 记录信息,不过它非常影响性能。
- Binary Log, 第三种就是 Binlog 了，包含了一些事件，这些事件描述了数据库的改动，如建表、数据改动等，也包括一些潜在改动，比如 DELETE FROM ran WHERE bing = luan，然而一条数据都没被删掉的这种情况。除非使用 Row-based logging，否则会包含所有改动数据的 SQL Statement。
	- Binlog 就有了两个重要的用途——复制和恢复。比如主从表的复制，和备份恢复什么的。
- Slow Query Log, 第四个是慢查询日志，记录一些查询比较慢的 SQL 语句——这种日志非常常用，主要是给开发者调优用的。

# 启动
一般情况下binlog是默认关闭的，所以需要修改配置文件my.cnf。我使用的brew安装的mysql，默认文件目录在
```
/usr/local/Cellar/mysql/$VERSION/support-files/my-default.cnf
```
之前配置的时候已经复制到了
```
/etc/my.cnf
```
所以我直接修改该文件，加入
```
log_bin=mysql_bin
log_bin_index=mysql_bin.index
server-id=1
```
修改完成后重启mysqld，可以看到/usr/local/var/mysql/下出现了mysql_bin.000001以及mysql_bin.index文件

# 模式
- Row Level : 日志中会记录成每一行数据被修改的形式，然后在slave端再对相同的数据进行修改。
- Statement Level : 每一条会修改数据的sql都会记录到master的bin-log中。slave在复制的时候sql进程会解析成和原来master端执行过的相同的sql来再次执行。
- Mixed : 可以理解为是前两种模式的结合。MySQL会根据执行的每一条具体的sql语句来区分对待记录的日志形式，也就是在Statement和Row之间选择一种。

# 查看
- 使用mysql
	- 只查看第一个binlog文件的内容
	```
	show binlog events;
	```
	- 查看指定binlog文件的内容
	```
	show binlog events in 'mysql-bin.000002';
	```
	- 查看当前正在写入的binlog文件
	```
	show master status\G
	```
	- 获取binlog文件列表
	```
	show binary logs;
	```
- 使用mysqlbinlog
	- 注意
		- 不要查看当前正在写入的binlog文件
		- 不要加--force参数强制访问
		- 如果binlog格式是行模式的,请加 -vv参数
	- 基于开始/结束时间
	```
	mysqlbinlog --start-datetime='2013-09-10 00:00:00' --stop-datetime='2013-09-10 01:01:01' -d 库名 二进制文件
	```
	- 基于pos值
	```
	mysqlbinlog --start-postion=107 --stop-position=1000 -d 库名 二进制文件
	```
	- 转换为可读文本
	```
	mysqlbinlog –base64-output=DECODE-ROWS -v -d 库名 二进制文件
	```