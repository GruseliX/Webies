/*
Ich habe die process Methode implementiert und die Request Klasse modifiziert. Bei der Request Klasse habe ich nur die Attribute auf private gesetzt und getter & setter Methoden hinzugefügt.
Die Modifizierung kann an einigen Stellen zu Compilerfehler führen, aber sollte schnell behoben werden können. 
*/

//process Methode
    public void process(Request request, Response response) {
        // TODO: in exercise 3: assemble the response
        System.out.println("Request received. Request handling pending...");
        switch (request.getMethod()){
            case "GET":
                GETHandler.handle(request, response);
                break;
            case "HEAD":
                HEADHandler.handle(request, response);
                break;
            case "POST":
                POSTHandler.handle(request, response);
                break;
            case "PUT":
                PUTHandler.handle(request, response);
                break;
            case "DELETE":
                DELETEHandler.handle(request, response);
                break;
            default:
                response.setResponseCode(501, "Not implemented");
        }
    }


//Request Klasse
package de.uniulm.in.ki.webeng.serverscaffold.model;

import java.util.Collections;
import java.util.Map;

/**
 * Represents a http 1.1 request issued by a client. This class is immutable and
 * therefore read-only
 *
 * Created by Markus Brenner on 07.09.2016.
 */
public class Request {
    /**
     * The http method string of the request
     */
    private final String method;
    /**
     * The resource of the request
     */
    private final String resource;
    /**
     * The protocol of this request, usually HTTP/1.1
     */
    private final String protocol;
    /**
     * The headers set for the request in a property => value mapping
     */
    private final Map<String, String> headers;

    /**
     * The body of the request
     */
    private final byte[] body;

    /**
     * Constructs a new request
     * 
     * @param method
     *            The http method
     * @param resource
     *            The resource of the http request
     * @param protocol
     *            The protocol used, usually HTTP/1.1
     * @param headers
     *            The headers set in the request
     * @param body
     *            The body of the request
     */
    public Request(String method, String resource, String protocol,
            Map<String, String> headers, byte[] body) {
        this.method = method;
        this.resource = resource;
        this.protocol = protocol;
        this.headers = Collections.unmodifiableMap(headers);
        this.body = body;
    }

    public String getMethod() {
        return method;
    }

    public String getResource() {
        return resource;
    }

    public String getProtocol() {
        return protocol;
    }

    public Map<String, String> getHeaders() {
        return headers;
    }

    public byte[] getBody() {
        return body;
    }

    @Override
    public String toString() {
        return method + " " + resource + " " + protocol + "\r\n"
                + headers.entrySet().stream()
                        .map(x -> x.getKey() + ":" + x.getValue() + "\r\n")
                        .reduce("", (x, y) -> x + y)
                + "\r\n\r\n" + new String(body);
    }
}

