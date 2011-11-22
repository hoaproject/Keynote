if (!Function.prototype.bind) {
  Function.prototype.bind = function (oThis) {

    // closest thing possible to the ECMAScript 5 internal IsCallable
    // function
    if (typeof this !== "function")
    throw new TypeError(
      "Function.prototype.bind - what is trying to be fBound is not callable"
    );

    var aArgs = Array.prototype.slice.call(arguments, 1),
        fToBind = this,
        fNOP = function () {},
        fBound = function () {
          return fToBind.apply( this instanceof fNOP ? this : oThis || window,
                 aArgs.concat(Array.prototype.slice.call(arguments)));
        };

    fNOP.prototype = this.prototype;
    fBound.prototype = new fNOP();

    return fBound;
  };
}

var $ = (HTMLElement.prototype.$ = function(aQuery) {
  return this.querySelector(aQuery);
}).bind(document);

var Dz = {
  view: null,
  url: null,
  idx: 1,
  count: null,
  host: 'ws://127.0.0.1:8889'
};

Dz.init = function() {
  this.loadIframe();
  this.startSocket(this.host);
  this.loadNote();
}

/* Get url from hash or prompt and store it */

Dz.getUrl = function() {
  var u = window.location.hash.split("#")[1];
  if (!u) {
    u = window.prompt("What is the URL of the slides?");
    if (u) {
      window.location.hash = u.split("#")[0];
      return u;
    }
    u = "<style>body{background-color:white;color:black}</style>";
    u += "<strong>ERROR:</strong> No URL specified.<br>";
    u += "Try<em>: " + document.location + "#yourslides.html</em>";
    u = "data:text/html," + encodeURIComponent(u);
  }
  return u;
}

Dz.loadIframe = function() {
  var iframe = $("iframe");
  iframe.src = this.url = this.getUrl();
  iframe.onload = function() {
    Dz.view = this.contentWindow;
    Dz.postMsg(Dz.view, "REGISTER");
  }
}

Dz.toggleContent = function() {
  this.postMsg(this.view, "TOGGLE_CONTENT");
}

Dz.back = function() {
  this.postMsg(this.view, "BACK");
}

Dz.forward = function() {
  this.postMsg(this.view, "FORWARD");
}

Dz.goStart = function() {
  this.postMsg(this.view, "START");
}

Dz.goEnd = function() {
  this.postMsg(this.view, "END");
}

Dz.setCursor = function(aCursor) {
  this.postMsg(this.view, "SET_CURSOR", aCursor);
}

Dz.popup = function() {
  window.open(this.url + "#" + this.idx, '', 'width=800,height=600,personalbar=0,toolbar=0,scrollbars=1,resizable=1');
}

Dz.postMsg = function(aWin, aMsg) { // [arg0, [arg1...]]
  aMsg = [aMsg];
  for (var i = 2; i < arguments.length; i++)
    aMsg.push(encodeURIComponent(arguments[i]));
  aWin.postMessage(aMsg.join(" "), "*");
}

Dz.startSocket = function ( host ) {

  try {
    window.socket    = window.MozWebSocket || window.WebSocket;
    var socket       = new window.socket(host);
    socket.onopen    = function ( message ) {
      console.log('connected (' + host + ')');
      $('#connect').className = 'on';
      this.send('OPEN');
    }
    socket.onmessage = function ( message ) {
      var messages = message.data.split(',');
      switch(messages[0]) {
        case 'BACK':
          this.back();
          break;
        case 'FORWARD':
          this.forward();
          break;
        case 'START':
          this.goStart();
          break;
        case 'END':
          this.goEnd();
          break;
        case 'SET_CURSOR':
          this.setCursor(messages[1]);
          break;
      }
    }.bind(this);
    socket.onclose   = function ( message ) {
      console.log('close');
      $('#connect').className = 'off';
    }
  }
  catch ( e ) {
    console.log('*** ' + e);
  }
}

Dz.loadNote = function ( ) {

  var note = $('#note');
  var ls   = window.localStorage;
  var item = this.url;

  if(ls.getItem(item))
      note.value = ls.getItem(item);

  window.setInterval(function ( ) {

      ls.setItem(item, note.value);
  }, 1000);
}


window.onload = Dz.init.bind(Dz);
