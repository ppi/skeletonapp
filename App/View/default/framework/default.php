

<div class="ppi-info">
	
	<div class="ppi-heading">Installing The PPI Skeleton App</div>
	
	<div class="alert-message block-message error">
		<p><strong>Oh snap! You got an error!</strong></p>
		<p>Your application isn't configured yet. We suggest you read below to resolve this matter!</p>
		<ul class="steps">
			<li><p>Update <b>system.base_url</b> in your <b>general.ini</b> config file to match: <b><?=$currentUrl;?></b></p></li>
			<li><p>Next remove the <b>default section</b> from your <b>routes.php</b> file.</p></li>
		</ul>
		<div class="alert-actions">
			<a class="btn large" href="#" onclick="javascript:window.location.reload(true); return false;">Re-Check</a>
		</div>
	</div>
	
		<div class="alert-message block-message info">
		<p class="info-title"><strong>Heads up!</strong> Here is some information to help you out.</p>
		<p>Your config file is here: <b><?= APPFOLDER . 'Config/general.ini'; ?></b></p>
		<p>Your routes file is here: <b><?= APPFOLDER . 'Config/routes.php'; ?></b></p>
	</div>

	<p>Refresh. Enjoy. Happy Coding :-)</p>
</div>

<style type="text/css">
p {
    color: black;
}
.container {
	width: 700px;
}

.ppi-heading {
	font-size: 2.3em;
	margin-bottom: 12px;
}

.ppi-info {
	margin: 0 auto;
	width: 700px;
}

.alert-message.info .info-title {
	margin-bottom: 12px;
}

.alert-message.info ul.steps,
.alert-message.error ul.steps {
	margin-top: 12px;
	margin-bottom: 12px;
}

.alert-message.info p,
.alert-message.error p {
	margin-top: 0;
}


a {
	text-decoration: none;
	font-size: 13px;
}

/* ------- BUTTONS ----- */
.btn.danger,
.alert-message.danger,
.btn.danger:hover,
.alert-message.danger:hover,
.btn.error,
.alert-message.error,
.btn.error:hover,
.alert-message.error:hover,
.btn.success,
.alert-message.success,
.btn.success:hover,
.alert-message.success:hover,
.btn.info,
.alert-message.info,
.btn.info:hover,
.alert-message.info:hover {
  color: #ffffff;
}
.btn .close, .alert-message .close {
  font-family: Arial, sans-serif;
  line-height: 18px;
}
.btn.danger,
.alert-message.danger,
.btn.error,
.alert-message.error {
  background-color: #c43c35;
  background-repeat: repeat-x;
  background-image: -khtml-gradient(linear, left top, left bottom, from(#ee5f5b), to(#c43c35));
  background-image: -moz-linear-gradient(top, #ee5f5b, #c43c35);
  background-image: -ms-linear-gradient(top, #ee5f5b, #c43c35);
  background-image: -webkit-gradient(linear, left top, left bottom, color-stop(0%, #ee5f5b), color-stop(100%, #c43c35));
  background-image: -webkit-linear-gradient(top, #ee5f5b, #c43c35);
  background-image: -o-linear-gradient(top, #ee5f5b, #c43c35);
  background-image: linear-gradient(top, #ee5f5b, #c43c35);
  filter: progid:DXImageTransform.Microsoft.gradient(startColorstr='#ee5f5b', endColorstr='#c43c35', GradientType=0);
  text-shadow: 0 -1px 0 rgba(0, 0, 0, 0.25);
  border-color: #c43c35 #c43c35 #882a25;
  border-color: rgba(0, 0, 0, 0.1) rgba(0, 0, 0, 0.1) rgba(0, 0, 0, 0.25);
}
.btn.success, .alert-message.success {
  background-color: #57a957;
  background-repeat: repeat-x;
  background-image: -khtml-gradient(linear, left top, left bottom, from(#62c462), to(#57a957));
  background-image: -moz-linear-gradient(top, #62c462, #57a957);
  background-image: -ms-linear-gradient(top, #62c462, #57a957);
  background-image: -webkit-gradient(linear, left top, left bottom, color-stop(0%, #62c462), color-stop(100%, #57a957));
  background-image: -webkit-linear-gradient(top, #62c462, #57a957);
  background-image: -o-linear-gradient(top, #62c462, #57a957);
  background-image: linear-gradient(top, #62c462, #57a957);
  filter: progid:DXImageTransform.Microsoft.gradient(startColorstr='#62c462', endColorstr='#57a957', GradientType=0);
  text-shadow: 0 -1px 0 rgba(0, 0, 0, 0.25);
  border-color: #57a957 #57a957 #3d773d;
  border-color: rgba(0, 0, 0, 0.1) rgba(0, 0, 0, 0.1) rgba(0, 0, 0, 0.25);
}
.btn.info, .alert-message.info {
  background-color: #339bb9;
  background-repeat: repeat-x;
  background-image: -khtml-gradient(linear, left top, left bottom, from(#5bc0de), to(#339bb9));
  background-image: -moz-linear-gradient(top, #5bc0de, #339bb9);
  background-image: -ms-linear-gradient(top, #5bc0de, #339bb9);
  background-image: -webkit-gradient(linear, left top, left bottom, color-stop(0%, #5bc0de), color-stop(100%, #339bb9));
  background-image: -webkit-linear-gradient(top, #5bc0de, #339bb9);
  background-image: -o-linear-gradient(top, #5bc0de, #339bb9);
  background-image: linear-gradient(top, #5bc0de, #339bb9);
  filter: progid:DXImageTransform.Microsoft.gradient(startColorstr='#5bc0de', endColorstr='#339bb9', GradientType=0);
  text-shadow: 0 -1px 0 rgba(0, 0, 0, 0.25);
  border-color: #339bb9 #339bb9 #22697d;
  border-color: rgba(0, 0, 0, 0.1) rgba(0, 0, 0, 0.1) rgba(0, 0, 0, 0.25);
}
.btn {
  cursor: pointer;
  display: inline-block;
  background-color: #e6e6e6;
  background-repeat: no-repeat;
  background-image: -webkit-gradient(linear, 0 0, 0 100%, from(#ffffff), color-stop(25%, #ffffff), to(#e6e6e6));
  background-image: -webkit-linear-gradient(#ffffff, #ffffff 25%, #e6e6e6);
  background-image: -moz-linear-gradient(top, #ffffff, #ffffff 25%, #e6e6e6);
  background-image: -ms-linear-gradient(#ffffff, #ffffff 25%, #e6e6e6);
  background-image: -o-linear-gradient(#ffffff, #ffffff 25%, #e6e6e6);
  background-image: linear-gradient(#ffffff, #ffffff 25%, #e6e6e6);
  filter: progid:DXImageTransform.Microsoft.gradient(startColorstr='#ffffff', endColorstr='#e6e6e6', GradientType=0);
  padding: 5px 14px 6px;
  text-shadow: 0 1px 1px rgba(255, 255, 255, 0.75);
  color: #333;
  font-size: 13px;
  line-height: normal;
  border: 1px solid #ccc;
  border-bottom-color: #bbb;
  -webkit-border-radius: 4px;
  -moz-border-radius: 4px;
  border-radius: 4px;
  -webkit-box-shadow: inset 0 1px 0 rgba(255, 255, 255, 0.2), 0 1px 2px rgba(0, 0, 0, 0.05);
  -moz-box-shadow: inset 0 1px 0 rgba(255, 255, 255, 0.2), 0 1px 2px rgba(0, 0, 0, 0.05);
  box-shadow: inset 0 1px 0 rgba(255, 255, 255, 0.2), 0 1px 2px rgba(0, 0, 0, 0.05);
  -webkit-transition: 0.1s linear all;
  -moz-transition: 0.1s linear all;
  -ms-transition: 0.1s linear all;
  -o-transition: 0.1s linear all;
  transition: 0.1s linear all;
}
.btn:hover {
  background-position: 0 -15px;
  color: #333;
  text-decoration: none;
}
.btn:focus {
  outline: 1px dotted #666;
}
.btn.primary {
  color: #ffffff;
  background-color: #0064cd;
  background-repeat: repeat-x;
  background-image: -khtml-gradient(linear, left top, left bottom, from(#049cdb), to(#0064cd));
  background-image: -moz-linear-gradient(top, #049cdb, #0064cd);
  background-image: -ms-linear-gradient(top, #049cdb, #0064cd);
  background-image: -webkit-gradient(linear, left top, left bottom, color-stop(0%, #049cdb), color-stop(100%, #0064cd));
  background-image: -webkit-linear-gradient(top, #049cdb, #0064cd);
  background-image: -o-linear-gradient(top, #049cdb, #0064cd);
  background-image: linear-gradient(top, #049cdb, #0064cd);
  filter: progid:DXImageTransform.Microsoft.gradient(startColorstr='#049cdb', endColorstr='#0064cd', GradientType=0);
  text-shadow: 0 -1px 0 rgba(0, 0, 0, 0.25);
  border-color: #0064cd #0064cd #003f81;
  border-color: rgba(0, 0, 0, 0.1) rgba(0, 0, 0, 0.1) rgba(0, 0, 0, 0.25);
}
.btn.active, .btn:active {
  -webkit-box-shadow: inset 0 2px 4px rgba(0, 0, 0, 0.25), 0 1px 2px rgba(0, 0, 0, 0.05);
  -moz-box-shadow: inset 0 2px 4px rgba(0, 0, 0, 0.25), 0 1px 2px rgba(0, 0, 0, 0.05);
  box-shadow: inset 0 2px 4px rgba(0, 0, 0, 0.25), 0 1px 2px rgba(0, 0, 0, 0.05);
}
.btn.disabled {
  cursor: default;
  background-image: none;
  filter: progid:DXImageTransform.Microsoft.gradient(enabled = false);
  filter: alpha(opacity=65);
  -khtml-opacity: 0.65;
  -moz-opacity: 0.65;
  opacity: 0.65;
  -webkit-box-shadow: none;
  -moz-box-shadow: none;
  box-shadow: none;
}
.btn[disabled] {
  cursor: default;
  background-image: none;
  filter: progid:DXImageTransform.Microsoft.gradient(enabled = false);
  filter: alpha(opacity=65);
  -khtml-opacity: 0.65;
  -moz-opacity: 0.65;
  opacity: 0.65;
  -webkit-box-shadow: none;
  -moz-box-shadow: none;
  box-shadow: none;
}
.btn.large {
  font-size: 15px;
  line-height: normal;
  padding: 9px 14px 9px;
  -webkit-border-radius: 6px;
  -moz-border-radius: 6px;
  border-radius: 6px;
}
.btn.small {
  padding: 7px 9px 7px;
  font-size: 11px;
}
:root .alert-message, :root .btn {
  border-radius: 0 \0;
}
button.btn::-moz-focus-inner, input[type=submit].btn::-moz-focus-inner {
  padding: 0;
  border: 0;
}


.alert-message {
  position: relative;
  padding: 7px 15px;
  margin-bottom: 18px;
  color: #404040;
  background-color: #eedc94;
  background-repeat: repeat-x;
  background-image: -khtml-gradient(linear, left top, left bottom, from(#fceec1), to(#eedc94));
  background-image: -moz-linear-gradient(top, #fceec1, #eedc94);
  background-image: -ms-linear-gradient(top, #fceec1, #eedc94);
  background-image: -webkit-gradient(linear, left top, left bottom, color-stop(0%, #fceec1), color-stop(100%, #eedc94));
  background-image: -webkit-linear-gradient(top, #fceec1, #eedc94);
  background-image: -o-linear-gradient(top, #fceec1, #eedc94);
  background-image: linear-gradient(top, #fceec1, #eedc94);
  filter: progid:DXImageTransform.Microsoft.gradient(startColorstr='#fceec1', endColorstr='#eedc94', GradientType=0);
  text-shadow: 0 -1px 0 rgba(0, 0, 0, 0.25);
  border-color: #eedc94 #eedc94 #e4c652;
  border-color: rgba(0, 0, 0, 0.1) rgba(0, 0, 0, 0.1) rgba(0, 0, 0, 0.25);
  text-shadow: 0 1px 0 rgba(255, 255, 255, 0.5);
  border-width: 1px;
  border-style: solid;
  -webkit-border-radius: 4px;
  -moz-border-radius: 4px;
  border-radius: 4px;
  -webkit-box-shadow: inset 0 1px 0 rgba(255, 255, 255, 0.25);
  -moz-box-shadow: inset 0 1px 0 rgba(255, 255, 255, 0.25);
  box-shadow: inset 0 1px 0 rgba(255, 255, 255, 0.25);
}
.alert-message .close {
  margin-top: 1px;
  *margin-top: 0;
}
.alert-message a {
  font-weight: bold;
  color: #404040;
}
.alert-message.danger p a,
.alert-message.error p a,
.alert-message.success p a,
.alert-message.info p a {
  color: #ffffff;
}
.alert-message h5 {
  line-height: 18px;
}
.alert-message p {
  margin-bottom: 0;
}
.alert-message div {
  margin-top: 5px;
  margin-bottom: 2px;
  line-height: 28px;
}
.alert-message .btn {
  -webkit-box-shadow: 0 1px 0 rgba(255, 255, 255, 0.25);
  -moz-box-shadow: 0 1px 0 rgba(255, 255, 255, 0.25);
  box-shadow: 0 1px 0 rgba(255, 255, 255, 0.25);
}
.alert-message.block-message {
  background-image: none;
  background-color: #fdf5d9;
  filter: progid:DXImageTransform.Microsoft.gradient(enabled = false);
  padding: 14px;
  border-color: #fceec1;
  -webkit-box-shadow: none;
  -moz-box-shadow: none;
  box-shadow: none;
}
.alert-message.block-message ul, .alert-message.block-message p {
  margin-right: 30px;
}
.alert-message.block-message ul {
  margin-bottom: 0;
}
.alert-message.block-message li {
  color: #404040;
}
.alert-message.block-message .alert-actions {
  margin-top: 5px;
}
.alert-message.block-message.error, .alert-message.block-message.success, .alert-message.block-message.info {
  color: #404040;
  text-shadow: 0 1px 0 rgba(255, 255, 255, 0.5);
}
.alert-message.block-message.error {
  background-color: #fddfde;
  border-color: #fbc7c6;
}
.alert-message.block-message.success {
  background-color: #d1eed1;
  border-color: #bfe7bf;
}
.alert-message.block-message.info {
  background-color: #ddf4fb;
  border-color: #c6edf9;
}
.alert-message.block-message.danger p a,
.alert-message.block-message.error p a,
.alert-message.block-message.success p a,
.alert-message.block-message.info p a {
  color: #404040;
}
	
	
	
	
	
	
	
</style>
