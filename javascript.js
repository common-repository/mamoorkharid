jQuery(document).ready(function($){
    $("input[name='searchinjob']").keyup(function(){
		var word = $("input[name='searchinjob']").val();
		if (word.length >1){
			$.ajax("https://api.mamourkharid.com/API/System/search/Guild",
			{
				type: 'POST',
				crossDomain:true,
				data: JSON.stringify({ Word: word, IsHeadersIncluded : false , MinimumSearchDepth: 1, CultureId: CultureId, LocationCultureId: LocationCultureId }),
				dataType: "json",
				contentType: "application/json; charset=utf-8",
				success: function(data, status){
					console.log("Data: " + data + "\nStatus: " + status);
					console.log(data.GuildSearch);
					var i;
					var str = '<ul>';
					for (i = 0; i < data.GuildSearch.length; ++i) {
						// do something with `substr[i]`
						console.log(data.GuildSearch[i].Name);
						if(data.GuildSearch[i].IsGroup){
							str += '<li>';
							str += '<a onclick="addURL(this)" target="_blank" href="https://mamourkharid.com/jobform?LId='+lid+'&LC='+CultureId+'&GId='+ data.GuildSearch[i].Id +'">';
							str += data.GuildSearch[i].Name;
							str += '</a></li>';
						}else{
							str += '<li style="padding-right: 10px; background: #BEFAB9;">';
							str += '<a onclick="addURL(this)" target="_blank" href="https://mamourkharid.com/jobform?LId='+lid+'&LC='+CultureId+'&GId='+ data.GuildSearch[i].Id +'">';
							str += data.GuildSearch[i].Name;
							str += '</a></li>';							
						}
					}
					str += '</ul>';
					$("#livesearchjob").html(str);
					$("#livesearchjob").css({"max-width":"100%","border":"1px solid gray"});
					}
			});
			

		}else{
			var str = '';
			$("#livesearchjob").html(str);
		}
	});     
	
	$("input[name='searchinrequest']").keyup(function(){
		var word = $("input[name='searchinrequest']").val();
		if (word.length >1){
			$.ajax("https://api.mamourkharid.com/API/System/search/Guild",
			{
				type: 'POST',
				crossDomain:true,
				data: JSON.stringify({ Word: word, IsHeadersIncluded : false , MinimumSearchDepth: 1, CultureId: CultureId, LocationCultureId: LocationCultureId }),
				dataType: "json",
				contentType: "application/json; charset=utf-8",
				success: function(data, status){
					console.log("Data: " + data + "\nStatus: " + status);
					console.log(data.GuildSearch);
					var i;
					var str = '<ul>';
					for (i = 0; i < data.GuildSearch.length; ++i) {
						// do something with `substr[i]`
						console.log(data.GuildSearch[i].Name);
						
						if(data.GuildSearch[i].IsGroup){
							str += '<li>';
							str += '<a>';
							str += data.GuildSearch[i].Name;
							str += '</a></li>';							
						}else{
							str += '<li style="padding-right: 10px; background: #BEFAB9;">';
							str += '<a onclick="addURL(this)" target="_blank" href="https://mamourkharid.com/requestform?LId='+lid+'&LC='+CultureId+'&GId='+ data.GuildSearch[i].Id +'">';
							str += data.GuildSearch[i].Name;
							str += '</a></li>';
						}
					}
					str += '</ul>';
					$("#livesearchrequest").html(str);
					$("#livesearchrequest").css({"max-width":"100%","border":"1px solid gray"});
					}
			});
		}else{
			var str = '';
			$("#livesearchrequest").html(str);
		}
	}); 

	$("input[name='searchinproducts']").keyup(function(){
		var word = $("input[name='searchinproducts']").val();	
		if (word.length >2){
			
			 req1 = $.get('https://markazbazar.com/wp-json/api/v1/search/?s='+word);
			//console.log(other_site);
			
			//console.log(req);
			var str = '<ul>';
			str += '<li>';
			str += 'در حال بارگذاری ...';
			str += '</li>';
			str += '</ul>';
			$("#livesearchproducts").html(str);
			
			if(!other_site)
				other_site = [''];			
			//console.log(other_site[0].length);
			//console.log(other_site);
			if(other_site[0].length === 0){
				
				$.when(req1).then(function(){
					//console.log(req1.responseJSON[0]);
					//console.log(req2.responseJSON[0]);

					data = req1.responseJSON;

					console.log(data);
					var i;
					var str = '<ul style="list-style: none;">';
					for (i = 0; i < 5 /*data.length*/; ++i) {

						console.log(data[i].title);
						str += '<li>';
						str += '<a style="display: inline-block;" target="_blank" href="'+ data[i].link +'">';
						str += '<div style="float: right;"><img style="width: 40px;padding: 2px;" src="'+data[i].thumb+'"></div>';
						str += '<div style="float: right;padding: 10px;">'+data[i].title;
						str +=" قیمت: "+data[i].price +" تومان"+'</div>';
						str += '</a></li>';
					
					}
					str += '</ul>';
					str += '<span style="float: left"><a href="https://markazbazar.com/searchpage/?sp='+word+'">مشاهده بیشتر</a></span>';
					$("#livesearchproducts").html(str);
					$("#livesearchproducts").css({"max-width":"100%","border":"1px solid gray"});					
				}).fail(function(){
					console.log("no result!");
				})				
				
			}else{
				req2 = $.get(other_site +'/?s='+word);
				$.when(req1, req2).then(function(){
					//console.log(req1.responseJSON[0]);
					//console.log(req2.responseJSON[0]);

					data = $.merge(req1.responseJSON, req2.responseJSON);

					console.log(data);
					var i;
					var str = '<ul style="list-style: none;">';
					for (i = 0; i < data.length; ++i) {

						console.log(data[i].title);
						str += '<li>';
						str += '<a style="display: inline-block;" target="_blank" href="'+ data[i].link +'">';
						str += '<div style="float: right;"><img style="width: 40px;padding: 2px;" src="'+data[i].thumb+'"></div>';
						str += '<div style="float: right;padding: 10px;">'+data[i].title;
						str +=" قیمت: "+data[i].price +" تومان"+'</div>';
						str += '</a></li>';
					
					}
					str += '</ul>';
					str += '<span style="float: left"><a href="https://markazbazar.com/searchpage/?sp='+word+'">مشاهده بیشتر</a></span>';
					$("#livesearchproducts").html(str);
					$("#livesearchproducts").css({"max-width":"100%","border":"1px solid gray"});					
				}).fail(function(){
					console.log("no result!");
				})			
				
			}
		}else{
			var str = '';
			$("#livesearchproducts").html(str);
		}
	}); 
});



jQuery(document).ready(function($){
    $(".nav-tabs a").click(function(){
        $(this).tab('show');
    });
	$('.nav-tabs a').click(function(e)
	{
		e.preventDefault();
	});	

});