# Redis实战

 - string类型：适合整存整取、必须单独拥有失效时间等的数据。数据结构是`SDS`
 	+ 缓存验证码等

 - hash类型：属于同一对象的数据，但有时只需要拿其中一部分。数据结构是`dict`，数据量少的时候使用的是`ziplist`
	+ session数据
	+ 缓存高频查询对象

 - list类型：顺序与先来后到有关的数据。数据结构是`quicklist`（ziplist+linkedlist），低版本是`ziplist`(数据量少的时候)和`linkedlist`
	+ 单消费者生产者的消息队列

 - set类型：散乱无关的同类型数据。数据结构是`dict`，数据量少的时候使用`intset`
	+ 标签

 - sorted set类型：按特定条件顺序相关的同类型数据。数据结构是`skiplist`+`hashtable`，数据量少的时候使用的是`ziplist`
	+ 延时任务

 - bitmap类型：可用于寻找个体是否存在于群体中
	+ 签到、活跃、在线统计等

 - hyperLogLog类型：常用于基数估计，不能得知个体具体信息
	+ `UV`统计

 - stream类型：强大的支持多播的可持久化的消息队列
 	+ 多消费者队列
