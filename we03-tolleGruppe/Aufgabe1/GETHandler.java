package de.uniulm.in.ki.webeng.serverscaffold.httphandlers;

import java.io.IOException;
import java.nio.file.NoSuchFileException;
import java.nio.file.Path;

import de.uniulm.in.ki.webeng.serverscaffold.MIMEHandler;
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
        // TODO: complete
        String resource = request.getResource().substring(1);
        resource = (resource.length() == 0) ? "index.html" : resource;
        Path resourcePath = ServerConfiguration.webRoot.resolve(resource);
        if (!resourcePath.normalize()
                .startsWith(ServerConfiguration.webRoot.normalize())) {
        	response.setResponseCode(400, "Bad Request");
        } else {
            // set body, content length header and response code
            response.addHeader("Content-Type",
                    MIMEHandler.getMimeType(resourcePath));
            try {
				response.setBody(resourcePath);
	            response.setResponseCode(200, "OK");
			} catch (IOException e) {
	            response.setResponseCode(404, "Not Found");
			}
//            System.out.println("*************************************");
//            System.out.println("request: "+request.toString());
//            System.out.println("*************************************");
        }
    }
}
