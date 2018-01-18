$(document).ready(function(){
    $(".page-pagin").click(function(){
		$page_select = $(this).attr("data-page-id");
		if(checkExistParameter() > 0){
			if(typeof(getUrlParameter('page')) == 'undefined'){
				window.location.href = window.location.href + '&page=' + $page_select;
			}else{
				var text = window.location.href;
				window.location.href = setUrlParameter(window.location.href,'page', $page_select);
			}
		}else{
			window.location.href = window.location.href + '?page=' + $page_select;
		}
	});
});

function remove_product($id, $cusId){
	//alert($id);
	var request = $.ajax({
	  url: "remove-product.php",
	  method: "POST",
	  data: { id : $id, cusId : $cusId },
	  dataType: "json"
	});
	 
	request.done(function( msg ) {
		if(msg.success == 1){
			alert("Bạn đã xóa thành công!");
			window.setTimeout('location.reload()', 1000);
		}else{
			alert("Có vấn đề xảy ra trong quá trình xóa, xin hãy báo cho người quản trị \nEmail: tran.thanh.tuan269@gmail.com \nXin chân thành cảm ơn Quý khách!");
			window.setTimeout('location.reload()', 1000);
		}

	  //$( "#log" ).html( msg );
	});
	 
	request.fail(function( jqXHR, textStatus ) {
	  alert( "Request failed: " + textStatus );
	});
}

function up_product($id, $cusId){
	var request = $.ajax({
	  url: "up-product.php",
	  method: "POST",
	  data: { id : $id, cusId : $cusId },
	  dataType: "json"
	});
	 
	request.done(function( msg ) {
		if(msg.success == 1){
			alert("Bạn đã làm mới thành công!");
			window.setTimeout('location.reload()', 1000);
		}else{
			alert("Có vấn đề xảy ra trong quá trình làm mới, xin hãy báo cho người quản trị \nEmail: tran.thanh.tuan269@gmail.com \nXin chân thành cảm ơn Quý khách!");
			window.setTimeout('location.reload()', 1000);
		}

	  //$( "#log" ).html( msg );
	});
	 
	request.fail(function( jqXHR, textStatus ) {
	  alert( "Request failed: " + textStatus );
	});
	
}

var getUrlParameter = function getUrlParameter(sParam) {
    var sPageURL = decodeURIComponent(window.location.search.substring(1)),
        sURLVariables = sPageURL.split('&'),
        sParameterName,
        i;

    for (i = 0; i < sURLVariables.length; i++) {
        sParameterName = sURLVariables[i].split('=');

        if (sParameterName[0] === sParam) {
            return sParameterName[1] === undefined ? true : sParameterName[1];
        }
    }
};

var setUrlParameter = function replaceUrlParam(url, paramName, paramValue){
    if(paramValue == null)
        paramValue = '';
    var pattern = new RegExp('\\b('+paramName+'=).*?(&|$)')
    if(url.search(pattern)>=0){
        return url.replace(pattern,'$1' + paramValue + '$2');
    }
    return url + (url.indexOf('?')>0 ? '&' : '?') + paramName + '=' + paramValue 
}

var checkExistParameter = function checkExistParameter(){
	var url = window.location.href;
	var matches = url.match(/[a-z\d]+=[a-z\d]+/gi);
	var count = matches? matches.length : 0;
	return count;
}