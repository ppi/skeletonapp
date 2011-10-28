<div id="ppcontent">

    <table cellspacing="0" class="widefat fixed" id="admin_emaillog_menu">
        <thead>
        <tr class="thead">
            <th style="" class="" id="cb" colspan="2">Email Log View</th>
        </tr>
        </thead>
        <tbody>
            <tr class="alternate" id="user-1">
                <td width="10%">To</td><td>{$log.to}</td>
            </tr>
            <tr class="alternate" id="user-1">
                <td width="10%">Template Name</td><td>{$log.tpl_name}</td>
            </tr>
            <tr class="alternate" id="user-1">
                <td width="10%">Date Sent</td><td>{$log.sent_date|date_format}</td>
            </tr>
            <tr class="alternate" id="user-1">
                <td width="10%">Headers</td><td>{$log.header|nl2br}</td>
            </tr>
            <tr class="alternate" id="user-1">
                <td width="10%">Body</td><td>{$log.body|nl2br}</td>
            </tr>
        </tbody>
    </table>

</div>