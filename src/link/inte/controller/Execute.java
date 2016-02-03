package link.inte.controller;
import link.inte.controller.*;

class Execute throws Exception {
	private Runtime rt
	//新构造器，获取一个Runtime对象
	public Execute(){
		this.rt = Runtime.getRuntime()
	}
	
	public String run(String cmd){
		String result;
		result = this.rt.exec(cmd);
		return result;
	}
}



