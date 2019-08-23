## ACID
 - 原子性（Atomicity）：事务开始后所有操作，要么全部做完，要么全部不做。
 - 一致性（Consistency）：事务开始前和结束后，数据库的完整性约束没有被破坏 。
 - 隔离性（Isolation）：同一时间，只允许一个事务请求同一数据，不同的事务之间彼此没有任何干扰。
 - 持久性（Durability）：事务完成后，事务对数据库的所有更新将被保存到数据库，不能回滚。
 
## 事务的并发
 - 脏读：读取到了未提交的数据。如事务 A 读取了事务 B 更新的数据，然后B回滚操作，那么 A 读取到的数据是脏数据
 - 不可重复读：事务 A 多次读取同一数据，事务 B 在事务 A 多次读取的过程中，对数据作了更新并提交，导致事务A多次读取同一数据时，结果不一致。
 - 幻读：系统管理员 A 将数据库中所有学生的成绩从具体分数改为 A B C D E 等级，但是系统管理员 B 就在这个时候插入了一条具体分数的记录，当系统管理员 A 改结束后发现还有一条记录没有改过来，就好像发生了幻觉一样。
 
## SQL标准规定事务隔离级别以及各级别存在的问题
<table>
<tbody>
<tr>
<td>事务隔离级别</td>
<td>脏读</td>
<td>不可重复读</td>
<td>幻读</td>
</tr>
<tr>
<td>读未提交（read-uncommitted）</td>
<td>是</td>
<td>是</td>
<td>是</td>
</tr>
<tr>
<td>读已提交（read-committed）</td>
<td>否</td>
<td>是</td>
<td>是</td>
</tr>
<tr>
<td>可重复读（repeatable-read）</td>
<td>否</td>
<td>否</td>
<td>是</td>
</tr>
<tr>
<td>串行化（serializable）</td>
<td>否</td>
<td>否</td>
<td>否</td>
</tr>
</tbody>
</table>

>Mysql默认的事务隔离级别为repeatable-read

## 实际上MySQL的事务隔离与SQL标准有差别：
 - [Understanding MySQL Isolation Levels: Repeatable-Read](https://blog.pythian.com/understanding-mysql-isolation-levels-repeatable-read/)
 - [你可能对MySQL的Repeatable read有所误解](https://blog.aikeji.online/2019/02/20/%E4%BD%A0%E5%8F%AF%E8%83%BD%E5%AF%B9MySQL%E7%9A%84Repeatable-read%E6%9C%89%E6%89%80%E8%AF%AF%E8%A7%A3/)
