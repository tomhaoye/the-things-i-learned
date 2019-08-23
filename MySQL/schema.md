# Schema设计与数据类型优化
- 用整形存IP，用datetime存时间，而不是字符串

容易理解错的技巧：
- 把Null设为Not Null不会提高多少性能，但如果是索引列，则应该设置为not null
- 对整数类型指定宽度，比如int(11)没有任何卵用。int使用32位(4byte)存储，表示范围已经确定，int(1)和int(20)存储和计算是相同的
- unsigned表示不允许负值，最高位不作正负区分。
- decimal计算成本高，建议使用bigint存储财务数据，统一将数据乘以例如(10000)再使用bigint存储
- timestamp使用4字节存储空间，datetime使用8字节。所以timestamp能表示的范围比datetime小得多，大约1970-2038
- 大多数情况下没有使用枚举类型的必要
- schema的列不要太多，转换成本过高，占用COU高
- 大表alter table非常耗时，因为MySQL会创建新表再转移数据，不过有奇巧淫技可以解决


### 特定类型查询优化
- 优化count()查询
	- count(*)性能很好，忽略所有的列
	- count(column)会忽略null值的行
	- explain可以不太精确的统计行数
	- 巧用覆盖索引
	- 架构上+汇总表或缓存层
- 优化关联查询
	- 巧妙利用冗余，尽量避免使用join
		- 若使用join，确保on和using上有索引
		- A与B表以C关联，在B表C列上建立索引
		- 确保group by和order by只涉及到一个表中的列
- 优化limit分业
	- 当偏移量大的时候，考虑使用覆盖索引扫描，然后再做一次关联查询再返回
	- 页可以利用id避免使用offset，where id>10000 limit 10
	- 冗余汇总表
- 优化union
	- MySQL处理union是创建临时表，再将各查询结果插入表中，最后做查询
	- 除非确认服务端去重，否则一定要使用union all，若无all关键字，MySQL会加上DISTINCT，代价十分巨大