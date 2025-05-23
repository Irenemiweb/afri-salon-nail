/*!
 * Pusher JavaScript Library v7.2.0
 * https://pusher.com/
 *
 * Copyright 2020, Pusher
 * Released under the MIT licence.
 */
!function(t, e) {
    "object" == typeof exports && "object" == typeof module ? module.exports = e() : "function" == typeof define && define.amd ? define([], e) : "object" == typeof exports ? exports.Pusher = e() : t.Pusher = e()
}(window, (function() {
    return function(t) {
        var e = {};
        function n(r) {
            if (e[r])
                return e[r].exports;
            var o = e[r] = {
                i: r,
                l: !1,
                exports: {}
            };
            return t[r].call(o.exports, o, o.exports, n),
            o.l = !0,
            o.exports
        }
        return n.m = t,
        n.c = e,
        n.d = function(t, e, r) {
            n.o(t, e) || Object.defineProperty(t, e, {
                enumerable: !0,
                get: r
            })
        }
        ,
        n.r = function(t) {
            "undefined" != typeof Symbol && Symbol.toStringTag && Object.defineProperty(t, Symbol.toStringTag, {
                value: "Module"
            }),
            Object.defineProperty(t, "__esModule", {
                value: !0
            })
        }
        ,
        n.t = function(t, e) {
            if (1 & e && (t = n(t)),
            8 & e)
                return t;
            if (4 & e && "object" == typeof t && t && t.__esModule)
                return t;
            var r = Object.create(null);
            if (n.r(r),
            Object.defineProperty(r, "default", {
                enumerable: !0,
                value: t
            }),
            2 & e && "string" != typeof t)
                for (var o in t)
                    n.d(r, o, function(e) {
                        return t[e]
                    }
                    .bind(null, o));
            return r
        }
        ,
        n.n = function(t) {
            var e = t && t.__esModule ? function() {
                return t.default
            }
            : function() {
                return t
            }
            ;
            return n.d(e, "a", e),
            e
        }
        ,
        n.o = function(t, e) {
            return Object.prototype.hasOwnProperty.call(t, e)
        }
        ,
        n.p = "",
        n(n.s = 2)
    }([function(t, e, n) {
        "use strict";
        var r, o = this && this.__extends || (r = function(t, e) {
            return (r = Object.setPrototypeOf || {
                __proto__: []
            }instanceof Array && function(t, e) {
                t.__proto__ = e
            }
            || function(t, e) {
                for (var n in e)
                    e.hasOwnProperty(n) && (t[n] = e[n])
            }
            )(t, e)
        }
        ,
        function(t, e) {
            function n() {
                this.constructor = t
            }
            r(t, e),
            t.prototype = null === e ? Object.create(e) : (n.prototype = e.prototype,
            new n)
        }
        );
        Object.defineProperty(e, "__esModule", {
            value: !0
        });
        var i = function() {
            function t(t) {
                void 0 === t && (t = "="),
                this._paddingCharacter = t
            }
            return t.prototype.encodedLength = function(t) {
                return this._paddingCharacter ? (t + 2) / 3 * 4 | 0 : (8 * t + 5) / 6 | 0
            }
            ,
            t.prototype.encode = function(t) {
                for (var e = "", n = 0; n < t.length - 2; n += 3) {
                    var r = t[n] << 16 | t[n + 1] << 8 | t[n + 2];
                    e += this._encodeByte(r >>> 18 & 63),
                    e += this._encodeByte(r >>> 12 & 63),
                    e += this._encodeByte(r >>> 6 & 63),
                    e += this._encodeByte(r >>> 0 & 63)
                }
                var o = t.length - n;
                if (o > 0) {
                    r = t[n] << 16 | (2 === o ? t[n + 1] << 8 : 0);
                    e += this._encodeByte(r >>> 18 & 63),
                    e += this._encodeByte(r >>> 12 & 63),
                    e += 2 === o ? this._encodeByte(r >>> 6 & 63) : this._paddingCharacter || "",
                    e += this._paddingCharacter || ""
                }
                return e
            }
            ,
            t.prototype.maxDecodedLength = function(t) {
                return this._paddingCharacter ? t / 4 * 3 | 0 : (6 * t + 7) / 8 | 0
            }
            ,
            t.prototype.decodedLength = function(t) {
                return this.maxDecodedLength(t.length - this._getPaddingLength(t))
            }
            ,
            t.prototype.decode = function(t) {
                if (0 === t.length)
                    return new Uint8Array(0);
                for (var e = this._getPaddingLength(t), n = t.length - e, r = new Uint8Array(this.maxDecodedLength(n)), o = 0, i = 0, s = 0, c = 0, a = 0, u = 0, h = 0; i < n - 4; i += 4)
                    c = this._decodeChar(t.charCodeAt(i + 0)),
                    a = this._decodeChar(t.charCodeAt(i + 1)),
                    u = this._decodeChar(t.charCodeAt(i + 2)),
                    h = this._decodeChar(t.charCodeAt(i + 3)),
                    r[o++] = c << 2 | a >>> 4,
                    r[o++] = a << 4 | u >>> 2,
                    r[o++] = u << 6 | h,
                    s |= 256 & c,
                    s |= 256 & a,
                    s |= 256 & u,
                    s |= 256 & h;
                if (i < n - 1 && (c = this._decodeChar(t.charCodeAt(i)),
                a = this._decodeChar(t.charCodeAt(i + 1)),
                r[o++] = c << 2 | a >>> 4,
                s |= 256 & c,
                s |= 256 & a),
                i < n - 2 && (u = this._decodeChar(t.charCodeAt(i + 2)),
                r[o++] = a << 4 | u >>> 2,
                s |= 256 & u),
                i < n - 3 && (h = this._decodeChar(t.charCodeAt(i + 3)),
                r[o++] = u << 6 | h,
                s |= 256 & h),
                0 !== s)
                    throw new Error("Base64Coder: incorrect characters for decoding");
                return r
            }
            ,
            t.prototype._encodeByte = function(t) {
                var e = t;
                return e += 65,
                e += 25 - t >>> 8 & 6,
                e += 51 - t >>> 8 & -75,
                e += 61 - t >>> 8 & -15,
                e += 62 - t >>> 8 & 3,
                String.fromCharCode(e)
            }
            ,
            t.prototype._decodeChar = function(t) {
                var e = 256;
                return e += (42 - t & t - 44) >>> 8 & -256 + t - 43 + 62,
                e += (46 - t & t - 48) >>> 8 & -256 + t - 47 + 63,
                e += (47 - t & t - 58) >>> 8 & -256 + t - 48 + 52,
                e += (64 - t & t - 91) >>> 8 & -256 + t - 65 + 0,
                e += (96 - t & t - 123) >>> 8 & -256 + t - 97 + 26
            }
            ,
            t.prototype._getPaddingLength = function(t) {
                var e = 0;
                if (this._paddingCharacter) {
                    for (var n = t.length - 1; n >= 0 && t[n] === this._paddingCharacter; n--)
                        e++;
                    if (t.length < 4 || e > 2)
                        throw new Error("Base64Coder: incorrect padding")
                }
                return e
            }
            ,
            t
        }();
        e.Coder = i;
        var s = new i;
        e.encode = function(t) {
            return s.encode(t)
        }
        ,
        e.decode = function(t) {
            return s.decode(t)
        }
        ;
        var c = function(t) {
            function e() {
                return null !== t && t.apply(this, arguments) || this
            }
            return o(e, t),
            e.prototype._encodeByte = function(t) {
                var e = t;
                return e += 65,
                e += 25 - t >>> 8 & 6,
                e += 51 - t >>> 8 & -75,
                e += 61 - t >>> 8 & -13,
                e += 62 - t >>> 8 & 49,
                String.fromCharCode(e)
            }
            ,
            e.prototype._decodeChar = function(t) {
                var e = 256;
                return e += (44 - t & t - 46) >>> 8 & -256 + t - 45 + 62,
                e += (94 - t & t - 96) >>> 8 & -256 + t - 95 + 63,
                e += (47 - t & t - 58) >>> 8 & -256 + t - 48 + 52,
                e += (64 - t & t - 91) >>> 8 & -256 + t - 65 + 0,
                e += (96 - t & t - 123) >>> 8 & -256 + t - 97 + 26
            }
            ,
            e
        }(i);
        e.URLSafeCoder = c;
        var a = new c;
        e.encodeURLSafe = function(t) {
            return a.encode(t)
        }
        ,
        e.decodeURLSafe = function(t) {
            return a.decode(t)
        }
        ,
        e.encodedLength = function(t) {
            return s.encodedLength(t)
        }
        ,
        e.maxDecodedLength = function(t) {
            return s.maxDecodedLength(t)
        }
        ,
        e.decodedLength = function(t) {
            return s.decodedLength(t)
        }
    }
    , function(t, e, n) {
        "use strict";
        Object.defineProperty(e, "__esModule", {
            value: !0
        });
        var r = "utf8: invalid source encoding";
        function o(t) {
            for (var e = 0, n = 0; n < t.length; n++) {
                var r = t.charCodeAt(n);
                if (r < 128)
                    e += 1;
                else if (r < 2048)
                    e += 2;
                else if (r < 55296)
                    e += 3;
                else {
                    if (!(r <= 57343))
                        throw new Error("utf8: invalid string");
                    if (n >= t.length - 1)
                        throw new Error("utf8: invalid string");
                    n++,
                    e += 4
                }
            }
            return e
        }
        e.encode = function(t) {
            for (var e = new Uint8Array(o(t)), n = 0, r = 0; r < t.length; r++) {
                var i = t.charCodeAt(r);
                i < 128 ? e[n++] = i : i < 2048 ? (e[n++] = 192 | i >> 6,
                e[n++] = 128 | 63 & i) : i < 55296 ? (e[n++] = 224 | i >> 12,
                e[n++] = 128 | i >> 6 & 63,
                e[n++] = 128 | 63 & i) : (r++,
                i = (1023 & i) << 10,
                i |= 1023 & t.charCodeAt(r),
                i += 65536,
                e[n++] = 240 | i >> 18,
                e[n++] = 128 | i >> 12 & 63,
                e[n++] = 128 | i >> 6 & 63,
                e[n++] = 128 | 63 & i)
            }
            return e
        }
        ,
        e.encodedLength = o,
        e.decode = function(t) {
            for (var e = [], n = 0; n < t.length; n++) {
                var o = t[n];
                if (128 & o) {
                    var i = void 0;
                    if (o < 224) {
                        if (n >= t.length)
                            throw new Error(r);
                        if (128 != (192 & (s = t[++n])))
                            throw new Error(r);
                        o = (31 & o) << 6 | 63 & s,
                        i = 128
                    } else if (o < 240) {
                        if (n >= t.length - 1)
                            throw new Error(r);
                        var s = t[++n]
                          , c = t[++n];
                        if (128 != (192 & s) || 128 != (192 & c))
                            throw new Error(r);
                        o = (15 & o) << 12 | (63 & s) << 6 | 63 & c,
                        i = 2048
                    } else {
                        if (!(o < 248))
                            throw new Error(r);
                        if (n >= t.length - 2)
                            throw new Error(r);
                        s = t[++n],
                        c = t[++n];
                        var a = t[++n];
                        if (128 != (192 & s) || 128 != (192 & c) || 128 != (192 & a))
                            throw new Error(r);
                        o = (15 & o) << 18 | (63 & s) << 12 | (63 & c) << 6 | 63 & a,
                        i = 65536
                    }
                    if (o < i || o >= 55296 && o <= 57343)
                        throw new Error(r);
                    if (o >= 65536) {
                        if (o > 1114111)
                            throw new Error(r);
                        o -= 65536,
                        e.push(String.fromCharCode(55296 | o >> 10)),
                        o = 56320 | 1023 & o
                    }
                }
                e.push(String.fromCharCode(o))
            }
            return e.join("")
        }
    }
    , function(t, e, n) {
        t.exports = n(3).default
    }
    , function(t, e, n) {
        "use strict";
        n.r(e);
        var r, o = function() {
            function t(t, e) {
                this.lastId = 0,
                this.prefix = t,
                this.name = e
            }
            return t.prototype.create = function(t) {
                this.lastId++;
                var e = this.lastId
                  , n = this.prefix + e
                  , r = this.name + "[" + e + "]"
                  , o = !1
                  , i = function() {
                    o || (t.apply(null, arguments),
                    o = !0)
                };
                return this[e] = i,
                {
                    number: e,
                    id: n,
                    name: r,
                    callback: i
                }
            }
            ,
            t.prototype.remove = function(t) {
                delete this[t.number]
            }
            ,
            t
        }(), i = new o("_pusher_script_","Pusher.ScriptReceivers"), s = {
            VERSION: "7.2.0",
            PROTOCOL: 7,
            wsPort: 80,
            wssPort: 443,
            wsPath: "",
            httpHost: "sockjs.pusher.com",
            httpPort: 80,
            httpsPort: 443,
            httpPath: "/pusher",
            stats_host: "stats.pusher.com",
            authEndpoint: "/pusher/auth",
            authTransport: "ajax",
            activityTimeout: 12e4,
            pongTimeout: 3e4,
            unavailableTimeout: 1e4,
            cluster: "mt1",
            userAuthentication: {
                endpoint: "/pusher/user-auth",
                transport: "ajax"
            },
            channelAuthorization: {
                endpoint: "/pusher/auth",
                transport: "ajax"
            },
            cdn_http: "http://js.pusher.com",
            cdn_https: "https://js.pusher.com",
            dependency_suffix: ""
        }, c = function() {
            function t(t) {
                this.options = t,
                this.receivers = t.receivers || i,
                this.loading = {}
            }
            return t.prototype.load = function(t, e, n) {
                var r = this;
                if (r.loading[t] && r.loading[t].length > 0)
                    r.loading[t].push(n);
                else {
                    r.loading[t] = [n];
                    var o = Se.createScriptRequest(r.getPath(t, e))
                      , i = r.receivers.create((function(e) {
                        if (r.receivers.remove(i),
                        r.loading[t]) {
                            var n = r.loading[t];
                            delete r.loading[t];
                            for (var s = function(t) {
                                t || o.cleanup()
                            }, c = 0; c < n.length; c++)
                                n[c](e, s)
                        }
                    }
                    ));
                    o.send(i)
                }
            }
            ,
            t.prototype.getRoot = function(t) {
                var e = Se.getDocument().location.protocol;
                return (t && t.useTLS || "https:" === e ? this.options.cdn_https : this.options.cdn_http).replace(/\/*$/, "") + "/" + this.options.version
            }
            ,
            t.prototype.getPath = function(t, e) {
                return this.getRoot(e) + "/" + t + this.options.suffix + ".js"
            }
            ,
            t
        }(), a = new o("_pusher_dependencies","Pusher.DependenciesReceivers"), u = new c({
            cdn_http: s.cdn_http,
            cdn_https: s.cdn_https,
            version: s.VERSION,
            suffix: s.dependency_suffix,
            receivers: a
        }), h = {
            baseUrl: "https://pusher.com",
            urls: {
                authenticationEndpoint: {
                    path: "/docs/channels/server_api/authenticating_users"
                },
                authorizationEndpoint: {
                    path: "/docs/channels/server_api/authorizing-users/"
                },
                javascriptQuickStart: {
                    path: "/docs/javascript_quick_start"
                },
                triggeringClientEvents: {
                    path: "/docs/client_api_guide/client_events#trigger-events"
                },
                encryptedChannelSupport: {
                    fullUrl: "https://github.com/pusher/pusher-js/tree/cc491015371a4bde5743d1c87a0fbac0feb53195#encrypted-channel-support"
                }
            }
        }, p = function(t) {
            var e, n = h.urls[t];
            return n ? (n.fullUrl ? e = n.fullUrl : n.path && (e = h.baseUrl + n.path),
            e ? "See: " + e : "") : ""
        };
        !function(t) {
            t.UserAuthentication = "user-authentication",
            t.ChannelAuthorization = "channel-authorization"
        }(r || (r = {}));
        var l, f = (l = function(t, e) {
            return (l = Object.setPrototypeOf || {
                __proto__: []
            }instanceof Array && function(t, e) {
                t.__proto__ = e
            }
            || function(t, e) {
                for (var n in e)
                    e.hasOwnProperty(n) && (t[n] = e[n])
            }
            )(t, e)
        }
        ,
        function(t, e) {
            function n() {
                this.constructor = t
            }
            l(t, e),
            t.prototype = null === e ? Object.create(e) : (n.prototype = e.prototype,
            new n)
        }
        ), d = function(t) {
            function e(e) {
                var n = this.constructor
                  , r = t.call(this, e) || this;
                return Object.setPrototypeOf(r, n.prototype),
                r
            }
            return f(e, t),
            e
        }(Error), y = function(t) {
            function e(e) {
                var n = this.constructor
                  , r = t.call(this, e) || this;
                return Object.setPrototypeOf(r, n.prototype),
                r
            }
            return f(e, t),
            e
        }(Error), g = function(t) {
            function e(e) {
                var n = this.constructor
                  , r = t.call(this, e) || this;
                return Object.setPrototypeOf(r, n.prototype),
                r
            }
            return f(e, t),
            e
        }(Error), v = function(t) {
            function e(e) {
                var n = this.constructor
                  , r = t.call(this, e) || this;
                return Object.setPrototypeOf(r, n.prototype),
                r
            }
            return f(e, t),
            e
        }(Error), b = function(t) {
            function e(e) {
                var n = this.constructor
                  , r = t.call(this, e) || this;
                return Object.setPrototypeOf(r, n.prototype),
                r
            }
            return f(e, t),
            e
        }(Error), m = function(t) {
            function e(e) {
                var n = this.constructor
                  , r = t.call(this, e) || this;
                return Object.setPrototypeOf(r, n.prototype),
                r
            }
            return f(e, t),
            e
        }(Error), _ = function(t) {
            function e(e) {
                var n = this.constructor
                  , r = t.call(this, e) || this;
                return Object.setPrototypeOf(r, n.prototype),
                r
            }
            return f(e, t),
            e
        }(Error), w = function(t) {
            function e(e) {
                var n = this.constructor
                  , r = t.call(this, e) || this;
                return Object.setPrototypeOf(r, n.prototype),
                r
            }
            return f(e, t),
            e
        }(Error), S = function(t) {
            function e(e, n) {
                var r = this.constructor
                  , o = t.call(this, n) || this;
                return o.status = e,
                Object.setPrototypeOf(o, r.prototype),
                o
            }
            return f(e, t),
            e
        }(Error), k = function(t, e, n, o, i) {
            var s = Se.createXHR();
            for (var c in s.open("POST", n.endpoint, !0),
            s.setRequestHeader("Content-Type", "application/x-www-form-urlencoded"),
            n.headers)
                s.setRequestHeader(c, n.headers[c]);
            return s.onreadystatechange = function() {
                if (4 === s.readyState)
                    if (200 === s.status) {
                        var t = void 0
                          , e = !1;
                        try {
                            t = JSON.parse(s.responseText),
                            e = !0
                        } catch (t) {
                            i(new S(200,"JSON returned from " + o.toString() + " endpoint was invalid, yet status code was 200. Data was: " + s.responseText), null)
                        }
                        e && i(null, t)
                    } else {
                        var c = "";
                        switch (o) {
                        case r.UserAuthentication:
                            c = p("authenticationEndpoint");
                            break;
                        case r.ChannelAuthorization:
                            c = "Clients must be authenticated to join private or presence channels. " + p("authorizationEndpoint")
                        }
                        i(new S(s.status,"Unable to retrieve auth string from " + o.toString() + " endpoint - received status: " + s.status + " from " + n.endpoint + ". " + c), null)
                    }
            }
            ,
            s.send(e),
            s
        };
        for (var C = String.fromCharCode, T = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789+/", P = {}, O = 0, E = T.length; O < E; O++)
            P[T.charAt(O)] = O;
        var A = function(t) {
            var e = t.charCodeAt(0);
            return e < 128 ? t : e < 2048 ? C(192 | e >>> 6) + C(128 | 63 & e) : C(224 | e >>> 12 & 15) + C(128 | e >>> 6 & 63) + C(128 | 63 & e)
        }
          , L = function(t) {
            return t.replace(/[^\x00-\x7F]/g, A)
        }
          , x = function(t) {
            var e = [0, 2, 1][t.length % 3]
              , n = t.charCodeAt(0) << 16 | (t.length > 1 ? t.charCodeAt(1) : 0) << 8 | (t.length > 2 ? t.charCodeAt(2) : 0);
            return [T.charAt(n >>> 18), T.charAt(n >>> 12 & 63), e >= 2 ? "=" : T.charAt(n >>> 6 & 63), e >= 1 ? "=" : T.charAt(63 & n)].join("")
        }
          , R = window.btoa || function(t) {
            return t.replace(/[\s\S]{1,3}/g, x)
        }
          , j = function() {
            function t(t, e, n, r) {
                var o = this;
                this.clear = e,
                this.timer = t((function() {
                    o.timer && (o.timer = r(o.timer))
                }
                ), n)
            }
            return t.prototype.isRunning = function() {
                return null !== this.timer
            }
            ,
            t.prototype.ensureAborted = function() {
                this.timer && (this.clear(this.timer),
                this.timer = null)
            }
            ,
            t
        }()
          , I = function() {
            var t = function(e, n) {
                return (t = Object.setPrototypeOf || {
                    __proto__: []
                }instanceof Array && function(t, e) {
                    t.__proto__ = e
                }
                || function(t, e) {
                    for (var n in e)
                        e.hasOwnProperty(n) && (t[n] = e[n])
                }
                )(e, n)
            };
            return function(e, n) {
                function r() {
                    this.constructor = e
                }
                t(e, n),
                e.prototype = null === n ? Object.create(n) : (r.prototype = n.prototype,
                new r)
            }
        }();
        function D(t) {
            window.clearTimeout(t)
        }
        function N(t) {
            window.clearInterval(t)
        }
        var H = function(t) {
            function e(e, n) {
                return t.call(this, setTimeout, D, e, (function(t) {
                    return n(),
                    null
                }
                )) || this
            }
            return I(e, t),
            e
        }(j)
          , M = function(t) {
            function e(e, n) {
                return t.call(this, setInterval, N, e, (function(t) {
                    return n(),
                    t
                }
                )) || this
            }
            return I(e, t),
            e
        }(j)
          , U = {
            now: function() {
                return Date.now ? Date.now() : (new Date).valueOf()
            },
            defer: function(t) {
                return new H(0,t)
            },
            method: function(t) {
                for (var e = [], n = 1; n < arguments.length; n++)
                    e[n - 1] = arguments[n];
                var r = Array.prototype.slice.call(arguments, 1);
                return function(e) {
                    return e[t].apply(e, r.concat(arguments))
                }
            }
        };
        function z(t) {
            for (var e = [], n = 1; n < arguments.length; n++)
                e[n - 1] = arguments[n];
            for (var r = 0; r < e.length; r++) {
                var o = e[r];
                for (var i in o)
                    o[i] && o[i].constructor && o[i].constructor === Object ? t[i] = z(t[i] || {}, o[i]) : t[i] = o[i]
            }
            return t
        }
        function q() {
            for (var t = ["Pusher"], e = 0; e < arguments.length; e++)
                "string" == typeof arguments[e] ? t.push(arguments[e]) : t.push(K(arguments[e]));
            return t.join(" : ")
        }
        function B(t, e) {
            var n = Array.prototype.indexOf;
            if (null === t)
                return -1;
            if (n && t.indexOf === n)
                return t.indexOf(e);
            for (var r = 0, o = t.length; r < o; r++)
                if (t[r] === e)
                    return r;
            return -1
        }
        function F(t, e) {
            for (var n in t)
                Object.prototype.hasOwnProperty.call(t, n) && e(t[n], n, t)
        }
        function X(t) {
            var e = [];
            return F(t, (function(t, n) {
                e.push(n)
            }
            )),
            e
        }
        function J(t, e, n) {
            for (var r = 0; r < t.length; r++)
                e.call(n || window, t[r], r, t)
        }
        function W(t, e) {
            for (var n = [], r = 0; r < t.length; r++)
                n.push(e(t[r], r, t, n));
            return n
        }
        function G(t, e) {
            e = e || function(t) {
                return !!t
            }
            ;
            for (var n = [], r = 0; r < t.length; r++)
                e(t[r], r, t, n) && n.push(t[r]);
            return n
        }
        function V(t, e) {
            var n = {};
            return F(t, (function(r, o) {
                (e && e(r, o, t, n) || Boolean(r)) && (n[o] = r)
            }
            )),
            n
        }
        function Q(t, e) {
            for (var n = 0; n < t.length; n++)
                if (e(t[n], n, t))
                    return !0;
            return !1
        }
        function Y(t) {
            return e = function(t) {
                return "object" == typeof t && (t = K(t)),
                encodeURIComponent((e = t.toString(),
                R(L(e))));
                var e
            }
            ,
            n = {},
            F(t, (function(t, r) {
                n[r] = e(t)
            }
            )),
            n;
            var e, n
        }
        function $(t) {
            var e, n, r = V(t, (function(t) {
                return void 0 !== t
            }
            ));
            return W((e = Y(r),
            n = [],
            F(e, (function(t, e) {
                n.push([e, t])
            }
            )),
            n), U.method("join", "=")).join("&")
        }
        function K(t) {
            try {
                return JSON.stringify(t)
            } catch (r) {
                return JSON.stringify((e = [],
                n = [],
                function t(r, o) {
                    var i, s, c;
                    switch (typeof r) {
                    case "object":
                        if (!r)
                            return null;
                        for (i = 0; i < e.length; i += 1)
                            if (e[i] === r)
                                return {
                                    $ref: n[i]
                                };
                        if (e.push(r),
                        n.push(o),
                        "[object Array]" === Object.prototype.toString.apply(r))
                            for (c = [],
                            i = 0; i < r.length; i += 1)
                                c[i] = t(r[i], o + "[" + i + "]");
                        else
                            for (s in c = {},
                            r)
                                Object.prototype.hasOwnProperty.call(r, s) && (c[s] = t(r[s], o + "[" + JSON.stringify(s) + "]"));
                        return c;
                    case "number":
                    case "string":
                    case "boolean":
                        return r
                    }
                }(t, "$")))
            }
            var e, n
        }
        var Z = new (function() {
            function t() {
                this.globalLog = function(t) {
                    window.console && window.console.log && window.console.log(t)
                }
            }
            return t.prototype.debug = function() {
                for (var t = [], e = 0; e < arguments.length; e++)
                    t[e] = arguments[e];
                this.log(this.globalLog, t)
            }
            ,
            t.prototype.warn = function() {
                for (var t = [], e = 0; e < arguments.length; e++)
                    t[e] = arguments[e];
                this.log(this.globalLogWarn, t)
            }
            ,
            t.prototype.error = function() {
                for (var t = [], e = 0; e < arguments.length; e++)
                    t[e] = arguments[e];
                this.log(this.globalLogError, t)
            }
            ,
            t.prototype.globalLogWarn = function(t) {
                window.console && window.console.warn ? window.console.warn(t) : this.globalLog(t)
            }
            ,
            t.prototype.globalLogError = function(t) {
                window.console && window.console.error ? window.console.error(t) : this.globalLogWarn(t)
            }
            ,
            t.prototype.log = function(t) {
                for (var e = [], n = 1; n < arguments.length; n++)
                    e[n - 1] = arguments[n];
                var r = q.apply(this, arguments);
                if (Fe.log)
                    Fe.log(r);
                else if (Fe.logToConsole) {
                    var o = t.bind(this);
                    o(r)
                }
            }
            ,
            t
        }())
          , tt = function(t, e, n, r, o) {
            void 0 !== n.headers && Z.warn("To send headers with the " + r.toString() + " request, you must use AJAX, rather than JSONP.");
            var i = t.nextAuthCallbackID.toString();
            t.nextAuthCallbackID++;
            var s = t.getDocument()
              , c = s.createElement("script");
            t.auth_callbacks[i] = function(t) {
                o(null, t)
            }
            ;
            var a = "Pusher.auth_callbacks['" + i + "']";
            c.src = n.endpoint + "?callback=" + encodeURIComponent(a) + "&" + e;
            var u = s.getElementsByTagName("head")[0] || s.documentElement;
            u.insertBefore(c, u.firstChild)
        }
          , et = function() {
            function t(t) {
                this.src = t
            }
            return t.prototype.send = function(t) {
                var e = this
                  , n = "Error loading " + e.src;
                e.script = document.createElement("script"),
                e.script.id = t.id,
                e.script.src = e.src,
                e.script.type = "text/javascript",
                e.script.charset = "UTF-8",
                e.script.addEventListener ? (e.script.onerror = function() {
                    t.callback(n)
                }
                ,
                e.script.onload = function() {
                    t.callback(null)
                }
                ) : e.script.onreadystatechange = function() {
                    "loaded" !== e.script.readyState && "complete" !== e.script.readyState || t.callback(null)
                }
                ,
                void 0 === e.script.async && document.attachEvent && /opera/i.test(navigator.userAgent) ? (e.errorScript = document.createElement("script"),
                e.errorScript.id = t.id + "_error",
                e.errorScript.text = t.name + "('" + n + "');",
                e.script.async = e.errorScript.async = !1) : e.script.async = !0;
                var r = document.getElementsByTagName("head")[0];
                r.insertBefore(e.script, r.firstChild),
                e.errorScript && r.insertBefore(e.errorScript, e.script.nextSibling)
            }
            ,
            t.prototype.cleanup = function() {
                this.script && (this.script.onload = this.script.onerror = null,
                this.script.onreadystatechange = null),
                this.script && this.script.parentNode && this.script.parentNode.removeChild(this.script),
                this.errorScript && this.errorScript.parentNode && this.errorScript.parentNode.removeChild(this.errorScript),
                this.script = null,
                this.errorScript = null
            }
            ,
            t
        }()
          , nt = function() {
            function t(t, e) {
                this.url = t,
                this.data = e
            }
            return t.prototype.send = function(t) {
                if (!this.request) {
                    var e = $(this.data)
                      , n = this.url + "/" + t.number + "?" + e;
                    this.request = Se.createScriptRequest(n),
                    this.request.send(t)
                }
            }
            ,
            t.prototype.cleanup = function() {
                this.request && this.request.cleanup()
            }
            ,
            t
        }()
          , rt = {
            name: "jsonp",
            getAgent: function(t, e) {
                return function(n, r) {
                    var o = "http" + (e ? "s" : "") + "://" + (t.host || t.options.host) + t.options.path
                      , s = Se.createJSONPRequest(o, n)
                      , c = Se.ScriptReceivers.create((function(e, n) {
                        i.remove(c),
                        s.cleanup(),
                        n && n.host && (t.host = n.host),
                        r && r(e, n)
                    }
                    ));
                    s.send(c)
                }
            }
        };
        function ot(t, e, n) {
            return t + (e.useTLS ? "s" : "") + "://" + (e.useTLS ? e.hostTLS : e.hostNonTLS) + n
        }
        function it(t, e) {
            return "/app/" + t + ("?protocol=" + s.PROTOCOL + "&client=js&version=" + s.VERSION + (e ? "&" + e : ""))
        }
        var st = {
            getInitial: function(t, e) {
                return ot("ws", e, (e.httpPath || "") + it(t, "flash=false"))
            }
        }
          , ct = {
            getInitial: function(t, e) {
                return ot("http", e, (e.httpPath || "/pusher") + it(t))
            }
        }
          , at = {
            getInitial: function(t, e) {
                return ot("http", e, e.httpPath || "/pusher")
            },
            getPath: function(t, e) {
                return it(t)
            }
        }
          , ut = function() {
            function t() {
                this._callbacks = {}
            }
            return t.prototype.get = function(t) {
                return this._callbacks[ht(t)]
            }
            ,
            t.prototype.add = function(t, e, n) {
                var r = ht(t);
                this._callbacks[r] = this._callbacks[r] || [],
                this._callbacks[r].push({
                    fn: e,
                    context: n
                })
            }
            ,
            t.prototype.remove = function(t, e, n) {
                if (t || e || n) {
                    var r = t ? [ht(t)] : X(this._callbacks);
                    e || n ? this.removeCallback(r, e, n) : this.removeAllCallbacks(r)
                } else
                    this._callbacks = {}
            }
            ,
            t.prototype.removeCallback = function(t, e, n) {
                J(t, (function(t) {
                    this._callbacks[t] = G(this._callbacks[t] || [], (function(t) {
                        return e && e !== t.fn || n && n !== t.context
                    }
                    )),
                    0 === this._callbacks[t].length && delete this._callbacks[t]
                }
                ), this)
            }
            ,
            t.prototype.removeAllCallbacks = function(t) {
                J(t, (function(t) {
                    delete this._callbacks[t]
                }
                ), this)
            }
            ,
            t
        }();
        function ht(t) {
            return "_" + t
        }
        var pt = function() {
            function t(t) {
                this.callbacks = new ut,
                this.global_callbacks = [],
                this.failThrough = t
            }
            return t.prototype.bind = function(t, e, n) {
                return this.callbacks.add(t, e, n),
                this
            }
            ,
            t.prototype.bind_global = function(t) {
                return this.global_callbacks.push(t),
                this
            }
            ,
            t.prototype.unbind = function(t, e, n) {
                return this.callbacks.remove(t, e, n),
                this
            }
            ,
            t.prototype.unbind_global = function(t) {
                return t ? (this.global_callbacks = G(this.global_callbacks || [], (function(e) {
                    return e !== t
                }
                )),
                this) : (this.global_callbacks = [],
                this)
            }
            ,
            t.prototype.unbind_all = function() {
                return this.unbind(),
                this.unbind_global(),
                this
            }
            ,
            t.prototype.emit = function(t, e, n) {
                for (var r = 0; r < this.global_callbacks.length; r++)
                    this.global_callbacks[r](t, e);
                var o = this.callbacks.get(t)
                  , i = [];
                if (n ? i.push(e, n) : e && i.push(e),
                o && o.length > 0)
                    for (r = 0; r < o.length; r++)
                        o[r].fn.apply(o[r].context || window, i);
                else
                    this.failThrough && this.failThrough(t, e);
                return this
            }
            ,
            t
        }()
          , lt = function() {
            var t = function(e, n) {
                return (t = Object.setPrototypeOf || {
                    __proto__: []
                }instanceof Array && function(t, e) {
                    t.__proto__ = e
                }
                || function(t, e) {
                    for (var n in e)
                        e.hasOwnProperty(n) && (t[n] = e[n])
                }
                )(e, n)
            };
            return function(e, n) {
                function r() {
                    this.constructor = e
                }
                t(e, n),
                e.prototype = null === n ? Object.create(n) : (r.prototype = n.prototype,
                new r)
            }
        }()
          , ft = function(t) {
            function e(e, n, r, o, i) {
                var s = t.call(this) || this;
                return s.initialize = Se.transportConnectionInitializer,
                s.hooks = e,
                s.name = n,
                s.priority = r,
                s.key = o,
                s.options = i,
                s.state = "new",
                s.timeline = i.timeline,
                s.activityTimeout = i.activityTimeout,
                s.id = s.timeline.generateUniqueID(),
                s
            }
            return lt(e, t),
            e.prototype.handlesActivityChecks = function() {
                return Boolean(this.hooks.handlesActivityChecks)
            }
            ,
            e.prototype.supportsPing = function() {
                return Boolean(this.hooks.supportsPing)
            }
            ,
            e.prototype.connect = function() {
                var t = this;
                if (this.socket || "initialized" !== this.state)
                    return !1;
                var e = this.hooks.urls.getInitial(this.key, this.options);
                try {
                    this.socket = this.hooks.getSocket(e, this.options)
                } catch (e) {
                    return U.defer((function() {
                        t.onError(e),
                        t.changeState("closed")
                    }
                    )),
                    !1
                }
                return this.bindListeners(),
                Z.debug("Connecting", {
                    transport: this.name,
                    url: e
                }),
                this.changeState("connecting"),
                !0
            }
            ,
            e.prototype.close = function() {
                return !!this.socket && (this.socket.close(),
                !0)
            }
            ,
            e.prototype.send = function(t) {
                var e = this;
                return "open" === this.state && (U.defer((function() {
                    e.socket && e.socket.send(t)
                }
                )),
                !0)
            }
            ,
            e.prototype.ping = function() {
                "open" === this.state && this.supportsPing() && this.socket.ping()
            }
            ,
            e.prototype.onOpen = function() {
                this.hooks.beforeOpen && this.hooks.beforeOpen(this.socket, this.hooks.urls.getPath(this.key, this.options)),
                this.changeState("open"),
                this.socket.onopen = void 0
            }
            ,
            e.prototype.onError = function(t) {
                this.emit("error", {
                    type: "WebSocketError",
                    error: t
                }),
                this.timeline.error(this.buildTimelineMessage({
                    error: t.toString()
                }))
            }
            ,
            e.prototype.onClose = function(t) {
                t ? this.changeState("closed", {
                    code: t.code,
                    reason: t.reason,
                    wasClean: t.wasClean
                }) : this.changeState("closed"),
                this.unbindListeners(),
                this.socket = void 0
            }
            ,
            e.prototype.onMessage = function(t) {
                this.emit("message", t)
            }
            ,
            e.prototype.onActivity = function() {
                this.emit("activity")
            }
            ,
            e.prototype.bindListeners = function() {
                var t = this;
                this.socket.onopen = function() {
                    t.onOpen()
                }
                ,
                this.socket.onerror = function(e) {
                    t.onError(e)
                }
                ,
                this.socket.onclose = function(e) {
                    t.onClose(e)
                }
                ,
                this.socket.onmessage = function(e) {
                    t.onMessage(e)
                }
                ,
                this.supportsPing() && (this.socket.onactivity = function() {
                    t.onActivity()
                }
                )
            }
            ,
            e.prototype.unbindListeners = function() {
                this.socket && (this.socket.onopen = void 0,
                this.socket.onerror = void 0,
                this.socket.onclose = void 0,
                this.socket.onmessage = void 0,
                this.supportsPing() && (this.socket.onactivity = void 0))
            }
            ,
            e.prototype.changeState = function(t, e) {
                this.state = t,
                this.timeline.info(this.buildTimelineMessage({
                    state: t,
                    params: e
                })),
                this.emit(t, e)
            }
            ,
            e.prototype.buildTimelineMessage = function(t) {
                return z({
                    cid: this.id
                }, t)
            }
            ,
            e
        }(pt)
          , dt = function() {
            function t(t) {
                this.hooks = t
            }
            return t.prototype.isSupported = function(t) {
                return this.hooks.isSupported(t)
            }
            ,
            t.prototype.createConnection = function(t, e, n, r) {
                return new ft(this.hooks,t,e,n,r)
            }
            ,
            t
        }()
          , yt = new dt({
            urls: st,
            handlesActivityChecks: !1,
            supportsPing: !1,
            isInitialized: function() {
                return Boolean(Se.getWebSocketAPI())
            },
            isSupported: function() {
                return Boolean(Se.getWebSocketAPI())
            },
            getSocket: function(t) {
                return Se.createWebSocket(t)
            }
        })
          , gt = {
            urls: ct,
            handlesActivityChecks: !1,
            supportsPing: !0,
            isInitialized: function() {
                return !0
            }
        }
          , vt = z({
            getSocket: function(t) {
                return Se.HTTPFactory.createStreamingSocket(t)
            }
        }, gt)
          , bt = z({
            getSocket: function(t) {
                return Se.HTTPFactory.createPollingSocket(t)
            }
        }, gt)
          , mt = {
            isSupported: function() {
                return Se.isXHRSupported()
            }
        }
          , _t = {
            ws: yt,
            xhr_streaming: new dt(z({}, vt, mt)),
            xhr_polling: new dt(z({}, bt, mt))
        }
          , wt = new dt({
            file: "sockjs",
            urls: at,
            handlesActivityChecks: !0,
            supportsPing: !1,
            isSupported: function() {
                return !0
            },
            isInitialized: function() {
                return void 0 !== window.SockJS
            },
            getSocket: function(t, e) {
                return new window.SockJS(t,null,{
                    js_path: u.getPath("sockjs", {
                        useTLS: e.useTLS
                    }),
                    ignore_null_origin: e.ignoreNullOrigin
                })
            },
            beforeOpen: function(t, e) {
                t.send(JSON.stringify({
                    path: e
                }))
            }
        })
          , St = {
            isSupported: function(t) {
                return Se.isXDRSupported(t.useTLS)
            }
        }
          , kt = new dt(z({}, vt, St))
          , Ct = new dt(z({}, bt, St));
        _t.xdr_streaming = kt,
        _t.xdr_polling = Ct,
        _t.sockjs = wt;
        var Tt = _t
          , Pt = function() {
            var t = function(e, n) {
                return (t = Object.setPrototypeOf || {
                    __proto__: []
                }instanceof Array && function(t, e) {
                    t.__proto__ = e
                }
                || function(t, e) {
                    for (var n in e)
                        e.hasOwnProperty(n) && (t[n] = e[n])
                }
                )(e, n)
            };
            return function(e, n) {
                function r() {
                    this.constructor = e
                }
                t(e, n),
                e.prototype = null === n ? Object.create(n) : (r.prototype = n.prototype,
                new r)
            }
        }()
          , Ot = new (function(t) {
            function e() {
                var e = t.call(this) || this
                  , n = e;
                return void 0 !== window.addEventListener && (window.addEventListener("online", (function() {
                    n.emit("online")
                }
                ), !1),
                window.addEventListener("offline", (function() {
                    n.emit("offline")
                }
                ), !1)),
                e
            }
            return Pt(e, t),
            e.prototype.isOnline = function() {
                return void 0 === window.navigator.onLine || window.navigator.onLine
            }
            ,
            e
        }(pt))
          , Et = function() {
            function t(t, e, n) {
                this.manager = t,
                this.transport = e,
                this.minPingDelay = n.minPingDelay,
                this.maxPingDelay = n.maxPingDelay,
                this.pingDelay = void 0
            }
            return t.prototype.createConnection = function(t, e, n, r) {
                var o = this;
                r = z({}, r, {
                    activityTimeout: this.pingDelay
                });
                var i = this.transport.createConnection(t, e, n, r)
                  , s = null
                  , c = function() {
                    i.unbind("open", c),
                    i.bind("closed", a),
                    s = U.now()
                }
                  , a = function(t) {
                    if (i.unbind("closed", a),
                    1002 === t.code || 1003 === t.code)
                        o.manager.reportDeath();
                    else if (!t.wasClean && s) {
                        var e = U.now() - s;
                        e < 2 * o.maxPingDelay && (o.manager.reportDeath(),
                        o.pingDelay = Math.max(e / 2, o.minPingDelay))
                    }
                };
                return i.bind("open", c),
                i
            }
            ,
            t.prototype.isSupported = function(t) {
                return this.manager.isAlive() && this.transport.isSupported(t)
            }
            ,
            t
        }()
          , At = {
            decodeMessage: function(t) {
                try {
                    var e = JSON.parse(t.data)
                      , n = e.data;
                    if ("string" == typeof n)
                        try {
                            n = JSON.parse(e.data)
                        } catch (t) {}
                    var r = {
                        event: e.event,
                        channel: e.channel,
                        data: n
                    };
                    return e.user_id && (r.user_id = e.user_id),
                    r
                } catch (e) {
                    throw {
                        type: "MessageParseError",
                        error: e,
                        data: t.data
                    }
                }
            },
            encodeMessage: function(t) {
                return JSON.stringify(t)
            },
            processHandshake: function(t) {
                var e = At.decodeMessage(t);
                if ("pusher:connection_established" === e.event) {
                    if (!e.data.activity_timeout)
                        throw "No activity timeout specified in handshake";
                    return {
                        action: "connected",
                        id: e.data.socket_id,
                        activityTimeout: 1e3 * e.data.activity_timeout
                    }
                }
                if ("pusher:error" === e.event)
                    return {
                        action: this.getCloseAction(e.data),
                        error: this.getCloseError(e.data)
                    };
                throw "Invalid handshake"
            },
            getCloseAction: function(t) {
                return t.code < 4e3 ? t.code >= 1002 && t.code <= 1004 ? "backoff" : null : 4e3 === t.code ? "tls_only" : t.code < 4100 ? "refused" : t.code < 4200 ? "backoff" : t.code < 4300 ? "retry" : "refused"
            },
            getCloseError: function(t) {
                return 1e3 !== t.code && 1001 !== t.code ? {
                    type: "PusherError",
                    data: {
                        code: t.code,
                        message: t.reason || t.message
                    }
                } : null
            }
        }
          , Lt = At
          , xt = function() {
            var t = function(e, n) {
                return (t = Object.setPrototypeOf || {
                    __proto__: []
                }instanceof Array && function(t, e) {
                    t.__proto__ = e
                }
                || function(t, e) {
                    for (var n in e)
                        e.hasOwnProperty(n) && (t[n] = e[n])
                }
                )(e, n)
            };
            return function(e, n) {
                function r() {
                    this.constructor = e
                }
                t(e, n),
                e.prototype = null === n ? Object.create(n) : (r.prototype = n.prototype,
                new r)
            }
        }()
          , Rt = function(t) {
            function e(e, n) {
                var r = t.call(this) || this;
                return r.id = e,
                r.transport = n,
                r.activityTimeout = n.activityTimeout,
                r.bindListeners(),
                r
            }
            return xt(e, t),
            e.prototype.handlesActivityChecks = function() {
                return this.transport.handlesActivityChecks()
            }
            ,
            e.prototype.send = function(t) {
                return this.transport.send(t)
            }
            ,
            e.prototype.send_event = function(t, e, n) {
                var r = {
                    event: t,
                    data: e
                };
                return n && (r.channel = n),
                Z.debug("Event sent", r),
                this.send(Lt.encodeMessage(r))
            }
            ,
            e.prototype.ping = function() {
                this.transport.supportsPing() ? this.transport.ping() : this.send_event("pusher:ping", {})
            }
            ,
            e.prototype.close = function() {
                this.transport.close()
            }
            ,
            e.prototype.bindListeners = function() {
                var t = this
                  , e = {
                    message: function(e) {
                        var n;
                        try {
                            n = Lt.decodeMessage(e)
                        } catch (n) {
                            t.emit("error", {
                                type: "MessageParseError",
                                error: n,
                                data: e.data
                            })
                        }
                        if (void 0 !== n) {
                            switch (Z.debug("Event recd", n),
                            n.event) {
                            case "pusher:error":
                                t.emit("error", {
                                    type: "PusherError",
                                    data: n.data
                                });
                                break;
                            case "pusher:ping":
                                t.emit("ping");
                                break;
                            case "pusher:pong":
                                t.emit("pong")
                            }
                            t.emit("message", n)
                        }
                    },
                    activity: function() {
                        t.emit("activity")
                    },
                    error: function(e) {
                        t.emit("error", e)
                    },
                    closed: function(e) {
                        n(),
                        e && e.code && t.handleCloseEvent(e),
                        t.transport = null,
                        t.emit("closed")
                    }
                }
                  , n = function() {
                    F(e, (function(e, n) {
                        t.transport.unbind(n, e)
                    }
                    ))
                };
                F(e, (function(e, n) {
                    t.transport.bind(n, e)
                }
                ))
            }
            ,
            e.prototype.handleCloseEvent = function(t) {
                var e = Lt.getCloseAction(t)
                  , n = Lt.getCloseError(t);
                n && this.emit("error", n),
                e && this.emit(e, {
                    action: e,
                    error: n
                })
            }
            ,
            e
        }(pt)
          , jt = function() {
            function t(t, e) {
                this.transport = t,
                this.callback = e,
                this.bindListeners()
            }
            return t.prototype.close = function() {
                this.unbindListeners(),
                this.transport.close()
            }
            ,
            t.prototype.bindListeners = function() {
                var t = this;
                this.onMessage = function(e) {
                    var n;
                    t.unbindListeners();
                    try {
                        n = Lt.processHandshake(e)
                    } catch (e) {
                        return t.finish("error", {
                            error: e
                        }),
                        void t.transport.close()
                    }
                    "connected" === n.action ? t.finish("connected", {
                        connection: new Rt(n.id,t.transport),
                        activityTimeout: n.activityTimeout
                    }) : (t.finish(n.action, {
                        error: n.error
                    }),
                    t.transport.close())
                }
                ,
                this.onClosed = function(e) {
                    t.unbindListeners();
                    var n = Lt.getCloseAction(e) || "backoff"
                      , r = Lt.getCloseError(e);
                    t.finish(n, {
                        error: r
                    })
                }
                ,
                this.transport.bind("message", this.onMessage),
                this.transport.bind("closed", this.onClosed)
            }
            ,
            t.prototype.unbindListeners = function() {
                this.transport.unbind("message", this.onMessage),
                this.transport.unbind("closed", this.onClosed)
            }
            ,
            t.prototype.finish = function(t, e) {
                this.callback(z({
                    transport: this.transport,
                    action: t
                }, e))
            }
            ,
            t
        }()
          , It = function() {
            function t(t, e) {
                this.timeline = t,
                this.options = e || {}
            }
            return t.prototype.send = function(t, e) {
                this.timeline.isEmpty() || this.timeline.send(Se.TimelineTransport.getAgent(this, t), e)
            }
            ,
            t
        }()
          , Dt = function() {
            var t = function(e, n) {
                return (t = Object.setPrototypeOf || {
                    __proto__: []
                }instanceof Array && function(t, e) {
                    t.__proto__ = e
                }
                || function(t, e) {
                    for (var n in e)
                        e.hasOwnProperty(n) && (t[n] = e[n])
                }
                )(e, n)
            };
            return function(e, n) {
                function r() {
                    this.constructor = e
                }
                t(e, n),
                e.prototype = null === n ? Object.create(n) : (r.prototype = n.prototype,
                new r)
            }
        }()
          , Nt = function(t) {
            function e(e, n) {
                var r = t.call(this, (function(t, n) {
                    Z.debug("No callbacks on " + e + " for " + t)
                }
                )) || this;
                return r.name = e,
                r.pusher = n,
                r.subscribed = !1,
                r.subscriptionPending = !1,
                r.subscriptionCancelled = !1,
                r
            }
            return Dt(e, t),
            e.prototype.authorize = function(t, e) {
                return e(null, {
                    auth: ""
                })
            }
            ,
            e.prototype.trigger = function(t, e) {
                if (0 !== t.indexOf("client-"))
                    throw new d("Event '" + t + "' does not start with 'client-'");
                if (!this.subscribed) {
                    var n = p("triggeringClientEvents");
                    Z.warn("Client event triggered before channel 'subscription_succeeded' event . " + n)
                }
                return this.pusher.send_event(t, e, this.name)
            }
            ,
            e.prototype.disconnect = function() {
                this.subscribed = !1,
                this.subscriptionPending = !1
            }
            ,
            e.prototype.handleEvent = function(t) {
                var e = t.event
                  , n = t.data;
                if ("pusher_internal:subscription_succeeded" === e)
                    this.handleSubscriptionSucceededEvent(t);
                else if ("pusher_internal:subscription_count" === e)
                    this.handleSubscriptionCountEvent(t);
                else if (0 !== e.indexOf("pusher_internal:")) {
                    this.emit(e, n, {})
                }
            }
            ,
            e.prototype.handleSubscriptionSucceededEvent = function(t) {
                this.subscriptionPending = !1,
                this.subscribed = !0,
                this.subscriptionCancelled ? this.pusher.unsubscribe(this.name) : this.emit("pusher:subscription_succeeded", t.data)
            }
            ,
            e.prototype.handleSubscriptionCountEvent = function(t) {
                t.data.subscription_count && (this.subscriptionCount = t.data.subscription_count),
                this.emit("pusher:subscription_count", t.data)
            }
            ,
            e.prototype.subscribe = function() {
                var t = this;
                this.subscribed || (this.subscriptionPending = !0,
                this.subscriptionCancelled = !1,
                this.authorize(this.pusher.connection.socket_id, (function(e, n) {
                    e ? (t.subscriptionPending = !1,
                    Z.error(e.toString()),
                    t.emit("pusher:subscription_error", Object.assign({}, {
                        type: "AuthError",
                        error: e.message
                    }, e instanceof S ? {
                        status: e.status
                    } : {}))) : t.pusher.send_event("pusher:subscribe", {
                        auth: n.auth,
                        channel_data: n.channel_data,
                        channel: t.name
                    })
                }
                )))
            }
            ,
            e.prototype.unsubscribe = function() {
                this.subscribed = !1,
                this.pusher.send_event("pusher:unsubscribe", {
                    channel: this.name
                })
            }
            ,
            e.prototype.cancelSubscription = function() {
                this.subscriptionCancelled = !0
            }
            ,
            e.prototype.reinstateSubscription = function() {
                this.subscriptionCancelled = !1
            }
            ,
            e
        }(pt)
          , Ht = function() {
            var t = function(e, n) {
                return (t = Object.setPrototypeOf || {
                    __proto__: []
                }instanceof Array && function(t, e) {
                    t.__proto__ = e
                }
                || function(t, e) {
                    for (var n in e)
                        e.hasOwnProperty(n) && (t[n] = e[n])
                }
                )(e, n)
            };
            return function(e, n) {
                function r() {
                    this.constructor = e
                }
                t(e, n),
                e.prototype = null === n ? Object.create(n) : (r.prototype = n.prototype,
                new r)
            }
        }()
          , Mt = function(t) {
            function e() {
                return null !== t && t.apply(this, arguments) || this
            }
            return Ht(e, t),
            e.prototype.authorize = function(t, e) {
                return this.pusher.config.channelAuthorizer({
                    channelName: this.name,
                    socketId: t
                }, e)
            }
            ,
            e
        }(Nt)
          , Ut = function() {
            function t() {
                this.reset()
            }
            return t.prototype.get = function(t) {
                return Object.prototype.hasOwnProperty.call(this.members, t) ? {
                    id: t,
                    info: this.members[t]
                } : null
            }
            ,
            t.prototype.each = function(t) {
                var e = this;
                F(this.members, (function(n, r) {
                    t(e.get(r))
                }
                ))
            }
            ,
            t.prototype.setMyID = function(t) {
                this.myID = t
            }
            ,
            t.prototype.onSubscription = function(t) {
                this.members = t.presence.hash,
                this.count = t.presence.count,
                this.me = this.get(this.myID)
            }
            ,
            t.prototype.addMember = function(t) {
                return null === this.get(t.user_id) && this.count++,
                this.members[t.user_id] = t.user_info,
                this.get(t.user_id)
            }
            ,
            t.prototype.removeMember = function(t) {
                var e = this.get(t.user_id);
                return e && (delete this.members[t.user_id],
                this.count--),
                e
            }
            ,
            t.prototype.reset = function() {
                this.members = {},
                this.count = 0,
                this.myID = null,
                this.me = null
            }
            ,
            t
        }()
          , zt = function() {
            var t = function(e, n) {
                return (t = Object.setPrototypeOf || {
                    __proto__: []
                }instanceof Array && function(t, e) {
                    t.__proto__ = e
                }
                || function(t, e) {
                    for (var n in e)
                        e.hasOwnProperty(n) && (t[n] = e[n])
                }
                )(e, n)
            };
            return function(e, n) {
                function r() {
                    this.constructor = e
                }
                t(e, n),
                e.prototype = null === n ? Object.create(n) : (r.prototype = n.prototype,
                new r)
            }
        }()
          , qt = function(t) {
            function e(e, n) {
                var r = t.call(this, e, n) || this;
                return r.members = new Ut,
                r
            }
            return zt(e, t),
            e.prototype.authorize = function(e, n) {
                var r = this;
                t.prototype.authorize.call(this, e, (function(t, e) {
                    if (!t) {
                        if (void 0 === (e = e).channel_data) {
                            var o = p("authenticationEndpoint");
                            return Z.error("Invalid auth response for channel '" + r.name + "',expected 'channel_data' field. " + o),
                            void n("Invalid auth response")
                        }
                        var i = JSON.parse(e.channel_data);
                        r.members.setMyID(i.user_id)
                    }
                    n(t, e)
                }
                ))
            }
            ,
            e.prototype.handleEvent = function(t) {
                var e = t.event;
                if (0 === e.indexOf("pusher_internal:"))
                    this.handleInternalEvent(t);
                else {
                    var n = t.data
                      , r = {};
                    t.user_id && (r.user_id = t.user_id),
                    this.emit(e, n, r)
                }
            }
            ,
            e.prototype.handleInternalEvent = function(t) {
                var e = t.event
                  , n = t.data;
                switch (e) {
                case "pusher_internal:subscription_succeeded":
                    this.handleSubscriptionSucceededEvent(t);
                    break;
                case "pusher_internal:subscription_count":
                    this.handleSubscriptionCountEvent(t);
                    break;
                case "pusher_internal:member_added":
                    var r = this.members.addMember(n);
                    this.emit("pusher:member_added", r);
                    break;
                case "pusher_internal:member_removed":
                    var o = this.members.removeMember(n);
                    o && this.emit("pusher:member_removed", o)
                }
            }
            ,
            e.prototype.handleSubscriptionSucceededEvent = function(t) {
                this.subscriptionPending = !1,
                this.subscribed = !0,
                this.subscriptionCancelled ? this.pusher.unsubscribe(this.name) : (this.members.onSubscription(t.data),
                this.emit("pusher:subscription_succeeded", this.members))
            }
            ,
            e.prototype.disconnect = function() {
                this.members.reset(),
                t.prototype.disconnect.call(this)
            }
            ,
            e
        }(Mt)
          , Bt = n(1)
          , Ft = n(0)
          , Xt = function() {
            var t = function(e, n) {
                return (t = Object.setPrototypeOf || {
                    __proto__: []
                }instanceof Array && function(t, e) {
                    t.__proto__ = e
                }
                || function(t, e) {
                    for (var n in e)
                        e.hasOwnProperty(n) && (t[n] = e[n])
                }
                )(e, n)
            };
            return function(e, n) {
                function r() {
                    this.constructor = e
                }
                t(e, n),
                e.prototype = null === n ? Object.create(n) : (r.prototype = n.prototype,
                new r)
            }
        }()
          , Jt = function(t) {
            function e(e, n, r) {
                var o = t.call(this, e, n) || this;
                return o.key = null,
                o.nacl = r,
                o
            }
            return Xt(e, t),
            e.prototype.authorize = function(e, n) {
                var r = this;
                t.prototype.authorize.call(this, e, (function(t, e) {
                    if (t)
                        n(t, e);
                    else {
                        var o = e.shared_secret;
                        o ? (r.key = Object(Ft.decode)(o),
                        delete e.shared_secret,
                        n(null, e)) : n(new Error("No shared_secret key in auth payload for encrypted channel: " + r.name), null)
                    }
                }
                ))
            }
            ,
            e.prototype.trigger = function(t, e) {
                throw new m("Client events are not currently supported for encrypted channels")
            }
            ,
            e.prototype.handleEvent = function(e) {
                var n = e.event
                  , r = e.data;
                0 !== n.indexOf("pusher_internal:") && 0 !== n.indexOf("pusher:") ? this.handleEncryptedEvent(n, r) : t.prototype.handleEvent.call(this, e)
            }
            ,
            e.prototype.handleEncryptedEvent = function(t, e) {
                var n = this;
                if (this.key)
                    if (e.ciphertext && e.nonce) {
                        var r = Object(Ft.decode)(e.ciphertext);
                        if (r.length < this.nacl.secretbox.overheadLength)
                            Z.error("Expected encrypted event ciphertext length to be " + this.nacl.secretbox.overheadLength + ", got: " + r.length);
                        else {
                            var o = Object(Ft.decode)(e.nonce);
                            if (o.length < this.nacl.secretbox.nonceLength)
                                Z.error("Expected encrypted event nonce length to be " + this.nacl.secretbox.nonceLength + ", got: " + o.length);
                            else {
                                var i = this.nacl.secretbox.open(r, o, this.key);
                                if (null === i)
                                    return Z.debug("Failed to decrypt an event, probably because it was encrypted with a different key. Fetching a new key from the authEndpoint..."),
                                    void this.authorize(this.pusher.connection.socket_id, (function(e, s) {
                                        e ? Z.error("Failed to make a request to the authEndpoint: " + s + ". Unable to fetch new key, so dropping encrypted event") : null !== (i = n.nacl.secretbox.open(r, o, n.key)) ? n.emit(t, n.getDataToEmit(i)) : Z.error("Failed to decrypt event with new key. Dropping encrypted event")
                                    }
                                    ));
                                this.emit(t, this.getDataToEmit(i))
                            }
                        }
                    } else
                        Z.error("Unexpected format for encrypted event, expected object with `ciphertext` and `nonce` fields, got: " + e);
                else
                    Z.debug("Received encrypted event before key has been retrieved from the authEndpoint")
            }
            ,
            e.prototype.getDataToEmit = function(t) {
                var e = Object(Bt.decode)(t);
                try {
                    return JSON.parse(e)
                } catch (t) {
                    return e
                }
            }
            ,
            e
        }(Mt)
          , Wt = function() {
            var t = function(e, n) {
                return (t = Object.setPrototypeOf || {
                    __proto__: []
                }instanceof Array && function(t, e) {
                    t.__proto__ = e
                }
                || function(t, e) {
                    for (var n in e)
                        e.hasOwnProperty(n) && (t[n] = e[n])
                }
                )(e, n)
            };
            return function(e, n) {
                function r() {
                    this.constructor = e
                }
                t(e, n),
                e.prototype = null === n ? Object.create(n) : (r.prototype = n.prototype,
                new r)
            }
        }()
          , Gt = function(t) {
            function e(e, n) {
                var r = t.call(this) || this;
                r.state = "initialized",
                r.connection = null,
                r.key = e,
                r.options = n,
                r.timeline = r.options.timeline,
                r.usingTLS = r.options.useTLS,
                r.errorCallbacks = r.buildErrorCallbacks(),
                r.connectionCallbacks = r.buildConnectionCallbacks(r.errorCallbacks),
                r.handshakeCallbacks = r.buildHandshakeCallbacks(r.errorCallbacks);
                var o = Se.getNetwork();
                return o.bind("online", (function() {
                    r.timeline.info({
                        netinfo: "online"
                    }),
                    "connecting" !== r.state && "unavailable" !== r.state || r.retryIn(0)
                }
                )),
                o.bind("offline", (function() {
                    r.timeline.info({
                        netinfo: "offline"
                    }),
                    r.connection && r.sendActivityCheck()
                }
                )),
                r.updateStrategy(),
                r
            }
            return Wt(e, t),
            e.prototype.connect = function() {
                this.connection || this.runner || (this.strategy.isSupported() ? (this.updateState("connecting"),
                this.startConnecting(),
                this.setUnavailableTimer()) : this.updateState("failed"))
            }
            ,
            e.prototype.send = function(t) {
                return !!this.connection && this.connection.send(t)
            }
            ,
            e.prototype.send_event = function(t, e, n) {
                return !!this.connection && this.connection.send_event(t, e, n)
            }
            ,
            e.prototype.disconnect = function() {
                this.disconnectInternally(),
                this.updateState("disconnected")
            }
            ,
            e.prototype.isUsingTLS = function() {
                return this.usingTLS
            }
            ,
            e.prototype.startConnecting = function() {
                var t = this
                  , e = function(n, r) {
                    n ? t.runner = t.strategy.connect(0, e) : "error" === r.action ? (t.emit("error", {
                        type: "HandshakeError",
                        error: r.error
                    }),
                    t.timeline.error({
                        handshakeError: r.error
                    })) : (t.abortConnecting(),
                    t.handshakeCallbacks[r.action](r))
                };
                this.runner = this.strategy.connect(0, e)
            }
            ,
            e.prototype.abortConnecting = function() {
                this.runner && (this.runner.abort(),
                this.runner = null)
            }
            ,
            e.prototype.disconnectInternally = function() {
                (this.abortConnecting(),
                this.clearRetryTimer(),
                this.clearUnavailableTimer(),
                this.connection) && this.abandonConnection().close()
            }
            ,
            e.prototype.updateStrategy = function() {
                this.strategy = this.options.getStrategy({
                    key: this.key,
                    timeline: this.timeline,
                    useTLS: this.usingTLS
                })
            }
            ,
            e.prototype.retryIn = function(t) {
                var e = this;
                this.timeline.info({
                    action: "retry",
                    delay: t
                }),
                t > 0 && this.emit("connecting_in", Math.round(t / 1e3)),
                this.retryTimer = new H(t || 0,(function() {
                    e.disconnectInternally(),
                    e.connect()
                }
                ))
            }
            ,
            e.prototype.clearRetryTimer = function() {
                this.retryTimer && (this.retryTimer.ensureAborted(),
                this.retryTimer = null)
            }
            ,
            e.prototype.setUnavailableTimer = function() {
                var t = this;
                this.unavailableTimer = new H(this.options.unavailableTimeout,(function() {
                    t.updateState("unavailable")
                }
                ))
            }
            ,
            e.prototype.clearUnavailableTimer = function() {
                this.unavailableTimer && this.unavailableTimer.ensureAborted()
            }
            ,
            e.prototype.sendActivityCheck = function() {
                var t = this;
                this.stopActivityCheck(),
                this.connection.ping(),
                this.activityTimer = new H(this.options.pongTimeout,(function() {
                    t.timeline.error({
                        pong_timed_out: t.options.pongTimeout
                    }),
                    t.retryIn(0)
                }
                ))
            }
            ,
            e.prototype.resetActivityCheck = function() {
                var t = this;
                this.stopActivityCheck(),
                this.connection && !this.connection.handlesActivityChecks() && (this.activityTimer = new H(this.activityTimeout,(function() {
                    t.sendActivityCheck()
                }
                )))
            }
            ,
            e.prototype.stopActivityCheck = function() {
                this.activityTimer && this.activityTimer.ensureAborted()
            }
            ,
            e.prototype.buildConnectionCallbacks = function(t) {
                var e = this;
                return z({}, t, {
                    message: function(t) {
                        e.resetActivityCheck(),
                        e.emit("message", t)
                    },
                    ping: function() {
                        e.send_event("pusher:pong", {})
                    },
                    activity: function() {
                        e.resetActivityCheck()
                    },
                    error: function(t) {
                        e.emit("error", t)
                    },
                    closed: function() {
                        e.abandonConnection(),
                        e.shouldRetry() && e.retryIn(1e3)
                    }
                })
            }
            ,
            e.prototype.buildHandshakeCallbacks = function(t) {
                var e = this;
                return z({}, t, {
                    connected: function(t) {
                        e.activityTimeout = Math.min(e.options.activityTimeout, t.activityTimeout, t.connection.activityTimeout || 1 / 0),
                        e.clearUnavailableTimer(),
                        e.setConnection(t.connection),
                        e.socket_id = e.connection.id,
                        e.updateState("connected", {
                            socket_id: e.socket_id
                        })
                    }
                })
            }
            ,
            e.prototype.buildErrorCallbacks = function() {
                var t = this
                  , e = function(e) {
                    return function(n) {
                        n.error && t.emit("error", {
                            type: "WebSocketError",
                            error: n.error
                        }),
                        e(n)
                    }
                };
                return {
                    tls_only: e((function() {
                        t.usingTLS = !0,
                        t.updateStrategy(),
                        t.retryIn(0)
                    }
                    )),
                    refused: e((function() {
                        t.disconnect()
                    }
                    )),
                    backoff: e((function() {
                        t.retryIn(1e3)
                    }
                    )),
                    retry: e((function() {
                        t.retryIn(0)
                    }
                    ))
                }
            }
            ,
            e.prototype.setConnection = function(t) {
                for (var e in this.connection = t,
                this.connectionCallbacks)
                    this.connection.bind(e, this.connectionCallbacks[e]);
                this.resetActivityCheck()
            }
            ,
            e.prototype.abandonConnection = function() {
                if (this.connection) {
                    for (var t in this.stopActivityCheck(),
                    this.connectionCallbacks)
                        this.connection.unbind(t, this.connectionCallbacks[t]);
                    var e = this.connection;
                    return this.connection = null,
                    e
                }
            }
            ,
            e.prototype.updateState = function(t, e) {
                var n = this.state;
                if (this.state = t,
                n !== t) {
                    var r = t;
                    "connected" === r && (r += " with new socket ID " + e.socket_id),
                    Z.debug("State changed", n + " -> " + r),
                    this.timeline.info({
                        state: t,
                        params: e
                    }),
                    this.emit("state_change", {
                        previous: n,
                        current: t
                    }),
                    this.emit(t, e)
                }
            }
            ,
            e.prototype.shouldRetry = function() {
                return "connecting" === this.state || "connected" === this.state
            }
            ,
            e
        }(pt)
          , Vt = function() {
            function t() {
                this.channels = {}
            }
            return t.prototype.add = function(t, e) {
                return this.channels[t] || (this.channels[t] = function(t, e) {
                    if (0 === t.indexOf("private-encrypted-")) {
                        if (e.config.nacl)
                            return Qt.createEncryptedChannel(t, e, e.config.nacl);
                        var n = p("encryptedChannelSupport");
                        throw new m("Tried to subscribe to a private-encrypted- channel but no nacl implementation available. " + n)
                    }
                    if (0 === t.indexOf("private-"))
                        return Qt.createPrivateChannel(t, e);
                    if (0 === t.indexOf("presence-"))
                        return Qt.createPresenceChannel(t, e);
                    if (0 === t.indexOf("#"))
                        throw new y('Cannot create a channel with name "' + t + '".');
                    return Qt.createChannel(t, e)
                }(t, e)),
                this.channels[t]
            }
            ,
            t.prototype.all = function() {
                return function(t) {
                    var e = [];
                    return F(t, (function(t) {
                        e.push(t)
                    }
                    )),
                    e
                }(this.channels)
            }
            ,
            t.prototype.find = function(t) {
                return this.channels[t]
            }
            ,
            t.prototype.remove = function(t) {
                var e = this.channels[t];
                return delete this.channels[t],
                e
            }
            ,
            t.prototype.disconnect = function() {
                F(this.channels, (function(t) {
                    t.disconnect()
                }
                ))
            }
            ,
            t
        }();
        var Qt = {
            createChannels: function() {
                return new Vt
            },
            createConnectionManager: function(t, e) {
                return new Gt(t,e)
            },
            createChannel: function(t, e) {
                return new Nt(t,e)
            },
            createPrivateChannel: function(t, e) {
                return new Mt(t,e)
            },
            createPresenceChannel: function(t, e) {
                return new qt(t,e)
            },
            createEncryptedChannel: function(t, e, n) {
                return new Jt(t,e,n)
            },
            createTimelineSender: function(t, e) {
                return new It(t,e)
            },
            createHandshake: function(t, e) {
                return new jt(t,e)
            },
            createAssistantToTheTransportManager: function(t, e, n) {
                return new Et(t,e,n)
            }
        }
          , Yt = function() {
            function t(t) {
                this.options = t || {},
                this.livesLeft = this.options.lives || 1 / 0
            }
            return t.prototype.getAssistant = function(t) {
                return Qt.createAssistantToTheTransportManager(this, t, {
                    minPingDelay: this.options.minPingDelay,
                    maxPingDelay: this.options.maxPingDelay
                })
            }
            ,
            t.prototype.isAlive = function() {
                return this.livesLeft > 0
            }
            ,
            t.prototype.reportDeath = function() {
                this.livesLeft -= 1
            }
            ,
            t
        }()
          , $t = function() {
            function t(t, e) {
                this.strategies = t,
                this.loop = Boolean(e.loop),
                this.failFast = Boolean(e.failFast),
                this.timeout = e.timeout,
                this.timeoutLimit = e.timeoutLimit
            }
            return t.prototype.isSupported = function() {
                return Q(this.strategies, U.method("isSupported"))
            }
            ,
            t.prototype.connect = function(t, e) {
                var n = this
                  , r = this.strategies
                  , o = 0
                  , i = this.timeout
                  , s = null
                  , c = function(a, u) {
                    u ? e(null, u) : (o += 1,
                    n.loop && (o %= r.length),
                    o < r.length ? (i && (i *= 2,
                    n.timeoutLimit && (i = Math.min(i, n.timeoutLimit))),
                    s = n.tryStrategy(r[o], t, {
                        timeout: i,
                        failFast: n.failFast
                    }, c)) : e(!0))
                };
                return s = this.tryStrategy(r[o], t, {
                    timeout: i,
                    failFast: this.failFast
                }, c),
                {
                    abort: function() {
                        s.abort()
                    },
                    forceMinPriority: function(e) {
                        t = e,
                        s && s.forceMinPriority(e)
                    }
                }
            }
            ,
            t.prototype.tryStrategy = function(t, e, n, r) {
                var o = null
                  , i = null;
                return n.timeout > 0 && (o = new H(n.timeout,(function() {
                    i.abort(),
                    r(!0)
                }
                ))),
                i = t.connect(e, (function(t, e) {
                    t && o && o.isRunning() && !n.failFast || (o && o.ensureAborted(),
                    r(t, e))
                }
                )),
                {
                    abort: function() {
                        o && o.ensureAborted(),
                        i.abort()
                    },
                    forceMinPriority: function(t) {
                        i.forceMinPriority(t)
                    }
                }
            }
            ,
            t
        }()
          , Kt = function() {
            function t(t) {
                this.strategies = t
            }
            return t.prototype.isSupported = function() {
                return Q(this.strategies, U.method("isSupported"))
            }
            ,
            t.prototype.connect = function(t, e) {
                return function(t, e, n) {
                    var r = W(t, (function(t, r, o, i) {
                        return t.connect(e, n(r, i))
                    }
                    ));
                    return {
                        abort: function() {
                            J(r, Zt)
                        },
                        forceMinPriority: function(t) {
                            J(r, (function(e) {
                                e.forceMinPriority(t)
                            }
                            ))
                        }
                    }
                }(this.strategies, t, (function(t, n) {
                    return function(r, o) {
                        n[t].error = r,
                        r ? function(t) {
                            return function(t, e) {
                                for (var n = 0; n < t.length; n++)
                                    if (!e(t[n], n, t))
                                        return !1;
                                return !0
                            }(t, (function(t) {
                                return Boolean(t.error)
                            }
                            ))
                        }(n) && e(!0) : (J(n, (function(t) {
                            t.forceMinPriority(o.transport.priority)
                        }
                        )),
                        e(null, o))
                    }
                }
                ))
            }
            ,
            t
        }();
        function Zt(t) {
            t.error || t.aborted || (t.abort(),
            t.aborted = !0)
        }
        var te = function() {
            function t(t, e, n) {
                this.strategy = t,
                this.transports = e,
                this.ttl = n.ttl || 18e5,
                this.usingTLS = n.useTLS,
                this.timeline = n.timeline
            }
            return t.prototype.isSupported = function() {
                return this.strategy.isSupported()
            }
            ,
            t.prototype.connect = function(t, e) {
                var n = this.usingTLS
                  , r = function(t) {
                    var e = Se.getLocalStorage();
                    if (e)
                        try {
                            var n = e[ee(t)];
                            if (n)
                                return JSON.parse(n)
                        } catch (e) {
                            ne(t)
                        }
                    return null
                }(n)
                  , o = [this.strategy];
                if (r && r.timestamp + this.ttl >= U.now()) {
                    var i = this.transports[r.transport];
                    i && (this.timeline.info({
                        cached: !0,
                        transport: r.transport,
                        latency: r.latency
                    }),
                    o.push(new $t([i],{
                        timeout: 2 * r.latency + 1e3,
                        failFast: !0
                    })))
                }
                var s = U.now()
                  , c = o.pop().connect(t, (function r(i, a) {
                    i ? (ne(n),
                    o.length > 0 ? (s = U.now(),
                    c = o.pop().connect(t, r)) : e(i)) : (!function(t, e, n) {
                        var r = Se.getLocalStorage();
                        if (r)
                            try {
                                r[ee(t)] = K({
                                    timestamp: U.now(),
                                    transport: e,
                                    latency: n
                                })
                            } catch (t) {}
                    }(n, a.transport.name, U.now() - s),
                    e(null, a))
                }
                ));
                return {
                    abort: function() {
                        c.abort()
                    },
                    forceMinPriority: function(e) {
                        t = e,
                        c && c.forceMinPriority(e)
                    }
                }
            }
            ,
            t
        }();
        function ee(t) {
            return "pusherTransport" + (t ? "TLS" : "NonTLS")
        }
        function ne(t) {
            var e = Se.getLocalStorage();
            if (e)
                try {
                    delete e[ee(t)]
                } catch (t) {}
        }
        var re = function() {
            function t(t, e) {
                var n = e.delay;
                this.strategy = t,
                this.options = {
                    delay: n
                }
            }
            return t.prototype.isSupported = function() {
                return this.strategy.isSupported()
            }
            ,
            t.prototype.connect = function(t, e) {
                var n, r = this.strategy, o = new H(this.options.delay,(function() {
                    n = r.connect(t, e)
                }
                ));
                return {
                    abort: function() {
                        o.ensureAborted(),
                        n && n.abort()
                    },
                    forceMinPriority: function(e) {
                        t = e,
                        n && n.forceMinPriority(e)
                    }
                }
            }
            ,
            t
        }()
          , oe = function() {
            function t(t, e, n) {
                this.test = t,
                this.trueBranch = e,
                this.falseBranch = n
            }
            return t.prototype.isSupported = function() {
                return (this.test() ? this.trueBranch : this.falseBranch).isSupported()
            }
            ,
            t.prototype.connect = function(t, e) {
                return (this.test() ? this.trueBranch : this.falseBranch).connect(t, e)
            }
            ,
            t
        }()
          , ie = function() {
            function t(t) {
                this.strategy = t
            }
            return t.prototype.isSupported = function() {
                return this.strategy.isSupported()
            }
            ,
            t.prototype.connect = function(t, e) {
                var n = this.strategy.connect(t, (function(t, r) {
                    r && n.abort(),
                    e(t, r)
                }
                ));
                return n
            }
            ,
            t
        }();
        function se(t) {
            return function() {
                return t.isSupported()
            }
        }
        var ce, ae = function(t, e, n) {
            var r = {};
            function o(e, o, i, s, c) {
                var a = n(t, e, o, i, s, c);
                return r[e] = a,
                a
            }
            var i, s = Object.assign({}, e, {
                hostNonTLS: t.wsHost + ":" + t.wsPort,
                hostTLS: t.wsHost + ":" + t.wssPort,
                httpPath: t.wsPath
            }), c = Object.assign({}, s, {
                useTLS: !0
            }), a = Object.assign({}, e, {
                hostNonTLS: t.httpHost + ":" + t.httpPort,
                hostTLS: t.httpHost + ":" + t.httpsPort,
                httpPath: t.httpPath
            }), u = {
                loop: !0,
                timeout: 15e3,
                timeoutLimit: 6e4
            }, h = new Yt({
                lives: 2,
                minPingDelay: 1e4,
                maxPingDelay: t.activityTimeout
            }), p = new Yt({
                lives: 2,
                minPingDelay: 1e4,
                maxPingDelay: t.activityTimeout
            }), l = o("ws", "ws", 3, s, h), f = o("wss", "ws", 3, c, h), d = o("sockjs", "sockjs", 1, a), y = o("xhr_streaming", "xhr_streaming", 1, a, p), g = o("xdr_streaming", "xdr_streaming", 1, a, p), v = o("xhr_polling", "xhr_polling", 1, a), b = o("xdr_polling", "xdr_polling", 1, a), m = new $t([l],u), _ = new $t([f],u), w = new $t([d],u), S = new $t([new oe(se(y),y,g)],u), k = new $t([new oe(se(v),v,b)],u), C = new $t([new oe(se(S),new Kt([S, new re(k,{
                delay: 4e3
            })]),k)],u), T = new oe(se(C),C,w);
            return i = e.useTLS ? new Kt([m, new re(T,{
                delay: 2e3
            })]) : new Kt([m, new re(_,{
                delay: 2e3
            }), new re(T,{
                delay: 5e3
            })]),
            new te(new ie(new oe(se(l),i,T)),r,{
                ttl: 18e5,
                timeline: e.timeline,
                useTLS: e.useTLS
            })
        }, ue = {
            getRequest: function(t) {
                var e = new window.XDomainRequest;
                return e.ontimeout = function() {
                    t.emit("error", new g),
                    t.close()
                }
                ,
                e.onerror = function(e) {
                    t.emit("error", e),
                    t.close()
                }
                ,
                e.onprogress = function() {
                    e.responseText && e.responseText.length > 0 && t.onChunk(200, e.responseText)
                }
                ,
                e.onload = function() {
                    e.responseText && e.responseText.length > 0 && t.onChunk(200, e.responseText),
                    t.emit("finished", 200),
                    t.close()
                }
                ,
                e
            },
            abortRequest: function(t) {
                t.ontimeout = t.onerror = t.onprogress = t.onload = null,
                t.abort()
            }
        }, he = function() {
            var t = function(e, n) {
                return (t = Object.setPrototypeOf || {
                    __proto__: []
                }instanceof Array && function(t, e) {
                    t.__proto__ = e
                }
                || function(t, e) {
                    for (var n in e)
                        e.hasOwnProperty(n) && (t[n] = e[n])
                }
                )(e, n)
            };
            return function(e, n) {
                function r() {
                    this.constructor = e
                }
                t(e, n),
                e.prototype = null === n ? Object.create(n) : (r.prototype = n.prototype,
                new r)
            }
        }(), pe = function(t) {
            function e(e, n, r) {
                var o = t.call(this) || this;
                return o.hooks = e,
                o.method = n,
                o.url = r,
                o
            }
            return he(e, t),
            e.prototype.start = function(t) {
                var e = this;
                this.position = 0,
                this.xhr = this.hooks.getRequest(this),
                this.unloader = function() {
                    e.close()
                }
                ,
                Se.addUnloadListener(this.unloader),
                this.xhr.open(this.method, this.url, !0),
                this.xhr.setRequestHeader && this.xhr.setRequestHeader("Content-Type", "application/json"),
                this.xhr.send(t)
            }
            ,
            e.prototype.close = function() {
                this.unloader && (Se.removeUnloadListener(this.unloader),
                this.unloader = null),
                this.xhr && (this.hooks.abortRequest(this.xhr),
                this.xhr = null)
            }
            ,
            e.prototype.onChunk = function(t, e) {
                for (; ; ) {
                    var n = this.advanceBuffer(e);
                    if (!n)
                        break;
                    this.emit("chunk", {
                        status: t,
                        data: n
                    })
                }
                this.isBufferTooLong(e) && this.emit("buffer_too_long")
            }
            ,
            e.prototype.advanceBuffer = function(t) {
                var e = t.slice(this.position)
                  , n = e.indexOf("\n");
                return -1 !== n ? (this.position += n + 1,
                e.slice(0, n)) : null
            }
            ,
            e.prototype.isBufferTooLong = function(t) {
                return this.position === t.length && t.length > 262144
            }
            ,
            e
        }(pt);
        !function(t) {
            t[t.CONNECTING = 0] = "CONNECTING",
            t[t.OPEN = 1] = "OPEN",
            t[t.CLOSED = 3] = "CLOSED"
        }(ce || (ce = {}));
        var le = ce
          , fe = 1;
        function de(t) {
            var e = -1 === t.indexOf("?") ? "?" : "&";
            return t + e + "t=" + +new Date + "&n=" + fe++
        }
        function ye(t) {
            return Math.floor(Math.random() * t)
        }
        var ge, ve = function() {
            function t(t, e) {
                this.hooks = t,
                this.session = ye(1e3) + "/" + function(t) {
                    for (var e = [], n = 0; n < t; n++)
                        e.push(ye(32).toString(32));
                    return e.join("")
                }(8),
                this.location = function(t) {
                    var e = /([^\?]*)\/*(\??.*)/.exec(t);
                    return {
                        base: e[1],
                        queryString: e[2]
                    }
                }(e),
                this.readyState = le.CONNECTING,
                this.openStream()
            }
            return t.prototype.send = function(t) {
                return this.sendRaw(JSON.stringify([t]))
            }
            ,
            t.prototype.ping = function() {
                this.hooks.sendHeartbeat(this)
            }
            ,
            t.prototype.close = function(t, e) {
                this.onClose(t, e, !0)
            }
            ,
            t.prototype.sendRaw = function(t) {
                if (this.readyState !== le.OPEN)
                    return !1;
                try {
                    return Se.createSocketRequest("POST", de((e = this.location,
                    n = this.session,
                    e.base + "/" + n + "/xhr_send"))).start(t),
                    !0
                } catch (t) {
                    return !1
                }
                var e, n
            }
            ,
            t.prototype.reconnect = function() {
                this.closeStream(),
                this.openStream()
            }
            ,
            t.prototype.onClose = function(t, e, n) {
                this.closeStream(),
                this.readyState = le.CLOSED,
                this.onclose && this.onclose({
                    code: t,
                    reason: e,
                    wasClean: n
                })
            }
            ,
            t.prototype.onChunk = function(t) {
                var e;
                if (200 === t.status)
                    switch (this.readyState === le.OPEN && this.onActivity(),
                    t.data.slice(0, 1)) {
                    case "o":
                        e = JSON.parse(t.data.slice(1) || "{}"),
                        this.onOpen(e);
                        break;
                    case "a":
                        e = JSON.parse(t.data.slice(1) || "[]");
                        for (var n = 0; n < e.length; n++)
                            this.onEvent(e[n]);
                        break;
                    case "m":
                        e = JSON.parse(t.data.slice(1) || "null"),
                        this.onEvent(e);
                        break;
                    case "h":
                        this.hooks.onHeartbeat(this);
                        break;
                    case "c":
                        e = JSON.parse(t.data.slice(1) || "[]"),
                        this.onClose(e[0], e[1], !0)
                    }
            }
            ,
            t.prototype.onOpen = function(t) {
                var e, n, r;
                this.readyState === le.CONNECTING ? (t && t.hostname && (this.location.base = (e = this.location.base,
                n = t.hostname,
                (r = /(https?:\/\/)([^\/:]+)((\/|:)?.*)/.exec(e))[1] + n + r[3])),
                this.readyState = le.OPEN,
                this.onopen && this.onopen()) : this.onClose(1006, "Server lost session", !0)
            }
            ,
            t.prototype.onEvent = function(t) {
                this.readyState === le.OPEN && this.onmessage && this.onmessage({
                    data: t
                })
            }
            ,
            t.prototype.onActivity = function() {
                this.onactivity && this.onactivity()
            }
            ,
            t.prototype.onError = function(t) {
                this.onerror && this.onerror(t)
            }
            ,
            t.prototype.openStream = function() {
                var t = this;
                this.stream = Se.createSocketRequest("POST", de(this.hooks.getReceiveURL(this.location, this.session))),
                this.stream.bind("chunk", (function(e) {
                    t.onChunk(e)
                }
                )),
                this.stream.bind("finished", (function(e) {
                    t.hooks.onFinished(t, e)
                }
                )),
                this.stream.bind("buffer_too_long", (function() {
                    t.reconnect()
                }
                ));
                try {
                    this.stream.start()
                } catch (e) {
                    U.defer((function() {
                        t.onError(e),
                        t.onClose(1006, "Could not start streaming", !1)
                    }
                    ))
                }
            }
            ,
            t.prototype.closeStream = function() {
                this.stream && (this.stream.unbind_all(),
                this.stream.close(),
                this.stream = null)
            }
            ,
            t
        }(), be = {
            getReceiveURL: function(t, e) {
                return t.base + "/" + e + "/xhr_streaming" + t.queryString
            },
            onHeartbeat: function(t) {
                t.sendRaw("[]")
            },
            sendHeartbeat: function(t) {
                t.sendRaw("[]")
            },
            onFinished: function(t, e) {
                t.onClose(1006, "Connection interrupted (" + e + ")", !1)
            }
        }, me = {
            getReceiveURL: function(t, e) {
                return t.base + "/" + e + "/xhr" + t.queryString
            },
            onHeartbeat: function() {},
            sendHeartbeat: function(t) {
                t.sendRaw("[]")
            },
            onFinished: function(t, e) {
                200 === e ? t.reconnect() : t.onClose(1006, "Connection interrupted (" + e + ")", !1)
            }
        }, _e = {
            getRequest: function(t) {
                var e = new (Se.getXHRAPI());
                return e.onreadystatechange = e.onprogress = function() {
                    switch (e.readyState) {
                    case 3:
                        e.responseText && e.responseText.length > 0 && t.onChunk(e.status, e.responseText);
                        break;
                    case 4:
                        e.responseText && e.responseText.length > 0 && t.onChunk(e.status, e.responseText),
                        t.emit("finished", e.status),
                        t.close()
                    }
                }
                ,
                e
            },
            abortRequest: function(t) {
                t.onreadystatechange = null,
                t.abort()
            }
        }, we = {
            createStreamingSocket: function(t) {
                return this.createSocket(be, t)
            },
            createPollingSocket: function(t) {
                return this.createSocket(me, t)
            },
            createSocket: function(t, e) {
                return new ve(t,e)
            },
            createXHR: function(t, e) {
                return this.createRequest(_e, t, e)
            },
            createRequest: function(t, e, n) {
                return new pe(t,e,n)
            },
            createXDR: function(t, e) {
                return this.createRequest(ue, t, e)
            }
        }, Se = {
            nextAuthCallbackID: 1,
            auth_callbacks: {},
            ScriptReceivers: i,
            DependenciesReceivers: a,
            getDefaultStrategy: ae,
            Transports: Tt,
            transportConnectionInitializer: function() {
                var t = this;
                t.timeline.info(t.buildTimelineMessage({
                    transport: t.name + (t.options.useTLS ? "s" : "")
                })),
                t.hooks.isInitialized() ? t.changeState("initialized") : t.hooks.file ? (t.changeState("initializing"),
                u.load(t.hooks.file, {
                    useTLS: t.options.useTLS
                }, (function(e, n) {
                    t.hooks.isInitialized() ? (t.changeState("initialized"),
                    n(!0)) : (e && t.onError(e),
                    t.onClose(),
                    n(!1))
                }
                ))) : t.onClose()
            },
            HTTPFactory: we,
            TimelineTransport: rt,
            getXHRAPI: function() {
                return window.XMLHttpRequest
            },
            getWebSocketAPI: function() {
                return window.WebSocket || window.MozWebSocket
            },
            setup: function(t) {
                var e = this;
                window.Pusher = t;
                var n = function() {
                    e.onDocumentBody(t.ready)
                };
                window.JSON ? n() : u.load("json2", {}, n)
            },
            getDocument: function() {
                return document
            },
            getProtocol: function() {
                return this.getDocument().location.protocol
            },
            getAuthorizers: function() {
                return {
                    ajax: k,
                    jsonp: tt
                }
            },
            onDocumentBody: function(t) {
                var e = this;
                document.body ? t() : setTimeout((function() {
                    e.onDocumentBody(t)
                }
                ), 0)
            },
            createJSONPRequest: function(t, e) {
                return new nt(t,e)
            },
            createScriptRequest: function(t) {
                return new et(t)
            },
            getLocalStorage: function() {
                try {
                    return window.localStorage
                } catch (t) {
                    return
                }
            },
            createXHR: function() {
                return this.getXHRAPI() ? this.createXMLHttpRequest() : this.createMicrosoftXHR()
            },
            createXMLHttpRequest: function() {
                return new (this.getXHRAPI())
            },
            createMicrosoftXHR: function() {
                return new ActiveXObject("Microsoft.XMLHTTP")
            },
            getNetwork: function() {
                return Ot
            },
            createWebSocket: function(t) {
                return new (this.getWebSocketAPI())(t)
            },
            createSocketRequest: function(t, e) {
                if (this.isXHRSupported())
                    return this.HTTPFactory.createXHR(t, e);
                if (this.isXDRSupported(0 === e.indexOf("https:")))
                    return this.HTTPFactory.createXDR(t, e);
                throw "Cross-origin HTTP requests are not supported"
            },
            isXHRSupported: function() {
                var t = this.getXHRAPI();
                return Boolean(t) && void 0 !== (new t).withCredentials
            },
            isXDRSupported: function(t) {
                var e = t ? "https:" : "http:"
                  , n = this.getProtocol();
                return Boolean(window.XDomainRequest) && n === e
            },
            addUnloadListener: function(t) {
                void 0 !== window.addEventListener ? window.addEventListener("beforeunload", t, !1) : void 0 !== window.attachEvent && window.attachEvent("onunload", t)
            },
            removeUnloadListener: function(t) {
                void 0 !== window.addEventListener ? window.removeEventListener("beforeunload", t, !1) : void 0 !== window.detachEvent && window.detachEvent("onunload", t)
            }
        };
        !function(t) {
            t[t.ERROR = 3] = "ERROR",
            t[t.INFO = 6] = "INFO",
            t[t.DEBUG = 7] = "DEBUG"
        }(ge || (ge = {}));
        var ke = ge
          , Ce = function() {
            function t(t, e, n) {
                this.key = t,
                this.session = e,
                this.events = [],
                this.options = n || {},
                this.sent = 0,
                this.uniqueID = 0
            }
            return t.prototype.log = function(t, e) {
                t <= this.options.level && (this.events.push(z({}, e, {
                    timestamp: U.now()
                })),
                this.options.limit && this.events.length > this.options.limit && this.events.shift())
            }
            ,
            t.prototype.error = function(t) {
                this.log(ke.ERROR, t)
            }
            ,
            t.prototype.info = function(t) {
                this.log(ke.INFO, t)
            }
            ,
            t.prototype.debug = function(t) {
                this.log(ke.DEBUG, t)
            }
            ,
            t.prototype.isEmpty = function() {
                return 0 === this.events.length
            }
            ,
            t.prototype.send = function(t, e) {
                var n = this
                  , r = z({
                    session: this.session,
                    bundle: this.sent + 1,
                    key: this.key,
                    lib: "js",
                    version: this.options.version,
                    cluster: this.options.cluster,
                    features: this.options.features,
                    timeline: this.events
                }, this.options.params);
                return this.events = [],
                t(r, (function(t, r) {
                    t || n.sent++,
                    e && e(t, r)
                }
                )),
                !0
            }
            ,
            t.prototype.generateUniqueID = function() {
                return this.uniqueID++,
                this.uniqueID
            }
            ,
            t
        }()
          , Te = function() {
            function t(t, e, n, r) {
                this.name = t,
                this.priority = e,
                this.transport = n,
                this.options = r || {}
            }
            return t.prototype.isSupported = function() {
                return this.transport.isSupported({
                    useTLS: this.options.useTLS
                })
            }
            ,
            t.prototype.connect = function(t, e) {
                var n = this;
                if (!this.isSupported())
                    return Pe(new w, e);
                if (this.priority < t)
                    return Pe(new v, e);
                var r = !1
                  , o = this.transport.createConnection(this.name, this.priority, this.options.key, this.options)
                  , i = null
                  , s = function() {
                    o.unbind("initialized", s),
                    o.connect()
                }
                  , c = function() {
                    i = Qt.createHandshake(o, (function(t) {
                        r = !0,
                        h(),
                        e(null, t)
                    }
                    ))
                }
                  , a = function(t) {
                    h(),
                    e(t)
                }
                  , u = function() {
                    var t;
                    h(),
                    t = K(o),
                    e(new b(t))
                }
                  , h = function() {
                    o.unbind("initialized", s),
                    o.unbind("open", c),
                    o.unbind("error", a),
                    o.unbind("closed", u)
                };
                return o.bind("initialized", s),
                o.bind("open", c),
                o.bind("error", a),
                o.bind("closed", u),
                o.initialize(),
                {
                    abort: function() {
                        r || (h(),
                        i ? i.close() : o.close())
                    },
                    forceMinPriority: function(t) {
                        r || n.priority < t && (i ? i.close() : o.close())
                    }
                }
            }
            ,
            t
        }();
        function Pe(t, e) {
            return U.defer((function() {
                e(t)
            }
            )),
            {
                abort: function() {},
                forceMinPriority: function() {}
            }
        }
        var Oe = Se.Transports
          , Ee = function(t, e, n, r, o, i) {
            var s, c = Oe[n];
            if (!c)
                throw new _(n);
            return !(t.enabledTransports && -1 === B(t.enabledTransports, e) || t.disabledTransports && -1 !== B(t.disabledTransports, e)) ? (o = Object.assign({
                ignoreNullOrigin: t.ignoreNullOrigin
            }, o),
            s = new Te(e,r,i ? i.getAssistant(c) : c,o)) : s = Ae,
            s
        }
          , Ae = {
            isSupported: function() {
                return !1
            },
            connect: function(t, e) {
                var n = U.defer((function() {
                    e(new w)
                }
                ));
                return {
                    abort: function() {
                        n.ensureAborted()
                    },
                    forceMinPriority: function() {}
                }
            }
        }
          , Le = function(t) {
            if (void 0 === Se.getAuthorizers()[t.transport])
                throw "'" + t.transport + "' is not a recognized auth transport";
            return function(e, n) {
                var o = function(t, e) {
                    var n = "socket_id=" + encodeURIComponent(t.socketId);
                    for (var r in e.params)
                        n += "&" + encodeURIComponent(r) + "=" + encodeURIComponent(e.params[r]);
                    return n
                }(e, t);
                Se.getAuthorizers()[t.transport](Se, o, t, r.UserAuthentication, n)
            }
        }
          , xe = function(t) {
            if (void 0 === Se.getAuthorizers()[t.transport])
                throw "'" + t.transport + "' is not a recognized auth transport";
            return function(e, n) {
                var o = function(t, e) {
                    var n = "socket_id=" + encodeURIComponent(t.socketId);
                    for (var r in n += "&channel_name=" + encodeURIComponent(t.channelName),
                    e.params)
                        n += "&" + encodeURIComponent(r) + "=" + encodeURIComponent(e.params[r]);
                    return n
                }(e, t);
                Se.getAuthorizers()[t.transport](Se, o, t, r.ChannelAuthorization, n)
            }
        }
          , Re = function() {
            return (Re = Object.assign || function(t) {
                for (var e, n = 1, r = arguments.length; n < r; n++)
                    for (var o in e = arguments[n])
                        Object.prototype.hasOwnProperty.call(e, o) && (t[o] = e[o]);
                return t
            }
            ).apply(this, arguments)
        };
        function je(t) {
            return t.httpHost ? t.httpHost : t.cluster ? "sockjs-" + t.cluster + ".pusher.com" : s.httpHost
        }
        function Ie(t) {
            return t.wsHost ? t.wsHost : t.cluster ? De(t.cluster) : De(s.cluster)
        }
        function De(t) {
            return "ws-" + t + ".pusher.com"
        }
        function Ne(t) {
            return "https:" === Se.getProtocol() || !1 !== t.forceTLS
        }
        function He(t) {
            return "enableStats"in t ? t.enableStats : "disableStats"in t && !t.disableStats
        }
        function Me(t) {
            var e = Re({}, s.userAuthentication, t.userAuthentication);
            return "customHandler"in e && null != e.customHandler ? e.customHandler : Le(e)
        }
        function Ue(t, e) {
            var n = function(t, e) {
                var n;
                return "channelAuthorization"in t ? n = Re({}, s.channelAuthorization, t.channelAuthorization) : (n = {
                    transport: t.authTransport || s.authTransport,
                    endpoint: t.authEndpoint || s.authEndpoint
                },
                "auth"in t && ("params"in t.auth && (n.params = t.auth.params),
                "headers"in t.auth && (n.headers = t.auth.headers)),
                "authorizer"in t && (n.customHandler = function(t, e, n) {
                    var r = {
                        authTransport: e.transport,
                        authEndpoint: e.endpoint,
                        auth: {
                            params: e.params,
                            headers: e.headers
                        }
                    };
                    return function(e, o) {
                        var i = t.channel(e.channelName);
                        n(i, r).authorize(e.socketId, o)
                    }
                }(e, n, t.authorizer))),
                n
            }(t, e);
            return "customHandler"in n && null != n.customHandler ? n.customHandler : xe(n)
        }
        var ze = function() {
            var t = function(e, n) {
                return (t = Object.setPrototypeOf || {
                    __proto__: []
                }instanceof Array && function(t, e) {
                    t.__proto__ = e
                }
                || function(t, e) {
                    for (var n in e)
                        e.hasOwnProperty(n) && (t[n] = e[n])
                }
                )(e, n)
            };
            return function(e, n) {
                function r() {
                    this.constructor = e
                }
                t(e, n),
                e.prototype = null === n ? Object.create(n) : (r.prototype = n.prototype,
                new r)
            }
        }()
          , qe = function(t) {
            function e(e) {
                var n = t.call(this, (function(t, e) {
                    Z.debug("No callbacks on user for " + t)
                }
                )) || this;
                return n.signin_requested = !1,
                n.user_data = null,
                n.serverToUserChannel = null,
                n.pusher = e,
                n.pusher.connection.bind("connected", (function() {
                    n._signin()
                }
                )),
                n.pusher.connection.bind("connecting", (function() {
                    n._disconnect()
                }
                )),
                n.pusher.connection.bind("disconnected", (function() {
                    n._disconnect()
                }
                )),
                n.pusher.connection.bind("message", (function(t) {
                    "pusher:signin_success" === t.event && n._onSigninSuccess(t.data),
                    n.serverToUserChannel && n.serverToUserChannel.name === t.channel && n.serverToUserChannel.handleEvent(t)
                }
                )),
                n
            }
            return ze(e, t),
            e.prototype.signin = function() {
                this.signin_requested || (this.signin_requested = !0,
                this._signin())
            }
            ,
            e.prototype._signin = function() {
                var t = this;
                if (this.signin_requested && "connected" === this.pusher.connection.state) {
                    this.pusher.config.userAuthenticator({
                        socketId: this.pusher.connection.socket_id
                    }, (function(e, n) {
                        e ? Z.warn("Error during signin: " + e) : t.pusher.send_event("pusher:signin", {
                            auth: n.auth,
                            user_data: n.user_data
                        })
                    }
                    ))
                }
            }
            ,
            e.prototype._onSigninSuccess = function(t) {
                try {
                    this.user_data = JSON.parse(t.user_data)
                } catch (e) {
                    return void Z.error("Failed parsing user data after signin: " + t.user_data)
                }
                "string" == typeof this.user_data.id && "" !== this.user_data.id ? this._subscribeChannels() : Z.error("user_data doesn't contain an id. user_data: " + this.user_data)
            }
            ,
            e.prototype._subscribeChannels = function() {
                var t, e = this;
                this.serverToUserChannel = new Nt("#server-to-user-" + this.user_data.id,this.pusher),
                this.serverToUserChannel.bind_global((function(t, n) {
                    0 !== t.indexOf("pusher_internal:") && 0 !== t.indexOf("pusher:") && e.emit(t, n)
                }
                )),
                (t = this.serverToUserChannel).subscriptionPending && t.subscriptionCancelled ? t.reinstateSubscription() : t.subscriptionPending || "connected" !== e.pusher.connection.state || t.subscribe()
            }
            ,
            e.prototype._disconnect = function() {
                this.user_data = null,
                this.serverToUserChannel && (this.serverToUserChannel.unbind_all(),
                this.serverToUserChannel.disconnect(),
                this.serverToUserChannel = null)
            }
            ,
            e
        }(pt)
          , Be = function() {
            function t(e, n) {
                var r, o, i, c = this;
                if (function(t) {
                    if (null == t)
                        throw "You must pass your app key when you instantiate Pusher."
                }(e),
                !(n = n || {}).cluster && !n.wsHost && !n.httpHost) {
                    var a = p("javascriptQuickStart");
                    Z.warn("You should always specify a cluster when connecting. " + a)
                }
                "disableStats"in n && Z.warn("The disableStats option is deprecated in favor of enableStats"),
                this.key = e,
                this.config = (o = this,
                i = {
                    activityTimeout: (r = n).activityTimeout || s.activityTimeout,
                    cluster: r.cluster || s.cluster,
                    httpPath: r.httpPath || s.httpPath,
                    httpPort: r.httpPort || s.httpPort,
                    httpsPort: r.httpsPort || s.httpsPort,
                    pongTimeout: r.pongTimeout || s.pongTimeout,
                    statsHost: r.statsHost || s.stats_host,
                    unavailableTimeout: r.unavailableTimeout || s.unavailableTimeout,
                    wsPath: r.wsPath || s.wsPath,
                    wsPort: r.wsPort || s.wsPort,
                    wssPort: r.wssPort || s.wssPort,
                    enableStats: He(r),
                    httpHost: je(r),
                    useTLS: Ne(r),
                    wsHost: Ie(r),
                    userAuthenticator: Me(r),
                    channelAuthorizer: Ue(r, o)
                },
                "disabledTransports"in r && (i.disabledTransports = r.disabledTransports),
                "enabledTransports"in r && (i.enabledTransports = r.enabledTransports),
                "ignoreNullOrigin"in r && (i.ignoreNullOrigin = r.ignoreNullOrigin),
                "timelineParams"in r && (i.timelineParams = r.timelineParams),
                "nacl"in r && (i.nacl = r.nacl),
                i),
                this.channels = Qt.createChannels(),
                this.global_emitter = new pt,
                this.sessionID = Math.floor(1e9 * Math.random()),
                this.timeline = new Ce(this.key,this.sessionID,{
                    cluster: this.config.cluster,
                    features: t.getClientFeatures(),
                    params: this.config.timelineParams || {},
                    limit: 50,
                    level: ke.INFO,
                    version: s.VERSION
                }),
                this.config.enableStats && (this.timelineSender = Qt.createTimelineSender(this.timeline, {
                    host: this.config.statsHost,
                    path: "/timeline/v2/" + Se.TimelineTransport.name
                }));
                this.connection = Qt.createConnectionManager(this.key, {
                    getStrategy: function(t) {
                        return Se.getDefaultStrategy(c.config, t, Ee)
                    },
                    timeline: this.timeline,
                    activityTimeout: this.config.activityTimeout,
                    pongTimeout: this.config.pongTimeout,
                    unavailableTimeout: this.config.unavailableTimeout,
                    useTLS: Boolean(this.config.useTLS)
                }),
                this.connection.bind("connected", (function() {
                    c.subscribeAll(),
                    c.timelineSender && c.timelineSender.send(c.connection.isUsingTLS())
                }
                )),
                this.connection.bind("message", (function(t) {
                    var e = 0 === t.event.indexOf("pusher_internal:");
                    if (t.channel) {
                        var n = c.channel(t.channel);
                        n && n.handleEvent(t)
                    }
                    e || c.global_emitter.emit(t.event, t.data)
                }
                )),
                this.connection.bind("connecting", (function() {
                    c.channels.disconnect()
                }
                )),
                this.connection.bind("disconnected", (function() {
                    c.channels.disconnect()
                }
                )),
                this.connection.bind("error", (function(t) {
                    Z.warn(t)
                }
                )),
                t.instances.push(this),
                this.timeline.info({
                    instances: t.instances.length
                }),
                this.user = new qe(this),
                t.isReady && this.connect()
            }
            return t.ready = function() {
                t.isReady = !0;
                for (var e = 0, n = t.instances.length; e < n; e++)
                    t.instances[e].connect()
            }
            ,
            t.getClientFeatures = function() {
                return X(V({
                    ws: Se.Transports.ws
                }, (function(t) {
                    return t.isSupported({})
                }
                )))
            }
            ,
            t.prototype.channel = function(t) {
                return this.channels.find(t)
            }
            ,
            t.prototype.allChannels = function() {
                return this.channels.all()
            }
            ,
            t.prototype.connect = function() {
                if (this.connection.connect(),
                this.timelineSender && !this.timelineSenderTimer) {
                    var t = this.connection.isUsingTLS()
                      , e = this.timelineSender;
                    this.timelineSenderTimer = new M(6e4,(function() {
                        e.send(t)
                    }
                    ))
                }
            }
            ,
            t.prototype.disconnect = function() {
                this.connection.disconnect(),
                this.timelineSenderTimer && (this.timelineSenderTimer.ensureAborted(),
                this.timelineSenderTimer = null)
            }
            ,
            t.prototype.bind = function(t, e, n) {
                return this.global_emitter.bind(t, e, n),
                this
            }
            ,
            t.prototype.unbind = function(t, e, n) {
                return this.global_emitter.unbind(t, e, n),
                this
            }
            ,
            t.prototype.bind_global = function(t) {
                return this.global_emitter.bind_global(t),
                this
            }
            ,
            t.prototype.unbind_global = function(t) {
                return this.global_emitter.unbind_global(t),
                this
            }
            ,
            t.prototype.unbind_all = function(t) {
                return this.global_emitter.unbind_all(),
                this
            }
            ,
            t.prototype.subscribeAll = function() {
                var t;
                for (t in this.channels.channels)
                    this.channels.channels.hasOwnProperty(t) && this.subscribe(t)
            }
            ,
            t.prototype.subscribe = function(t) {
                var e = this.channels.add(t, this);
                return e.subscriptionPending && e.subscriptionCancelled ? e.reinstateSubscription() : e.subscriptionPending || "connected" !== this.connection.state || e.subscribe(),
                e
            }
            ,
            t.prototype.unsubscribe = function(t) {
                var e = this.channels.find(t);
                e && e.subscriptionPending ? e.cancelSubscription() : (e = this.channels.remove(t)) && e.subscribed && e.unsubscribe()
            }
            ,
            t.prototype.send_event = function(t, e, n) {
                return this.connection.send_event(t, e, n)
            }
            ,
            t.prototype.shouldUseTLS = function() {
                return this.config.useTLS
            }
            ,
            t.prototype.signin = function() {
                this.user.signin()
            }
            ,
            t.instances = [],
            t.isReady = !1,
            t.logToConsole = !1,
            t.Runtime = Se,
            t.ScriptReceivers = Se.ScriptReceivers,
            t.DependenciesReceivers = Se.DependenciesReceivers,
            t.auth_callbacks = Se.auth_callbacks,
            t
        }()
          , Fe = e.default = Be;
        Se.setup(Be)
    }
    ])
}
));
//# sourceMappingURL=pusher.min.js.map
