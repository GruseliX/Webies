package de.uniulm.in.ki.webeng.serverscaffold;

import de.uniulm.in.ki.webeng.serverscaffold.model.Request;

import java.util.*;

/**
 * Assembles a request byte by byte
 * <p>
 * Created by Markus Brenner on 07.09.2016.
 */
public class HTTPMessageBuilder {

    private final String CONTENT_LENGTH = "content-length";
    private final String HEADER_END = "\r\n\r\n";
    private final String NEW_LINE = "\r\n";

    private String head;
    private List<Byte> body = new ArrayList<>();
    private Request request;
    private int bodyInfo;
    private Map<String, String> headerInfos;
    /**
     * Appends a character to the current request.
     *
     * @param c The next character
     * @return True, if the addition of the provided byte has completed the
     * request
     */
    public boolean append(byte c) {
        if(headerInfos == null){
            head += (char)c;
            if(head.endsWith(HEADER_END)){
                buildHeaderInfos(head);
                String contentLenght = headerInfos.get(CONTENT_LENGTH);
                if(contentLenght == null){
                    return true;
                }
                bodyInfo = Integer.parseInt(contentLenght);
                return bodyInfo == 0;
            }
            return false;
        }
        else if(bodyInfo > 0){
            body.add(c);
            --bodyInfo;
            return bodyInfo <= 0;
        }
        return true;
    }
    /**
     * Obtains the assembled request
     *
     * @return The assembled request or null, if the request has not been
     * completed yet
     */
    public Request getRequest() {
       if(request == null){
           String method = head.substring(0, head.indexOf(NEW_LINE));
           String[] firstLine = method.split(" ");
           request = new Request(firstLine[0], firstLine[1], firstLine[2], headerInfos, convertToArray(body));
       }
       return request;
    }

    private void buildHeaderInfos(String head){
        String[] lines = head.split(NEW_LINE);
        headerInfos = new HashMap<>();
        Arrays.stream(lines).filter(item -> item.contains(":")).forEach(item -> {
            String headerName = item.substring(0, item.indexOf(":")).toLowerCase();
            String headerContent = item.substring(item.indexOf(":") + 1).trim().toLowerCase();
            headerInfos.put(headerName, headerContent);
        });
    }

    private byte[] convertToArray(List<Byte> list) {
        byte[] result = new byte[list.size()];
        int index = 0;
        for(Byte entry: list){
            result[index++] = entry;
        }
        return result;
    }
}
