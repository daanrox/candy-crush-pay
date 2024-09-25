(function(){"use strict";window.make_url=function(to){if(!to)
return _site_url;return _site_url+'/'+to.split('.').join('/');};window.block_form=function(form,status){if(status)
$('input, textarea, button',form).attr('disabled',true);else
$('input, textarea, button',form).removeAttr('disabled');};window.number_format=function(number,decimals,decPoint,thousandsSep){number=(number+'').replace(/[^0-9+\-Ee.]/g,'');var n=!isFinite(+number)?0:+number,prec=!isFinite(+decimals)?0:Math.abs(decimals),sep=(typeof thousandsSep==='undefined')?',':thousandsSep,dec=(typeof decPoint==='undefined')?'.':decPoint,s='';var toFixedFix=function(n,prec){var k=Math.pow(10,prec);return ''+(Math.round(n*k)/k).toFixed(prec)};s=(prec?toFixedFix(n,prec):''+Math.round(n)).split('.');if(s[0].length>3){s[0]=s[0].replace(/\B(?=(?:\d{3})+(?!\d))/g,sep)}
if((s[1]||'').length<prec){s[1]=s[1]||'';s[1]+=new Array(prec-s[1].length+1).join('0');}
return s.join(dec);};window.highamount=function(number){return number_format(number,2,',','.');};window.money=function(number,currency){number=number.toFixed(2).split('.');number[0]=number[0].split(/(?=(?:...)*$)/).join('.');if(!currency)
return number.join(',');else
return "R$ "+number.join(',');};window.calc_bar=function(value,max,width){var percent=Math.round((value/max)*width,2)
return(percent>100)?100:percent;};})();$(document).ready(function(){$('[data-popup="popover"], [data-toggle="popover"]').popover({html:true});$('[data-popup="tooltip"], [data-toggle="tooltip"]').tooltip({html:true});});