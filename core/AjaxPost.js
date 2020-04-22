function AjaxPost(myUrl, queryString, successCallback, errorCallback) {
    if(queryString.length >= 1) myUrl+= "?" + queryString;
    $.ajax({
        url: myUrl + ".php", // PHP file
        type: "POST",
        success: successCallback,
        failure: errorCallback
    })
}

function SendDataByAjax(myUrl, postData, successMsg, errorMsg, files) {

}
