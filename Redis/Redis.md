# Redis入门指南

## chapter 1&2

redis-server 默认端口 6379

自定义端口启动 redis-server --port 6380

停止redis，考虑到数据正在持久化过程中，正确的停止方式：redis-cli SHUTDOWN，先断开所有client连接，待持久化完成会停止server


redis默认16个数据库，可在配置修改数量，默认选择0，可用select切换；不适合使用同一个redis实例存储多个应用的数据。

## chapter 3

- KEYS：获取所有的键
- EXISTS：判断是否存在此键
- DEL：删除一个或多个键
- TYPE：获取键值的类型

- string类型
    + 多适用于整存整取的情况
    + 一个键最大存储的数据容量是512M（目前）
    + 一般储存格式例子:user:1:friends
    + SET\GET\INCR\DECR\STRLEN\MGET\MSET

- hash类型
    + 通过链表实现
    + 适用于存取多列数据但经常获取单列数据的情况
    + 一个散列类型可以包含至多2^32-1个字段
    + HGET\GSET\HMGET\HMSET\HGETALL\HEXISTS\HINCRBY\HDEL\HKEYS\HVALS

- list类型（有序性）
    + 适用于社交网站热点内容的列表存储
    + 一个列表类型键最多能容纳2^32-1个元素
    + LPUSH\RPUSH\LPOP\RPOP\LLEN\LRANGE\LREM\LINDEX\LSET\LTRIM\RPOPLPUSH

- set类型（无序、唯一性）
    + 通过hash实现
    + 适用于分类tag存储
    + 一个集合类型键可以存储2^32-1个字符串
    + SADD\SREM\SMEMBERS\SISMEMBER\SUNION\SDIFF\SINTER\SCARD\SDIFFSTORE\SUNIONSTORE\SINTERSTORE\SRANDMEMBER\SPOP

- sort set类型（有序）
    + 通过hash和skiplist实现
    + 可用于按访问量来排序查找
    + ZADD\ZSCORE\ZRANGE\ZREVRANGE\ZRANGEBYSCORE\ZINCRBY\ZCARD\ZCOUNT\ZREM\ZREMRANGEBYRANK\ZREMRANGEBYSCORE\ZRANK\ZREVRANK\ZINTERSTORE\ZUNIONSTORE
    
    
## chapter 4

### 事务
不支持回滚
MULTI\EXEC\WATCH\

### 过期时间
EXPIRE\TTL\EXPIREAT\PEXPIREAT\

### 排序
```
SORT [ALPHA] [BY ITEMS:*[->COL]] [GET ITEMS:*->TITLE] 可重复 [# STORE SORT.RESULT]
```
尽可能减少排序元素数量、使用limit只获取需要的数据、若数据量大可用STORE暂存

### 任务队列
- 生产者、消费者

LPUSH\BRPOP\BLPUSH(优先级)
- 发布、订阅
```
PUBLISH channel message
SUBSCRIBE channel
UNSUBSCRIBE [channel]
PSUBSCRIBE\PUNSUBSCRIBE channel.[?*]
```
### 节省空间
；精简键名和键值；内部编码优化（可深入学习点）；

## chapter 5

PHP：Predis、phpredis

Ruby：redis-rb

Python：redis-py

Node：node_redis、ioredis

## chapter 6

使用脚本加强redis功能：减少网络开销、原子操作、复用

## chapter 7

持久化RDB(定时)\AOF(每次命令)

- RDB:snapshotting(PS：fork父进程当前的一份数据再写入，不影响父进程)
    + 1根据配置规则进行
    + 2用户执行save或bgsave
    + 执行flushall（要求条件非空）
    + 执行复制（主从模式时））
- AOF:log（开启后会记录每一条修改redis数据的命令）


## chapter 8

