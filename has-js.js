// Add these 2 lines immediately after the body:
document.body.className+=' has-js';
var hasjsrm=setTimeout(function(){document.body.className=document.body.className.replace(' has-js','')},5000);

// These 2 lines must be at the end of your script in case there was an error:
clearTimeout(hasjsrm);
$('body').addClass('has-js');

// Or without jQuery:
clearTimeout(hasjsrm);
document.body.className+=' has-js';