package link.inte.controller;
import link.inte.controller.*;


class IfExHappen {
	public IfExHappen(){}
	
	public static void happen(Exception ex){
		System.out.println("发生错误:");
		ex.printStackTrack();
	}
}

