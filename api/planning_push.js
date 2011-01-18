
if(!window.location.href.match(/https:\/\/eu.battle.net\/wow\/fr\/vault\/character\/event/)){
	window.location.href = "https://eu.battle.net/wow/fr/vault/character/event";
}

$('.event-summary').each(function(index){
	var raidId = $(this).attr('data-id');
	jQuery('.status',$(this)).each(function(){
		sendRaidPresence(raidId);
	});
});

window.setTimeout("window.location.href=wrapBaseUrl+'/api/armory_planning_analisys.php'",5000);

function sendRaidPresence(raidId){
	var infoUrl = 'https://eu.battle.net/wow/fr/vault/character/event/details?eventId='+raidId;
	$.ajax({
		url:infoUrl,
		error:function(XMLHttpRequest, textStatus, errorThrown){
			alert(textStatus);
			alert(errorThrown);
		},
		success:function(data,textStatus, XMLHttpRequest){
			var answers = "";
			var dateTime = jQuery(".datetime",data).text().trim();
			jQuery(".invitation-list",data).children().each(function(index){
				var player = jQuery("a",$(this)).text().trim();
				var response = jQuery(".response",$(this)).text().trim();
				answers += player+":"+response+";";
			});
			$.ajax({
				url:wrapBaseUrl+'/api/armory_push.php?dateTime='+dateTime+'&raidId='+raidId+'&data='+answers,
				dataType:'html',
				success:function(data,textStatus, XMLHttpRequest){
				}
			});
		},
		complete:function(XMLHttpRequest, textStatus){
		}
	});
	}
