var tableStart = "<!DOCTYPE html>";
tableStart += "<html>";
tableStart += "<head>";
tableStart += "<meta charset='utf-8'>";
tableStart += '<meta name="viewport" content="width=device-width, initial-scale=1">';
tableStart += '<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">';
tableStart += '<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>';
tableStart += '<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>';
tableStart += '<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>';
tableStart += "</head>"
tableStart += "<body><div class='container-fluid my-5 px-3'><div class='table-responsive'><table class='table table-bordered table-striped table-hover'><tbody style='overflow-y: auto;height: 800px;display: block;'>";
var tableEnd = "</tbody></table></div></div></body></html>"
var row = "";
var data = [];
var jsonText = "[";
var p = 1;


function downloadData(){
  text = tableStart + row + tableEnd;
  filename = 'download.html';

  var tempElem = document.createElement('a');
  tempElem.setAttribute('href','data:text/html;charset=utf-8,' + encodeURIComponent(text));
  tempElem.setAttribute('download', filename);
  tempElem.click();


  var index = jsonText.lastIndexOf(",");
  jsonText = jsonText.slice(0, index) + jsonText.slice(index+1);
  jsonText += "]";

  filename = 'download.json';

  var tempElem = document.createElement('a');
  tempElem.setAttribute('href','data:text/html;charset=utf-8,' + encodeURIComponent(jsonText));
  tempElem.setAttribute('download', filename);
  tempElem.click();
}

function filter(text){
  var index_1 = text.indexOf("Back to results");
  var index_2 = text.indexOf("Save");
  var index_3 = text.indexOf("Share");
  var index_4 = text.indexOf("Add a label");

  text = text.slice(index_1+1,index_2).concat(text.slice(index_3+1,index_4));
  
  text = text.filter(e => e !== 'Directions');
  text = text.filter(e => e !== 'Claim this business');
  text = text.filter(e => e !== '·');

  return text;
}

function abstractData(){     

  for(var k=0;k<data.length;k++){
    var text = data[k];
    console.log(text+" "+typeof text);
    text = text.split("\n");


    if(text.includes("Back to results")){
      var text = filter(text);

      row += "<tr>";

      jsonText += "{";
      for(var j=0;j<text.length;j++){
        jsonText +=  '\n\t"FIELD'+j+ '": ' + '"'+ text[j] +'",';
        row += "<td>"+text[j]+"</td>";
      }
      var index = jsonText.lastIndexOf(",");
      jsonText = jsonText.slice(0, index) + jsonText.slice(index+1);
      jsonText += "},\n";   

      row += "</tr>";
    }
  }

  downloadData();
}

function clickI(sender,i){
  var activeTab = sender.id;
  chrome.tabs.executeScript(activeTab.id,{code: "document.getElementsByClassName('section-result')["+i+"].click();"});
}

function getData(sender){
  var activeTab = sender.id;
  chrome.tabs.executeScript(activeTab.id,{file: 'script_2.js'});  
}

chrome.runtime.onMessage.addListener(function(request,sender,sendResponse){
  if(request.message === 'num_of_pages'){
    p = request.numPages;
    console.log(p);
  }

  if(request.message === 'start') {
    var activeTab = sender.id;
    var n = 20;
    var i=0;

    var x  = setInterval(function(){
      if(i == n){
        var nextPage = 'document.getElementById("n7lv7yjyC35__section-pagination-button-next").click();';
        chrome.tabs.executeScript(activeTab.id,{code : nextPage});
        i = -1;
        p--;    
      }

      if(p == 0){
        clearInterval(x);
        alert("Got It");
      }


      clickI(sender,i);
      

      
      setTimeout(function(){
        var recivedData = 'document.getElementsByTagName("body")[0].innerText;';
        var BackToResult = 'document.getElementsByClassName("section-back-to-list-button")[0].click()';

        chrome.tabs.executeScript(activeTab.id,{code: recivedData},function (result){    
          data.push(Object.values(result)[0]);
          chrome.tabs.executeScript(activeTab.id,{code: BackToResult});
        });
        
      },1500);
      
      i++;
    },2000);

  }

  

  if(request.message === 'download') {
    abstractData();
  }


});