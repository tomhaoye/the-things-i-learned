# tcpdump
参数
- -i：指定网卡
- host：指定主机
- src：指定源(src host 192.123.123.123)
- dst：指定目标(src host 192.123.123.123)
- and/and not：与/非
- -c：抓包的上限
- -t：不显示时间
- -w：存到文件(-w xx.cap)/直接在终端打印(-w -)
- tcp/udp/icmp：过滤协议

数据包
- IP、端口
- Flags由S(SYN),F(FIN),P(PUSH),R(RST)组成，单独的\[.]标示无Flags标识
- ACK描述的是同一个连接，同一个方向，下一个本端应该接收的数据片段顺序号
- win(window)是本端可接收缓冲区的大小
- options描述一些可选项
- mss最大可接受的数据段
