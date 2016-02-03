package link.inte.controller;
import link.inte.controller.*;

public class Main
{
	public static void main(String[] arg){
		try{
		//Print一下，突出存在感
		System.out.println("正在启动于40830端口");
		//启动等待线程
		WaitThread wait = new WaitThread();
		wait.start();
		}
		catch(Exception ex){
			//使用IfExHappen类完成操作
			IfExHappen.happen(ex);
		}
	}
}
