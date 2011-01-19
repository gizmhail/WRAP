if(!window.location.href.match(/https:\/\/eu.battle.net\/wow\/fr\/vault\/character\/event/)){
	window.location.href = "https://eu.battle.net/wow/fr/vault/character/event";
	return;
}

var callWait = 0;
var wrapTargetUrl = wrapBaseUrl+'/api/armory_planning_analisys.php';

$('body').append('<div id="wrapinfo"></div>');
$('#wrapinfo').css('color','black');
$('#wrapinfo').css('width','600px');
$('#wrapinfo').css('height','auto');
$('#wrapinfo').css('border','2px solid grey');
$('#wrapinfo').css('background-color','white');
$('#wrapinfo').dialog({
		'title':'WRAP armory push    ',
		'position':['300','300'],
		'beforeClose':function(event, ui) {
			$('#wrapinfo').innerHTML='';
		},
});


$('.event-summary').each(function(eventIndex){
	var raidId = $(this).attr('data-id');
	jQuery('.status',$(this)).each(function(){
		setTimeout("sendRaidPresence("+raidId+")",callWait);
		callWait += 2000;
	});
});
//Wait for call to be prepared to know when to redirect
window.setTimeout('window.setTimeout("window.location.href=wrapTargetUrl",callWait)',3000);


function sendRaidPresence(raidId){
	$('#wrapinfo').append('<h1>Fetching raid event (waiting 2 seconds for next request on armory)...</h1>');
	var infoUrl = 'https://eu.battle.net/wow/fr/vault/character/event/details?eventId='+raidId;
	$.ajax({
		url:infoUrl,
		error:function(XMLHttpRequest, textStatus, errorThrown){
			alert('Unable to fetch event '+raidId+' : '+textStatus);
			alert('Error: '+errorThrown);
		},
		success:function(data,textStatus, XMLHttpRequest){
			$('#wrapinfo').append('<div>Information found in armory</div>');
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
					$('#wrapinfo').append('<div>Information successfully sent to WRAP!</div>');
					$('#wrapinfo').append('</div><a href="'+targetUrl+'">Click to launch analysis</a></div>');
				}
			});
		},
		complete:function(XMLHttpRequest, textStatus){
		}
	});
	}
