<div id="ppcontent">

	<h1><a href="{$baseUrl}admin/school/create">Add School</a></h1>

    <table cellspacing="0" class="widefat fixed" id="admin_school_list">
        <thead>
        <tr class="thead">
        	<th style="" class="manage-column column-username" id="username" scope="col">Schools</th>
        </tr>
        </thead>


        <tbody class="list:user user-list">
            {foreach from=$schools item=school}
            	<tr class="alternate" id="user-1">
                    <td class="username column-username">
                        <strong><a href="#">{$school.title}</a></strong><br />
                        <div class="row-actions">
                            <span class="edit"><a href="{$baseUrl}admin/school/edit/{$school.id}">Edit</a></span>&nbsp;|
                            <span class="edit"><a onclick="return confirm('Are you sure?');" href="{$baseUrl}admin/school/delete/{$school.id}">Delete</a>&nbsp;|
                            <span class="edit"><a href="{$baseUrl}admin/user/list/schoolid/{$school.id}">Manage Staff</a></span>&nbsp;|
                            <span class="edit"><a href="{$baseUrl}schooldept/index/schoolid/{$school.id}">Departments</a></span>
                        </div>
                    </td>
                </tr>
            {/foreach}
        </tbody>
    </table>
</div>
{literal}
<script type="text/javascript" charset="utf-8">
jQuery(document).ready(function($) {
	oTable = $('#admin_school_list').dataTable({
		"bJQueryUI": true,
		"bPaginate": false,
		"bFilter": false,
		"bSort": false,		
	});
});
</script>
{/literal}

