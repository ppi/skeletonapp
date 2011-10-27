<div id="ppcontent">

    <table cellspacing="0" class="widefat fixed" id="admin_config_menu">
        <thead>
        <tr class="thead">
        	<th style="" class="manage-column column-username" id="username" scope="col">Category</th>
        	<th style="" class="manage-column column-name" id="name" scope="col">Name</th>
        	<th style="" class="manage-column column-email" id="email" scope="col">Value</th>
        </tr>
        </thead>

        <tfoot>
        <tr class="thead">
        	<th style="" class="manage-column column-username" id="username" scope="col">Category</th>
        	<th style="" class="manage-column column-name" id="name" scope="col">Name</th>
        	<th style="" class="manage-column column-email" id="email" scope="col">Value</th>
        </tr>
        </tfoot>

        <tbody class="list:user user-list" id="users">

            {foreach from=$aConfig key=type item=config}
				{foreach from=$config key=configname item=configitem}
            	<tr class="alternate" id="user-1">
                    <td class="username column-username">{$type}</td>
                    <td class="name column-name">{$configname}</td>
                    <td class="name column-name">{$configitem}</td>
                </tr>
				{/foreach}
            {/foreach}
        </tbody>
    </table>

</div>
