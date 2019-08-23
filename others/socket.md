# Socket
- stream sockets：使用TCP
- Datagram sockets：使用UDP
- Raw sockets：不经过传输层包装

- 结构
	- Data
	- UDP header|UDP Data
	- IP header|IP data
	- Frame header|frame data|frame footer
	
 
<table>
	<tbody>
		<tr>
			<td>UDP peer 1</td>
			<td>UDP peer 2</td>
		</tr>
		<tr>
			<td>socket()</td>
			<td>socket()</td>
		</tr>
		<tr>
			<td colspan="2">sendto() or recnfrom() <-------> sendto() or recnfrom()</td>
		</tr>
		<tr>
			<td>close()</td>
			<td>close()</td>
		</tr>
	</tbody>
</table>


<table>
	<tbody>
		<tr>
			<td>TCP Client</td>
			<td>TCP Server</td>
		</tr>
		<tr>
			<td>socket()</td>
			<td>socket()->bind()->listen()->accept()</td>
		</tr>
		<tr>
			<td colspan="2">connect()(tcp 3 handshake) -> block until connection from client</td>
		</tr>
		<tr>
			<td colspan="2">write()(data request) ----------> read()->process request</td>
		</tr>
		<tr>
			<td colspan="2">read() <----------------------------- write()</td>
		</tr>
		<tr>
			<td>close()(EOF notice)</td>
			<td>close()</td>
		</tr>
	</tbody>
</table>


