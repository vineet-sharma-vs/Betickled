


window.onload = function(){

    
    $('#start').click(function(){
       chrome.runtime.sendMessage({"message" : "start"});
    });

    $('#download').click(function(){
       chrome.runtime.sendMessage({"message" : "download"});
    });

    $('#num_of_pages').blur(function(){
    	chrome.runtime.sendMessage({"message" : "num_of_pages", "numPages": $(this).val()});
    })

    
}