	{if $error == '1'}
		<h2>AUN NO LE APROBARON SUS VIAJES</h2>
	{else}
	{foreach from=$custid item=curr_id}
	  id: {$curr_id}<br />
	{/foreach}
		
	{/if}

