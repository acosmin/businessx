/*
---------------------------------------------------------------------
 To keep page requests to a minimum number we compiled all the
 necessary scripts into one file;
 --------------------------------
 You can find all the original files (minified or unminified) in:
 ../assets/js/
---------------------------------------------------------------------
*/



/*!
Waypoints - 4.0.0
Copyright © 2011-2015 Caleb Troughton
Licensed under the MIT license.
https://github.com/imakewebthings/waypoints/blog/master/licenses.txt
*/
!function(){"use strict";function t(o){if(!o)throw new Error("No options passed to Waypoint constructor");if(!o.element)throw new Error("No element option passed to Waypoint constructor");if(!o.handler)throw new Error("No handler option passed to Waypoint constructor");this.key="waypoint-"+e,this.options=t.Adapter.extend({},t.defaults,o),this.element=this.options.element,this.adapter=new t.Adapter(this.element),this.callback=o.handler,this.axis=this.options.horizontal?"horizontal":"vertical",this.enabled=this.options.enabled,this.triggerPoint=null,this.group=t.Group.findOrCreate({name:this.options.group,axis:this.axis}),this.context=t.Context.findOrCreateByElement(this.options.context),t.offsetAliases[this.options.offset]&&(this.options.offset=t.offsetAliases[this.options.offset]),this.group.add(this),this.context.add(this),i[this.key]=this,e+=1}var e=0,i={};t.prototype.queueTrigger=function(t){this.group.queueTrigger(this,t)},t.prototype.trigger=function(t){this.enabled&&this.callback&&this.callback.apply(this,t)},t.prototype.destroy=function(){this.context.remove(this),this.group.remove(this),delete i[this.key]},t.prototype.disable=function(){return this.enabled=!1,this},t.prototype.enable=function(){return this.context.refresh(),this.enabled=!0,this},t.prototype.next=function(){return this.group.next(this)},t.prototype.previous=function(){return this.group.previous(this)},t.invokeAll=function(t){var e=[];for(var o in i)e.push(i[o]);for(var n=0,r=e.length;r>n;n++)e[n][t]()},t.destroyAll=function(){t.invokeAll("destroy")},t.disableAll=function(){t.invokeAll("disable")},t.enableAll=function(){t.invokeAll("enable")},t.refreshAll=function(){t.Context.refreshAll()},t.viewportHeight=function(){return window.innerHeight||document.documentElement.clientHeight},t.viewportWidth=function(){return document.documentElement.clientWidth},t.adapters=[],t.defaults={context:window,continuous:!0,enabled:!0,group:"default",horizontal:!1,offset:0},t.offsetAliases={"bottom-in-view":function(){return this.context.innerHeight()-this.adapter.outerHeight()},"right-in-view":function(){return this.context.innerWidth()-this.adapter.outerWidth()}},window.Waypoint=t}(),function(){"use strict";function t(t){window.setTimeout(t,1e3/60)}function e(t){this.element=t,this.Adapter=n.Adapter,this.adapter=new this.Adapter(t),this.key="waypoint-context-"+i,this.didScroll=!1,this.didResize=!1,this.oldScroll={x:this.adapter.scrollLeft(),y:this.adapter.scrollTop()},this.waypoints={vertical:{},horizontal:{}},t.waypointContextKey=this.key,o[t.waypointContextKey]=this,i+=1,this.createThrottledScrollHandler(),this.createThrottledResizeHandler()}var i=0,o={},n=window.Waypoint,r=window.onload;e.prototype.add=function(t){var e=t.options.horizontal?"horizontal":"vertical";this.waypoints[e][t.key]=t,this.refresh()},e.prototype.checkEmpty=function(){var t=this.Adapter.isEmptyObject(this.waypoints.horizontal),e=this.Adapter.isEmptyObject(this.waypoints.vertical);t&&e&&(this.adapter.off(".waypoints"),delete o[this.key])},e.prototype.createThrottledResizeHandler=function(){function t(){e.handleResize(),e.didResize=!1}var e=this;this.adapter.on("resize.waypoints",function(){e.didResize||(e.didResize=!0,n.requestAnimationFrame(t))})},e.prototype.createThrottledScrollHandler=function(){function t(){e.handleScroll(),e.didScroll=!1}var e=this;this.adapter.on("scroll.waypoints",function(){(!e.didScroll||n.isTouch)&&(e.didScroll=!0,n.requestAnimationFrame(t))})},e.prototype.handleResize=function(){n.Context.refreshAll()},e.prototype.handleScroll=function(){var t={},e={horizontal:{newScroll:this.adapter.scrollLeft(),oldScroll:this.oldScroll.x,forward:"right",backward:"left"},vertical:{newScroll:this.adapter.scrollTop(),oldScroll:this.oldScroll.y,forward:"down",backward:"up"}};for(var i in e){var o=e[i],n=o.newScroll>o.oldScroll,r=n?o.forward:o.backward;for(var s in this.waypoints[i]){var a=this.waypoints[i][s],l=o.oldScroll<a.triggerPoint,h=o.newScroll>=a.triggerPoint,p=l&&h,u=!l&&!h;(p||u)&&(a.queueTrigger(r),t[a.group.id]=a.group)}}for(var c in t)t[c].flushTriggers();this.oldScroll={x:e.horizontal.newScroll,y:e.vertical.newScroll}},e.prototype.innerHeight=function(){return this.element==this.element.window?n.viewportHeight():this.adapter.innerHeight()},e.prototype.remove=function(t){delete this.waypoints[t.axis][t.key],this.checkEmpty()},e.prototype.innerWidth=function(){return this.element==this.element.window?n.viewportWidth():this.adapter.innerWidth()},e.prototype.destroy=function(){var t=[];for(var e in this.waypoints)for(var i in this.waypoints[e])t.push(this.waypoints[e][i]);for(var o=0,n=t.length;n>o;o++)t[o].destroy()},e.prototype.refresh=function(){var t,e=this.element==this.element.window,i=e?void 0:this.adapter.offset(),o={};this.handleScroll(),t={horizontal:{contextOffset:e?0:i.left,contextScroll:e?0:this.oldScroll.x,contextDimension:this.innerWidth(),oldScroll:this.oldScroll.x,forward:"right",backward:"left",offsetProp:"left"},vertical:{contextOffset:e?0:i.top,contextScroll:e?0:this.oldScroll.y,contextDimension:this.innerHeight(),oldScroll:this.oldScroll.y,forward:"down",backward:"up",offsetProp:"top"}};for(var r in t){var s=t[r];for(var a in this.waypoints[r]){var l,h,p,u,c,d=this.waypoints[r][a],f=d.options.offset,w=d.triggerPoint,y=0,g=null==w;d.element!==d.element.window&&(y=d.adapter.offset()[s.offsetProp]),"function"==typeof f?f=f.apply(d):"string"==typeof f&&(f=parseFloat(f),d.options.offset.indexOf("%")>-1&&(f=Math.ceil(s.contextDimension*f/100))),l=s.contextScroll-s.contextOffset,d.triggerPoint=y+l-f,h=w<s.oldScroll,p=d.triggerPoint>=s.oldScroll,u=h&&p,c=!h&&!p,!g&&u?(d.queueTrigger(s.backward),o[d.group.id]=d.group):!g&&c?(d.queueTrigger(s.forward),o[d.group.id]=d.group):g&&s.oldScroll>=d.triggerPoint&&(d.queueTrigger(s.forward),o[d.group.id]=d.group)}}return n.requestAnimationFrame(function(){for(var t in o)o[t].flushTriggers()}),this},e.findOrCreateByElement=function(t){return e.findByElement(t)||new e(t)},e.refreshAll=function(){for(var t in o)o[t].refresh()},e.findByElement=function(t){return o[t.waypointContextKey]},window.onload=function(){r&&r(),e.refreshAll()},n.requestAnimationFrame=function(e){var i=window.requestAnimationFrame||window.mozRequestAnimationFrame||window.webkitRequestAnimationFrame||t;i.call(window,e)},n.Context=e}(),function(){"use strict";function t(t,e){return t.triggerPoint-e.triggerPoint}function e(t,e){return e.triggerPoint-t.triggerPoint}function i(t){this.name=t.name,this.axis=t.axis,this.id=this.name+"-"+this.axis,this.waypoints=[],this.clearTriggerQueues(),o[this.axis][this.name]=this}var o={vertical:{},horizontal:{}},n=window.Waypoint;i.prototype.add=function(t){this.waypoints.push(t)},i.prototype.clearTriggerQueues=function(){this.triggerQueues={up:[],down:[],left:[],right:[]}},i.prototype.flushTriggers=function(){for(var i in this.triggerQueues){var o=this.triggerQueues[i],n="up"===i||"left"===i;o.sort(n?e:t);for(var r=0,s=o.length;s>r;r+=1){var a=o[r];(a.options.continuous||r===o.length-1)&&a.trigger([i])}}this.clearTriggerQueues()},i.prototype.next=function(e){this.waypoints.sort(t);var i=n.Adapter.inArray(e,this.waypoints),o=i===this.waypoints.length-1;return o?null:this.waypoints[i+1]},i.prototype.previous=function(e){this.waypoints.sort(t);var i=n.Adapter.inArray(e,this.waypoints);return i?this.waypoints[i-1]:null},i.prototype.queueTrigger=function(t,e){this.triggerQueues[e].push(t)},i.prototype.remove=function(t){var e=n.Adapter.inArray(t,this.waypoints);e>-1&&this.waypoints.splice(e,1)},i.prototype.first=function(){return this.waypoints[0]},i.prototype.last=function(){return this.waypoints[this.waypoints.length-1]},i.findOrCreate=function(t){return o[t.axis][t.name]||new i(t)},n.Group=i}(),function(){"use strict";function t(t){this.$element=e(t)}var e=window.jQuery,i=window.Waypoint;e.each(["innerHeight","innerWidth","off","offset","on","outerHeight","outerWidth","scrollLeft","scrollTop"],function(e,i){t.prototype[i]=function(){var t=Array.prototype.slice.call(arguments);return this.$element[i].apply(this.$element,t)}}),e.each(["extend","inArray","isEmptyObject"],function(i,o){t[o]=e[o]}),i.adapters.push({name:"jquery",Adapter:t}),i.Adapter=t}(),function(){"use strict";function t(t){return function(){var i=[],o=arguments[0];return t.isFunction(arguments[0])&&(o=t.extend({},arguments[1]),o.handler=arguments[0]),this.each(function(){var n=t.extend({},o,{element:this});"string"==typeof n.context&&(n.context=t(this).closest(n.context)[0]),i.push(new e(n))}),i}}var e=window.Waypoint;window.jQuery&&(window.jQuery.fn.waypoint=t(window.jQuery)),window.Zepto&&(window.Zepto.fn.waypoint=t(window.Zepto))}();



/**
 * Owl carousel
 * @version 2.1.0
 * @author Bartosz Wojciechowski
 * @author David Deutsch
 * @license The MIT License (MIT)
 */
!function(t,e,s,i){function n(e,s){this.settings=null,this.options=t.extend({},n.Defaults,s),this.$element=t(e),this._handlers={},this._plugins={},this._supress={},this._current=null,this._speed=null,this._coordinates=[],this._breakpoint=null,this._width=null,this._items=[],this._clones=[],this._mergers=[],this._widths=[],this._invalidated={},this._pipe=[],this._drag={time:null,target:null,pointer:null,stage:{start:null,current:null},direction:null},this._states={current:{},tags:{initializing:["busy"],animating:["busy"],dragging:["interacting"]}},t.each(["onResize","onThrottledResize"],t.proxy(function(e,s){this._handlers[s]=t.proxy(this[s],this)},this)),t.each(n.Plugins,t.proxy(function(t,e){this._plugins[t.charAt(0).toLowerCase()+t.slice(1)]=new e(this)},this)),t.each(n.Workers,t.proxy(function(e,s){this._pipe.push({filter:s.filter,run:t.proxy(s.run,this)})},this)),this.setup(),this.initialize()}n.Defaults={items:3,loop:!1,center:!1,rewind:!1,mouseDrag:!0,touchDrag:!0,pullDrag:!0,freeDrag:!1,margin:0,stagePadding:0,merge:!1,mergeFit:!0,autoWidth:!1,startPosition:0,rtl:!1,smartSpeed:250,fluidSpeed:!1,dragEndSpeed:!1,responsive:{},responsiveRefreshRate:200,responsiveBaseElement:e,fallbackEasing:"swing",info:!1,nestedItemSelector:!1,itemElement:"div",stageElement:"div",refreshClass:"owl-refresh",loadedClass:"owl-loaded",loadingClass:"owl-loading",rtlClass:"owl-rtl",responsiveClass:"owl-responsive",dragClass:"owl-drag",itemClass:"owl-item",stageClass:"owl-stage",stageOuterClass:"owl-stage-outer",grabClass:"owl-grab"},n.Width={Default:"default",Inner:"inner",Outer:"outer"},n.Type={Event:"event",State:"state"},n.Plugins={},n.Workers=[{filter:["width","settings"],run:function(){this._width=this.$element.width()}},{filter:["width","items","settings"],run:function(t){t.current=this._items&&this._items[this.relative(this._current)]}},{filter:["items","settings"],run:function(){this.$stage.children(".cloned").remove()}},{filter:["width","items","settings"],run:function(t){var e=this.settings.margin||"",s=!this.settings.autoWidth,i=this.settings.rtl,n={width:"auto","margin-left":i?e:"","margin-right":i?"":e};!s&&this.$stage.children().css(n),t.css=n}},{filter:["width","items","settings"],run:function(t){var e=(this.width()/this.settings.items).toFixed(3)-this.settings.margin,s=null,i=this._items.length,n=!this.settings.autoWidth,r=[];for(t.items={merge:!1,width:e};i--;)s=this._mergers[i],s=this.settings.mergeFit&&Math.min(s,this.settings.items)||s,t.items.merge=s>1||t.items.merge,r[i]=n?e*s:this._items[i].width();this._widths=r}},{filter:["items","settings"],run:function(){var e=[],s=this._items,i=this.settings,n=Math.max(2*i.items,4),r=2*Math.ceil(s.length/2),a=i.loop&&s.length?i.rewind?n:Math.max(n,r):0,o="",h="";for(a/=2;a--;)e.push(this.normalize(e.length/2,!0)),o+=s[e[e.length-1]][0].outerHTML,e.push(this.normalize(s.length-1-(e.length-1)/2,!0)),h=s[e[e.length-1]][0].outerHTML+h;this._clones=e,t(o).addClass("cloned").appendTo(this.$stage),t(h).addClass("cloned").prependTo(this.$stage)}},{filter:["width","items","settings"],run:function(){for(var t=this.settings.rtl?1:-1,e=this._clones.length+this._items.length,s=-1,i=0,n=0,r=[];++s<e;)i=r[s-1]||0,n=this._widths[this.relative(s)]+this.settings.margin,r.push(i+n*t);this._coordinates=r}},{filter:["width","items","settings"],run:function(){var t=this.settings.stagePadding,e=this._coordinates,s={width:Math.ceil(Math.abs(e[e.length-1]))+2*t,"padding-left":t||"","padding-right":t||""};this.$stage.css(s)}},{filter:["width","items","settings"],run:function(t){var e=this._coordinates.length,s=!this.settings.autoWidth,i=this.$stage.children();if(s&&t.items.merge)for(;e--;)t.css.width=this._widths[this.relative(e)],i.eq(e).css(t.css);else s&&(t.css.width=t.items.width,i.css(t.css))}},{filter:["items"],run:function(){this._coordinates.length<1&&this.$stage.removeAttr("style")}},{filter:["width","items","settings"],run:function(t){t.current=t.current?this.$stage.children().index(t.current):0,t.current=Math.max(this.minimum(),Math.min(this.maximum(),t.current)),this.reset(t.current)}},{filter:["position"],run:function(){this.animate(this.coordinates(this._current))}},{filter:["width","position","items","settings"],run:function(){var t,e,s,i,n=this.settings.rtl?1:-1,r=2*this.settings.stagePadding,a=this.coordinates(this.current())+r,o=a+this.width()*n,h=[];for(s=0,i=this._coordinates.length;i>s;s++)t=this._coordinates[s-1]||0,e=Math.abs(this._coordinates[s])+r*n,(this.op(t,"<=",a)&&this.op(t,">",o)||this.op(e,"<",a)&&this.op(e,">",o))&&h.push(s);this.$stage.children(".active").removeClass("active"),this.$stage.children(":eq("+h.join("), :eq(")+")").addClass("active"),this.settings.center&&(this.$stage.children(".center").removeClass("center"),this.$stage.children().eq(this.current()).addClass("center"))}}],n.prototype.initialize=function(){if(this.enter("initializing"),this.trigger("initialize"),this.$element.toggleClass(this.settings.rtlClass,this.settings.rtl),this.settings.autoWidth&&!this.is("pre-loading")){var e,s,n;e=this.$element.find("img"),s=this.settings.nestedItemSelector?"."+this.settings.nestedItemSelector:i,n=this.$element.children(s).width(),e.length&&0>=n&&this.preloadAutoWidthImages(e)}this.$element.addClass(this.options.loadingClass),this.$stage=t("<"+this.settings.stageElement+' class="'+this.settings.stageClass+'"/>').wrap('<div class="'+this.settings.stageOuterClass+'"/>'),this.$element.append(this.$stage.parent()),this.replace(this.$element.children().not(this.$stage.parent())),this.$element.is(":visible")?this.refresh():this.invalidate("width"),this.$element.removeClass(this.options.loadingClass).addClass(this.options.loadedClass),this.registerEventHandlers(),this.leave("initializing"),this.trigger("initialized")},n.prototype.setup=function(){var e=this.viewport(),s=this.options.responsive,i=-1,n=null;s?(t.each(s,function(t){e>=t&&t>i&&(i=Number(t))}),n=t.extend({},this.options,s[i]),delete n.responsive,n.responsiveClass&&this.$element.attr("class",this.$element.attr("class").replace(new RegExp("("+this.options.responsiveClass+"-)\\S+\\s","g"),"$1"+i))):n=t.extend({},this.options),(null===this.settings||this._breakpoint!==i)&&(this.trigger("change",{property:{name:"settings",value:n}}),this._breakpoint=i,this.settings=n,this.invalidate("settings"),this.trigger("changed",{property:{name:"settings",value:this.settings}}))},n.prototype.optionsLogic=function(){this.settings.autoWidth&&(this.settings.stagePadding=!1,this.settings.merge=!1)},n.prototype.prepare=function(e){var s=this.trigger("prepare",{content:e});return s.data||(s.data=t(e).addClass(this.options.itemClass)),this.trigger("prepared",{content:s.data}),s.data},n.prototype.update=function(){for(var e=0,s=this._pipe.length,i=t.proxy(function(t){return this[t]},this._invalidated),n={};s>e;)(this._invalidated.all||t.grep(this._pipe[e].filter,i).length>0)&&this._pipe[e].run(n),e++;this._invalidated={},!this.is("valid")&&this.enter("valid")},n.prototype.width=function(t){switch(t=t||n.Width.Default){case n.Width.Inner:case n.Width.Outer:return this._width;default:return this._width-2*this.settings.stagePadding+this.settings.margin}},n.prototype.refresh=function(){this.enter("refreshing"),this.trigger("refresh"),this.setup(),this.optionsLogic(),this.$element.addClass(this.options.refreshClass),this.update(),this.$element.removeClass(this.options.refreshClass),this.leave("refreshing"),this.trigger("refreshed")},n.prototype.onThrottledResize=function(){e.clearTimeout(this.resizeTimer),this.resizeTimer=e.setTimeout(this._handlers.onResize,this.settings.responsiveRefreshRate)},n.prototype.onResize=function(){return this._items.length?this._width===this.$element.width()?!1:this.$element.is(":visible")?(this.enter("resizing"),this.trigger("resize").isDefaultPrevented()?(this.leave("resizing"),!1):(this.invalidate("width"),this.refresh(),this.leave("resizing"),void this.trigger("resized"))):!1:!1},n.prototype.registerEventHandlers=function(){t.support.transition&&this.$stage.on(t.support.transition.end+".owl.core",t.proxy(this.onTransitionEnd,this)),this.settings.responsive!==!1&&this.on(e,"resize",this._handlers.onThrottledResize),this.settings.mouseDrag&&(this.$element.addClass(this.options.dragClass),this.$stage.on("mousedown.owl.core",t.proxy(this.onDragStart,this)),this.$stage.on("dragstart.owl.core selectstart.owl.core",function(){return!1})),this.settings.touchDrag&&(this.$stage.on("touchstart.owl.core",t.proxy(this.onDragStart,this)),this.$stage.on("touchcancel.owl.core",t.proxy(this.onDragEnd,this)))},n.prototype.onDragStart=function(e){var i=null;3!==e.which&&(t.support.transform?(i=this.$stage.css("transform").replace(/.*\(|\)| /g,"").split(","),i={x:i[16===i.length?12:4],y:i[16===i.length?13:5]}):(i=this.$stage.position(),i={x:this.settings.rtl?i.left+this.$stage.width()-this.width()+this.settings.margin:i.left,y:i.top}),this.is("animating")&&(t.support.transform?this.animate(i.x):this.$stage.stop(),this.invalidate("position")),this.$element.toggleClass(this.options.grabClass,"mousedown"===e.type),this.speed(0),this._drag.time=(new Date).getTime(),this._drag.target=t(e.target),this._drag.stage.start=i,this._drag.stage.current=i,this._drag.pointer=this.pointer(e),t(s).on("mouseup.owl.core touchend.owl.core",t.proxy(this.onDragEnd,this)),t(s).one("mousemove.owl.core touchmove.owl.core",t.proxy(function(e){var i=this.difference(this._drag.pointer,this.pointer(e));t(s).on("mousemove.owl.core touchmove.owl.core",t.proxy(this.onDragMove,this)),Math.abs(i.x)<Math.abs(i.y)&&this.is("valid")||(e.preventDefault(),this.enter("dragging"),this.trigger("drag"))},this)))},n.prototype.onDragMove=function(t){var e=null,s=null,i=null,n=this.difference(this._drag.pointer,this.pointer(t)),r=this.difference(this._drag.stage.start,n);this.is("dragging")&&(t.preventDefault(),this.settings.loop?(e=this.coordinates(this.minimum()),s=this.coordinates(this.maximum()+1)-e,r.x=((r.x-e)%s+s)%s+e):(e=this.settings.rtl?this.coordinates(this.maximum()):this.coordinates(this.minimum()),s=this.settings.rtl?this.coordinates(this.minimum()):this.coordinates(this.maximum()),i=this.settings.pullDrag?-1*n.x/5:0,r.x=Math.max(Math.min(r.x,e+i),s+i)),this._drag.stage.current=r,this.animate(r.x))},n.prototype.onDragEnd=function(e){var i=this.difference(this._drag.pointer,this.pointer(e)),n=this._drag.stage.current,r=i.x>0^this.settings.rtl?"left":"right";t(s).off(".owl.core"),this.$element.removeClass(this.options.grabClass),(0!==i.x&&this.is("dragging")||!this.is("valid"))&&(this.speed(this.settings.dragEndSpeed||this.settings.smartSpeed),this.current(this.closest(n.x,0!==i.x?r:this._drag.direction)),this.invalidate("position"),this.update(),this._drag.direction=r,(Math.abs(i.x)>3||(new Date).getTime()-this._drag.time>300)&&this._drag.target.one("click.owl.core",function(){return!1})),this.is("dragging")&&(this.leave("dragging"),this.trigger("dragged"))},n.prototype.closest=function(e,s){var i=-1,n=30,r=this.width(),a=this.coordinates();return this.settings.freeDrag||t.each(a,t.proxy(function(t,o){return"left"===s&&e>o-n&&o+n>e?i=t:"right"===s&&e>o-r-n&&o-r+n>e?i=t+1:this.op(e,"<",o)&&this.op(e,">",a[t+1]||o-r)&&(i="left"===s?t+1:t),-1===i},this)),this.settings.loop||(this.op(e,">",a[this.minimum()])?i=e=this.minimum():this.op(e,"<",a[this.maximum()])&&(i=e=this.maximum())),i},n.prototype.animate=function(e){var s=this.speed()>0;this.is("animating")&&this.onTransitionEnd(),s&&(this.enter("animating"),this.trigger("translate")),t.support.transform3d&&t.support.transition?this.$stage.css({transform:"translate3d("+e+"px,0px,0px)",transition:this.speed()/1e3+"s"}):s?this.$stage.animate({left:e+"px"},this.speed(),this.settings.fallbackEasing,t.proxy(this.onTransitionEnd,this)):this.$stage.css({left:e+"px"})},n.prototype.is=function(t){return this._states.current[t]&&this._states.current[t]>0},n.prototype.current=function(t){if(t===i)return this._current;if(0===this._items.length)return i;if(t=this.normalize(t),this._current!==t){var e=this.trigger("change",{property:{name:"position",value:t}});e.data!==i&&(t=this.normalize(e.data)),this._current=t,this.invalidate("position"),this.trigger("changed",{property:{name:"position",value:this._current}})}return this._current},n.prototype.invalidate=function(e){return"string"===t.type(e)&&(this._invalidated[e]=!0,this.is("valid")&&this.leave("valid")),t.map(this._invalidated,function(t,e){return e})},n.prototype.reset=function(t){t=this.normalize(t),t!==i&&(this._speed=0,this._current=t,this.suppress(["translate","translated"]),this.animate(this.coordinates(t)),this.release(["translate","translated"]))},n.prototype.normalize=function(t,e){var s=this._items.length,n=e?0:this._clones.length;return!this.isNumeric(t)||1>s?t=i:(0>t||t>=s+n)&&(t=((t-n/2)%s+s)%s+n/2),t},n.prototype.relative=function(t){return t-=this._clones.length/2,this.normalize(t,!0)},n.prototype.maximum=function(t){var e,s=this.settings,i=this._coordinates.length,n=Math.abs(this._coordinates[i-1])-this._width,r=-1;if(s.loop)i=this._clones.length/2+this._items.length-1;else if(s.autoWidth||s.merge)for(;i-r>1;)Math.abs(this._coordinates[e=i+r>>1])<n?r=e:i=e;else i=s.center?this._items.length-1:this._items.length-s.items;return t&&(i-=this._clones.length/2),Math.max(i,0)},n.prototype.minimum=function(t){return t?0:this._clones.length/2},n.prototype.items=function(t){return t===i?this._items.slice():(t=this.normalize(t,!0),this._items[t])},n.prototype.mergers=function(t){return t===i?this._mergers.slice():(t=this.normalize(t,!0),this._mergers[t])},n.prototype.clones=function(e){var s=this._clones.length/2,n=s+this._items.length,r=function(t){return t%2===0?n+t/2:s-(t+1)/2};return e===i?t.map(this._clones,function(t,e){return r(e)}):t.map(this._clones,function(t,s){return t===e?r(s):null})},n.prototype.speed=function(t){return t!==i&&(this._speed=t),this._speed},n.prototype.coordinates=function(e){var s,n=1,r=e-1;return e===i?t.map(this._coordinates,t.proxy(function(t,e){return this.coordinates(e)},this)):(this.settings.center?(this.settings.rtl&&(n=-1,r=e+1),s=this._coordinates[e],s+=(this.width()-s+(this._coordinates[r]||0))/2*n):s=this._coordinates[r]||0,s=Math.ceil(s))},n.prototype.duration=function(t,e,s){return 0===s?0:Math.min(Math.max(Math.abs(e-t),1),6)*Math.abs(s||this.settings.smartSpeed)},n.prototype.to=function(t,e){var s=this.current(),i=null,n=t-this.relative(s),r=(n>0)-(0>n),a=this._items.length,o=this.minimum(),h=this.maximum();this.settings.loop?(!this.settings.rewind&&Math.abs(n)>a/2&&(n+=-1*r*a),t=s+n,i=((t-o)%a+a)%a+o,i!==t&&h>=i-n&&i-n>0&&(s=i-n,t=i,this.reset(s))):this.settings.rewind?(h+=1,t=(t%h+h)%h):t=Math.max(o,Math.min(h,t)),this.speed(this.duration(s,t,e)),this.current(t),this.$element.is(":visible")&&this.update()},n.prototype.next=function(t){t=t||!1,this.to(this.relative(this.current())+1,t)},n.prototype.prev=function(t){t=t||!1,this.to(this.relative(this.current())-1,t)},n.prototype.onTransitionEnd=function(t){return t!==i&&(t.stopPropagation(),(t.target||t.srcElement||t.originalTarget)!==this.$stage.get(0))?!1:(this.leave("animating"),void this.trigger("translated"))},n.prototype.viewport=function(){var i;if(this.options.responsiveBaseElement!==e)i=t(this.options.responsiveBaseElement).width();else if(e.innerWidth)i=e.innerWidth;else{if(!s.documentElement||!s.documentElement.clientWidth)throw"Can not detect viewport width.";i=s.documentElement.clientWidth}return i},n.prototype.replace=function(e){this.$stage.empty(),this._items=[],e&&(e=e instanceof jQuery?e:t(e)),this.settings.nestedItemSelector&&(e=e.find("."+this.settings.nestedItemSelector)),e.filter(function(){return 1===this.nodeType}).each(t.proxy(function(t,e){e=this.prepare(e),this.$stage.append(e),this._items.push(e),this._mergers.push(1*e.find("[data-merge]").andSelf("[data-merge]").attr("data-merge")||1)},this)),this.reset(this.isNumeric(this.settings.startPosition)?this.settings.startPosition:0),this.invalidate("items")},n.prototype.add=function(e,s){var n=this.relative(this._current);s=s===i?this._items.length:this.normalize(s,!0),e=e instanceof jQuery?e:t(e),this.trigger("add",{content:e,position:s}),e=this.prepare(e),0===this._items.length||s===this._items.length?(0===this._items.length&&this.$stage.append(e),0!==this._items.length&&this._items[s-1].after(e),this._items.push(e),this._mergers.push(1*e.find("[data-merge]").andSelf("[data-merge]").attr("data-merge")||1)):(this._items[s].before(e),this._items.splice(s,0,e),this._mergers.splice(s,0,1*e.find("[data-merge]").andSelf("[data-merge]").attr("data-merge")||1)),this._items[n]&&this.reset(this._items[n].index()),this.invalidate("items"),this.trigger("added",{content:e,position:s})},n.prototype.remove=function(t){t=this.normalize(t,!0),t!==i&&(this.trigger("remove",{content:this._items[t],position:t}),this._items[t].remove(),this._items.splice(t,1),this._mergers.splice(t,1),this.invalidate("items"),this.trigger("removed",{content:null,position:t}))},n.prototype.preloadAutoWidthImages=function(e){e.each(t.proxy(function(e,s){this.enter("pre-loading"),s=t(s),t(new Image).one("load",t.proxy(function(t){s.attr("src",t.target.src),s.css("opacity",1),this.leave("pre-loading"),!this.is("pre-loading")&&!this.is("initializing")&&this.refresh()},this)).attr("src",s.attr("src")||s.attr("data-src")||s.attr("data-src-retina"))},this))},n.prototype.destroy=function(){this.$element.off(".owl.core"),this.$stage.off(".owl.core"),t(s).off(".owl.core"),this.settings.responsive!==!1&&(e.clearTimeout(this.resizeTimer),this.off(e,"resize",this._handlers.onThrottledResize));for(var i in this._plugins)this._plugins[i].destroy();this.$stage.children(".cloned").remove(),this.$stage.unwrap(),this.$stage.children().contents().unwrap(),this.$stage.children().unwrap(),this.$element.removeClass(this.options.refreshClass).removeClass(this.options.loadingClass).removeClass(this.options.loadedClass).removeClass(this.options.rtlClass).removeClass(this.options.dragClass).removeClass(this.options.grabClass).attr("class",this.$element.attr("class").replace(new RegExp(this.options.responsiveClass+"-\\S+\\s","g"),"")).removeData("owl.carousel")},n.prototype.op=function(t,e,s){var i=this.settings.rtl;switch(e){case"<":return i?t>s:s>t;case">":return i?s>t:t>s;case">=":return i?s>=t:t>=s;case"<=":return i?t>=s:s>=t}},n.prototype.on=function(t,e,s,i){t.addEventListener?t.addEventListener(e,s,i):t.attachEvent&&t.attachEvent("on"+e,s)},n.prototype.off=function(t,e,s,i){t.removeEventListener?t.removeEventListener(e,s,i):t.detachEvent&&t.detachEvent("on"+e,s)},n.prototype.trigger=function(e,s,i,r,a){var o={item:{count:this._items.length,index:this.current()}},h=t.camelCase(t.grep(["on",e,i],function(t){return t}).join("-").toLowerCase()),l=t.Event([e,"owl",i||"carousel"].join(".").toLowerCase(),t.extend({relatedTarget:this},o,s));return this._supress[e]||(t.each(this._plugins,function(t,e){e.onTrigger&&e.onTrigger(l)}),this.register({type:n.Type.Event,name:e}),this.$element.trigger(l),this.settings&&"function"==typeof this.settings[h]&&this.settings[h].call(this,l)),l},n.prototype.enter=function(e){t.each([e].concat(this._states.tags[e]||[]),t.proxy(function(t,e){this._states.current[e]===i&&(this._states.current[e]=0),this._states.current[e]++},this))},n.prototype.leave=function(e){t.each([e].concat(this._states.tags[e]||[]),t.proxy(function(t,e){this._states.current[e]--},this))},n.prototype.register=function(e){if(e.type===n.Type.Event){if(t.event.special[e.name]||(t.event.special[e.name]={}),!t.event.special[e.name].owl){var s=t.event.special[e.name]._default;t.event.special[e.name]._default=function(t){return!s||!s.apply||t.namespace&&-1!==t.namespace.indexOf("owl")?t.namespace&&t.namespace.indexOf("owl")>-1:s.apply(this,arguments)},t.event.special[e.name].owl=!0}}else e.type===n.Type.State&&(this._states.tags[e.name]?this._states.tags[e.name]=this._states.tags[e.name].concat(e.tags):this._states.tags[e.name]=e.tags,this._states.tags[e.name]=t.grep(this._states.tags[e.name],t.proxy(function(s,i){return t.inArray(s,this._states.tags[e.name])===i},this)))},n.prototype.suppress=function(e){t.each(e,t.proxy(function(t,e){this._supress[e]=!0},this))},n.prototype.release=function(e){t.each(e,t.proxy(function(t,e){delete this._supress[e]},this))},n.prototype.pointer=function(t){var s={x:null,y:null};return t=t.originalEvent||t||e.event,t=t.touches&&t.touches.length?t.touches[0]:t.changedTouches&&t.changedTouches.length?t.changedTouches[0]:t,t.pageX?(s.x=t.pageX,s.y=t.pageY):(s.x=t.clientX,s.y=t.clientY),s},n.prototype.isNumeric=function(t){return!isNaN(parseFloat(t))},n.prototype.difference=function(t,e){return{x:t.x-e.x,y:t.y-e.y}},t.fn.owlCarousel=function(e){var s=Array.prototype.slice.call(arguments,1);return this.each(function(){var i=t(this),r=i.data("owl.carousel");r||(r=new n(this,"object"==typeof e&&e),i.data("owl.carousel",r),t.each(["next","prev","to","destroy","refresh","replace","add","remove"],function(e,s){r.register({type:n.Type.Event,name:s}),r.$element.on(s+".owl.carousel.core",t.proxy(function(t){t.namespace&&t.relatedTarget!==this&&(this.suppress([s]),r[s].apply(this,[].slice.call(arguments,1)),this.release([s]))},r))})),"string"==typeof e&&"_"!==e.charAt(0)&&r[e].apply(r,s)})},t.fn.owlCarousel.Constructor=n}(window.Zepto||window.jQuery,window,document);


/**
 * Support Plugin
 *
 * @version 2.1.0
 * @author Vivid Planet Software GmbH
 * @author Artus Kolanowski
 * @author David Deutsch
 * @license The MIT License (MIT)
 */
!function(n,t,i,o){function r(t,i){var r=!1,s=t.charAt(0).toUpperCase()+t.slice(1);return n.each((t+" "+e.join(s+" ")+s).split(" "),function(n,t){return a[t]!==o?(r=i?t:!0,!1):void 0}),r}function s(n){return r(n,!0)}var a=n("<support>").get(0).style,e="Webkit Moz O ms".split(" "),m={transition:{end:{WebkitTransition:"webkitTransitionEnd",MozTransition:"transitionend",OTransition:"oTransitionEnd",transition:"transitionend"}},animation:{end:{WebkitAnimation:"webkitAnimationEnd",MozAnimation:"animationend",OAnimation:"oAnimationEnd",animation:"animationend"}}},u={csstransforms:function(){return!!r("transform")},csstransforms3d:function(){return!!r("perspective")},csstransitions:function(){return!!r("transition")},cssanimations:function(){return!!r("animation")}};u.csstransitions()&&(n.support.transition=new String(s("transition")),n.support.transition.end=m.transition.end[n.support.transition]),u.cssanimations()&&(n.support.animation=new String(s("animation")),n.support.animation.end=m.animation.end[n.support.animation]),u.csstransforms()&&(n.support.transform=new String(s("transform")),n.support.transform3d=u.csstransforms3d())}(window.Zepto||window.jQuery,window,document);



/**
 * Autoplay Plugin
 * @version 2.1.0
 * @author Bartosz Wojciechowski
 * @author Artus Kolanowski
 * @author David Deutsch
 * @license The MIT License (MIT)
 */
!function(t,o,e,s){var i=function(o){this._core=o,this._timeout=null,this._paused=!1,this._handlers={"changed.owl.carousel":t.proxy(function(t){t.namespace&&"settings"===t.property.name?this._core.settings.autoplay?this.play():this.stop():t.namespace&&"position"===t.property.name&&this._core.settings.autoplay&&this._setAutoPlayInterval()},this),"initialized.owl.carousel":t.proxy(function(t){t.namespace&&this._core.settings.autoplay&&this.play()},this),"play.owl.autoplay":t.proxy(function(t,o,e){t.namespace&&this.play(o,e)},this),"stop.owl.autoplay":t.proxy(function(t){t.namespace&&this.stop()},this),"mouseover.owl.autoplay":t.proxy(function(){this._core.settings.autoplayHoverPause&&this._core.is("rotating")&&this.pause()},this),"mouseleave.owl.autoplay":t.proxy(function(){this._core.settings.autoplayHoverPause&&this._core.is("rotating")&&this.play()},this),"touchstart.owl.core":t.proxy(function(){this._core.settings.autoplayHoverPause&&this._core.is("rotating")&&this.pause()},this),"touchend.owl.core":t.proxy(function(){this._core.settings.autoplayHoverPause&&this.play()},this)},this._core.$element.on(this._handlers),this._core.options=t.extend({},i.Defaults,this._core.options)};i.Defaults={autoplay:!1,autoplayTimeout:5e3,autoplayHoverPause:!1,autoplaySpeed:!1},i.prototype.play=function(t,o){this._paused=!1,this._core.is("rotating")||(this._core.enter("rotating"),this._setAutoPlayInterval())},i.prototype._getNextTimeout=function(s,i){return this._timeout&&o.clearTimeout(this._timeout),o.setTimeout(t.proxy(function(){this._paused||this._core.is("busy")||this._core.is("interacting")||e.hidden||this._core.next(i||this._core.settings.autoplaySpeed)},this),s||this._core.settings.autoplayTimeout)},i.prototype._setAutoPlayInterval=function(){this._timeout=this._getNextTimeout()},i.prototype.stop=function(){this._core.is("rotating")&&(o.clearTimeout(this._timeout),this._core.leave("rotating"))},i.prototype.pause=function(){this._core.is("rotating")&&(this._paused=!0)},i.prototype.destroy=function(){var t,o;this.stop();for(t in this._handlers)this._core.$element.off(t,this._handlers[t]);for(o in Object.getOwnPropertyNames(this))"function"!=typeof this[o]&&(this[o]=null)},t.fn.owlCarousel.Constructor.Plugins.autoplay=i}(window.Zepto||window.jQuery,window,document);



/**
 * AutoHeight Plugin
 * @version 2.1.0
 * @author Bartosz Wojciechowski
 * @author David Deutsch
 * @license The MIT License (MIT)
 */
!function(t,e,s,i){var o=function(e){this._core=e,this._handlers={"initialized.owl.carousel refreshed.owl.carousel":t.proxy(function(t){t.namespace&&this._core.settings.autoHeight&&this.update()},this),"changed.owl.carousel":t.proxy(function(t){t.namespace&&this._core.settings.autoHeight&&"position"==t.property.name&&this.update()},this),"loaded.owl.lazy":t.proxy(function(t){t.namespace&&this._core.settings.autoHeight&&t.element.closest("."+this._core.settings.itemClass).index()===this._core.current()&&this.update()},this)},this._core.options=t.extend({},o.Defaults,this._core.options),this._core.$element.on(this._handlers)};o.Defaults={autoHeight:!1,autoHeightClass:"owl-height"},o.prototype.update=function(){var e=this._core._current,s=e+this._core.settings.items,i=this._core.$stage.children().toArray().slice(e,s),o=[],n=0;t.each(i,function(e,s){o.push(t(s).height())}),n=Math.max.apply(null,o),this._core.$stage.parent().height(n).addClass(this._core.settings.autoHeightClass)},o.prototype.destroy=function(){var t,e;for(t in this._handlers)this._core.$element.off(t,this._handlers[t]);for(e in Object.getOwnPropertyNames(this))"function"!=typeof this[e]&&(this[e]=null)},t.fn.owlCarousel.Constructor.Plugins.AutoHeight=o}(window.Zepto||window.jQuery,window,document);



/**
 * Animate Plugin
 * @version 2.1.0
 * @author Bartosz Wojciechowski
 * @author David Deutsch
 * @license The MIT License (MIT)
 */
!function(t,e,s,i){var o=function(e){this.core=e,this.core.options=t.extend({},o.Defaults,this.core.options),this.swapping=!0,this.previous=i,this.next=i,this.handlers={"change.owl.carousel":t.proxy(function(t){t.namespace&&"position"==t.property.name&&(this.previous=this.core.current(),this.next=t.property.value)},this),"drag.owl.carousel dragged.owl.carousel translated.owl.carousel":t.proxy(function(t){t.namespace&&(this.swapping="translated"==t.type)},this),"translate.owl.carousel":t.proxy(function(t){t.namespace&&this.swapping&&(this.core.options.animateOut||this.core.options.animateIn)&&this.swap()},this)},this.core.$element.on(this.handlers)};o.Defaults={animateOut:!1,animateIn:!1},o.prototype.swap=function(){if(1===this.core.settings.items&&t.support.animation&&t.support.transition){this.core.speed(0);var e,s=t.proxy(this.clear,this),i=this.core.$stage.children().eq(this.previous),o=this.core.$stage.children().eq(this.next),n=this.core.settings.animateIn,a=this.core.settings.animateOut;this.core.current()!==this.previous&&(a&&(e=this.core.coordinates(this.previous)-this.core.coordinates(this.next),i.one(t.support.animation.end,s).css({left:e+"px"}).addClass("animated owl-animated-out").addClass(a)),n&&o.one(t.support.animation.end,s).addClass("animated owl-animated-in").addClass(n))}},o.prototype.clear=function(e){t(e.target).css({left:""}).removeClass("animated owl-animated-out owl-animated-in").removeClass(this.core.settings.animateIn).removeClass(this.core.settings.animateOut),this.core.onTransitionEnd()},o.prototype.destroy=function(){var t,e;for(t in this.handlers)this.core.$element.off(t,this.handlers[t]);for(e in Object.getOwnPropertyNames(this))"function"!=typeof this[e]&&(this[e]=null)},t.fn.owlCarousel.Constructor.Plugins.Animate=o}(window.Zepto||window.jQuery,window,document);



/**
 * Navigation Plugin
 * @version 2.1.0
 * @author Artus Kolanowski
 * @author David Deutsch
 * @license The MIT License (MIT)
 */
!function(t,e,s,i){"use strict";var o=function(e){this._core=e,this._initialized=!1,this._pages=[],this._controls={},this._templates=[],this.$element=this._core.$element,this._overrides={next:this._core.next,prev:this._core.prev,to:this._core.to},this._handlers={"prepared.owl.carousel":t.proxy(function(e){e.namespace&&this._core.settings.dotsData&&this._templates.push('<div class="'+this._core.settings.dotClass+'">'+t(e.content).find("[data-dot]").addBack("[data-dot]").attr("data-dot")+"</div>")},this),"added.owl.carousel":t.proxy(function(t){t.namespace&&this._core.settings.dotsData&&this._templates.splice(t.position,0,this._templates.pop())},this),"remove.owl.carousel":t.proxy(function(t){t.namespace&&this._core.settings.dotsData&&this._templates.splice(t.position,1)},this),"changed.owl.carousel":t.proxy(function(t){t.namespace&&"position"==t.property.name&&this.draw()},this),"initialized.owl.carousel":t.proxy(function(t){t.namespace&&!this._initialized&&(this._core.trigger("initialize",null,"navigation"),this.initialize(),this.update(),this.draw(),this._initialized=!0,this._core.trigger("initialized",null,"navigation"))},this),"refreshed.owl.carousel":t.proxy(function(t){t.namespace&&this._initialized&&(this._core.trigger("refresh",null,"navigation"),this.update(),this.draw(),this._core.trigger("refreshed",null,"navigation"))},this)},this._core.options=t.extend({},o.Defaults,this._core.options),this.$element.on(this._handlers)};o.Defaults={nav:!1,navText:["prev","next"],navSpeed:!1,navElement:"div",navContainer:!1,navContainerClass:"owl-nav",navClass:["owl-prev","owl-next"],slideBy:1,dotClass:"owl-dot",dotsClass:"owl-dots",dots:!0,dotsEach:!1,dotsData:!1,dotsSpeed:!1,dotsContainer:!1},o.prototype.initialize=function(){var e,s=this._core.settings;this._controls.$relative=(s.navContainer?t(s.navContainer):t("<div>").addClass(s.navContainerClass).appendTo(this.$element)).addClass("disabled"),this._controls.$previous=t("<"+s.navElement+">").addClass(s.navClass[0]).html(s.navText[0]).prependTo(this._controls.$relative).on("click",t.proxy(function(t){this.prev(s.navSpeed)},this)),this._controls.$next=t("<"+s.navElement+">").addClass(s.navClass[1]).html(s.navText[1]).appendTo(this._controls.$relative).on("click",t.proxy(function(t){this.next(s.navSpeed)},this)),s.dotsData||(this._templates=[t("<div>").addClass(s.dotClass).append(t("<span>")).prop("outerHTML")]),this._controls.$absolute=(s.dotsContainer?t(s.dotsContainer):t("<div>").addClass(s.dotsClass).appendTo(this.$element)).addClass("disabled"),this._controls.$absolute.on("click","div",t.proxy(function(e){var i=t(e.target).parent().is(this._controls.$absolute)?t(e.target).index():t(e.target).parent().index();e.preventDefault(),this.to(i,s.dotsSpeed)},this));for(e in this._overrides)this._core[e]=t.proxy(this[e],this)},o.prototype.destroy=function(){var t,e,s,i;for(t in this._handlers)this.$element.off(t,this._handlers[t]);for(e in this._controls)this._controls[e].remove();for(i in this.overides)this._core[i]=this._overrides[i];for(s in Object.getOwnPropertyNames(this))"function"!=typeof this[s]&&(this[s]=null)},o.prototype.update=function(){var t,e,s,i=this._core.clones().length/2,o=i+this._core.items().length,n=this._core.maximum(!0),r=this._core.settings,a=r.center||r.autoWidth||r.dotsData?1:r.dotsEach||r.items;if("page"!==r.slideBy&&(r.slideBy=Math.min(r.slideBy,r.items)),r.dots||"page"==r.slideBy)for(this._pages=[],t=i,e=0,s=0;o>t;t++){if(e>=a||0===e){if(this._pages.push({start:Math.min(n,t-i),end:t-i+a-1}),Math.min(n,t-i)===n)break;e=0,++s}e+=this._core.mergers(this._core.relative(t))}},o.prototype.draw=function(){var e,s=this._core.settings,i=this._core.items().length<=s.items,o=this._core.relative(this._core.current()),n=s.loop||s.rewind;this._controls.$relative.toggleClass("disabled",!s.nav||i),s.nav&&(this._controls.$previous.toggleClass("disabled",!n&&o<=this._core.minimum(!0)),this._controls.$next.toggleClass("disabled",!n&&o>=this._core.maximum(!0))),this._controls.$absolute.toggleClass("disabled",!s.dots||i),s.dots&&(e=this._pages.length-this._controls.$absolute.children().length,s.dotsData&&0!==e?this._controls.$absolute.html(this._templates.join("")):e>0?this._controls.$absolute.append(new Array(e+1).join(this._templates[0])):0>e&&this._controls.$absolute.children().slice(e).remove(),this._controls.$absolute.find(".active").removeClass("active"),this._controls.$absolute.children().eq(t.inArray(this.current(),this._pages)).addClass("active"))},o.prototype.onTrigger=function(e){var s=this._core.settings;e.page={index:t.inArray(this.current(),this._pages),count:this._pages.length,size:s&&(s.center||s.autoWidth||s.dotsData?1:s.dotsEach||s.items)}},o.prototype.current=function(){var e=this._core.relative(this._core.current());return t.grep(this._pages,t.proxy(function(t,s){return t.start<=e&&t.end>=e},this)).pop()},o.prototype.getPosition=function(e){var s,i,o=this._core.settings;return"page"==o.slideBy?(s=t.inArray(this.current(),this._pages),i=this._pages.length,e?++s:--s,s=this._pages[(s%i+i)%i].start):(s=this._core.relative(this._core.current()),i=this._core.items().length,e?s+=o.slideBy:s-=o.slideBy),s},o.prototype.next=function(e){t.proxy(this._overrides.to,this._core)(this.getPosition(!0),e)},o.prototype.prev=function(e){t.proxy(this._overrides.to,this._core)(this.getPosition(!1),e)},o.prototype.to=function(e,s,i){var o;!i&&this._pages.length?(o=this._pages.length,t.proxy(this._overrides.to,this._core)(this._pages[(e%o+o)%o].start,s)):t.proxy(this._overrides.to,this._core)(e,s)},t.fn.owlCarousel.Constructor.Plugins.Navigation=o}(window.Zepto||window.jQuery,window,document);



/*!
 * parallax.js v1.4.2 (http://pixelcog.github.io/parallax.js/)
 * @copyright 2016 PixelCog, Inc.
 * @license MIT (https://github.com/pixelcog/parallax.js/blob/master/LICENSE)
 */
!function(t,i,e,s){function o(i,e){var h=this;"object"==typeof e&&(delete e.refresh,delete e.render,t.extend(this,e)),this.$element=t(i),this.$ele_simple_id=t(i).attr("id"),this.$ele_id=t(i).attr("id")+"-parallax",!this.imageSrc&&this.$element.is("img")&&(this.imageSrc=this.$element.attr("src"));var a=(this.position+"").toLowerCase().match(/\S+/g)||[];if(a.length<1&&a.push("center"),1==a.length&&a.push(a[0]),("top"==a[0]||"bottom"==a[0]||"left"==a[1]||"right"==a[1])&&(a=[a[1],a[0]]),this.positionX!=s&&(a[0]=this.positionX.toLowerCase()),this.positionY!=s&&(a[1]=this.positionY.toLowerCase()),h.positionX=a[0],h.positionY=a[1],"left"!=this.positionX&&"right"!=this.positionX&&(isNaN(parseInt(this.positionX))?this.positionX="center":this.positionX=parseInt(this.positionX)),"top"!=this.positionY&&"bottom"!=this.positionY&&(isNaN(parseInt(this.positionY))?this.positionY="center":this.positionY=parseInt(this.positionY)),this.position=this.positionX+(isNaN(this.positionX)?"":"px")+" "+this.positionY+(isNaN(this.positionY)?"":"px"),navigator.userAgent.match(/(iPod|iPhone|iPad)/))return this.imageSrc&&this.iosFix&&!this.$element.is("img")&&this.$element.css({backgroundImage:"url("+this.imageSrc+")",backgroundSize:"cover",backgroundPosition:this.position}),this;if(navigator.userAgent.match(/(Android)/))return this.imageSrc&&this.androidFix&&!this.$element.is("img")&&this.$element.css({backgroundImage:"url("+this.imageSrc+")",backgroundSize:"cover",backgroundPosition:this.position}),this;this.$mirror=t("<div />").prependTo("body");var r=this.$element.find(">.parallax-slider"),n=!1;0==r.length?this.$slider=t("<img />").prependTo(this.$mirror):(this.$slider=r.prependTo(this.$mirror),n=!0),this.$mirror.attr("id",this.$ele_id).addClass("parallax-mirror").css({visibility:"hidden",zIndex:this.zIndex,position:"fixed",top:0,left:0,overflow:"hidden"}),this.$slider.addClass("parallax-slider").one("load",function(){h.naturalHeight&&h.naturalWidth||(h.naturalHeight=this.naturalHeight||this.height||1,h.naturalWidth=this.naturalWidth||this.width||1),h.aspectRatio=h.naturalWidth/h.naturalHeight,o.isSetup||o.setup(),o.sliders.push(h),o.isFresh=!1,o.requestRender()}),n||(this.$slider[0].src=this.imageSrc),(this.naturalHeight&&this.naturalWidth||this.$slider[0].complete||r.length>0)&&this.$slider.trigger("load")}function h(s){return this.each(function(){var h=t(this),a="object"==typeof s&&s;this==i||this==e||h.is("body")?o.configure(a):h.data("px.parallax")?"object"==typeof s&&t.extend(h.data("px.parallax"),a):(a=t.extend({},h.data(),a),h.data("px.parallax",new o(this,a))),"string"==typeof s&&("destroy"==s?o.destroy(this):o[s]())})}!function(){for(var t=0,e=["ms","moz","webkit","o"],s=0;s<e.length&&!i.requestAnimationFrame;++s)i.requestAnimationFrame=i[e[s]+"RequestAnimationFrame"],i.cancelAnimationFrame=i[e[s]+"CancelAnimationFrame"]||i[e[s]+"CancelRequestAnimationFrame"];i.requestAnimationFrame||(i.requestAnimationFrame=function(e){var s=(new Date).getTime(),o=Math.max(0,16-(s-t)),h=i.setTimeout(function(){e(s+o)},o);return t=s+o,h}),i.cancelAnimationFrame||(i.cancelAnimationFrame=function(t){clearTimeout(t)})}(),t.extend(o.prototype,{speed:.2,bleed:0,zIndex:-100,iosFix:!0,androidFix:!0,position:"center",overScrollFix:!1,refresh:function(){this.boxWidth=this.$element.outerWidth(),this.boxHeight=this.$element.outerHeight()+2*this.bleed,this.boxOffsetTop=this.$element.offset().top-this.bleed,this.boxOffsetLeft=this.$element.offset().left,this.boxOffsetBottom=this.boxOffsetTop+this.boxHeight;var t=o.winHeight,i=o.docHeight,e=Math.min(this.boxOffsetTop,i-t),s=Math.max(this.boxOffsetTop+this.boxHeight-t,0),h=this.boxHeight+(e-s)*(1-this.speed)|0,a=(this.boxOffsetTop-e)*(1-this.speed)|0;if(h*this.aspectRatio>=this.boxWidth){this.imageWidth=h*this.aspectRatio|0,this.imageHeight=h,this.offsetBaseTop=a;var r=this.imageWidth-this.boxWidth;"left"==this.positionX?this.offsetLeft=0:"right"==this.positionX?this.offsetLeft=-r:isNaN(this.positionX)?this.offsetLeft=-r/2|0:this.offsetLeft=Math.max(this.positionX,-r)}else{this.imageWidth=this.boxWidth,this.imageHeight=this.boxWidth/this.aspectRatio|0,this.offsetLeft=0;var r=this.imageHeight-h;"top"==this.positionY?this.offsetBaseTop=a:"bottom"==this.positionY?this.offsetBaseTop=a-r:isNaN(this.positionY)?this.offsetBaseTop=a-r/2|0:this.offsetBaseTop=a+Math.max(this.positionY,-r)}},render:function(){var t=o.scrollTop,i=o.scrollLeft,e=this.overScrollFix?o.overScroll:0,s=t+o.winHeight;this.boxOffsetBottom>t&&this.boxOffsetTop<=s?(this.visibility="visible",this.mirrorTop=this.boxOffsetTop-t,this.mirrorLeft=this.boxOffsetLeft-i,this.offsetTop=this.offsetBaseTop-this.mirrorTop*(1-this.speed)):this.visibility="hidden",this.$mirror.css({transform:"translate3d(0px, 0px, 0px)",visibility:this.visibility,top:this.mirrorTop-e,left:this.mirrorLeft,height:this.boxHeight,width:this.boxWidth}),this.$slider.css({transform:"translate3d(0px, 0px, 0px)",position:"absolute",top:this.offsetTop,left:this.offsetLeft,height:this.imageHeight,width:this.imageWidth,maxWidth:"none"})}}),t.extend(o,{scrollTop:0,scrollLeft:0,winHeight:0,winWidth:0,docHeight:1<<30,docWidth:1<<30,sliders:[],isReady:!1,isFresh:!1,isBusy:!1,setup:function(){if(!this.isReady){var s=t(e),h=t(i),a=function(){o.winHeight=h.height(),o.winWidth=h.width(),o.docHeight=s.height(),o.docWidth=s.width()},r=function(){var t=h.scrollTop(),i=o.docHeight-o.winHeight,e=o.docWidth-o.winWidth;o.scrollTop=Math.max(0,Math.min(i,t)),o.scrollLeft=Math.max(0,Math.min(e,h.scrollLeft())),o.overScroll=Math.max(t-i,Math.min(t,0))};h.on("resize.px.parallax load.px.parallax",function(){a(),o.isFresh=!1,o.requestRender()}).on("scroll.px.parallax load.px.parallax",function(){r(),o.requestRender()}),a(),r(),this.isReady=!0}},configure:function(i){"object"==typeof i&&(delete i.refresh,delete i.render,t.extend(this.prototype,i))},refresh:function(){t.each(this.sliders,function(){this.refresh()}),this.isFresh=!0},render:function(){this.isFresh||this.refresh(),t.each(this.sliders,function(){this.render(),t("#"+this.$ele_simple_id).css("background","none")})},requestRender:function(){var t=this;this.isBusy||(this.isBusy=!0,i.requestAnimationFrame(function(){t.render(),t.isBusy=!1}))},destroy:function(e){var s,h=t(e).data("px.parallax");for(h.$mirror.remove(),s=0;s<this.sliders.length;s+=1)this.sliders[s]==h&&this.sliders.splice(s,1);t(e).data("px.parallax",!1),0===this.sliders.length&&(t(i).off("scroll.px.parallax resize.px.parallax load.px.parallax"),this.isReady=!1,o.isSetup=!1)}});var a=t.fn.parallax;t.fn.parallax=h,t.fn.parallax.Constructor=o,t.fn.parallax.noConflict=function(){return t.fn.parallax=a,this},t(e).on("ready.px.parallax.data-api",function(){t('[data-parallax="scroll"]').parallax()})}(jQuery,window,document);



/*!
 * FitVids 1.1 (http://pixelcog.github.io/parallax.js/)
 * Copyright 2013, Chris Coyier - http://css-tricks.com + Dave Rupert - http://daverupert.com
 * Credit to Thierry Koblentz - http://www.alistapart.com/articles/creating-intrinsic-ratios-for-video/
 * Released under the WTFPL license - http://sam.zoy.org/wtfpl/
 */
;(function($){'use strict';$.fn.fitVids=function(options){var settings={customSelector:null,ignore:null};if(!document.getElementById('fit-vids-style')){var head=document.head||document.getElementsByTagName('head')[0];var css='.fluid-width-video-wrapper{width:100%;position:relative;padding:0;}.fluid-width-video-wrapper iframe,.fluid-width-video-wrapper object,.fluid-width-video-wrapper embed {position:absolute;top:0;left:0;width:100%;height:100%;}';var div=document.createElement("div");div.innerHTML='<p>x</p><style id="fit-vids-style">'+css+'</style>';head.appendChild(div.childNodes[1]);}
if(options){$.extend(settings,options);}
return this.each(function(){var selectors=['iframe[src*="player.vimeo.com"]','iframe[src*="youtube.com"]','iframe[src*="youtube-nocookie.com"]','iframe[src*="kickstarter.com"][src*="video.html"]','object','embed'];if(settings.customSelector){selectors.push(settings.customSelector);}
var ignoreList='.fitvidsignore';if(settings.ignore){ignoreList=ignoreList+', '+settings.ignore;}
var $allVideos=$(this).find(selectors.join(','));$allVideos=$allVideos.not('object object');$allVideos=$allVideos.not(ignoreList);$allVideos.each(function(){var $this=$(this);if($this.parents(ignoreList).length>0){return;}
if(this.tagName.toLowerCase()==='embed'&&$this.parent('object').length||$this.parent('.fluid-width-video-wrapper').length){return;}
if((!$this.css('height')&&!$this.css('width'))&&(isNaN($this.attr('height'))||isNaN($this.attr('width'))))
{$this.attr('height',9);$this.attr('width',16);}
var height=(this.tagName.toLowerCase()==='object'||($this.attr('height')&&!isNaN(parseInt($this.attr('height'),10))))?parseInt($this.attr('height'),10):$this.height(),width=!isNaN(parseInt($this.attr('width'),10))?parseInt($this.attr('width'),10):$this.width(),aspectRatio=height / width;if(!$this.attr('name')){var videoName='fitvid'+$.fn.fitVids._count;$this.attr('name',videoName);$.fn.fitVids._count++;}
$this.wrap('<div class="fluid-width-video-wrapper"></div>').parent('.fluid-width-video-wrapper').css('padding-top',(aspectRatio*100)+'%');$this.removeAttr('height').removeAttr('width');});});};$.fn.fitVids._count=0;})(window.jQuery||window.Zepto);



/*!
 * BusinessX JS
 */
;( function( $, window, document, undefined )
	{
		'use strict';

		// Selectors
		var $window			= $( window ),
			$body			= $( 'body' ),
			$document		= $( document ),
			$header			= $( '.main-header' ),
			$fixed_menu		= $( '.mh-fixed' ),
			$logo_wrap		= $fixed_menu.find( '.logo-wrap' );

		// Test mobile
		var ac_TestMobile = function() {
			if( (/Android|iPhone|iPad|iPod|BlackBerry|Windows Phone/i).test(navigator.userAgent || navigator.vendor || window.opera) ) { return true; } else { return false; }
		}


		// Sticky header/menu
		var ac_FixedMenu = function() {
			var hidden_class  = 'mh-hidden',
				transp_class  = 'mh-transparent',
				moving_class  = 'mh-moving',
				sticky_logo   = 'sticky-logo',
				wHeight, wScrollCurrent, wScrollBefore, wScrollDiff, dHeight = 0;

			if( $fixed_menu.length ) {
				var dHeight  = $document.height(),
					wHeight  = $window.height(),
					didScroll;

					$window.on( 'scroll', function() {
						didScroll = true;
					});

					var hasScrolled = function() {
						var wScrollCurrent = $window.scrollTop();
						var wScrollDiff    = wScrollBefore - wScrollCurrent;

						if( wScrollCurrent <= 0 ) {
							if( ! $body.hasClass(sticky_logo) ) {
								$logo_wrap.fadeIn(100).css('display','');
							}
							if( $body.hasClass( 'menu-ff' ) ) {
								$fixed_menu.removeClass( moving_class );
							} else if( $body.hasClass( 'menu-tf' ) ) {
								$fixed_menu.addClass( transp_class ).removeClass( moving_class );
							};

						} else if( wScrollDiff < 0 ) {
							if( $body.hasClass( 'menu-tf' ) ) {
								$fixed_menu.removeClass( transp_class ).addClass( moving_class );
								if( ! $body.hasClass(sticky_logo) ) {
									$logo_wrap.fadeOut(0);
								}
							} else {
								if( ! $body.hasClass(sticky_logo) ) {
									$logo_wrap.fadeOut(100);
								}
								$fixed_menu.addClass( moving_class );
							}
						}

						wScrollBefore = wScrollCurrent;
					}

					hasScrolled();

					setInterval(function () {
						if (didScroll) {
							hasScrolled();
							didScroll = false;
						}
					}, 0);

					if( $body.hasClass(sticky_logo) && $window.scrollTop() > 0 ) {
						$fixed_menu.addClass( moving_class );
						$header.removeClass( transp_class );
					} else if( $window.scrollTop() > 0 ) {
						$fixed_menu.addClass( moving_class );
						$header.removeClass( transp_class );
					};

			}
		} // Sticky menu
		ac_FixedMenu();


		// Setup menu placeholder
		var ac_MenuHeight = function() {
			if( $body.hasClass( 'menu-ff' ) ) {
				$('.mh-placeholder').css( 'height', $fixed_menu.outerHeight() );
			}
		}
		ac_MenuHeight();


		// Add some simple animations
		var ac_AnimateElements = function() {
			var fader		= $('.fader'),
				fader_quick = $('.faderquick'),
				offset		= '75%',
				offset_q	= '95%',
				dir_up		= 'up',
				dir_down	= 'down',
				fader_on 	= 'fader-on',
				fader_reset	= 'fader-reset';

			// Normal speed
			fader.waypoint(function(direction) {
				if (direction === dir_up && $body.hasClass(fader_reset)) {
					$(this.element).removeClass( fader_on ); }
			}, { offset: offset });

			fader.waypoint(function(direction) {
				if (direction === dir_down) {
				  $(this.element).addClass( fader_on ); }
			}, { offset: offset });

			// Faster speed
			fader_quick.waypoint(function(direction) {
				if (direction === dir_up && $body.hasClass(fader_reset)) {
					$(this.element).removeClass( fader_on ); }
			}, { offset: offset_q });

			fader_quick.waypoint(function(direction) {
				if (direction === dir_down) {
					$(this.element).addClass( fader_on ); }
			}, { offset: offset_q });
		}
		ac_AnimateElements();


		// Search form
		var ac_SearchAction = function() {
			var search_wrap 	= $('div.search-wrap'),
				search_field 	= search_wrap.find('.search-field'),
				search_trigger 	= $('#big-search-trigger'),
				search_close 	= $('#big-search-close'),
				search_big		= 'big-search';

			search_close.on('touchend click', function( event ){
				event.preventDefault();
				if($body.hasClass(search_big)){
					$body.removeClass(search_big);
					setTimeout(function(){
						search_field.blur();
					}, 100);
				}
			});

			search_trigger.on( 'touchend click', function( event ){
				event.preventDefault();
				event.stopPropagation();
				$body.addClass(search_big);
				setTimeout(function(){
					search_field.focus();
				}, 100);
				search_field.attr('placeholder', businessx_scripts_data['search_placeholder'] );
			});

			search_field.on('touchend click', function( event ){
				event.stopPropagation();
			});
		}
		ac_SearchAction();


		// Prevent default on click
		$document.on( 'click', '.testimonial-button a', function( event ) {
			if( $(this).attr( 'href' ) == '#' || $(this).attr( 'href' ) == '' ) {
			event.preventDefault(); }
		} );


		// Scroll to id
		var ac_ScrollTo = function( acTheHref ) {
			var the_href	= $( acTheHref ).attr( 'href' ),
				id_target	= $( the_href ),
				home_url    = businessx_scripts_data[ 'home_url' ];

			if( id_target.length ) {
				var	bar         = $( '#wpadminbar' ),
					ttop        = id_target.offset().top,
					hheight     = $header.innerHeight(),
					hheight_t   = hheight - ( parseInt( $header.css( 'paddingTop' ) ) / 2 ),
					bheight     = bar.innerHeight(),
					fromtop, goto;

				if( $header.hasClass('mh-fixed mh-transparent') ) {
					fromtop = bar.length ? ttop - ( hheight_t + bheight ) : ttop - hheight_t;
				} else if ( $header.hasClass('mh-fixed') ) {
					fromtop = bar.length ? ttop - ( hheight + bheight ) : ttop - hheight;
				} else {
					fromtop = bar.length ? ttop - bheight : ttop;
				}

				goto = fromtop < 32 ? 0 : fromtop;

				$( 'body, html' ).animate({
					scrollTop: goto,
				}, 500);
			} else if( home_url.length ) {
				window.location.href = home_url + the_href;
			} else {
				return;
			}
		}

		$document.on( 'click', 'body:not(.nav-open) .gotosection > a', function( event ) {
			ac_ScrollTo( this );
			event.preventDefault();
		});


		// Adjust Section Height
		var ac_SectionHeight = function() {
			var selected_items	= $( '.sec-hero, .sec-slider-slide, .heading-full-height' ),
				smaller_heigh	= $( '.heading-full-width' ),
				no_height_adj	= 'no-height-adj',
				new_height		= ( $body.hasClass( 'menu-ff' ) || $body.hasClass( 'menu-nn' ) ) ? $window.height() - $header.outerHeight() : $window.height(),
				padding_top		= $header.not('.mh-moving').outerHeight();

			if( ! ac_TestMobile() ) {
				// Desktop
				selected_items.css({
					'height' : new_height
				});
			} else { /* Mobile */ }

			// Pages height
			if( ! ( $body.hasClass( 'menu-ff' ) || $body.hasClass( 'menu-nn' ) ) ) {
				smaller_heigh.css({
					'paddingTop' : padding_top
				});
			}
		};
		ac_SectionHeight();


		// Add some padding-top to the first section
		var ac_SectionPadding = function() {
			var first_section 	= $('section[class*=sec-]').first(),
				menu_height		= $header.not('.mh-moving').outerHeight() - 40;

			if( ! $header.length || ( $body.hasClass( 'menu-ff' ) || $body.hasClass( 'menu-nn' ) ) )
				return;

			first_section.not('.sec-slider, .sec-hero').css('paddingTop', menu_height);
		};
		ac_SectionPadding();


		// Fade headings when scrolling
		var ac_FadeDown = function() {
			$window.scroll( function() {
			var	apply_to		= $('.heading-full-height, .heading-full-width');

			if( ! apply_to.length || ac_TestMobile() )
					return;

			var top_value 		= apply_to.offset().top,
				element_height 	= apply_to.outerHeight(),
				scroll_position = $window.scrollTop(),
				fading_elements = $('.sec-hs-elements, .info-full');

				if( scroll_position >= top_value ) {
					if( element_height > scroll_position )
					fading_elements.css({
						  'opacity' : ( 1 - (scroll_position/500) )
					});
				} else {
					fading_elements.css({ 'opacity' : 1 });
				}
			});
		};
		ac_FadeDown();


		// Mobile Menu
		var ac_MobileMenu = function() {
			var menu            = 'main-menu',
				menu_select     = $('.' + menu),
				opened_menu     = 'nav-open',
				mobile_menu     = 'mobile-menu',
				mobile_arrow    = '.mobile-arrow',
				parent_opened   = 'parent-opened',
				opened          = 'opened',
				actions_menu    = 'actions-menu',
				actions_select  = $('.' + actions_menu );

			if( $body.hasClass('menu-ff') || $body.hasClass('menu-nn') ) {
				$('.sec-hero .sec-hs-elements').css('top','50%');
			}

			if( ! menu_select.length &&  ! actions_select.length )
				return;

			$document.on('touchend click', '.ac-btn-mobile-menu', function( event ) {
				event.preventDefault();
				menu_select.detach().prependTo('body').addClass(mobile_menu).addClass('menu-m').removeClass(menu).fadeIn(300);
				$('.'+mobile_menu).find('li.menu-item-has-children > a').after('<a href="#" class="mobile-arrow"></a>');
				$body.toggleClass(opened_menu);
			});

			$document.on('touchend click', '.ac-btn-mobile-actions-menu', function( event ) {
				event.preventDefault();
				actions_select.detach().prependTo('body').addClass(mobile_menu).addClass('menu-a').removeClass(actions_menu).fadeIn(300);

				$body.toggleClass(opened_menu);
			});

			$document.on('touchend click', '.ac-btn-mobile-close, .nav-open .menu-m .gotosection', function( event ){
				event.preventDefault();
				$('.'+mobile_menu).prependTo('.main-menu-wrap').removeClass(mobile_menu).removeClass('menu-m').addClass(menu);
				menu_select.find(mobile_arrow).remove();
				menu_select.find('.'+parent_opened).removeClass(parent_opened);
				menu_select.find('.'+opened).removeClass(opened);
				$body.removeClass(opened_menu);
				if( $( event.currentTarget ).hasClass('gotosection') ) {
					ac_ScrollTo( $( event.currentTarget ).find('a') );
				}
			});

			$document.on('touchend click', '.ac-btn-mobile-act-close, .nav-open .menu-a .gotosection', function( event ){
				event.preventDefault();
				$('.'+mobile_menu).prependTo('.main-header-right').addClass(actions_menu).removeClass('menu-a').removeClass(mobile_menu);
				$body.removeClass(opened_menu);
				if( $( event.currentTarget ).hasClass('gotosection') ) {
					ac_ScrollTo( $( event.currentTarget ).find('a') );
				}
			});

			$document.on('touchend click', mobile_arrow, function( event ){
				event.preventDefault();
				$( event.target ).parent().toggleClass(parent_opened);
				$( event.target ).next('ul').toggleClass(opened);
			});
		};
		ac_MobileMenu();


		// Fitvids
		 $('.post, .widget').fitVids();


		// On Window Resize
		$window.resize( function() {
			ac_SectionHeight();
			ac_MenuHeight();
			ac_SectionPadding();
			$window.trigger('resize.px.parallax');
		});


		// On Window Load
		$window.load(function(){
			$('#bx-preloader').fadeOut('slow',function(){$(this).remove();});
		});


})( jQuery, window, document );
