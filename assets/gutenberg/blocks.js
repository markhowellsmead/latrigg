/*! For license information please see blocks.js.LICENSE.txt */
!function(){var e={738:function(){window.addEventListener("load",(()=>{let e=document.querySelector("body").classList;if(e.contains("wp-admin")&&e.contains("block-editor-page")){const e=document.querySelector("body").getAttribute("class").match(/post-type-([a-z_]+)--([a-z_]+)/),t=document.querySelector(".block-editor-block-list__layout");if(e&&t){const o=e[1];e[2],t.classList.add(`block-editor-block-list__layout--${o}`)}}}))},184:function(e,t){var o;!function(){"use strict";var n={}.hasOwnProperty;function a(){for(var e=[],t=0;t<arguments.length;t++){var o=arguments[t];if(o){var r=typeof o;if("string"===r||"number"===r)e.push(o);else if(Array.isArray(o)){if(o.length){var l=a.apply(null,o);l&&e.push(l)}}else if("object"===r){if(o.toString!==Object.prototype.toString&&!o.toString.toString().includes("[native code]")){e.push(o.toString());continue}for(var c in o)n.call(o,c)&&o[c]&&e.push(c)}}}return e.join(" ")}e.exports?(a.default=a,e.exports=a):void 0===(o=function(){return a}.apply(t,[]))||(e.exports=o)}()}},t={};function o(n){var a=t[n];if(void 0!==a)return a.exports;var r=t[n]={exports:{}};return e[n](r,r.exports,o),r.exports}o.n=function(e){var t=e&&e.__esModule?function(){return e.default}:function(){return e};return o.d(t,{a:t}),t},o.d=function(e,t){for(var n in t)o.o(t,n)&&!o.o(e,n)&&Object.defineProperty(e,n,{enumerable:!0,get:t[n]})},o.o=function(e,t){return Object.prototype.hasOwnProperty.call(e,t)},function(){"use strict";var e=window.wp.i18n,t=window.wp.hooks,n=window.wp.element,a=window.wp.compose,r=window.wp.components,l=window.wp.blockEditor,c=o(184),s=o.n(c);const i=["core/group","core/columns","core/media-text"];(0,t.addFilter)("blocks.registerBlockType","sht/group-box-shadow",(e=>i.includes(e.name)?lodash.assign({},e,{attributes:lodash.assign({},e.attributes,{withShadow:{type:"boolean",default:!1}})}):e)),(0,t.addFilter)("editor.BlockEdit","sht/group-box-shadow",(0,a.createHigherOrderComponent)((t=>o=>{const{name:a,attributes:c,setAttributes:s,isSelected:d}=o,{withShadow:u}=c;return d&&i.includes(a)?React.createElement(n.Fragment,null,React.createElement(t,o),React.createElement(l.InspectorControls,null,React.createElement(r.PanelBody,{title:(0,e.__)("Design","latrigg"),initialOpen:!0},React.createElement(r.ToggleControl,{label:(0,e.__)("Add shadow"),checked:!!u,onChange:()=>s({withShadow:!u})})))):React.createElement(t,o)}))),(0,t.addFilter)("blocks.getSaveContent.extraProps","sht/group-box-shadow",((e,t,o)=>{const{withShadow:n}=o;return i.includes(t.name)?(n&&(e.className=s()(e.className,"with--container-shadow")),e):e}));const d=["core/group","core/columns","core/column","sht/menu-toggler"];(0,t.addFilter)("blocks.registerBlockType","sht/custom-attributes",(e=>d.includes(e.name)?lodash.assign({},e,{attributes:lodash.assign({},e.attributes,{hiddenForMobile:{type:"boolean",default:!1},hiddenForTablet:{type:"boolean",default:!1},hiddenForDesktop:{type:"boolean",default:!1}})}):e)),(0,t.addFilter)("editor.BlockEdit","sht/custom-advanced-control",(0,a.createHigherOrderComponent)((t=>o=>{const{name:a,attributes:c,setAttributes:s,isSelected:i}=o,{hiddenForMobile:u,hiddenForTablet:h,hiddenForDesktop:p}=c;return i&&d.includes(a)?React.createElement(n.Fragment,null,React.createElement(t,o),React.createElement(l.InspectorControls,null,React.createElement(r.PanelBody,{title:(0,e.__)("Sichtbarkeit","latrigg"),initialOpen:!0},React.createElement(r.ToggleControl,{label:(0,e.__)("Auf Mobilgeräte verstecken"),checked:!!u,onChange:()=>s({hiddenForMobile:!u}),help:u?(0,e.__)("Dieser Block ist versteckt auf Mobilgeräte.","sha"):""}),React.createElement(r.ToggleControl,{label:(0,e.__)("Auf Tabletts verstecken"),checked:!!h,onChange:()=>s({hiddenForTablet:!h}),help:h?(0,e.__)("Dieser Block ist versteckt auf Tabletts.","sha"):""}),React.createElement(r.ToggleControl,{label:(0,e.__)("Auf Desktopcomputer verstecken"),checked:!!p,onChange:()=>s({hiddenForDesktop:!p}),help:p?(0,e.__)("Dieser Block ist versteckt auf Desktopcomputer.","sha"):""})))):React.createElement(t,o)}))),(0,t.addFilter)("blocks.getSaveContent.extraProps","sht/applyExtraClass",((e,t,o)=>{const{hiddenForMobile:n,hiddenForTablet:a,hiddenForDesktop:r}=o;return d.includes(t.name)?(n&&(e.className=s()(e.className,"is-hidden-for--mobile")),a&&(e.className=s()(e.className,"is-hidden-for--tablet")),r&&(e.className=s()(e.className,"is-hidden-for--desktop")),e):e}));var u=window.wp.blocks;window.addEventListener("load",(()=>{(0,u.unregisterBlockStyle)("core/image","default"),(0,u.unregisterBlockStyle)("core/image","rounded"),(0,u.unregisterBlockStyle)("core/separator","wide")})),o(738),window.addEventListener("load",(()=>{let e=[];(0,u.getBlockTypes)().forEach((function(t){e.push(t.name)})),["core-embed/instagram"].forEach((t=>{e.includes(t)&&(0,u.unregisterBlockType)(t)}))}));var h=window.wp.serverSideRender,p=o.n(h),m=window.wp.primitives,g=(0,n.createElement)(m.SVG,{viewBox:"0 0 24 24",xmlns:"http://www.w3.org/2000/svg"},(0,n.createElement)(m.Path,{d:"M19 6.2h-5.9l-.6-1.1c-.3-.7-1-1.1-1.8-1.1H5c-1.1 0-2 .9-2 2v11.8c0 1.1.9 2 2 2h14c1.1 0 2-.9 2-2V8.2c0-1.1-.9-2-2-2zm.5 11.6c0 .3-.2.5-.5.5H5c-.3 0-.5-.2-.5-.5V6c0-.3.2-.5.5-.5h5.8c.2 0 .4.1.4.3l1 2H19c.3 0 .5.2.5.5v9.5zM8 12.8h8v-1.5H8v1.5zm0 3h8v-1.5H8v1.5z"}));const w="sht/archive-title-search";(0,u.registerBlockType)(w,{apiVersion:2,title:(0,e._x)("Archive Title (Search)","Block title","sha"),icon:g,category:"sht/blocks",keywords:[(0,e._x)("Bilder","Block keyword","sha"),"image","gallery",(0,e._x)("Impressionen","Block keyword","sha")],supports:{align:["wide","full"],html:!1},edit:()=>{const e=(0,l.useBlockProps)();return React.createElement("div",e,React.createElement(p(),{block:w}))},save(){return null}});var b=(0,n.createElement)(m.SVG,{viewBox:"0 0 24 24",xmlns:"http://www.w3.org/2000/svg"},(0,n.createElement)(m.Path,{d:"M19 6.5H5c-1.1 0-2 .9-2 2v7c0 1.1.9 2 2 2h14c1.1 0 2-.9 2-2v-7c0-1.1-.9-2-2-2zm.5 9c0 .3-.2.5-.5.5H5c-.3 0-.5-.2-.5-.5v-7c0-.3.2-.5.5-.5h14c.3 0 .5.2.5.5v7zM8 12.8h8v-1.5H8v1.5z"}));const k="sht/menu-toggle",v=(0,u.getBlockDefaultClassName)(k);(0,u.registerBlockType)(k,{apiVersion:2,title:(0,e._x)("Menü-Toggle-Schalter","Block title","sha"),icon:b,category:"sht/blocks",keywords:["navigation","toggle"],supports:{anchor:!0,align:!1,html:!1},edit:()=>{const e=(0,l.useBlockProps)();return React.createElement("div",e,React.createElement("span",{className:`${v}__line ${v}__line--1`}),React.createElement("span",{className:`${v}__line ${v}__line--2`}),React.createElement("span",{className:`${v}__line ${v}__line--3`}))},save:e=>{let{attributes:t}=e;const o={"aria-expanded":!1,"data-root-style":"is--mobilemenu--open"};t.anchor&&(o["aria-controls"]=t.anchor);const n=l.useBlockProps.save(o);return React.createElement("button",n,React.createElement("span",{className:`${v}__line ${v}__line--1`}),React.createElement("span",{className:`${v}__line ${v}__line--2`}),React.createElement("span",{className:`${v}__line ${v}__line--3`}))}})}()}();