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
		<style>
			body {
				font-family: "Advent Pro";
			}
			* {
				box-sizing: border-box;
				-webkit-tap-highlight-color: rgba(0,0,0,0);
  				-webkit-tap-highlight-color: transparent; 
			}
			body, html {
				padding: 0;
				margin: 0;
				overflow: hidden;
			}
			h1 {
				padding: 0;
				margin: 0;
			}
			section {
				width: 100%;
				padding: 10px;
				position: absolute;
			}
			.appTitle {
				font-weight: 100;
				text-align: center;
				font-size:32pt;
				width: 100%;
			}
			.hiding {
				display: none;
			}
			section > p {
				font-weight: 600;
				text-align: center;
			}
			.pin-form input[type="text"], 
			.pin-form input[type="password"],
			.pin-form input[type="button"]
			{
				border: 1px solid;
				width: 15%;
				margin-left: 5%;
				height: 50px;
				font-size: 36pt;
				border-radius: 0;
				text-align: center;
			}
			.pin-form input[disabled] {
				background: #ffffff;
				color: #000000;
				border: 1px solid;
				margin-left: 6%;
				font-size:16pt;
			}
			.pin-form input[type="button"] {
				width: 33%;
				height: 100px;
				border-radius: 50px;
				font-weight:100; 
				background: #000000;
				color: #ffffff;
				margin:0;
				padding: 0;
				-webkit-appearance:none;
				float:left;
			}
			.pin-form input[type="button"]:active {
				color: #000000;
				background: #ffffff;
			}
			.big-btn {
				border: 0;
				width: 100%;
				padding: 15px;
				border-radius: 15px;
				border: 1px solid #000000;
				background: #ffffff;
				color: #000000;
				text-align: center;
				height: 70px;
				line-height: 45px;
				font-weight: 700;
				-webkit-appearance: none;
				margin-top:10px;
				clear:both;
				text-decoration: none;
				font-family: "Advent Pro";
				font-size: 14pt;
			}
			.big-btn:active {
				background: #000000;
				color: #ffffff;
			}
			.big-btn[type="text"]:active {
				background: #ffffff;
			}
			.big-btn[type="text"] {
				border: 1px solid grey;
				font-size: 16pt;
				color: grey !important /* ewwwww, I know... just for now*/
			}
			.big-btn[disabled] {
				opacity:0.4;
			}
			.normal-font p {
				font-family: Arial, sans-serif;
				text-align:left;
			}
			.normal-center {
				text-align:center;
				font-family: Arial;
				font-size: 16pt;
			}
            .red {
				color: red;
				font-weight: 700;
            }
			.arial {
				font-family: Arial;
			}
			.go-left {
				text-align: left;
			}
			.mid-size {
				font-size: 16pt;
			}
			.bolder {
				font-weight: bold;
			}
			.header-p span {
				color: grey;
			}
			.txt {
				height: 50px;
				border-radius: 0;
			}
			.app-message-list strong {
				font-weight: 600;
				font-size: 16pt;
			}
			.invert {
				background: black;
				color: white;
			}
			.full {
				width: 100%;
				height: 100%;
				margin: 0;
			}
			.absolute {
				top: 0;
				left: 0;
				right: 0;
				bottom:0;
				position: absolute;
				z-index: 999;
			}
			.fullpage h1 {
				width: 100%;
				padding: 0;
				text-align:center;
				height: 20%;
				margin-top: 40%;
				position: absolute;
				z-index: 999;
				font-weight: 100;
				font-size: 4em;
			}
			.fullpage h2 {
				width: 100%;
				padding: 0;
				text-align:center;
				height: 20%;
				margin-top: 60%;
				position: absolute;
				z-index: 999;
				font-weight: 400;
				font-size: 2em;
			}
			.body {
				display:block:
				bottom:0;
				overflow-x: hidden;
				overflow-y: auto;
				padding: 0;
				margin: 0;
				/*
				position: absolute;
				top: 0;
				left: 0;
				right: 0;
				bottom: 0;
				*/
			}
			.app-messages-conversation-display {
				height: 265px;
				display: block;
				clear: both;
				overflow-y: auto;
				border-top: 1px solid grey;
			}
			.btn-link {
				border: none;
			}
			.msg-item {
				margin-top: 10px;
			}
			.dotdotdot
			a.dotdotdot,
			a.dotdotdot:link,
			a.dotdotdot:visited {
				display: block;
				position: absolute;
				top: 5px;
				right: 5px;
				color: #6388B1;
				text-align: center;
				background: #FFF;
				line-height: 24px;
				width: 50px;
				height: 50px;
				border-radius: 25px;
				border: 3px solid #6388B1;
				font-weight: 700;
				font-size: 32pt;
				text-decoration: none;
				letter-spacing: -4px;
				z-index: 999;
			}
		</style>
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

<script src="https://getciphertext.com:3267/socket.io/socket.io.js"></script>
<script>
				var
				    socket = io('https://getciphertext.com:3267', {
				        secure: true,
				        'transports': ['websocket', 'xhr-polling']
				    }),
				    is_online = 0,
				    DEBUG_MODE = false;

				$(function() {

				    $(".dotdotdot").on("click", function(e) {
				        e.preventDefault();
				        var o = active_id_object();
				        alert("Your ID is: " + o.username);
				    });

				    var
				        pin_index = 0,
				        master_pin_string = "",
				        master_pin_string2 = "",
				        master_pin_entry = "";

				    window.ACTIVE_CHAT = false;

				    if (DEBUG_MODE) {
				        $(".debug").show();
				    } else {
				        $(".debug").remove();
				    }

				    var htmlEncode = function(str) {
				        return $('<div/>').text(str).html();
				    }

				    socket.on('verify-true', function(res) {
				        var id_obj = active_id_object();
				        var obj = res;
				        var name = obj.name;
				        var key = obj.key;
				        window.localStorage.setItem(name + "_key", key);
				        addMessage(name, null, id_obj.username);
				        socket.emit("send-user-verify", {
				            me: id_obj.username,
				            user: name
				        });
				        $(".add-contact-txt").val("");
				        openPage("#app_page", "left", "left");
				    });

				    socket.on('verify-false', function(res) {
				        $(".add-contact-txt").css({
				            border: "1px solid red"
				        }).val("");
				        alert("User ID not online.");
				    });

				    socket.on("added-by-user", function(who) {
				        var name = who.name;
				        addMessage(name, null, name);
				        alert("ID: " + name + " added you as a contact.");
				        window.localStorage.setItem(name + "_key", who.key);
				    });

				    socket.on("socket-test-msg", function(res) {
				        var msg = res.msg
				        alert(msg);
				    });
				    
				    socket.on("get-pub", function(res) {
					window.localStorage.setItem(res.name + "_key", res.pub);
				    });

				    socket.on('disconnect', function() {});

				    socket.on('rec-encrypted-message', function(p) {
					
				        var me = active_id_object();
				        var aes_key = window.openpgp.message.readArmored(p.ek);
				        var chat = null;
					
					if (window.ACTIVE_CHAT) {
						chat = window.ACTIVE_CHAT;
					} else {
						if (!getUserPublicKey(p.to[1])) {
							socket.emit("pub-get", {user: p.to[1]});
						}
						
						chat = {
							user: p.to[1],
							key: getUserPublicKey(p.to[1])
						};
					}

				        var
				            pub_key_obj = window.openpgp.key.readArmored(chat.key),
				            pub_key = pub_key_obj.keys[0],
				            my_pub_key_obj = window.openpgp.key.readArmored(me.key.pub),
				            my_pub_key = my_pub_key_obj.keys[0],
				            my_priv = me.unlocked_private_key;

				        var dec_msg_key = window.openpgp.decryptAndVerifyMessage(my_priv, [pub_key, my_pub_key], aes_key);

				        if ("undefined" !== typeof dec_msg_key.signatures && "undefined" !== typeof dec_msg_key.signatures[0]) {
				            if (dec_msg_key.signatures[0].hasOwnProperty("keyid")) {
				                sig_key_hex = dec_msg_key.signatures[0].keyid.toHex();
				            }
				        }

				        var dec_msg_text = unciph(dec_msg_key.text, p.et);
				        var msg_text = dec_msg_text;

				        if (p.f == me.username) {
				            var from = "<strong>" + p.f + " (You)</strong>:<br>";
				        } else {
				            var from = p.f + ":<br>"
				        }

				        dec_msg_text = "<div class='msg-item'>" + from + htmlEncode(dec_msg_text).replace("\n", "</div><div>") + "</div>";

				        var msg_item = $("<div>").attr("data-ts", p.ts).html(dec_msg_text);
				        var display = $(".app-messages-conversation-display").append(msg_item);

				        addMessage(chat.user, msg_text, p.f);

				        $(".app-messages-conversation-display").scrollTop($(".app-messages-conversation-display").prop('scrollHeight') + 999);
				    });

				    $("#app_setup")
				        .css({
				            top: parseInt($(window).height() + 1, 10)
				        });

				    $("#app_setup2")
				        .css({
				            top: parseInt($(window).height() + 1, 10)
				        });

				    $("#app_login")
				        .css({
				            top: parseInt($(window).height() + 1, 10)
				        });

				    var logOut = function() {
				        var storage_items = window.localStorage.length;
				        for (var i = 0; i < storage_items; i++) {
				            var storage_item_key = window.localStorage.key(storage_items[i]);
				            window.localStorage.removeItem(storage_item_key);
				        }
				        location.reload();
				    }; /* /logOut() */
				    
				    var getUserPublicKey = function(u){
					window.localStorage.getItem(u + "_key");
				    };

				    var openPage = function(id, new_up_down, old_up_down, cb) {
				        window.scrollTo(0, 0);

				        var old = $(".page-open");
				        var page = $(id);

				        if (old) {
				            switch (old_up_down) {
				                case "up":
				                    old.animate({
				                        top: -parseInt($(window).height() + 1, 10)
				                    }, {
				                        complete: function() {
				                            $(this).addClass("hiding").removeClass("page-open");
				                        }
				                    });
				                    break;
				                case "down":
				                    old.animate({
				                        top: parseInt($(window).height() + 1, 10)
				                    }, {
				                        complete: function() {
				                            $(this).addClass("hiding").removeClass("page-open");
				                        }
				                    });
				                    break;
				                case "left":
				                    old.animate({
				                        top: 0,
				                        left: -parseInt($(window).width(), 10)
				                    }, {
				                        complete: function() {
				                            $(this).addClass("hiding").removeClass("page-open");
				                        }
				                    });
				                    break;
				                case "right":
				                    old.animate({
				                        top: 0,
				                        left: parseInt($(window).width() * 2, 10)
				                    }, {
				                        complete: function() {
				                            $(this).addClass("hiding").removeClass("page-open");
				                        }
				                    });
				                    break;
				            }
				        }

				        switch (new_up_down) {
				            case "up":
				                page
				                    .css({
				                        top: parseInt($(window).height() + 1, 10)
				                    })
				                    .removeClass("hiding")
				                    .animate({
				                        top: 0
				                    }, {
				                        complete: function() {
				                            $(this).addClass("page-open");
				                            if ("function" === typeof cb) {
				                                cb();
				                            }
				                        }
				                    });
				                break;
				            case "down":
				                page
				                    .css({
				                        top: -parseInt($(window).height() + 1, 10)
				                    })
				                    .removeClass("hiding")
				                    .animate({
				                        top: 0
				                    }, {
				                        complete: function() {
				                            $(this).addClass("page-open");
				                            if ("function" === typeof cb) {
				                                cb();
				                            }
				                        }
				                    });
				                break;
				            case "left":
				                page
				                    .css({
				                        top: 0,
				                        left: parseInt($(window).width() * 2, 10)
				                    })
				                    .removeClass("hiding")
				                    .animate({
				                        top: 0,
				                        left: 0
				                    }, {
				                        complete: function() {
				                            $(this).addClass("page-open");
				                            if ("function" === typeof cb) {
				                                cb();
				                            }
				                        }
				                    });
				                break;
				            case "right":
				                page
				                    .css({
				                        top: 0,
				                        left: -parseInt($(window).width(), 10)
				                    })
				                    .removeClass("hiding")
				                    .animate({
				                        top: 0,
				                        left: 0
				                    }, {
				                        complete: function() {
				                            $(this).addClass("page-open");
				                            if ("function" === typeof cb) {
				                                cb();
				                            }
				                        }
				                    });
				                break;
				        }
				    }; /* /openPage() */

				    var setup_app_password = window.localStorage.getItem("ct_masterpass");

				    var get_master_pin = function() {
				        return window.localStorage.getItem("ct_masterpass");
				    }; /* /get_mesater_pin() */

				    var active_id_object = function() {
				        var enc_ident = window.localStorage.getItem("ct_id_obj");
				        if (!enc_ident) {
				            return false;
				        }
				        var identity = unciph(get_master_pin(), enc_ident);
				        var id_parsed = JSON.parse(identity);

				        var privateKey = openpgp.key.readArmored(id_parsed.key.priv).keys[0];
				        privateKey.decrypt(get_master_pin());
				        id_parsed.unlocked_private_key = privateKey;

				        return id_parsed;
				    }; /* /active_id_object */

				    window.active_id_object = active_id_object;

				    var getLocalMessages = function() {
				        return JSON.parse(window.localStorage.getItem("ct_msgs"));
				    }; /* /getLocalMessages() */

				    var placeIdentityIntoStorage = function(id) {
				        window.localStorage.setItem("ct_id_obj", id);
				    };

				    var generateNewIdentity = function() {
				        $(".app-id-action").attr("disabled", "disabled").val("Creating New Identity...");
				        $(".id-name").removeClass("hiding").css({
				            color: "grey"
				        }).html("Creating identity, please wait... ");

				        var new_id_str = random_string(5) + "-" + random_string(5);

				        var identity = {
				            username: new_id_str,
				            pgp_email: new_id_str + " <anon-" + new_id_str + "@getciphertext.com>"
				        };

				        window.openpgp.initWorker('openpgp.worker.js');
				        window.openpgp.generateKeyPair(1, 2048, identity.pgp_email, get_master_pin(), function(err, res) {
				            if (err) {
				                $(".id-name").removeClass("hiding").css({
				                    color: "red"
				                }).html("Error creating keypair: " + err);
				                return false;
				            }

				            var new_key_pair = res;

				            identity.key = {};
				            identity.key.pub = new_key_pair.publicKeyArmored;
				            identity.key.priv = new_key_pair.privateKeyArmored;
				            identity.key.raw = new_key_pair.key;

				            socket.emit('id-with-key', new_id_str, identity.key.pub);
				            ident_enc = ciph(get_master_pin(), JSON.stringify(identity));
				            placeIdentityIntoStorage(ident_enc);
				            refreshIdStatus();

				            return true;
				        });
				    }; /* /generateNewIdentity() */

				    var addMessage = function(n, m, f) {
				        var messages = getLocalMessages();
				        var myId = active_id_object();

				        if (!messages) {
				            messages = {};
				        }

				        if ("string" == typeof f && n !== myId.username) {
				            if (!messages[n]) {
				                messages[n] = {};
				                messages[n]["info"] = {
				                    "created": new Date().getTime()
				                }
				                messages[n]["m"] = new Array();
				            }

				            if (m && m.length > 0) {
				                var mo = {
				                    ts: new Date().getTime(),
				                    from: f == myId.username ? myId.username : f,
				                    msg: m
				                };

				                messages[n]["m"].push(mo);
				            }
				        }
					
				        window.localStorage.setItem("ct_msgs", JSON.stringify(messages));
				    }; /* /addMessage */

				    var loadMessageList = function() {
				        var messages = getLocalMessages();
				        $(".app-message-list").children().remove();
				        if (!messages || messages.length == 0) {
				            $(".app-message-list").append($("<li>").html("No messages."));
				        } else {
				            $(".app-message-list").children().remove();

				            var users = Object.keys(messages);
				            var i = 0;

				            for (var m in messages) {
				                var msg = messages[m];

				                var cur_user = users[i];
				                if (msg.hasOwnProperty("m")) {
				                    if (msg["m"].length == 0) {
				                        var has_msg = "Empty";
				                    } else {
				                        var has_msg = msg["m"].length + " msgs";
				                    }
				                }

				                $(".app-message-list")
				                    .append($("<li>")
				                        .addClass("app-open-conversation")
				                        .attr("data-user", cur_user)
				                        .html("<strong>" + cur_user + "</strong> &mdash; " + has_msg));

				                i++;
				            }

				        }
				    };

				    var refreshIdStatus = function() {
				        myId = active_id_object();

				        if (!myId) {
				            $(".app-id-action").removeAttr("disabled").attr("data-has-id", "0").val("Create First Identity");
				            $(".id-name").removeClass("hiding").html("Create an identity to get started.");
				        } else {
				            if (is_online == 0) {
				                socket.emit('id-with-key', myId.username, myId.key.pub);
				            }

				            $(".app-id-action").removeAttr("disabled").attr("data-has-id", "1").val("New Identity");
				            $(".id-name").removeClass("hiding").html("Your ID: " + myId.username);
				            $(".id-display").html(myId.username);
				            $(".app-messages").removeClass("hiding");
				            $(".app-identity-data").removeClass("hiding");
				            $(".app-add-contact").removeClass("hiding");

				            $(".tutorial-message").addClass("hiding");

				            $(".id-created-date").html(myId.unlocked_private_key.primaryKey.created);
				            $(".id-public-key").html(myId.key.pub);
				        }

				        is_online = 1;
				    };

				    refreshIdStatus();

				    $(".app-debug-selftest").on("click", function() {
				        var name = active_id_object().username;
				        socket.emit("socket-test", name);
				    });

				    $(".app-send-msg").on("click", function() {
				        var me = active_id_object();
				        var chat = window.ACTIVE_CHAT;

				        var
				            aesKey = random_string(32),
				            pub_key_obj = window.openpgp.key.readArmored(chat.key),
				            pub_key = pub_key_obj.keys[0],
				            my_pub_key_obj = window.openpgp.key.readArmored(me.key.pub),
				            my_pub_key = my_pub_key_obj.keys[0],
				            my_priv = me.unlocked_private_key,
				            enc_key,
				            enc_text,
				            txt = $(".send-msg-txt").val();


				        window.openpgp.initWorker('openpgp.worker.js');
				        window.openpgp.signAndEncryptMessage([pub_key, my_pub_key], my_priv, aesKey, function(err, res) {
				            if (err) {
				                alert("Encryption failed.");
				                console.log(err);
				                return false;
				            }

				            enc_key = res;
				            enc_text = ciph(aesKey, txt);

				            var msg_payload = {
				                to: [me.username, window.ACTIVE_CHAT.user],
				                ek: enc_key,
				                et: enc_text,
				                f: me.username,
				                ts: new Date().getTime()
				            };
				            socket.emit("send-encrypted-message", msg_payload);

				            $(".send-msg-txt").val('').focus();

				            return true;
				        });
				    });

				    $(".app-id-action").on("click", function() {
				        var has_id = $(this).attr("data-has-id") == "0" ? false : true;
				        if (has_id) {
				            var confirm_new = confirm("Are you sure? This will remove all data related to this identity and immediately create a new one.");
				            if (confirm_new) {
				                try {
				                    var storage_items = window.localStorage.length;
				                    for (var i = 0; i < storage_items; i++) {
				                        var storage_item_key = window.localStorage.key(storage_items[i]);
				                        window.localStorage.removeItem(storage_item_key);
				                    }

				                } catch (e) {
				                    console.log(e);
				                }
				                generateNewIdentity();
				            }
				        } else {
				            generateNewIdentity();
				        }
				    });

				    setTimeout(function() {
				        $("#app_intro_load").fadeOut({
				            duration: 1000,
				            queue: false
				        });

				        if (!setup_app_password) {
				            pin_index = 0;
				            $("#app_setup")
				                .css({
				                    display: "block"
				                })
				                .delay(500)
				                .animate({
				                    top: 0
				                });
				        } else {
				            pin_index = 0;
				            $("#app_login")
				                .css({
				                    display: "block"
				                })
				                .delay(500)
				                .animate({
				                    top: 0
				                });
				        }
				    }, 2000);

				    $(".app-save-contact").on("click", function() {
				        var name_to_check = $(".add-contact-txt").val();
				        var id_obj = active_id_object();

				        if (name_to_check == id_obj.username) {
				            alert("Cannot add yourself.");
				            return false;
				        }

				        socket.emit("verify-name", name_to_check);
				        return true;
				    });

				    $(".app-clear-pin-1").on("click", function() {
				        openPage("#app_confirm_erase", "left", "left");
				    });

				    $(".app-add-contact").on("click", function() {
				        openPage("#app_add_contact", "right", "right", function() {
				            $(".add-contact-txt").focus();
				        });
				    });

				    $(".app-close-add-contact").on("click", function() {
				        openPage("#app_page", "left", "left");
				    });

				    $(".app-clear-pin").on("click", function() {
				        logOut();
				    });

				    $(".app-exit").on("click", function() {
				        location.reload();
				    });

				    $(".app-help").on("click", function() {
				        openPage("#app_help", "up", "up");
				    });

				    $(".app-messages").on("click", function() {
				        loadMessageList();
				        openPage("#app_messages", "left", "left");
				    });

				    $(".app-close-help").on("click", function() {
				        openPage("#app_page", "down", "down");
				    });

				    $(".app-close-messages").on("click", function() {
				        openPage("#app_page", "right", "right");
				    });

				    $(".app-close-id-data").on("click", function() {
				        openPage("#app_page", "right", "right");
				    });

				    $(".app-identity-data").on("click", function() {
				        refreshIdStatus();
				        openPage("#app_id_data", "left", "left");
				    });

				    $(".app-close-erase").on("click", function() {
				        refreshIdStatus();
				        openPage("#app_id_data", "right", "right");
				    });

				    $(".app-close-conversation").on("click", function() {
				        loadMessageList();
				        openPage("#app_messages", "right", "right");
				        window.ACTIVE_CHAT = false;
				    });

				    $(".app-message-list").on("click", ".app-open-conversation", function() {
				        var user = $(this).attr("data-user");
				        $(".app-messages-conversation-display").html("");
				        openPage("#app_conversation_view", "left", "left", function() {
						var me =active_id_object();
						
						$("#app_conversation_view > p").html(user);
						
						var active_obj = {
							user: user,
							key: window.localStorage.getItem(user + "_key")
						};
						
						window.ACTIVE_CHAT = active_obj;
						
						var messages = JSON.parse(window.localStorage.getItem("ct_msgs"));

						if (messages[user]["m"]) {
							for(var i=0;i<messages[user]["m"].lemgth;i++) {
								var m = messages[user]["m"][i];
								
								if (m.from == me.username) {
								    var from = "<strong>" + m.from + " (You)</strong>:<br>";
								} else {
								    var from = m.from + ":<br>"
								}
			
								msg_text = "<div class='msg-item'>" + m.msg + htmlEncode(msg_text).replace("\n", "</div><div>") + "</div>";
								var msg_item = $("<div>").attr("data-ts", m.ts).html(msg_text);
								var display = $(".app-messages-conversation-display").append(msg_item);
								$(".app-messages-conversation-display").scrollTop($(".app-messages-conversation-display").prop('scrollHeight') + 9999);								
							}
						}
				        });
				    });

				    $("#login_masterpass_form input[type=button]")
				        .on("click", function() {
				            var which_pin = pin_index;
				            if ($(this).hasClass("pin-back")) {
				                $("#login_masterpass_form input[data-idx=" + (which_pin - 1) + "]").val('');
				                if (which_pin > 0) {
				                    pin_index = which_pin - 1;
				                }
				            } else {
				                var btn_val = $(this).val();
				                $("#login_masterpass_form input[data-idx=" + which_pin + "]").val(btn_val);
				                if (which_pin < 3) {
				                    pin_index = which_pin + 1;
				                } else {
				                    $("#login_masterpass_form .pin-display").each(function() {
				                        master_pin_entry = "" + master_pin_entry + "" + $(this).val();
				                    });

				                    if (master_pin_entry === setup_app_password) {
				                        $("#app_page").css({
				                            top: -parseInt($(window).height() + 1, 10)
				                        }).removeClass("hiding").animate({
				                            top: 0
				                        }).addClass("page-open");
				                        $("#app_login")
				                            .animate({
				                                top: parseInt($(window).height() + 1, 10)
				                            }, {
				                                complete: function() {
				                                    $(this).hide();
				                                }
				                            });
				                    } else {
				                        alert("Incorrect PIN. Try again.");
				                        $(".pin-display").val("");
				                        pin_index = 0;
				                        master_pin_entry = "";
				                    }
				                }
				            }
				        });

				    $("#new_masterpass_form input[type=button]")
				        .on("click", function() {
				            var which_pin = pin_index;
				            if ($(this).hasClass("pin-back")) {
				                $("#new_masterpass_form input[data-idx=" + (which_pin - 1) + "]").val('');
				                if (which_pin > 0) {
				                    pin_index = which_pin - 1;
				                }
				            } else {
				                var btn_val = $(this).val();
				                $("#new_masterpass_form input[data-idx=" + which_pin + "]").val(btn_val);
				                if (which_pin < 3) {
				                    pin_index = which_pin + 1;
				                } else {
				                    pin_index = 0;
				                    $("#new_masterpass_form .pin-display").each(function() {
				                        master_pin_string = "" + master_pin_string + "" + $(this).val();
				                    });
				                    $("#app_setup")
				                        .hide()
				                        .css({
				                            top: parseInt($(window).height() + 1, 10)
				                        });
				                    $("#app_setup2")
				                        .css({
				                            display: "block"
				                        })
				                        .animate({
				                            top: 0
				                        });
				                }
				            }
				        });

				    $("#new_masterpass_form2 input[type=button]")
				        .on("click", function() {
				            var which_pin = pin_index;
				            if ($(this).hasClass("pin-back")) {
				                $("#new_masterpass_form2  input[data-idx=" + (which_pin - 1) + "]").val('');
				                if (which_pin > 0) {
				                    pin_index = which_pin - 1;
				                }
				            } else {
				                var btn_val = $(this).val();
				                $("#new_masterpass_form2  input[data-idx=" + which_pin + "]").val(btn_val);
				                if (which_pin < 3) {
				                    pin_index = which_pin + 1;
				                } else {
				                    $("#new_masterpass_form2 .pin-display").each(function() {
				                        master_pin_string2 = "" + master_pin_string2 + "" + $(this).val();
				                    });

				                    if (master_pin_string === master_pin_string2) {
				                        window.localStorage.setItem("ct_masterpass", master_pin_string2);
				                        $("#app_page").css({
				                            top: -parseInt($(window).height() + 1, 10)
				                        }).removeClass("hiding").animate({
				                            top: 0
				                        }).addClass("page-open");
				                        $("#app_setup2")
				                            .animate({
				                                top: parseInt($(window).height() + 1, 10)
				                            }, {
				                                complete: function() {
				                                    $("#app_setup2").hide();
				                                }
				                            });
				                    } else {
				                        alert("PINs don't match. Try again.");
				                        $(".pin-display").val("");
				                        pin_index = 0;
				                        master_pin_string = "";
				                        master_pin_string2 = "";
				                        $("#app_setup2")
				                            .hide()
				                            .css({
				                                top: parseInt($(window).height() + 1, 10)
				                            });
				                        $("#app_setup")
				                            .css({
				                                display: "block"
				                            })
				                            .animate({
				                                top: 0
				                            });
				                    }
				                }
				            }
				        });

				    $("#new_masterpass_form")
				        .on("submit", function() {
				            return false;
				        });

				    $("#login_masterpass_form")
				        .on("submit", function() {
				            return false;
				        });
				});
		</script>
	</body>
</html>