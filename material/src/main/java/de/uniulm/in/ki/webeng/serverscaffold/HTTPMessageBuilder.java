package de.uniulm.in.ki.webeng.serverscaffold;

import java.util.ArrayList;
import java.util.List;

import de.uniulm.in.ki.webeng.serverscaffold.model.Request;

/**
 * Assembles a request byte by byte
 *
 * Created by Markus Brenner on 07.09.2016.
 */
public class HTTPMessageBuilder {
	


	private List<Byte> listOfBytes = new ArrayList<Byte>();
	private int state = 0;
    /**
     * Appends a character to the current request.
     *
     * @param c
     *            The next character
     * @return True, if the addition of the provided byte has completed the
     *         request
     */
    public boolean append(byte c) {
    	listOfBytes.add(c);
            switch(state){
            case 0:
            	if (c == 13) {
                    state = 1;            		
            	}
                break;
            case 1:
            	if (c == 10) {
            		state = 2;
            	} else {
                    state = 0;            		
            	}
                break;
            case 2:
            	if (c == 13) {
            		state = 3;
            	} else {
            		state = 0;
            	}
                break;
            case 3:
            	if (c == 10) {
            		state = 4;
            	} else {
                    state = 0;            		
            	}
            	break;
            default:
                System.out.println("something went wrong");
            }     	
            

    if (state == 4) {
		byte[] request = new byte[listOfBytes.size()];
		for(int i = 0; i < listOfBytes.size(); i++) {
			request[i] = listOfBytes.get(i).byteValue();
		}
		String req = new String(request);
    	System.out.println(req);
    	System.out.println("------ end of request -----------");
    	state = 0;
		return true;    	 
    }
        return false;
    }

    /**
     * Obtains the assembled request
     * 
     * @return The assembled request or null, if the request has not been
     *         completed yet
     */
    public Request getRequest() {
        // TODO: implement
        return null;
    }
}
