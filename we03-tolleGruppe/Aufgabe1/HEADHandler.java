package de.uniulm.in.ki.webeng.serverscaffold.httphandlers;

import java.io.IOException;
import java.nio.file.NoSuchFileException;
import java.nio.file.Path;

import de.uniulm.in.ki.webeng.serverscaffold.MIMEHandler;
import de.uniulm.in.ki.webeng.serverscaffold.ServerConfiguration;
import de.uniulm.in.ki.webeng.serverscaffold.model.Request;
import de.uniulm.in.ki.webeng.serverscaffold.model.Response;

/**
 * Handles HEAD requests Created by Markus Brenner on 12.09.2016.
 */
public class HEADHandler {
	
	private static String entity;
	
    /**
     * Handles a request
     * 
     * @param request
     *            The request issued by a client
     * @param response
     *            An empty response object, which is to be filled with the
     *            correct reply
     */
    public static void handle(Request request, Response response) {
	 
    	// Setzen der Resource
        String resource = request.getResource().substring(1);
        resource = (resource.length() == 0) ? "index.html" : resource;
        Path resourcePath = ServerConfiguration.webRoot.resolve(resource);
        int contentLength = 0;
         
        // Setzen der Response-Statusline
        response.addHeader("METHODE", request.getMethod());
 		response.addHeader("RESOURCE", request.getResource());
 		response.addHeader("PROTOCOL", request.getProtocol());
 		
   
 		// Setzen des Status-Codes
 		if (!resourcePath.normalize()
                 .startsWith(ServerConfiguration.webRoot.normalize())) {
         	
 			response.setResponseCode(400, "Bad Request");
         
 		} else {
            
        	 // set body, content length header and response code
             response.addHeader("Content-Type",
                     MIMEHandler.getMimeType(resourcePath));
             
             // Test auf Verfügbarkeit
             try {
 				response.setBody(resourcePath);
 				contentLength = response.getBody().length; 
 	            response.setResponseCode(200, "OKi");
 			} catch (IOException e) {
 	            response.setResponseCode(404, "Not Found");
 			}
             
            // Loeschen des Bodys da nicht im Head enthalten
            response.setBody("");
            response.addHeader("content-length", "" + contentLength);
        }
         

// 		 System.out.println("*************************************");
//       System.out.println("request: "+request.toString());
//       System.out.println("*************************************");
//         
// 		 System.out.println("*************************************");
// 		 System.out.println("response: "+response.toString()); 
// 		 System.out.println("*************************************");
//   
    	return;
        
    }
}
