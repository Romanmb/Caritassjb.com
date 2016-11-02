/* JCE Editor - 2.5.18 | 09 June 2016 | http://www.joomlacontenteditor.net | Copyright (C) 2006 - 2016 Ryan Demmer. All rights reserved | GNU/GPL Version 2 or later - http://www.gnu.org/licenses/gpl-2.0.html */
(function(){var each=tinymce.each;tinymce.create('tinymce.plugins.TextCase',{init:function(ed,url){var t=this;this.url=url;this.editor=ed;ed.addCommand('mceUpperCase',function(){t._upperCase();});ed.addCommand('mceLowerCase',function(){t._lowerCase();});ed.addCommand('mceCamelCase',function(){t._camelCase();});ed.addCommand('mceSentenceCase',function(){t._sentenceCase();});ed.onNodeChange.add(function(ed,cm,n,co){cm.setDisabled('textcase',co);});},createControl:function(n,cm){var t=this,ed=t.editor,doc=ed.getDoc();switch(n){case'textcase':var c=cm.createSplitButton('textcase',{title:'textcase.uppercase',icon:'uppercase',onclick:function(){ed.execCommand('mceUpperCase');}});c.onRenderMenu.add(function(c,m){m.add({title:'textcase.uppercase',icon:'uppercase',onclick:function(){ed.execCommand('mceUpperCase');}});m.add({title:'textcase.lowercase',icon:'lowercase',onclick:function(){ed.execCommand('mceLowerCase');}});m.add({title:'textcase.sentencecase',icon:'sentencecase',onclick:function(){ed.execCommand('mceSentenceCase');}});m.add({title:'textcase.camelcase',icon:'camelcase',onclick:function(){ed.execCommand('mceCamelCase');}});});return c;break;}
return null;},_sentenceCase:function(){var t=this,ed=this.editor,s=ed.selection,n=s.getNode();var text=s.getContent();text=text.toLowerCase().replace(/([a-z])/,function(a,b){return b.toUpperCase();}).replace(/(\.\s?)([a-z])/gi,function(a,b,c){return b+c.toUpperCase();});s.setContent(text);},_camelCase:function(){var t=this,ed=this.editor,s=ed.selection,n=s.getNode();var text=s.getContent();text=text.replace(/(\s)([a-z])/gi,function(a,b,c){return b+c.toUpperCase();});s.setContent(text);},_lowerCase:function(){var ed=this.editor,s=ed.selection,n=s.getNode();var text=s.getContent();s.setContent(text.toLowerCase());},_upperCase:function(){var ed=this.editor,s=ed.selection,n=s.getNode();var text=s.getContent();s.setContent(text.toUpperCase());},getInfo:function(){return{longname:'Painter',author:'Ryan Demmer',authorurl:'http://www.joomlacontenteditor.net',infourl:'http://www.joomlacontenteditor.net',version:'2.5.18'};}});tinymce.PluginManager.add('textcase',tinymce.plugins.TextCase);})();