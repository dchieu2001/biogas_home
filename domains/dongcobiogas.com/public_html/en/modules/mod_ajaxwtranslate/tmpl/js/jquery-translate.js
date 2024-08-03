//jQuery Translate plugin and related components
/*! 
 * jQuery nodesContainingText plugin 
 * 
 * Version: 1.1.2
 * 
 * http://code.google.com/p/jquery-translate/
 * 
 * Copyright (c) 2009 Balazs Endresz (balazs.endresz@gmail.com)
 * Dual licensed under the MIT and GPL licenses.
 * 
 */
jQuery.noConflict ();
(function($) { 
  $(function() {
      
//jQuery Translate plugin and related components


/*! 
 * jQuery nodesContainingText plugin 
 * 
 * Version: 1.1.2
 * 
 * http://code.google.com/p/jquery-translate/
 * 
 * Copyright (c) 2009 Balazs Endresz (balazs.endresz@gmail.com)
 * Dual licensed under the MIT and GPL licenses.
 * 
 */
 
;(function($){

function Nct(){}

Nct.prototype = {
    init: function(jq, o){
        this.textArray = [];
        this.elements = [];
        this.options = o;
        this.jquery = jq;
        this.n = -1;
        if(o.async === true)
            o.async = 2;
        
        if(o.not){
            jq = jq.not(o.not);
            jq = jq.add( jq.find("*").not(o.not) ).not( $(o.not).find("*") );
        }else
            jq = jq.add( jq.find("*") );

        this.jq = jq;
        this.jql = this.jq.length;
        return this.process();

    },

    process: function(){
        this.n++;
        var that = this, o = this.options, text = "", hasTextNode = false,
            hasChildNode = false, el = this.jq[this.n], e, c, ret;
        
        if(this.n === this.jql){
            ret = this.jquery.pushStack(this.elements, "nodesContainingText");
            o.complete.call(ret, ret, this.textArray);
            
            if(o.returnAll === false && o.walk === false)
                return this.jquery;
            return ret;
        }
        
        if(!el)
            return this.process();
        e=$(el);

        var nodeName = el.nodeName.toUpperCase(),
            type = nodeName === "INPUT" && $.attr(el, "type").toLowerCase();
        
        if( ({SCRIPT:1, NOSCRIPT:1, STYLE:1, OBJECT:1, IFRAME:1})[ nodeName ] )
            return this.process();
        
        if(typeof o.subject === "string"){
            text=e.attr(o.subject);
        }else{    
            if(o.altAndVal && (nodeName === "IMG" || type === "image" ) )
                text = e.attr("alt");
            else if( o.altAndVal && ({text:1, button:1, submit:1})[ type ] )
                text = e.val();
            else if(nodeName === "TEXTAREA")
                text = e.val();
            else{
                //check childNodes:
                c = el.firstChild;
                if(o.walk !== true)
                    hasChildNode = true;
                else{
                    while(c){
                        if(c.nodeType == 1){
                            hasChildNode = true;
                            break;
                        }
                        c=c.nextSibling;
                    }
                }

                if(!hasChildNode)
                    text = e.text();
                else{//check textNodes:
                    if(o.walk !== true)
                        hasTextNode = true;
                    
                    c=el.firstChild;
                    while(c){
                        if(c.nodeType == 3 && c.nodeValue.match(/\S/) !== null){//textnodes with text
                            /*jslint skipLines*/
                            if(c.nodeValue.match(/<![ \r\n\t]*(--([^\-]|[\r\n]|-[^\-])*--[ \r\n\t]*)>/) !== null){
                                if(c.nodeValue.match(/(\S+(?=.*<))|(>(?=.*\S+))/) !== null){
                                    hasTextNode = true;
                                    break;
                                }
                            }else{
                                hasTextNode = true;
                                break;
                            }
                            /*jslint skipLinesEnd*/
                        }
                        c = c.nextSibling;
                    }

                    if(hasTextNode){//remove child nodes from jq
                        //remove scripts:
                        text = e.html();
                        /*jslint skipLines*/
                        text = o.stripScripts ? text.replace(/<script[^>]*>([\s\S]*?)<\/script>/gi, "") : text;
                        /*jslint skipLinesEnd*/
                        this.jq = this.jq.not( e.find("*") );
                    }
                }
            }
        }

        if(!text)
            return this.process();
        this.elements.push(el);
        this.textArray.push(text);

        o.each.call(el, this.elements.length - 1, el, text);
        
        if(o.async){
            setTimeout(function(){that.process();}, o.async);
            return this.jquery;
        }else
            return this.process();
        
    }
};

var defaults = {
    not: "",
    async: false,
    each: function(){},
    complete: function(){},
    comments: false,
    returnAll: true,
    walk: true,
    altAndVal: false,
    subject: true,
    stripScripts: true
};

$.fn.nodesContainingText = function(o){
    o = $.extend({}, defaults, $.fn.nodesContainingText.defaults, o);
    return new Nct().init(this, o);
};

$.fn.nodesContainingText.defaults = defaults;

})(jQuery);

/*!
 * Textnode Translator
 * Ariel Flesler - http://flesler.blogspot.com/2008/05/textnode-translator-for-javascript.html
 */
//This is now only a placeholder, the original script has been modified 
//and the Translator class is no longer exposed

/*! 
 * jQuery Translate plugin 
 * 
 * Version: 1.4.6
 * 
 * http://code.google.com/p/jquery-translate/
 * 
 * Copyright (c) 2009 Balazs Endresz (balazs.endresz@gmail.com)
 * Dual licensed under the MIT and GPL licenses.
 * 
 * This plugin uses the 'Google AJAX Language API' (http://code.google.com/apis/ajaxlanguage/)
 * You can read the terms of use at http://code.google.com/apis/ajaxlanguage/terms.html
 * 
 */
;(function($){
           
function $function(){}

var True = true, False = false, undefined, replace = "".replace,
    Str = String, Fn = Function, Obj = Object,
    GL, GLL, toLangCode, inverseLanguages = {},
    loading, readyList = [],
    defaults = {
        from: "",
        to: "",
        start: $function,
        error: $function,
        each: $function,
        complete: $function,
        onTimeout: $function,
        timeout: 0,
        
        stripComments: True,
        stripWhitespace: True,
        stripScripts: True,
        separators: /\.\?\!;:/,
        limit: 1750,
        

        walk: True,
        returnAll: False,
        replace: True,
        rebind: True,
        data: True,
        setLangAttr: False,
        subject: True,
        not: "",
        altAndVal:True,
        async: False,
        toggle: False,
        fromOriginal: True,
        
        parallel: false
        //,response: $function
        
    };


function loaded(){
    $.translate.GL = GL = google.language;
    $.translate.GLL = GLL = GL.Languages;
    toLangCode = $.translate.toLanguageCode;
    
    $.each(GLL, function(l, lc){
        inverseLanguages[ lc.toUpperCase() ] = l;
    });
    
    $.translate.isReady = True;
    var fn;
    while((fn = readyList.shift())) fn();
}

function filter(obj, fn){
    var newObj = {};
    $.each(obj, function(lang, langCode){
        if( fn(langCode, lang) === True) newObj[ lang ] = langCode;
    });
    return newObj;
}

function bind(fn, thisObj, args){
    return function(){
        return fn.apply(thisObj === True ? arguments[0] : thisObj, args || arguments);
    };
}

function isSet(e){
    return e !== undefined;
}

function validate(_args, overload, error){
    var matched, obj = {}, args = $.grep(_args, isSet);
    
    $.each(overload, function(_, el){
        var matches = $.grep(el[0], function(e, i){
                return isSet(args[i]) && args[i].constructor === e;
            }).length;
        if(matches === args.length && matches === el[0].length && (matched = True)){
            $.each(el[1], function(i, prop){
                obj[prop] = args[i];
            });
            return False;
        }
    });
    //TODO
    if(!matched) throw error;
    return obj;
}


function getOpt(args0, _defaults){
    //args0=[].slice.call(args0, 0)
    var args = validate(args0 , $.translate.overload, "jQuery.translate: Invalid arguments" ),
        o = args.options || {};
    delete args.options;
    o = $.extend({}, defaults, _defaults, $.extend(o, args));
    
    if(o.fromOriginal) o.toggle = True;
    if(o.toggle) o.data = True;
    if(o.async === True) o.async = 2;
    
    return o;
}


function T(){
    //copy over static methods during each instantiation
    //for backward compatibility and access inside callback functions
    this.extend($.translate);
    delete this.defaults;
    delete this.fn;
}

T.prototype = {
    version: "1.4.6",
    
    _init: function(t, o){
        var separator = o.separators.source || o.separators,
            isString = this.isString = typeof t === "string",
            lastpos = 0, substr;
        
        $.each(["stripComments", "stripScripts", "stripWhitespace"], function(i, name){
            var fn = $.translate[name];
            if( o[name] )
                t = isString ? fn(t) : $.map(t, fn);
        });

        this.rawSource = "<div>" + (isString ? t : t.join("</div><div>")) + "</div>";
        this._m3 = new RegExp("[" + separator + "](?![^" + separator + "]*[" + separator + "])");
        this.options = o;
        this.from = o.from = toLangCode(o.from) || "";
        this.to = o.to = toLangCode(o.to) || "";
        this.source = t;
        this.rawTranslation = "";
        this.translation = [];
        this.i = 0;
        this.stopped = False;
        this.elements = o.nodes;
        
        //this._nres = 0;
        //this._progress = 0;
        this._i = -1; //TODO: rename
        this.rawSources = [];
        
        while(True){
            substr = this.truncate( this.rawSource.substr(lastpos), o.limit);
            if(!substr) break;
            this.rawSources.push(substr);
            lastpos += substr.length;
        }
        this.queue = new Array(this.rawSources.length);
        this.done = 0;
        
        o.start.call(this, t , o.from, o.to, o);
        
        if(o.timeout)
            this.timeout = setTimeout(bind(o.onTimeout, this, [t, o.from, o.to, o]), o.timeout);
        
        (o.toggle && o.nodes) ?    
            (o.textNodes ? this._toggleTextNodes() : this._toggle()) : 
            this._process();
    },
    
    _process: function(){
        if(this.stopped)
            return;
        var o = this.options,
            i = this.rawTranslation.length,
            lastpos, subst, divst, divcl;
        var that = this;
        
        while( (lastpos = this.rawTranslation.lastIndexOf("</div>", i)) > -1){

            i = lastpos - 1;
            subst = this.rawTranslation.substr(0, i + 1);
            /*jslint skipLines*/        
            divst = subst.match(/<div[> ]/gi);    
            divcl = subst.match(/<\/div>/gi);
            /*jslint skipLinesEnd*/
            
            divst = divst ? divst.length : 0;
            divcl = divcl ? divcl.length : 0;
            
            if(divst !== divcl + 1) continue; //if there are some unclosed divs

            var divscompl = $( this.rawTranslation.substr(0, i + 7) ), 
                divlen = divscompl.length, 
                l = this.i;
            
            if(l === divlen) break; //if no new elements have been completely translated
            
            divscompl.slice(l, divlen).each( bind(function(j, e){
                if(this.stopped)
                    return False;
                var tr = $.trim($(e).html()), i = l + j, src = this.source,
                    from = !this.from && this.detectedSourceLanguage || this.from;
                this.translation[i] = tr;//create an array for complete callback
                this.isString ? this.translation = tr : src = this.source[i];
                
                o.each.call(this, i, tr, src, from, this.to, o);
                
                this.i++;
            }, this));
            
            break;
        }
        
        if(this.rawSources.length - 1 == this._i)
            this._complete();
        
        var _translate = bind(this._translate, this);
        
        if(o.parallel){
            if(this._i < 0){
                if(!o.parallel){
                    $.each(this.rawSources, _translate);
                }else{
                    var j = 0, n = this.rawSources.length;
                    function seq(){
                        _translate();
                        if(j < n)
                            setTimeout( seq, o.parallel );
                    }
                    seq();
                }
            }
        }else
            _translate();
            
    },
    
    _translate: function(){
        this._i++;        
        var i = this._i, src = this.rawSourceSub = this.rawSources[i];
        if(!src) return;
        
        GL.translate(src, this.from, this.to, bind(function(result){
            //this._progress = 100 * (++this._nres) / this.rawSources.length;
            //this.options.response.call(this, this._progress, result);
            if(result.error)
                return this.options.error.call(this, result.error, this.rawSourceSub, this.from, this.to, this.options);
            
            this.queue[i] = result.translation || this.rawSourceSub;
            this.detectedSourceLanguage = result.detectedSourceLanguage;
            this._check();
        }, this));

    },
    
    _check: function(){
        if(!this.options.parallel){
            this.rawTranslation += this.queue[this._i];
            this._process();
            return;
        }
        
        var done = 0;
        jQuery.each(this.queue, function(i, n) {
            if (n != undefined) done = i;
            else return false;
        });            
        
        if ((done > this.done) || (done === this.queue.length - 1)) {
            for(var i = 0; i <= done; i++)
                this.rawTranslation += this.queue[i];
            this._process();
        }
        this.done = done;
        
    },
    
    _complete: function(){
        clearTimeout(this.timeout);

        this.options.complete.call(this, this.translation, this.source, 
            !this.from && this.detectedSourceLanguage || this.from, this.to, this.options);
    },
    
    stop: function(){
        if(this.stopped)
            return this;
        this.stopped = True;
        this.options.error.call(this, {message:"stopped"});
        return this;
    }
};



$.translate = function(t, a){
    if(t == undefined)
        return new T();
    if( $.isFunction(t) )
        return $.translate.ready(t, a);
    var that = new T();
    
    var args = [].slice.call(arguments, 0);
    args.shift();
    return $.translate.ready( bind(that._init, that, [t, getOpt(args, $.translate.defaults)] ), False, that );
};


$.translate.fn = $.translate.prototype = T.prototype;

$.translate.fn.extend = $.translate.extend = $.extend;


$.translate.extend({
    
    _bind: bind,
    
    _filter: filter,
    
    _validate: validate,
    
    _getOpt: getOpt,
    
    _defaults: defaults, //base defaults used by other components as well //TODO
    
    defaults: $.extend({}, defaults),
    
    capitalize: function(t){ return t.charAt(0).toUpperCase() + t.substr(1).toLowerCase(); },
    
    truncate: function(text, limit){
        var i, m1, m2, m3, m4, t, encoded = encodeURIComponent( text );
        
        for(i = 0; i < 10; i++){
            try { 
                t = decodeURIComponent( encoded.substr(0, limit - i) );
            } catch(e){ continue; }
            if(t) break;
        }
        
        return ( !( m1 = /<(?![^<]*>)/.exec(t) ) ) ? (  //if no broken tag present
            ( !( m2 = />\s*$/.exec(t) ) ) ? (  //if doesn't end with '>'
                ( m3 = this._m3.exec(t) ) ? (  //if broken sentence present
                    ( m4 = />(?![^>]*<)/.exec(t) ) ? ( 
                        m3.index > m4.index ? t.substring(0, m3.index+1) : t.substring(0, m4.index+1)
                    ) : t.substring(0, m3.index+1) ) : t ) : t ) : t.substring(0, m1.index);
    },

    getLanguages: function(a, b){
        if(a == undefined || (b == undefined && !a))
            return GLL;
        
        var newObj = {}, typeof_a = typeof a,
            languages = b ? $.translate.getLanguages(a) : GLL,
            filterArg = ( typeof_a  === "object" || typeof_a  === "function" ) ? a : b;
                
        if(filterArg)
            if(filterArg.call) //if it's a filter function
                newObj = filter(languages, filterArg);
            else //if it's an array of languages
                for(var i = 0, length = filterArg.length, lang; i < length; i++){
                    lang = $.translate.toLanguage(filterArg[i]);
                    if(languages[lang] != undefined)
                        newObj[lang] = languages[lang];
                }
        else //if the first argument is true -> only translatable languages
            newObj = filter(GLL, GL.isTranslatable);
        
        return newObj;
    },
    

    toLanguage: function(a, format){
        var u = a.toUpperCase();
        var l = inverseLanguages[u] || 
            (GLL[u] ? u : undefined) || 
            inverseLanguages[($.translate.languageCodeMap[a.toLowerCase()]||"").toUpperCase()];
        return l == undefined ? undefined :
            format === "lowercase" ? l.toLowerCase() : format === "capitalize" ? $.translate.capitalize(l) : l;                
    },
    
    toLanguageCode: function(a){
        return GLL[a] || 
            GLL[ $.translate.toLanguage(a) ] || 
            $.translate.languageCodeMap[a.toLowerCase()];
    },
        
    same: function(a, b){
        return a === b || toLangCode(a) === toLangCode(b);
    },
        
    isTranslatable: function(l){
        return GL.isTranslatable( toLangCode(l) );
    },

    //keys must be lower case, and values must equal to a 
    //language code specified in the Language API
    languageCodeMap: {
        "pt": "pt-PT",
        "he": "iw",
        "zlm": "ms",
        "zh-hans": "zh-CN",
        "zh-hant": "zh-TW"
        //,"zh-sg":"zh-CN"
        //,"zh-hk":"zh-TW"
        //,"zh-mo":"zh-TW"
    },
    
    //use only language codes specified in the Language API
    isRtl: {
        "ar": True,
        "iw": True,
        "fa": True,
        "ur": True,
        "yi": True
    },
    
    getBranding: function(){
        return $( GL.getBranding.apply(GL, arguments) );
    },
    
    load: function(key, version){
        loading = True;
        function _load(){ 
            google.load("language", version || "1", {"callback" : loaded});
        }
        
        if(typeof google !== "undefined" && google.load)
            _load();
        else
            $.getScript("http://www.google.com/jsapi" + (key ? "?key=" + key : ""), _load);
        return $.translate;
    },
    
    ready: function(fn, preventAutoload, that){
        $.translate.isReady ? fn() : readyList.push(fn);
        if(!loading && !preventAutoload)
            $.translate.load();
        return that || $.translate;
    },
    
    isReady: False,
    
    overload: [
        [[],[]],
        [[Str, Str, Obj],    ["from", "to", "options"]    ],
        [[Str, Obj],         ["to", "options"]            ],
        [[Obj],             ["options"]                    ],
        [[Str, Str],         ["from", "to"]                ],
        [[Str],             ["to"]                        ],
        [[Str, Str, Fn],    ["from", "to", "complete"]    ],
        [[Str, Fn],         ["to", "complete"]            ]
         //TODO
        //,[[Str, Str, Fn, Fn], ["from", "to", "each", "complete"]]
    ]
    /*jslint skipLines*/
    ,
    //jslint doesn't seem to be able to parse some regexes correctly if used on the server,
    //however it works fine if it's run on the command line: java -jar rhino.jar jslint.js file.js
    stripScripts: bind(replace, True, [/<script[^>]*>([\s\S]*?)<\/script>/gi, ""]),
    
    stripWhitespace: bind(replace, True, [/\s\s+/g, " "]),
    
    stripComments: bind(replace, True, [/<![ \r\n\t]*(--([^\-]|[\r\n]|-[^\-])*--[ \r\n\t]*)>/g, ""])
    /*jslint skipLinesEnd*/
});


})(jQuery);

/*!-
 * jQuery.fn.nodesContainingText adapter for the jQuery Translate plugin 
 * Version: 1.4.6
 * http://code.google.com/p/jquery-translate/
 */
;(function($){

var True = true,
    isInput = {text:True, button:True, submit:True},
    dontCopyEvents = {SCRIPT:True, NOSCRIPT:True, STYLE:True, OBJECT:True, IFRAME:True},
    $fly = $([]);

$fly.length = 1;

function getDoc(node){
    while (node && node.nodeType != 9)
        node = node.parentNode;
    return node;
}

function toggleDir(e, dir){
    var align = e.css("text-align");
    e.css("direction", dir);
    if(align === "right") e.css("text-align", "left");
    if(align === "left") e.css("text-align", "right");
}

function getType(el, o){
    var nodeName = el.nodeName.toUpperCase(),
        type = nodeName === 'INPUT' && $.attr(el, 'type').toLowerCase();
    o = o || {altAndVal:True, subject:True};
    return typeof o.subject === "string" ? o.subject :
        o.altAndVal && (nodeName === 'IMG' || type === "image" )  ? "alt" :
        o.altAndVal && isInput[ type ] ? "$val" :
        nodeName === "TEXTAREA" ? "$val" : "$html";
}

$.translate.fn._toggle = function(){
    var o = this.options, to = o.to, stop;
    
    this.elements.each($.translate._bind(function(i, el){
        this.i = i;
        var e = $(el), tr = $.translate.getData(e, to, o);
        
        if(!tr) return !(stop = True);
        
        this.translation.push(tr);

        o.each.call(this, i, el, tr, this.source[i], this.from, to, o);
        //'from' will be undefined if it wasn't set
    }, this));
    
    !stop ? this._complete() : this._process();
    //o.complete.call(this, o.nodes, this.translation, this.source, this.from, this.to, o)
};



$.translate.extend({
    _getType: getType,
    
    each: function(i, el, t, s, from, to, o){
        $fly[0] = el;
        $.translate.setData($fly, to, t, from, s, o);
        $.translate.replace($fly, t, to, o);
        $.translate.setLangAttr($fly, to, o);
    },
    
    getData: function(e, lang, o){
        var el = e[0] || e, data = $.data(el, "translation");
        return data && data[lang] && data[lang][ getType(el, o) ];
    },
    
    setData: function(e, to, t, from, s, o){
        if(o && !o.data) return;
        
        var el = e[0] || e,
            type = getType(el, o),
            data = $.data(el, "translation");
        
        data = data || $.data(el, "translation", {});
        (data[from] = data[from] || {})[type] = s;
        (data[to] = data[to] || {})[type] = t;
    },
    
    
    replace: function(e, t, to, o){
        
        if(o && !o.replace) return;
        
        if(o && typeof o.subject === "string")
            return e.attr(o.subject, t);

        var el = e[0] || e, 
            nodeName = el.nodeName.toUpperCase(),
            type = nodeName === 'INPUT' && $.attr(el, 'type').toLowerCase(),
            isRtl = $.translate.isRtl,
            lang = $.data(el, "lang");
        
        if( lang === to )
            return;
        
        if( isRtl[ to ] !== isRtl[ lang || o && o.from ] ){
            if( isRtl[ to ] )
                toggleDir(e, "rtl");
            else if( e.css("direction") === "rtl" )
                toggleDir(e, "ltr");
        }
        
        if( (!o || o.altAndVal) && (nodeName === 'IMG' || type === "image" ) )
            e.attr("alt", t);
        else if( nodeName === "TEXTAREA" || (!o || o.altAndVal) && isInput[ type ] )
            e.val(t);
        else{
            if(!o || o.rebind){
                this.doc = this.doc || getDoc(el);
                var origContents = e.find("*").not("script"),
                    newElem = $(this.doc.createElement("div")).html(t);
                $.translate.copyEvents( origContents, newElem.find("*") );
                e.html( newElem.contents() );
            }else
                e.html(t);
        }
        
        //used for determining if the text-align property should be changed,
        //it's much faster than setting the "lang" attribute, see bug #13
        $.data(el, "lang", to);
    },
    
    setLangAttr: function(e, to, o){    
        if(!o || o.setLangAttr)
            e.attr((!o || o.setLangAttr === True) ? "lang" : o.setLangAttr, to);
    },
    
    copyEvents: function(from, to){
        to.each(function(i, to_i){
            var from_i = from[i];
            if( !to_i || !from_i ) //in some rare cases the translated html structure can be slightly different
                return false;
            if( dontCopyEvents[ from_i.nodeName.toUpperCase() ])
                return True;
            var events = $.data(from_i, "events");
            if(!events)
                return True;
            for(var type in events)
                for(var handler in events[type])
                    $.event.add(to_i, type, events[type][handler], events[type][handler].data);
        });
    }
    
});


$.fn.translate = function(a, b, c){
    var o = $.translate._getOpt(arguments, $.fn.translate.defaults),
        ncto = $.extend( {}, $.translate._defaults, $.fn.translate.defaults, o,
            { complete:function(e,t){$.translate(function(){
                
                var from = $.translate.toLanguageCode(o.from);

                if(o.fromOriginal)
                    e.each(function(i, el){
                        $fly[0] = el;
                        var data = $.translate.getData($fly, from, o);
                        if( !data ) return true;
                        t[i] = data;
                    });
                
                
                var each = o.each;
                
                function unshiftArgs(method){
                    return function(){
                        [].unshift.call(arguments, this.elements);
                        method.apply(this, arguments);
                    };
                }
                
                //TODO: set as instance property
                o.nodes = e;
                o.start = unshiftArgs(o.start);
                o.onTimeout = unshiftArgs(o.onTimeout);
                o.complete = unshiftArgs(o.complete);
                
                o.each = function(i){
                    var args = arguments;
                    if(arguments.length !== 7) //if isn't called from _toggle
                        [].splice.call(args, 1, 0, this.elements[i]);
                    this.each.apply(this, args);
                    each.apply(this, args);
                };
                
                $.translate(t, o);
                
            });},
            
            each: function(){}
        });

    if(this.nodesContainingText)
        return this.nodesContainingText(ncto);
    
    //fallback if nodesContainingText method is not present:
    o.nodes = this;
    $.translate($.map(this, function(e){ return $(e).html() || $(e).val(); }), o);
    return this;
};

$.fn.translate.defaults = $.extend({}, $.translate._defaults);

})(jQuery);

/*!-
 * TextNode Translator for the jQuery Translate plugin 
 * Version: 1.4.6
 * http://code.google.com/p/jquery-translate/
 */

;(function($){


function getTextNodes( root, _filter ){

    var nodes = [],
        skip = {SCRIPT:1, NOSCRIPT:1, STYLE:1, IFRAME:1},
        notType = typeof _filter,
        filter = notType === "string" ? function(node){ return !$(node).is(_filter); } :
                 notType === "function" ? _filter :  //e.g. function(node){ return node.nodeName != 'A'; }
                 null;
    
    function recurse(_, root){
        var i = 0, children = root.childNodes, l = children.length, node;
        for(; i < l; i++){
            node = children[i];
            
            if(node.nodeType == 3 && /\S/.test(node.nodeValue))
                nodes.push(node);
            else if( node.nodeType == 1 &&
                    !skip[ node.nodeName.toUpperCase() ] && 
                    (!filter || filter(node)))
                recurse(null, node);
        }
    }
    
    $.each((root.length && !root.nodeName) ? root : [root], recurse);

    return nodes;
}

function toggleDir(e, dir){
    var align = e.css("text-align");
    e.css("direction", dir);
    if(align === "right") e.css("text-align", "left");
    if(align === "left") e.css("text-align", "right");
}

function setLangAttr(e, to, o){    
    if(!o || o.setLangAttr)
        $(e).attr((!o || o.setLangAttr === true) ? "lang" : o.setLangAttr, to);
}
    
function replace(parent, node, text, to, o){
    if(!o.replace) return;
    var isRtl = $.translate.isRtl,
        lang = $.data(parent, "lang");
    
    if( isRtl[ to ] !== isRtl[ lang || o && o.from ] ){
        var $parent = $(parent);
        if( isRtl[ to ] )
            toggleDir($parent, "rtl");
        else if( $parent.css("direction") === "rtl" )
            toggleDir($parent, "ltr");
    }
    
    $.data(parent, "lang", to);
    
    if(text != node.nodeValue){
        var newTextNode = document.createTextNode(text);
        parent.replaceChild(newTextNode, node);
        return newTextNode;
    }
    
    return node;
}

function setData(parent, o, src, trnsl){
    if(o.data){
        var TR = "translation";
        if(!$.data(parent, TR))
            $.data(parent, TR, {});
        
        if(!$.data(parent, TR)[o.from])
            $.data(parent, TR)[o.from] = [];
        [].push.call($.data(parent, TR)[o.from], src);    
        
        if(!$.data(parent, TR)[o.to])
            $.data(parent, TR)[o.to] = [];
        [].push.call($.data(parent, TR)[o.to], trnsl);    
    }
}

function getData(parent, lang, that){
    that._childIndex = that._prevParent === parent ? that._childIndex + 1 : 0;
    var tr = $.data(parent, "translation");
    that._prevParent = parent;
    return tr && tr[lang] && tr[lang][that._childIndex];
    
}

function _each(i, textNode, t, s, from, to, o){
    t = t.replace(/&lt;/g, '<')
        .replace(/&gt;/g, '>')
        .replace(/&amp;/g, '&')
        .replace(/&quot;/g, '"')
        .replace(/&#39;|&apos;/g, "'");
    
    var parent = textNode.parentNode;
    setData(parent, o, s, t);
    var newTextNode = replace(parent, textNode, t, to, o);
    setLangAttr(parent, o.to, o);
    
    return newTextNode;
}

$.translateTextNodes = function(root){ 
    var args = [].slice.call(arguments,0);
    args.shift();
    
$.translate(function(){
    var o = $.translate._getOpt(args, $.translateTextNodes.defaults),
        each = o.each,
        nodes = getTextNodes(root, o.not),
        contents = $.map(nodes, function(n){ return n.nodeValue; }),
        from = $.translate.toLanguageCode(o.from),
        obj = {};
    
    o.nodes = nodes;
    o.textNodes = true;
    

    if(o.fromOriginal)
        $.each(nodes, function(i, textNode){
            var data = getData(textNode.parentNode, from, obj);
            if( !data ) return true;
            contents[i] = data;
        });
    
    function unshiftArgs(method){
        return function(){
            [].unshift.call(arguments, this.elements);
            method.apply(this, arguments);
        };
    }
    
    o.start = unshiftArgs(o.start);
    o.onTimeout = unshiftArgs(o.onTimeout);
    o.complete = unshiftArgs(o.complete);
    
    o.each = function(i){
        var args = arguments;
        if(arguments.length !== 7) //if isn't called from _toggle
            [].splice.call(args, 1, 0, this.elements[i]);        
        this.elements[i] = args[1] = _each.apply(this, args);
        
        each.apply(this, args);
    };
    
    $.translate(contents, o);
    
});
};

$.translate.fn._toggleTextNodes = function(){
    var o = this.options, to = o.to, stop;
    
    $.each(this.elements, $.translate._bind(function(i, textNode){
        this.i = i;
        var parent = textNode.parentNode, 
            tr = getData(parent, to, this);
        
        if(!tr) return !(stop = true);
        
        this.translation.push(tr);
        
        o.each.call(this, i, textNode, tr, this.source[i], this.from, to, o);
        //'from' will be undefined if it wasn't set
    }, this));
    
    !stop ? this._complete() : this._process();
    //o.complete.call(this, this.elements, this.translation, this.source, this.from, this.to, o);
};

$.fn.translateTextNodes = function(a, b, c){
    [].unshift.call(arguments, this);
    $.translateTextNodes.apply(null, arguments);
    return this;
};

$.translateTextNodes.defaults = $.fn.translateTextNodes.defaults = $.extend({}, $.translate._defaults);

})(jQuery);

/*!-
 * Simple user interface extension for the jQuery Translate plugin 
 * Version: 1.4.6
 * http://code.google.com/p/jquery-translate/
 */
;(function($){

var defaults = {
    tags: ["select", "option"],
    filter: $.translate.isTranslatable,
    label: $.translate.toNativeLanguage || 
        function(langCode, lang){
            return $.translate.capitalize(lang);
        },
    includeUnknown: false
};

$.translate.ui = function(){
    var o = {}, str='', cs='', cl='';
    
    if(typeof arguments[0] === "string")
        o.tags = $.makeArray(arguments);
    else o = arguments[0];
    
    o = $.extend({}, defaults, $.translate.ui.defaults, o);
        
    if(o.tags[2]){
        cs = '<' + o.tags[2] + '>';
        cl = '</' + o.tags[2] + '>';
    }
    
    var languages = $.translate.getLanguages(o.filter);
    if(!o.includeUnknown) delete languages.UNKNOWN;
    
    $.each( languages, function(l, lc){
        str += ('<' + o.tags[1] + " value=" + lc + '>' + cs +
            //$.translate.capitalize(l) + " - " + 
            o.label(lc, l) +
            cl + '</' + o.tags[1] + '>');
    });

    return $('<' + o.tags[0] + ' class="jq-translate-ui">' + str + '</' + o.tags[0] + '>');

};

$.translate.ui.defaults = $.extend({}, defaults);


})(jQuery);

/*!-
 * Progress indicator extension for the jQuery Translate plugin 
 * Version: 1.4.6
 * http://code.google.com/p/jquery-translate/
 */

;jQuery.translate.fn.progress = function(selector, options){
    if(!this.i) this._pr = 0;
    this._pr += this.source[this.i].length;
    var progress = 100 * this._pr / ( this.rawSource.length - ( 11 * (this.i + 1) ) );

    if(selector){
        var e = jQuery(selector);
        if( !this.i && !e.hasClass("ui-progressbar") )
            e.progressbar(options);
        e.progressbar( "option", "value", progress );
    }
    
    return progress;
};

/*!-
 * Native language names extension for the jQuery Translate plugin 
 * Version: 1.4.6
 * http://code.google.com/p/jquery-translate/
 */
;(function($){
$.translate.extend({

    toNativeLanguage: function(lang){ 
        return $.translate.nativeLanguages[ lang ] || 
            $.translate.nativeLanguages[ $.translate.toLanguageCode(lang) ];
    },
    
    nativeLanguages: {
        "af":"Afrikaans",
        "be":"Беларуская",
        "is":"Íslenska",
        "ga":"Gaeilge",
        "mk":"Македонски",
        "ms":"Bahasa Melayu",
        "sw":"Kiswahili",
        "cy":"Cymraeg",
        "yi":"ייִדיש",
        
        "sq":"Shqipe",
        "ar":"العربية",
        "bg":"Български",
        "ca":"Català",
        "zh":"中文",
        "zh-CN":"简体中文",
        "zh-TW":"繁體中文",
        "hr":"Hrvatski",
        "cs":"Čeština",
        "da":"Dansk",
        "nl":"Nederlands",
        "en":"English",
        "et":"Eesti",
        "tl":"Tagalog",
        "fi":"Suomi",
        "fr":"Français",
        "gl":"Galego",
        "de":"Deutsch",
        "el":"Ελληνικά",
        "iw":"עברית",
        "hi":"हिन्दी",
        "hu":"Magyar",
        "id":"Bahasa Indonesia",
        "it":"Italiano",
        "ja":"日本語",
        "ko":"한국어",
        "lv":"Latviešu",
        "lt":"Lietuvių",
        "mt":"Malti",
        "no":"Norsk",
        "fa":"فارسی",
        "pl":"Polski",
        "pt-PT":"Português",
        "ro":"Român",
        "ru":"Русский",
        "sr":"Српски",
        "sk":"Slovenský",
        "sl":"Slovenski",
        "es":"Español",
        "sv":"Svenska",
        "th":"ไทย",
        "tr":"Türkçe",
        "uk":"Українська",
        "vi":"Tiếng Việt"
    }

});

})(jQuery);

/*!-
 * Paralell extension for the jQuery Translate plugin 
 * Version: 1.4.6
 * http://code.google.com/p/jquery-translate/
 */

;(function($){
$.translate.extend({
    defer: function(){
        return $.translate._bind($.translate, null, arguments);
    },
    
    run: function(array, finished){
        var count = array.length;
        $.each(array, function(){
            var inst = this(),
                complete = inst.options.complete;
            inst.options.complete = function(){
                complete.apply(this, arguments);
                if(!--count) finished();
            };
        });
    }
});

})(jQuery);



(function($){

var defaults = {
    tags: ["select", "option"],
    filter: $.translate.isTranslatable,
    label: $.translate.toNativeLanguage || 
        function(langCode, lang){
            return $.translate.capitalize(lang);
        },
    includeUnknown: false
};

$.translate.ui = function(){
    var o = {}, str='', cs='', cl='';
    
    if(typeof arguments[0] === "string")
        o.tags = $.makeArray(arguments);
    else o = arguments[0];
    
    o = $.extend({}, defaults, $.translate.ui.defaults, o);
        
    if(o.tags[2]){
        cs = '<' + o.tags[2] + '>';
        cl = '</' + o.tags[2] + '>';
    }
    
    var languages = $.translate.getLanguages(o.filter);
    if(!o.includeUnknown) delete languages.UNKNOWN;
    
    $.each( languages, function(l, lc){
        str += ('<' + o.tags[1] + " value=" + lc + '>' + cs +
            //$.translate.capitalize(l) + " - " + 
            o.label(lc, l) +
            cl + '</' + o.tags[1] + '>');
    });

    return $('<' + o.tags[0] + ' class="jq-translate-ui">' + str + '</' + o.tags[0] + '>');

};

$.translate.ui.defaults = $.extend({}, defaults);


})(jQuery);

jQuery.translate.fn.progress = function(selector, options){
    if(!this.i) this._pr = 0;
    this._pr += this.source[this.i].length;
    var progress = 100 * this._pr / ( this.rawSource.length - ( 11 * (this.i + 1) ) );

    if(selector){
        var e = jQuery(selector);
        if( !this.i && !e.hasClass("ui-progressbar") )
            e.progressbar(options);
        e.progressbar( "option", "value", progress );
    }
    
    return progress;
};

(function($){
$.translate.extend({

    toNativeLanguage: function(lang){ 
        return $.translate.nativeLanguages[ lang ] || 
            $.translate.nativeLanguages[ $.translate.toLanguageCode(lang) ];
    },
    
    nativeLanguages: {
        "af":"Afrikaans",
        "be":"Ð‘ÐµÐ»Ð°Ñ€ÑƒÑ�ÐºÐ°Ñ�",
        "is":"Ã�slenska",
        "ga":"Gaeilge",
        "mk":"ÐœÐ°ÐºÐµÐ´Ð¾Ð½Ñ�ÐºÐ¸",
        "ms":"Bahasa Melayu",
        "sw":"Kiswahili",
        "cy":"Cymraeg",
        "yi":"×™×™Ö´×“×™×©",
        
        "sq":"Shqipe",
        "ar":"Ø§Ù„Ø¹Ø±Ø¨ÙŠØ©",
        "bg":"Ð‘ÑŠÐ»Ð³Ð°Ñ€Ñ�ÐºÐ¸",
        "ca":"CatalÃ ",
        "zh":"ä¸–‡",
        "zh-CN":"ç®€ä½“ä¸–‡",
        "zh-TW":"ç¹�é«”ä¸–‡",
        "hr":"Hrvatski",
        "cs":"ÄŒeÅ¡tina",
        "da":"Dansk",
        "nl":"Nederlands",
        "en":"English",
        "et":"Eesti",
        "tl":"Tagalog",
        "fi":"Suomi",
        "fr":"FranÃ§ais",
        "gl":"Galego",
        "de":"Deutsch",
        "el":"Î•Î»Î»Î·Î½Î¹ÎºÎ¬",
        "iw":"×¢×‘×¨×™×ª",
        "hi":"à¤¹à¤¿à¤¨à¥�à¤¦à¥€",
        "hu":"Magyar",
        "id":"Bahasa Indonesia",
        "it":"Italiano",
        "ja":"æ—¥æœ¬èªž",
        "ko":"í•œêµ–´",
        "lv":"LatvieÅ¡u",
        "lt":"LietuviÅ³",
        "mt":"Malti",
        "no":"Norsk",
        "fa":"Ù�Ø§Ø±Ø³ÛŒ",
        "pl":"Polski",
        "pt-PT":"PortuguÃªs",
        "ro":"RomÃ¢n",
        "ru":"Ð ÑƒÑ�Ñ�ÐºÐ¸Ð¹",
        "sr":"Ð¡Ñ€Ð¿Ñ�ÐºÐ¸",
        "sk":"SlovenskÃ½",
        "sl":"Slovenski",
        "es":"EspaÃ±ol",
        "sv":"Svenska",
        "th":"à¹„à¸—à¸¢",
        "tr":"TÃ¼rkÃ§e",
        "uk":"Ð£ÐºÑ€Ð°Ñ—Ð½Ñ�ÑŒÐºÐ°",
        "vi":"Tiáº¿ng Viá»‡t"
    }

});

})(jQuery);

(function($){
$.translate.extend({
    defer: function(){
        return $.translate._bind($.translate, null, arguments);
    },
    
    run: function(array, finished){
        var count = array.length;
        $.each(array, function(){
            var inst = this(),
                complete = inst.options.complete;
            inst.options.complete = function(){
                complete.apply(this, arguments);
                if(!--count) finished();
            };
        });
    }
});

})(jQuery);

(function ($) {
    $(window).ready(function () {
        /**
         * Cookie plugin
         *
         * Copyright (c) 2006 Klaus Hartl (stilbuero.de)
         * Dual licensed under the MIT and GPL licenses:
         * http://www.opensource.org/licenses/mit-license.php
         * http://www.gnu.org/licenses/gpl.html
         *
         */

        jQuery.cookie = function(name, value, options) {
            if (typeof value != 'undefined') { // name and value given, set cookie
                options = options || {};
                if (value === null) {
                    value = '';
                    options.expires = -1;
                }
                var expires = '';
                if (options.expires && (typeof options.expires == 'number' || options.expires.toUTCString)) {
                    var date;
                    if (typeof options.expires == 'number') {
                        date = new Date();
                        date.setTime(date.getTime() + (options.expires * 24 * 60 * 60 * 1000));
                    } else {
                        date = options.expires;
                    }
                    expires = '; expires=' + date.toUTCString(); // use expires attribute, max-age is not supported by IE
                }
                // CAUTION: Needed to parenthesize options.path and options.domain
                // in the following expressions, otherwise they evaluate to undefined
                // in the packed version for some reason...
                var path = options.path ? '; path=' + (options.path) : '';
                var domain = options.domain ? '; domain=' + (options.domain) : '';
                var secure = options.secure ? '; secure' : '';
                document.cookie = [name, '=', encodeURIComponent(value), expires, path, domain, secure].join('');
            } else { // only name given, get cookie
                var cookieValue = null;
                if (document.cookie && document.cookie != '') {
                    var cookies = document.cookie.split(';');
                    for (var i = 0; i < cookies.length; i++) {
                        var cookie = jQuery.trim(cookies[i]);
                        // Does this cookie string begin with the name we want?
                        if (cookie.substring(0, name.length + 1) == (name + '=')) {
                            cookieValue = decodeURIComponent(cookie.substring(name.length + 1));
                            break;
                        }
                    }
                }
                return cookieValue;
            }
        };
        
        var type_work=$("#type_work").length;
        var not_translator=$("#not_translator").length;
        if(not_translator.length!=0) {
            not_translator=$("#not_translator").text();
        } else {
            not_translator="";
        }
        var use_cookie=$("#use_cookie").length;
        if(use_cookie==0) {
            use_cookie=true;
        } else {
            use_cookie=false;
        }
        
        if($("#pleaseTranslate").length!=0) {
            var lang_sourse=$("#pleaseTranslate").attr("name");
            $("#pleaseTranslate option[value='"+lang_sourse+"']").attr('selected', 'selected');
        } else if($("#translate_translate").length!=0) {
            var lang_sourse=$("#translate_translate").attr("name");
            $("#translate_popup").find("a[name='"+lang_sourse+"']").css({"color":"#FF3300"});
        } else if($("#worldone").length!=0) {
            var lang_sourse=$("#worldone").attr("name");
            $("#worldone").find("a[name='"+lang_sourse+"']").css({"color":"#FF3300"});
        } else if($("#simple_translate").length!=0) {
            var lang_sourse=$("#simple_translate").attr("class");
            $("#simple_translate").find("a[name='"+lang_sourse+"']").css({"color":"#FF3300"});
        } 
        
        var not_change_lang=lang_sourse;
        var click_reaction=false;
        var nametype=$("#type_work").text();
        
        if($.cookie('sourse_languages')!=null && $.cookie('sourse_languages').length!=0 && use_cookie==true && nametype=="")  {
             if($("#pleaseTranslate").length!=0) {
                $("#pleaseTranslate option[value='"+$.cookie('sourse_languages')+"']").attr('selected', 'selected');
                    $('#image_list a').each(function() {
                        trans_lang_unic=$(this).attr("name");
                        if(trans_lang_unic==$.cookie('sourse_languages')) {
                            change_flag(this,"min");
                            $(this).attr({alt: "topnow"});
                            $("#pleaseTranslate option[value='']").attr('selected', 'selected');
                        }
                    });
                if($.cookie('sourse_languages')!=lang_sourse) {
                    if(click_reaction==false)  {
                        click_reaction=true;
                        get_please_translate($.cookie('sourse_languages'));
                    }
                }
             }
             if($("#translate_popup").length!=0) {
                        if($.cookie('sourse_languages')!=lang_sourse) {
                            $("#translate_popup a").css({"color":""});
                            $("#translate_popup").find("a[name='"+$.cookie('sourse_languages')+"']").css({"color":"#FF3300"});
                            if(click_reaction==false)  {
                                click_reaction=true;
                                get_please_translate_link($.cookie('sourse_languages'));
                            }
                        }
             }
            if($("#worldone").length!=0) {
                    if($.cookie('sourse_languages')!=lang_sourse) {
                        $("#worldone a").css({"color":""});
                        $("#worldone").find("a[name='"+$.cookie('sourse_languages')+"']").css({"color":"#FF3300"});
                        if(click_reaction==false)  {
                            click_reaction=true;
                            get_please_translate_link($.cookie('sourse_languages'));
                        }
                    }
            }
            if($("#simple_translate").length!=0) {
                    if($.cookie('sourse_languages')!=lang_sourse) {
                        $("#simple_translate a").css({"color":""});
                        $("#simple_translate").find("a[name='"+$.cookie('sourse_languages')+"']").css({"color":"#FF3300"});
                        if(click_reaction==false)  {
                            click_reaction=true;
                            get_please_translate_link($.cookie('sourse_languages'));
                        }
                    }
            }
        }
        
        if($("#pleaseTranslate").length!=0) {
            $("#pleaseTranslate").live("change",function() {
                trans_lang=$(this).val();
                if(trans_lang!=lang_sourse) {
                        if($("#image_list").length!=0) {
                            $('#image_list a').each(function() {
                                trans_lang_unic=$(this).attr("name");
                                trans_alt_unict=$(this).attr("alt");
                                if(trans_alt_unict=="topnow") {
                                    change_flag(this,"plus");
                                    $(this).attr({alt: ""})
                                }
                            });
                        }
                    if(type_work!=0)  {
                        redirectnow(trans_lang,lang_sourse);   
                    } else {
                        if(click_reaction==false)  {
                            click_reaction=true;
                            get_please_translate(trans_lang);
                        }
                    }
                }
            });
            if(typeof(CustomAjaxWtranslate) !== 'undefined') CustomAjaxWtranslate.init();
        }
        
        if($("#translate_popup").length!=0) {
            $("#translate_popup a").live("click",function() {
                trans_lang=$(this).attr("name");
                if(trans_lang!=lang_sourse) {
                    if(type_work!=0)  {
                        redirectnow(trans_lang,lang_sourse);   
                    } else {
                        if(click_reaction==false)  {
                            click_reaction=true;
                            $("#translate_popup a").css({"color":""});
                            $("#translate_popup").find("a[name='"+trans_lang+"']").css({"color":"#FF3300"});
                            get_please_translate_link(trans_lang);
                        }
                    }
                        if($("#ag_hide_panel").length!=0) {
                            if($("#ag_hide_panel").text()=="slideDown") {
                                $("#translate_popup").slideUp("slow");
                            } else {
                                $("#translate_popup").fadeOut("slow");
                            }
                        }
                }
            });
        }
        
        if($("#worldone").length!=0) {
            $("#worldone a").live("click",function() {
                trans_lang=$(this).attr("name");
                if(trans_lang!=lang_sourse) {
                    if(type_work!=0)  {
                        if(nametype!="new windows") {
                            redirectnow(trans_lang,lang_sourse);   
                        }
                    } else {
                        if(click_reaction==false)  {
                            click_reaction=true;
                            $("#worldone a").css({"color":""});
                            $("#worldone").find("a[name='"+trans_lang+"']").css({"color":"#FF3300"});
                            get_please_translate_link(trans_lang);
                        }
                    }
                        if($("#ag_hide_panel").length!=0) {
                            $(".worldcont_three").fadeOut("slow");
                        }
                }
            });
        }
        
        if($("#simple_translate").length!=0) {
            $("#simple_translate a").live("click",function() {
                trans_lang=$(this).attr("name");
                if(trans_lang!=lang_sourse) {
                    if(type_work!=0)  {
                        if(nametype!="new windows") {
                            redirectnow(trans_lang,lang_sourse);   
                        }
                    } else {
                        if(click_reaction==false)  {
                            click_reaction=true;
                            $("#simple_translate a").css({"color":""});
                            $("#simple_translate").find("a[name='"+trans_lang+"']").css({"color":"#FF3300"});
                            get_please_translate_link(trans_lang);
                        }
                    }
                        if($("#ag_hide_panel").length!=0) {
                            if($("#ag_hide_panel").text()=="slideDown") {
                                $(".worldcont_three").slideUp("slow");
                            } else {
                                $(".worldcont_three").fadeOut("slow");
                            }
                        }
                }
            });
        }
        
        if($("#image_list").length!=0) {
            $("#image_list a").live("click",function() {
                trans_lang=$(this).attr("name");
                $('#image_list a').each(function() {
                    trans_alt=$(this).attr("alt");
                    if(trans_alt=="topnow") {
                        change_flag(this,"plus");
                         $(this).attr({alt: ""})
                    }
                });
                    change_flag(this,"min");
                    $(this).attr({alt: "topnow"})
                    
                    $("#pleaseTranslate option[value='']").attr('selected', 'selected');
                    
                    if($("#selecten").length!=0) {
                        get_select = parent.document.getElementById("selecten");
                        get_select.innerHTML = "Select Language"; // обнуляем
                    }
                    
                if(trans_lang!=lang_sourse) {
                    if(type_work!=0)  {
                            redirectnow(trans_lang,lang_sourse); 
                    } else {
                        if(click_reaction==false)  {
                            click_reaction=true;
                            get_please_translate(trans_lang);
                        }
                    }
                }
            });
        }
        
        function change_flag(obj,znak) {
            n=$("#ajaxeffect_img").text();
            if(n==1) {
                if(znak=="plus") {
                    $(obj).animate({top: '+=5px'}, 500);
                } else {
                    $(obj).animate({top: '-=5px'}, 500);
                }
            } else {
                $("#image_list a").each(function () { 
                      if(this==obj) {
                          $(this).animate({opacity: "1"}, 500); 
                      } else {
                          $(this).animate({opacity: "0.4"}, 500); 
                      }
                });
            }
        }
        
        function get_please_translate(trans_lang) {
                    if(use_cookie==true) $.cookie('sourse_languages', trans_lang, { expires: 1, path: '/'});
                    //zeroing_lang();
                    $("body").translate(not_change_lang, trans_lang, {
                        not:"#worldone,#translate_popup,#pleaseTranslate,#selecten,"+not_translator,
                        complete:function(){                        
                            lang_sourse=trans_lang;
                            click_reaction=false;
                        },
                        error: function(text){ 
                             if(text.message=='invalid translation language pair') {
                                 alert("Translation for this language pair "+lang_sourse+" on "+trans_lang+" not supported.")
                             }
                             $.cookie('sourse_languages', not_change_lang, { expires: 1, path: '/'});
                             click_reaction=false;
                        },
                        fromOriginal:true
                    });
        } 
        
        function get_please_translate_link(trans_lang) {
                    if(use_cookie==true) $.cookie('sourse_languages', trans_lang, { expires: 1, path: '/'});
                    $("body").translate(not_change_lang, trans_lang, {
                        not:"#worldone,#translate_popup,#pleaseTranslate,#selecten,"+not_translator,
                        complete:function(){                        
                            lang_sourse=trans_lang;
                            click_reaction=false;
                        },
                        error: function(text){ 
                             if(text.message=='invalid translation language pair') {
                                 alert("Translation for this language pair "+lang_sourse+" on "+trans_lang+" not supported.")
                             }
                             $.cookie('sourse_languages', not_change_lang, { expires: 1, path: '/'});
                             click_reaction=false;
                        },
                        fromOriginal:true
                    }); 
        }
        
        
        function redirectnow(trans_lang,lang_sourse) {
            url_home = document.URL;
            redirect='http://translate.google.com/translate?client=tmpg&hl=en&langpair='+lang_sourse+'|'+trans_lang+'&u='+url_home;
            name=$("#type_work").text();
            if(name=="new windows") {
                window.open("javascript:location.href='"+redirect+"';","PopWin3","resizable=1,toolbar=1,location=1,menubar=1,status=1,scrollbars=1'");
                window.focus();
            } else {
                window.location=redirect;
            }
        }
        
        function function_exists (function_name) {
            // Checks if the function exists  
            // 
            // version: 1006.1915
            // discuss at: http://phpjs.org/functions/function_exists
            // +   original by: Kevin van Zonneveld (http://kevin.vanzonneveld.net)
            // +   improved by: Steve Clay
            // +   improved by: Legaev Andrey
            // *     example 1: function_exists('isFinite');
            // *     returns 1: true
            if (typeof function_name == 'string'){
                return (typeof this.window[function_name] == 'function');
            } else{
                return (function_name instanceof Function);
            }
        }
        
    });
})(jQuery);

 });
})(jQuery);