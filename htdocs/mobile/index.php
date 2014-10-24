<!doctype html>
<html>
	<head>
      	<script type="text/javascript" src="jquery.js"></script>
      	<script type="text/javascript" src="aes.js"></script>
      	<script type="text/javascript" src="openpgp.js"></script>
		<script type="text/javascript" src="jquery.touchSwipe.min.js"></script>

		<link href='https://fonts.googleapis.com/css?family=Advent+Pro:400,500,600,700,300,200,100' rel='stylesheet' type='text/css'>
		<meta name="apple-mobile-web-app-capable" content="yes" />
      	<meta name="apple-mobile-web-app-status-bar-style" content="default" />
      	<meta name="viewport" content="user-scalable=no, width=device-width" />
		<link href='/mobile/css/master.css' rel='stylesheet' type='text/css'>
		<title>Ciphertext</title>
	</head>
	<body ontouchstart="">
		<div class="body">
			
			<a href="javascript:void(0);" class="dotdotdot">. . .</a>
			
		<!---
		==========================================================
		Intro animation container [ #app_intro_load ]
		==========================================================
		--->
		<div id="app_intro_load" class="fullpage invert full absolute">
			<h1>Ciphertext</h1>
			<h2>Establishing Secure Coonnection.</h2>
		</div>
		
		<!---
		==========================================================
		App Main Menu [ #app_page ]
		==========================================================
		--->
		<section id="app_page" class="hiding">
			<h1 class="appTitle">Ciphertext</h1>
			<p class="id-name hiding normal-center"></p>
			<input type="button" class="big-btn app-id-action" value="Create Identity">
            <input type="button" class="big-btn app-identity-data hiding" value="Identity Data">
			<input type="button" class="big-btn app-add-contact hiding" value="Add Contact">
			<input type="button" class="big-btn app-messages hiding" value="Messages">
			<input type="button" class="big-btn app-help" value="Help">
			<p class="normal-center tutorial-message"><strong>
				Create your first Identity to start sending messages to other Identities.
			</strong></p>
		</section>

		<!---
		==========================================================
		List of Messages / Conversations [ #app_messages ]
		==========================================================
		--->
		<section id="app_messages" class="hiding">
			<p>Messages</p>
			<span class="normal-center">Tap a name to view conversation.</span>
			<ul class="app-message-list"></ul>
			<input type="button" class="big-btn app-close-messages" value="Back">
		</section>
		
		<!---
		==========================================================
		Add Contact Page [ #app_add_contact ]
		==========================================================
		--->
		<section id="app_add_contact" class="hiding">
			<p>Add Contact</p>
			<input type="text" class="big-btn txt arial add-contact-txt">
			<input type="button" class="big-btn app-save-contact" value="Add Contact">
			<input type="button" class="big-btn app-close-add-contact" value="Back">
		</section>
        
		<!---
		==========================================================
		Confirm Data Erase [ #app_confirm_erase ]
		==========================================================
		--->
        <section id="app_confirm_erase" class="hiding">
            <p class="red">CONFIRM</p>
            <p>Are you sure you want to clear ALL data? This cannot be undone.</p>
            <input type="button" class="big-btn app-clear-pin" value="YES - Clear All Data">
            <input type="button" class="big-btn app-close-erase" value="Nevermind, go back">
        </section>
		
		<!---
		==========================================================
		Conversation View [ #app_conversation_view ]
		==========================================================
		--->
		<section id="app_conversation_view" class="hiding">
			<p></p>
			<div class="app-messages-conversation-display"></div>
			<input type="text" placeholder="Enter a message..." class="big-btn txt arial send-msg-txt">
			<input type="button" class="big-btn app-send-msg" value="Send Message">
			<input type="button" class="big-btn app-close-conversation btn-link" value="Back">
		</section>
        
		<!---
		==========================================================
		Identity Data View [ #app_id_data ]
		==========================================================
		--->
		<section id="app_id_data" class="hiding">
			<p>Identity Data</p>
			<p class="mid-size go-left arial header-p">Your ID is: <span class="bolder id-display"></span></p>
			<p class="mid-size go-left arial header-p">Created: <span class="bolder id-created-date"></span></p>
			<p class="mid-size go-left arial header-p">Public Key: <pre style="font-size:6pt;" class="id-public-key"></pre></p>
			
			<input type="button" class="big-btn app-clear-pin-1" value="Clear All Data">
			<input type="button" class="big-btn app-close-id-data" value="Back">
			<input type="button" class="big-btn app-debug-selftest debug" value="[SOCKET DEBUG]">
		</section>

		<!---
		==========================================================
		App Help View [ #app_help ]
		==========================================================
		--->
		<section id="app_help" class="hiding normal-font">
			<h1 class="appTitle">Ciphertext Help</h1>
			<p>Ciphertext is a secure, anonymous chat and message service used for the sensitive andclassified transfer of information.</p>

			<p>You can create and destroy your chat conversations, and your <strong>identities</strong> at any time. An identity is simply a "user". You'll be given a random set of numbmers and letters - that serves as your username for that identity and is how people will contact you. Each identity comes with a 2048-bit PGP keypair generated <strong>on the device, and NEVER transferred outside the device itself.</strong></p>
			<p>When you add someone (or vice-versa) to your contacts, the server only acts as a transport of user public keys, never private keys. When someone sends you a message, they use their private key, and your puiblic key to encrypt the message that nobody else besides you two will ever be able to decrypt it. </p>
			<p>What makes <strong>Ciphertext</strong> secure and unique, is that the transfer of private keys, and passwords never happens. It's all client-based. We never know your PINs, or your keypair passwords.</p>
		
			<input type="button" class="big-btn app-close-help" value="Back">
		</section>

		<!---
		==========================================================
		App Setup - Step 1 View [ #app_setup ]
		==========================================================
		--->
		<section id="app_setup" class="hiding">
			<p>Choose a Master PIN.</p>

			<form action="" method="post" class="pin-form" id="new_masterpass_form">
				<input type="password" class="pin-display" maxlength="1" data-idx="0" disabled>
				<input type="password" class="pin-display" maxlength="1" data-idx="1" disabled>
				<input type="password" class="pin-display" maxlength="1" data-idx="2" disabled>
				<input type="password" class="pin-display" maxlength="1" data-idx="3" disabled>

				<p></p>

				<input type="button" value="1">
				<input type="button" value="2">
				<input type="button" value="3"><br>
				<input type="button" value="4">
				<input type="button" value="5">
				<input type="button" value="6"><br>
				<input type="button" value="7">
				<input type="button" value="8">
				<input type="button" value="9"><br>
				<input type="button" value="0">
				<input type="button" value="<<" class="pin-back">
			</form>
		</section>

		<!---
		==========================================================
		App Setup - Step 2 View [ #app_setup2 ]
		==========================================================
		--->
		<section id="app_setup2" class="hiding">
			<p>Confirm your Master PIN.</p>

			<form action="" method="post" class="pin-form" id="new_masterpass_form2">
				<input type="password" class="pin-display" maxlength="1" data-idx="0" disabled>
				<input type="password" class="pin-display" maxlength="1" data-idx="1" disabled>
				<input type="password" class="pin-display" maxlength="1" data-idx="2" disabled>
				<input type="password" class="pin-display" maxlength="1" data-idx="3" disabled>

				<p></p>

				<input type="button" value="1">
				<input type="button" value="2">
				<input type="button" value="3"><br>
				<input type="button" value="4">
				<input type="button" value="5">
				<input type="button" value="6"><br>
				<input type="button" value="7">
				<input type="button" value="8">
				<input type="button" value="9"><br>
				<input type="button" value="0">
				<input type="button" value="<<" class="pin-back">
			</form>
		</section>

		<!---
		==========================================================
		App Login View [ #app_login]
		==========================================================
		--->
		<section id="app_login" class="hiding">
			<p>Enter Your Master PIN.</p>

			<form action="" method="post" class="pin-form" id="login_masterpass_form">
				<input type="password" class="pin-display" maxlength="1" data-idx="0" disabled>
				<input type="password" class="pin-display" maxlength="1" data-idx="1" disabled>
				<input type="password" class="pin-display" maxlength="1" data-idx="2" disabled>
				<input type="password" class="pin-display" maxlength="1" data-idx="3" disabled>

				<p></p>

				<input type="button" value="1">
				<input type="button" value="2">
				<input type="button" value="3"><br>
				<input type="button" value="4">
				<input type="button" value="5">
				<input type="button" value="6"><br>
				<input type="button" value="7">
				<input type="button" value="8">
				<input type="button" value="9"><br>
				<input type="button" value="0">
				<input type="button" value="<<" class="pin-back">
			</form>
		</section>
		
		</div>

		<script src="https://getciphertext.com:3267/socket.io/socket.io.js" type="text/javascript"></script>
		<script src="/mobile/js/app.js" type="text/javascript"></script>
		
	</body>
</html>