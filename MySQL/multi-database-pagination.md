分库分表分页查询
---

### 方法一：全局视野法
- 将order by time offset X limit Y，改写成order by time offset 0 limit X＋Y
- 服务层对得到的 N*(X+Y) 条数据进行内存排序，内存排序后再取偏移量X后的Y条记录
- 这种方法随着翻页的进行，性能越来愈低

### 方法二：业务折衷法－禁止跳页查询
- 用正常的方法取得第一页数据，并得到第一页记录 time_max
- 每次翻页，将order by time offset X limit Y，改写成 order by time where time>$time_max limit Y 以保证每次只返回一页数据，性能为常量

### 方法三：业务折衷法－运行模糊数据
- 将 order by time offset X limit Y，改写成 order by time offset X/N limit Y/N

### 方法四：二次查询法
- 将 order by time offset X limit Y，改写成 order by time offset X/N limit Y
- 找到最小值 time_min
- between 二次查询，order by time between $time_min and $time_i_max
- 设置虚拟 time_mi，找到 time_min 在各个分库的 offset ，从而得到 time_min 在全局的 offset
- 得到的 time_min 在全局的 offset ，自然得到了全局的 offset X limit Y
