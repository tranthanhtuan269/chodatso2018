$(document).ready(function(){
    $( ".prod-sort-by" ).change(function() {
		// var old_url     = window.location.href;
		// var new_url 	= old_url.substring(0, old_url.indexOf('?'));
		// if($( ".prod-sort-by" ).val() == 1)
		// {
		// 	if($(".prod-show-numb").val() == 12){
		// 		window.location.href = new_url + '?sort-by=date&num=12';
		// 	}else if($(".prod-show-numb").val() == 24){
		// 		window.location.href = new_url + '?sort-by=date&num=24';
		// 	}else{
		// 		window.location.href = new_url + '?sort-by=date&num=36';
		// 	}
		// }else
		// {
		// 	if($(".prod-show-numb").val() == 12){
		// 		window.location.href = new_url + '?sort-by=price&num=12';
		// 	}else if($(".prod-show-numb").val() == 24){
		// 		window.location.href = new_url + '?sort-by=price&num=24';
		// 	}else{
		// 		window.location.href = new_url + '?sort-by=price&num=36';
		// 	}
		// }

		$sort_by = $(".prod-sort-by").val();
		if(checkExistParameter() > 0){
			if(typeof(getUrlParameter('sort-by')) == 'undefined'){
				window.location.href = window.location.href + '&sort-by=' + $sort_by;
			}else{
				var text = window.location.href;
				window.location.href = setUrlParameter(window.location.href,'sort-by', $sort_by);
			}
		}else{
			window.location.href = window.location.href + '?sort-by=' + $sort_by;
		}
	});

	$( ".prod-show-numb" ).change(function() {
		// var old_url     = window.location.href;
		// var new_url 	= old_url.substring(0, old_url.indexOf('?'));
		// if($( ".prod-sort-by" ).val() == 1)
		// {
		// 	if($(".prod-show-numb").val() == 12){
		// 		window.location.href = new_url + '?sort-by=date&num=12';
		// 	}else if($(".prod-show-numb").val() == 24){
		// 		window.location.href = new_url + '?sort-by=date&num=24';
		// 	}else{
		// 		window.location.href = new_url + '?sort-by=date&num=36';
		// 	}
		// }else
		// {
		// 	if($(".prod-show-numb").val() == 12){
		// 		window.location.href = new_url + '?sort-by=price&num=12';
		// 	}else if($(".prod-show-numb").val() == 24){
		// 		window.location.href = new_url + '?sort-by=price&num=24';
		// 	}else{
		// 		window.location.href = new_url + '?sort-by=price&num=36';
		// 	}
		// }

		$num = $(".prod-show-numb").val();
		if(checkExistParameter() > 0){
			if(typeof(getUrlParameter('num')) == 'undefined'){
				window.location.href = window.location.href + '&num=' + $num;
			}else{
				var text = window.location.href;
				window.location.href = setUrlParameter(window.location.href,'num', $num);
			}
		}else{
			window.location.href = window.location.href + '?num=' + $num;
		}
	});

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