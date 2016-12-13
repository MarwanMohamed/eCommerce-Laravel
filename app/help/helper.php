<?php

function itemsUser($id) {
	return \App\Item::where('user_id' , $id)->count();	
}
