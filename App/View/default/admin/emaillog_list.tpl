<div id="ppcontent">

    <table cellspacing="0" class="widefat fixed" id="admin_emaillog_menu">
        <thead>
        <tr class="thead">
        	<th style="" class="manage-column column-cb check-column" id="cb" scope="col"><input type="checkbox" /></th>
        	<th style="" class="manage-column column-username" id="username" scope="col">To</th>
        	<th style="" class="manage-column column-name" id="name" scope="col">Template</th>
        	<th style="" class="manage-column column-email" id="email" scope="col">Sent</th>
        </tr>
        </thead>

        <tfoot>
        <tr class="thead">
        	<th style="" class="manage-column column-cb check-column" scope="col"><input type="checkbox" /></th>
        	<th style="" class="manage-column column-username" id="username" scope="col">To</th>
        	<th style="" class="manage-column column-name" id="name" scope="col">Template</th>
        	<th style="" class="manage-column column-email" id="email" scope="col">Sent</th>
        </tr>
        </tfoot>

        <tbody class="list:user user-list" id="users">

            {foreach from=$logs item=log}

            	<tr class="alternate" id="user-1">
                    <th class="check-column" scope="row"><input type="checkbox" value="1" class="administrator" id="user_1" name="users[]" /></th>
                    <td class="username column-username">
                        <strong><a href="{$baseUrl}admin/emaillog/view/{$log.id}">{$log.to}</a></strong><br />
                        <div class="row-actions">
                            <span class="edit"><a href="{$baseUrl}admin/emaillog/delete/{$log.id}">Delete</a>
                        </div>
                    </td>
                    <td class="name column-name">{$log.tpl_name}</td>
                    <td class="email column-email">{$log.sent_date|date_format}</td>
                </tr>
            {foreachelse}
            	<tr class="alternate" id="user-1">
                    <th class="check-column" scope="row">&nbsp;</th>
                    <td colspan="3" class="username column-username">
                        No email logs.
                    </td>
                </tr>
            {/foreach}
        </tbody>
    </table>
    <div class="tablenav">
	    <div class="alignleft actions">
	        <select name="action2">
	            <option selected="selected" value="">Bulk Actions</option>
	            <option value="delete">Delete</option>
	        </select>
	        <input type="submit" class="button-secondary action" id="doaction2" name="doaction2" value="Apply" />
	    </div>

	    <br class="clear" />
    </div>


</div>
