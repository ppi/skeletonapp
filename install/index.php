<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<title>PPI Installer</title>
	<meta http-equiv="pragma" content="no-cache" />
	<meta http-equiv="cache-control" content="no-cache" />
        <link rel="stylesheet" type="text/css" href="reset.css" />
	<link rel="stylesheet" type="text/css" href="style.css" />
        <link rel="stylesheet" type="text/css" href="ui.checkbox.css" />
	<script src="jquery.min.1.4.4.js" type="text/javascript"></script>
	<script src="jquery.ui.min.1.8.7.js" type="text/javascript"></script>
        <script src="ui.checkbox.js" type="text/javascript"></script>

	<script src="main.js" type="text/javascript"></script>	
</head>
<body>
	<form id="install-form" method="post" action="install.php">
		<div id="tabs">
			<ul>
                <li><a href="#fragment-1">Welcome</a></li>
                <li><a href="#fragment-2">Terms &amp; Condition</a></li>
                <li><a href="#fragment-3">Configuration</a></li>
                <li><a href="#fragment-4">Review</a></li>
            </ul>
			<div id="fragment-1" class="ui-tabs-panel">
                <div class="content">
	                <h1>Welcome to PPI Framework Installer.</h1>
	                <p>If this is the first time you have installed this app will check your system requirements below, if you have installed an app here before you are seeing this to upgrade your web app.</p>
	                <p>If the optional system requirements fail you will be allowed to continue your app installation by ticking next at the bottom of the tab, but any requirements that are not optional will prevent you from installing.</p>
					<ul id="req_check_list">
					    <li id="req_check_php"><div class="title">PHP version &gt; 5.2.0</div><div class="clear"></div></li>
					    <li id="req_check_pdomysql"><div class="title">PDO &amp; PDO MySql</div><div class="clear"></div></li>
					    <li id="req_check_xml"><div class="title">XML</div><div class="clear"></div></li>
					    <li id="req_check_modrewrite"><div class="title">Apache Mod Rewrite</div><div class="clear"></div></li>
					    <li id="req_check_writeable"><div class="title">Writeable</div><div class="clear"></div></li>   
					</ul>

					<input type="button" id="run_req_check" value="Check" />				
                </div>
            </div>
	<div id="fragment-2" class="ui-tabs-panel ui-tabs-hide">
                <div class="content">
                    <h2>Terms &amp; Conditions</h2>
			<div id="terms_and_conditions">
				<p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem. Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur? Quis autem vel eum iure reprehenderit qui in ea voluptate velit esse quam nihil molestiae consequatur, vel illum qui dolorem eum fugiat quo voluptas nulla pariatur?</p>
				<p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem. Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur? Quis autem vel eum iure reprehenderit qui in ea voluptate velit esse quam nihil molestiae consequatur, vel illum qui dolorem eum fugiat quo voluptas nulla pariatur?</p>
				<p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem. Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur? Quis autem vel eum iure reprehenderit qui in ea voluptate velit esse quam nihil molestiae consequatur, vel illum qui dolorem eum fugiat quo voluptas nulla pariatur?</p>
			</div>
                    	<p>
				<br />
	                        <input name="accept" type="checkbox" value="true" id="terms_checkbox" />
				<label for="terms_checkbox" class="normal">If you agree to the above terms and conditions please tick here to continue.</label>
			</p>
                </div>
            </div>
			<div id="fragment-3" class="ui-tabs-panel ui-tabs-hide">
				<div id="fragment-3-left">
					<div class="header">
						<h1>Database Configuration</h1>
						<p class="description">Enter the user credentials for your local database.</p>
					</div>
			                    <p>
			                        <label for="db_hostname">Hostname
			                            <span class="small">The host of your mysql server</span>
			                        </label>
			                        <input type="text" name="db[hostname]" id="db_hostname" value="localhost" />
			                    </p>
			                    <p>
			                        <label for="db_username">Username
			                            <span class="small">Your mysql username</span>
			                        </label>
			                        <input type="text" name="username" id="db_username" />
			                    </p>
			                    <p>
			                        <label for="db_password">Password
			                            <span class="small">Your mysql password</span>
			                        </label>
			                        <input type="text" name="password" id="db_password" />
			                    </p>
			                    <p>
			                        <label for="db_database">Database
			                            <span class="small">Your mysql database</span>
			                        </label>
			                        <input type="text" name="database" id="db_database" />
			                    </p>
                                            
                                            <input type="button" id="test_db_connection" value="Test Connection" />
                                            <div id="test_db_connect_container"></div>                                            
					    <div class="clear"></div>
				</div>
				<div id="fragment-3-right">
					<div class="header">
        			                <h1>Admin User Configuration</h1>
			                        <p class="description">Enter the user credentials for the super admin account.</p>
			                </div>
			                    <p>
			                        <label for="user_firstname">Firstname
		        	                    <span class="small">The publically visible firstname.</span>
			                        </label>
		                	        <input type="text" name="user[firstname]" id="user_firstname" />
			                    </p>
			                    <p>
			                        <label for="user_lastname">Lastname
			                            <span class="small">The publically visible lastname.</span>
			                        </label>
			                        <input type="text" name="user[lastname]" id="user_lastname" />
			                    </p>
			                    <p>
			                        <label for="user_username">Username
			                            <span class="small">The username to refer to your account uniquely.</span>
			                        </label>
			                        <input type="text" name="user[username]" id="user_username" />
			                    </p>
			                    <p>
			                        <label for="user_email">Email Address
			                            <span class="small">The email address to refer to your account uniquely.</span>
			                        </label>
			                        <input type="text" name="user[email]" id="user_email" />
			                    </p>
			                    <p>
			                        <label for="user_pass">Password
			                            <span class="small">Your password for logging in.</span>
			                        </label>
			                        <input type="text" name="user[password]" id="user_pass" />
			                    </p>
			                    <p>
			                        <label for="user_pass_again">Same password again
			                            <span class="small">Confirm your password for logging in.</span>
			                        </label>
			                        <input type="text" name="user[confirm_password]" id="user_pass_again" />
			                    </p>
					<p>
						<label>&nbsp;</label>
						<input type="button" id="user_register_button" value="Create Administrator" />
			                </div>
				<div class="clear"></div>
            </div>
            <div id="fragment-4" class="ui-tabs-panel ui-tabs-hide">
                <div class="content">
                    <h2>Review</h2>
                    <p></p>
                </div>
            </div>
        </div>
	</form>
</body>
</html>
