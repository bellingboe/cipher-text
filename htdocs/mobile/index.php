<!DOCTYPE html>
<html>
<head>

    <script src="/mobile/js/jquery.js" type="text/javascript"></script>
    <script src="/mobile/js/aes.js" type="text/javascript"></script>
    <script src="/mobile/openpgp.js" type="text/javascript"></script>
    <script src="/mobile/js/jquery.touchSwipe.min.js" type="text/javascript"></script>
    <link href='//fonts.googleapis.com/css?family=Advent+Pro:400,500,600,700,300,200,100' rel='stylesheet' type='text/css'>
    <meta content="yes" name="apple-mobile-web-app-capable">
    <meta content="default" name="apple-mobile-web-app-status-bar-style">
    <meta content="user-scalable=no, width=device-width" name="viewport">
    <link href='/mobile/css/master.css' rel='stylesheet' type='text/css'>

    <title>Ciphertext</title>
</head>

<body>
    <div class="body">
	
        <a class="dotdotdot" href="javascript:void(0);">?</a>
	
	<!---
        ==========================================================
        Intro animation container [ #app_intro_load ]
        ==========================================================
        =-->
        <div class="fullpage invert full absolute" id="app_intro_load">
            <h1>Ciphertext</h1>
            <h2>Establishing Secure Coonnection.</h2>
        </div>
	
        <!---
        ==========================================================
        App Main Menu [ #app_page ]
        ==========================================================
        =-->
        <section class="hiding" id="app_page">
            <h1 class="appTitle">Ciphertext</h1>


            <p class="id-name hiding normal-center">
            </p>
            <input class="big-btn app-id-action" type="button" value=
            "Create Identity"> <input class="big-btn app-identity-data hiding"
            type="button" value="Identity Data"> <input class=
            "big-btn app-add-contact hiding" type="button" value="Add Contact">
            <input class="big-btn app-messages hiding" type="button" value=
            "Messages"> <input class="big-btn app-help" type="button" value=
            "Help">

            <p class="normal-center tutorial-message"><strong>Create your first
            Identity to start sending messages to other Identities.</strong>
            </p>
        </section>
	
        <!---
        ==========================================================
        List of Messages / Conversations [ #app_messages ]
        ==========================================================
        =-->
        <section class="hiding" id="app_messages">
            <p>Messages</p>
            <span class="normal-center">Tap a name to view conversation.</span>

            <ul class="app-message-list">
            </ul>
            <input class="big-btn app-close-messages" type="button" value=
            "Back">
        </section>
	
        <!---
        ==========================================================
        Add Contact Page [ #app_add_contact ]
        ==========================================================
        =-->
        <section class="hiding" id="app_add_contact">
            <p>Add Contact</p>
            <input class="big-btn txt arial add-contact-txt" type="text">
            <input class="big-btn app-save-contact" type="button" value=
            "Add Contact"> <input class="big-btn app-close-add-contact" type=
            "button" value="Back">
        </section>
	
        <!---
        ==========================================================
        Confirm Data Erase [ #app_confirm_erase ]
        ==========================================================
        =-->
        <section class="hiding" id="app_confirm_erase">
            <p class="red">CONFIRM</p>

            <p>Are you sure you want to clear ALL data? This cannot be
            undone.</p>
            <input class="big-btn app-clear-pin" type="button" value=
            "YES - Clear All Data"> <input class="big-btn app-close-erase"
            type="button" value="Nevermind, go back">
        </section>
	
        <!---
        ==========================================================
        Conversation View [ #app_conversation_view ]
        ==========================================================
        =-->
        <section class="hiding" id="app_conversation_view">
            <p>
            </p>

            <div class="app-messages-conversation-display">
            </div>
	    
            <input class="big-btn txt arial send-msg-txt" placeholder=
            "Enter a message..." type="text"> <input class=
            "big-btn app-send-msg" type="button" value="Send Message">
            <input class="big-btn app-close-conversation btn-link" type=
            "button" value="Back">
        </section>
	
        <!---
        ==========================================================
        Identity Data View [ #app_id_data ]
        ==========================================================
        =-->
        <section class="hiding" id="app_id_data">
            <p>Identity Data</p>


            <p class="mid-size go-left arial header-p">Your ID is: <span class=
            "bolder id-display"></span></p>


            <p class="mid-size go-left arial header-p">Created: <span class=
            "bolder id-created-date"></span></p>


            <p class="mid-size go-left arial header-p">Public Key:</p>

            <pre class="id-public-key" style="font-size:6pt;">
	    </pre>
	    
            <p>
		<input class="big-btn app-clear-pin-1" type="button" value="Clear All Data">
		<input class="big-btn app-close-id-data" type="button" value="Back">
		<input class="big-btn app-debug-selftest debug" type="button" value="[SOCKET DEBUG]">
        </section>
	
        <!---
        ==========================================================
        App Help View [ #app_help ]
        ==========================================================
        =-->
        <section class="hiding help-text" id="app_help">
            <h1 class="appTitle">Ciphertext Help</h1>


            <p>Ciphertext is a secure, anonymous chat and message service used
            for the sensitive andclassified transfer of information.</p>


            <p>You can create and destroy your chat conversations, and your
            <strong>identities</strong> at any time. An identity is simply a
            "user". You'll be given a random set of numbmers and letters - that
            serves as your username for that identity and is how people will
            contact you. Each identity comes with a 2048-bit PGP keypair
            generated <strong>on the device, and NEVER transferred outside the
            device itself.</strong></p>


            <p>When you add someone (or vice-versa) to your contacts, the
            server only acts as a transport of user public keys, never private
            keys. When someone sends you a message, they use their private key,
            and your puiblic key to encrypt the message that nobody else
            besides you two will ever be able to decrypt it.</p>


            <p>What makes <strong>Ciphertext</strong> secure and unique, is
            that the transfer of private keys, and passwords never happens.
            It's all client-based. We never know your PINs, or your keypair
            passwords.</p>
            <input class="big-btn app-close-help" type="button" value="Back">
        </section>
	
        <!---
        ==========================================================
        App Setup - Step 1 View [ #app_setup ]
        ==========================================================
        =-->
        <section class="hiding" id="app_setup">
            <p>Choose a Master PIN.</p>


            <form action="" class="pin-form" id="new_masterpass_form" method=
            "post" name="new_masterpass_form">
                <input class="pin-display" data-idx="0" disabled maxlength="1"
                type="password"> <input class="pin-display" data-idx="1"
                disabled maxlength="1" type="password"> <input class=
                "pin-display" data-idx="2" disabled maxlength="1" type=
                "password"> <input class="pin-display" data-idx="3" disabled
                maxlength="1" type="password">

                <p>
                </p>
                <input type="button" value="1"> <input type="button" value="2">
                <input type="button" value="3"><br>
                <input type="button" value="4"> <input type="button" value="5">
                <input type="button" value="6"><br>
                <input type="button" value="7"> <input type="button" value="8">
                <input type="button" value="9"><br>
                <input type="button" value="0"> <input class="pin-back" type=
                "button" value="&lt;&lt;">
            </form>
        </section>
	
        <!---
        ==========================================================
        App Setup - Step 2 View [ #app_setup2 ]
        ==========================================================
        =-->
        <section class="hiding" id="app_setup2">
            <p>Confirm your Master PIN.</p>


            <form action="" class="pin-form" id="new_masterpass_form2" method=
            "post" name="new_masterpass_form2">
                <input class="pin-display" data-idx="0" disabled maxlength="1"
                type="password"> <input class="pin-display" data-idx="1"
                disabled maxlength="1" type="password"> <input class=
                "pin-display" data-idx="2" disabled maxlength="1" type=
                "password"> <input class="pin-display" data-idx="3" disabled
                maxlength="1" type="password">

                <p>
                </p>
                <input type="button" value="1"> <input type="button" value="2">
                <input type="button" value="3"><br>
                <input type="button" value="4"> <input type="button" value="5">
                <input type="button" value="6"><br>
                <input type="button" value="7"> <input type="button" value="8">
                <input type="button" value="9"><br>
                <input type="button" value="0"> <input class="pin-back" type=
                "button" value="&lt;&lt;">
            </form>
        </section>
	
        <!---
        ==========================================================
        App Login View [ #app_login]
        ==========================================================
        =-->
        <section class="hiding" id="app_login">
            <p>Enter Your Master PIN.</p>


            <form action="" class="pin-form" id="login_masterpass_form" method=
            "post" name="login_masterpass_form">
                <input class="pin-display" data-idx="0" disabled maxlength="1"
                type="password"> <input class="pin-display" data-idx="1"
                disabled maxlength="1" type="password"> <input class=
                "pin-display" data-idx="2" disabled maxlength="1" type=
                "password"> <input class="pin-display" data-idx="3" disabled
                maxlength="1" type="password">

                <p>
                </p>
                <input type="button" value="1"> <input type="button" value="2">
                <input type="button" value="3"><br>
                <input type="button" value="4"> <input type="button" value="5">
                <input type="button" value="6"><br>
                <input type="button" value="7"> <input type="button" value="8">
                <input type="button" value="9"><br>
                <input type="button" value="0"> <input class="pin-back" type=
                "button" value="&lt;&lt;">
            </form>
        </section>
    </div>
    
    <script src="//getciphertext.com:3267/socket.io/socket.io.js" type="text/javascript"></script>
    <script src="/mobile/js/app.js" type="text/javascript"></script>
</body>
</html>