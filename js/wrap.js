
function lootDialog(playerId,raidId,lootId){
	lootId = typeof(lootId) != 'undefined' ? lootId : '';
	if(lootId ==''){
		lootDialogOpen(playerId,raidId,'','','');
	}else{
		//TODO Ajax fetch
	}
}
function lootDialogOpen(playerId,raidId,lootId,lootName,lootDescription){
	$('body').append(
		"<div id='lootpopup'>"
		+"<form action='../actions/loot.php' method='POST'>"
		+"<input type='hidden' name='id' value='"+lootId+"'/>"
		+"<input type='hidden' name='playerId' value='"+playerId+"'/>"
		+"<input type='hidden' name='raidId' value='"+raidId+"'/>"
		+"Name: <input name='name'/ value=\""+lootName.replace(/\'/g,"\\'")+"\">"
		+"Description : <textarea name='description'>"+lootDescription+"</textarea>"
		+"<input type='submit'/>"
		+"</form>"
		+"</div>");
	$('#lootpopup').dialog({
		'title':'Edit loot',
		'beforeClose': function(event, ui) { $('#lootpopup').remove() }
	});
}
