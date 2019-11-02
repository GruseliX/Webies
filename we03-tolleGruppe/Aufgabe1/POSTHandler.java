package de.uniulm.in.ki.webeng.serverscaffold.httphandlers;

import java.io.UnsupportedEncodingException;
import java.net.URLDecoder;

import de.uniulm.in.ki.webeng.serverscaffold.model.Request;
import de.uniulm.in.ki.webeng.serverscaffold.model.Response;

/**
 * Handles POST requests Created by Markus Brenner on 07.09.2016.
 */
public class POSTHandler {
    /**
     * Handles a request
     * 
     * @param request
     *            The request issued by a client
     * @param response
     *            An empty response object, which is to be filled with the
     *            correct reply
     */
    @SuppressWarnings("deprecation")
    public static void handle(Request request, Response response) {
    	// needed to be changed due to private settings
        if (request.getResource().equals("/index.html")) {
            String params = null;
            // check request's encoding style
            // needed to be changed due to private settings
            if (request.getHeaders().containsKey("charset")) {
                // Encoding identified: decode by using the given encoding
                // scheme.
                try {
                	// needed to be changed due to private settings
                    params = URLDecoder.decode(new String(request.getBody()),
                    		// needed to be changed due to private settings
                            request.getHeaders().get("charset"));
                } catch (UnsupportedEncodingException e) {
                    // params remains null and default encoding will be used
                }
            }

            if (params == null) {
                // Encoding not identified or unsupported: use deprecated
                // decoding function
            	// needed to be changed due to private settings
                params = URLDecoder.decode(new String(request.getBody()));
            } 
            // TODO: implement further
                        
            // default ASCII kodiert?
            // Inhalte sind im Body
            String bodyContent = new String(request.getBody());
            // falls mehrere Parameter im Body enthalten sind
            // sind sie durch das &-Zeichen getrennt (keine Leerzeichen enthalten)
            String [] bodyContentParts =  bodyContent.split("&");
            //suche nach dem Parameter "name=" in der Liste 
            for (int i=0;i < bodyContentParts.length; i++) {
            	if(bodyContentParts[i].contains("name=")) {
            		//entferne zunächst "name="
            		String enteredName = bodyContentParts[i].substring(5, bodyContentParts[i].length());
            		// setze responce code auf erfolgreich
            		response.setResponseCode(200, "OK");
            		//setze den response body auf den nachfolgenden Wert
            		response.setBody("Hello "+ enteredName + "!");
            	}
            }
                    
        } else {
            // TODO: set response code suitably
        	response.setResponseCode(400, "Bad Request");
        }
    }
}
