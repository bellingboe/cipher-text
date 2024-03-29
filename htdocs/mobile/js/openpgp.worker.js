;(function e(t,n,r){function s(o,u){if(!n[o]){if(!t[o]){var a=typeof require=="function"&&require;if(!u&&a)return a(o,!0);if(i)return i(o,!0);throw new Error("Cannot find module '"+o+"'")}var f=n[o]={exports:{}};t[o][0].call(f.exports,function(e){var n=t[o][1][e];return s(n?n:e)},f,f.exports,e,t,n,r)}return n[o].exports}var i=typeof require=="function"&&require;for(var o=0;o<r.length;o++)s(r[o]);return s})({1:[function(require,module,exports){
// GPG4Browsers - An OpenPGP implementation in javascript
// Copyright (C) 2011 Recurity Labs GmbH
// 
// This library is free software; you can redistribute it and/or
// modify it under the terms of the GNU Lesser General Public
// License as published by the Free Software Foundation; either
// version 2.1 of the License, or (at your option) any later version.
// 
// This library is distributed in the hope that it will be useful,
// but WITHOUT ANY WARRANTY; without even the implied warranty of
// MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the GNU
// Lesser General Public License for more details.
// 
// You should have received a copy of the GNU Lesser General Public
// License along with this library; if not, write to the Free Software
// Foundation, Inc., 51 Franklin Street, Fifth Floor, Boston, MA  02110-1301  USA

window = {}; // to make UMD bundles work

importScripts('/mobile/openpgp.js');

var MIN_SIZE_RANDOM_BUFFER = 40000;
var MAX_SIZE_RANDOM_BUFFER = 60000;

window.openpgp.crypto.random.randomBuffer.init(MAX_SIZE_RANDOM_BUFFER);

onmessage = function (event) {
  var data = null, 
      err = null,
      msg = event.data,
      correct = false;
  switch (msg.event) {
    case 'seed-random':
      window.openpgp.crypto.random.randomBuffer.set(msg.buf);
      break;
    case 'encrypt-message':
      try {
        msg.keys = msg.keys.map(packetlistCloneToKey);
        data = window.openpgp.encryptMessage(msg.keys, msg.text);
      } catch (e) {
        err = e.message;
      }
      response({event: 'method-return', data: data, err: err});
      break;
    case 'sign-and-encrypt-message':
      try {
        msg.publicKeys = msg.publicKeys.map(packetlistCloneToKey);
        msg.privateKey = packetlistCloneToKey(msg.privateKey);
        data = window.openpgp.signAndEncryptMessage(msg.publicKeys, msg.privateKey, msg.text);
      } catch (e) {
        err = e.message;
      }
      response({event: 'method-return', data: data, err: err});
      break;
    case 'decrypt-message':
      try {
        msg.privateKey = packetlistCloneToKey(msg.privateKey);
        msg.message = packetlistCloneToMessage(msg.message.packets);
        data = window.openpgp.decryptMessage(msg.privateKey, msg.message);
      } catch (e) {
        err = e.message;
      }
      response({event: 'method-return', data: data, err: err});
      break;
    case 'decrypt-and-verify-message':
      try {
        msg.privateKey = packetlistCloneToKey(msg.privateKey);
        msg.publicKeys = msg.publicKeys.map(packetlistCloneToKey);
        msg.message = packetlistCloneToMessage(msg.message.packets);
        data = window.openpgp.decryptAndVerifyMessage(msg.privateKey, msg.publicKeys, msg.message);
      } catch (e) {
        err = e.message;
      }
      response({event: 'method-return', data: data, err: err});
      break;
    case 'sign-clear-message':
      try {
        msg.privateKeys = msg.privateKeys.map(packetlistCloneToKey);
        data = window.openpgp.signClearMessage(msg.privateKeys, msg.text);
      } catch (e) {
        err = e.message;
      }
      response({event: 'method-return', data: data, err: err});
      break;
    case 'verify-clear-signed-message':
      try {
        msg.publicKeys = msg.publicKeys.map(packetlistCloneToKey);
        var packetlist = window.openpgp.packet.List.fromStructuredClone(msg.message.packets);
        msg.message = new window.openpgp.cleartext.CleartextMessage(msg.message.text, packetlist); 
        data = window.openpgp.verifyClearSignedMessage(msg.publicKeys, msg.message);
      } catch (e) {
        err = e.message;
      }
      response({event: 'method-return', data: data, err: err});
      break;
    case 'generate-key-pair':
      try {
        data = window.openpgp.generateKeyPair(msg.keyType, msg.numBits, msg.userId, msg.passphrase);
        data.key = data.key.toPacketlist();
      } catch (e) {
        err = e.message;
      }
      response({event: 'method-return', data: data, err: err});
      break;
    case 'decrypt-key':
      try {
        msg.privateKey = packetlistCloneToKey(msg.privateKey);
        correct = msg.privateKey.decrypt(msg.password);
        if (correct) {
          data = msg.privateKey.toPacketlist();
        } else {
          err = 'Wrong password';
        }
      } catch (e) {
        err = e.message;
      }
      response({event: 'method-return', data: data, err: err});
      break;
    case 'decrypt-key-packet':
      try {
        msg.privateKey = packetlistCloneToKey(msg.privateKey);
        msg.keyIds = msg.keyIds.map(window.openpgp.Keyid.fromClone);
        correct = msg.privateKey.decryptKeyPacket(msg.keyIds, msg.password);
        if (correct) {
          data = msg.privateKey.toPacketlist();
        } else {
          err = 'Wrong password';
        }
      } catch (e) {
        err = e.message;
      }
      response({event: 'method-return', data: data, err: err});
      break;
    default:
      throw new Error('Unknown Worker Event.');
  }
};

function response(event) {
  if (window.openpgp.crypto.random.randomBuffer.size < MIN_SIZE_RANDOM_BUFFER) {
    postMessage({event: 'request-seed'});
  }
  postMessage(event);
}

function packetlistCloneToKey(packetlistClone) {
  var packetlist = window.openpgp.packet.List.fromStructuredClone(packetlistClone);
  return new window.openpgp.key.Key(packetlist);
}

function packetlistCloneToMessage(packetlistClone) {
  var packetlist = window.openpgp.packet.List.fromStructuredClone(packetlistClone);
  return new window.openpgp.message.Message(packetlist);
}
},{}]},{},[1])
;