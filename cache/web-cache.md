用户端
---
 - 系统：基于DNS缓存
 - 浏览器：非过期文件不请求服务器
 - DNS：基于DNS只能解析访问最近距离的CND
 
企业端
---
 - 硬LB：防火墙，软LB
 - 软LB：再次拆分，动静分离
 - NoSQL：缓解MySQL、文件系统的压力
 
缓存特征点
---
 - 时间局部性
 - 空间局部性

生命周期
---
- 过期：自动清除或失效
- 空间用尽：根据LRU清理
- 选择合适的清理时长

常见缓存实现工具
---
squid、varnish、nginx、httpd