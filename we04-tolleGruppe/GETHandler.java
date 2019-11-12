package de.uniulm.in.ki.webeng.serverscaffold.httphandlers;

import java.io.IOException;
import java.nio.file.Path;

import de.uniulm.in.ki.webeng.serverscaffold.HTTPFetch;
import de.uniulm.in.ki.webeng.serverscaffold.MIMEHandler;
import de.uniulm.in.ki.webeng.serverscaffold.ResponseValidator;
import de.uniulm.in.ki.webeng.serverscaffold.ServerConfiguration;
import de.uniulm.in.ki.webeng.serverscaffold.model.Request;
import de.uniulm.in.ki.webeng.serverscaffold.model.Response;

/**
 * Handles GET requests Created by Markus Brenner on 07.09.2016.
 */
public class GETHandler {
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
        // TODO adapt, hint: check the setTo(Response other) method in the 
        // Response class for changing the passed in response object
        try {
        	// cuts the first "/" of the request 
            String resource = request.resource.substring(1);
            
            // implementation if starts with "remote/"
            if (resource.startsWith(ServerConfiguration.magicURL)){
            	// HTTPFetch.fetchRemote();
            	//returns the response of "GET /price/ HTTP/1.1
            	//						  HOST: morgal.informatik.uni-ulm.de:8000"
            	// validate the above response
            	// then set this response to the other server response
            	response.setTo(ResponseValidator.validate(HTTPFetch.fetchRemote()));
            	
                                           	
            } else {
            	// for request of 	"GET /index.html HTTP/1.1 
	            //    				 Host: http://localhost:1339"
	            resource = (resource.length() == 0) ? "index.html" : resource;
	            // web root "http:/"
	            Path resourcePath = ServerConfiguration.webRoot.resolve(resource);  
	            System.out.println(resourcePath);
	            // if path doesn't start with "Http:/" return status code 403
	            if (!resourcePath.normalize()
	                    .startsWith(ServerConfiguration.webRoot.normalize())) {
	                response.setResponseCode(403, "Forbidden");
	            } else {
	                response.setBody(resourcePath);                
	                response.addHeader("Content-Type",
	                        MIMEHandler.getMimeType(resourcePath));
	                response.addHeader("Content-Length",
	                        response.contentLength() + "");
	                response.setResponseCode(200, "OK");
	            }
            	
            }   
        } catch (IOException exc) {
            response.setResponseCode(404, "Not Found");
        }
    }
}
