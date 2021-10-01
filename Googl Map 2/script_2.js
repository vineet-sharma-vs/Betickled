
var data = {
	/*name:"XYZ",
	address:"XYZ",
	contact:"XYZ"*/
	body : "zyx"
};

/*data.name = document.getElementsByTagName('h1')[0].innerText;
data.address = document.getElementsByClassName('ugiz4pqJLAG__primary-text gm2-body-2')[0].innerText;
data.contact = document.getElementsByClassName('ugiz4pqJLAG__primary-text gm2-body-2')[3].innerText;
*/

data.body = document.getElementsByTagName('body')[0].innerText;
chrome.runtime.sendMessage({"message" : "get_data" , "selected_data" : data});

